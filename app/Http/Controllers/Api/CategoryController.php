<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
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
        return CategoryResource::collection($categories);
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
        return new CategoryResource($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DrugCategory  $drugCategory
     * @return \Illuminate\Http\Response
     */
    public function show(DrugCategory $category)
    {
        return new CategoryResource($category);
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
        return new CategoryResource($category);
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
