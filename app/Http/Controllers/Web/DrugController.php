<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDrugRequest;
use App\Models\Drug;
use App\Models\DrugCategory;
use Illuminate\Http\Request;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drugs = Drug::with('category')->get();
        return view('drug.index', [
            'drugs' => $drugs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DrugCategory::all();
        return view('drug.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDrugRequest $request)
    {
        $fields = $request->validated();
        $category = DrugCategory::find($request->category_id);
        $category->drugs()->create($fields);
        return redirect('/drug')->with('message', 'Drug crated');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function show(Drug $drug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function edit(Drug $drug)
    {
        $categories = DrugCategory::all();
        return view('drug.edit', [
            'drug' => $drug,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDrugRequest $request, Drug $drug)
    {
        $fields = $request->validated();
        if ($request->category_id === $drug->category_id) {
            $drug->update($fields);
            return redirect('/drug')->with('message', 'Drug updated');
        } else {
            $drug->delete();
            $category = DrugCategory::find($request->category_id);
            $category->drugs()->create($fields);
            return redirect('/drug')->with('message', 'Drug updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drug $drug)
    {
        //
    }
}
