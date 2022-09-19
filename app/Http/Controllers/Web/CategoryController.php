<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\DrugCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DrugCategory::all();
        return view('category.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $fields = $request->validated();
        $category = DrugCategory::create($fields);
        return redirect('category')->with('message', 'category created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DrugCategory  $drugCategory
     * @return \Illuminate\Http\Response
     */
    public function show(DrugCategory $drugCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DrugCategory  $drugCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(DrugCategory $category)
    {
        return view('category.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DrugCategory  $drugCategory
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, DrugCategory $category)
    {
        $fields = $request->validated();
        $category->update($fields);
        return redirect('category')->with('message', 'category updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DrugCategory  $drugCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(DrugCategory $drugCategory)
    {
        //
    }
}
