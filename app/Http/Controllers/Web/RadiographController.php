<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRadiographRequest;
use App\Models\Radiograph;
use Illuminate\Http\Request;

class RadiographController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Radiograph::class);
        $Radiograph = Radiograph::all();
        return view('Radiograph.index', [
            'Radiographs' => $Radiograph,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Radiograph::class);
        return view('Radiograph.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRadiographRequest $request)
    {
        $this->authorize('create', Radiograph::class);
        $fields = $request->validated();
        $Radiograph = Radiograph::create($fields);
        return redirect('/radiograph')->with('message', 'Radiograph created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Radiograph  $radiograph
     * @return \Illuminate\Http\Response
     */
    public function show(Radiograph $radiograph)
    {
        return view('Radiograph.show', [
            'Radiograph' => $radiograph,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Radiograph  $radiograph
     * @return \Illuminate\Http\Response
     */
    public function edit(Radiograph $radiograph)
    {
        $this->authorize('update', $radiograph);
        return view('Radiograph.edit', [
            'Radiograph' => $radiograph,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Radiograph  $radiograph
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRadiographRequest $request, Radiograph $radiograph)
    {
        $this->authorize('update', $radiograph);
        $fields = $request->validated();
        $Radiograph = $radiograph->update($fields);
        return redirect('/radiograph')->with('message', 'Radiograph updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Radiograph  $radiograph
     * @return \Illuminate\Http\Response
     */
    public function destroy(Radiograph $radiograph)
    {
        //
    }
}
