<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response(Category::all(),200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //gelen istek içerisideki tüm data verilerini gösterir
        $input= $request->all();
        //kaydetme kodu, 201 bir kayıt ekleme işlemi anlamına gelen kod
        $category=Category::create($input);
        return response(
            [
                'data'=> $category,
                'message'=>'Category created'
            ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Category
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return Response
     */
    public function update(Request $request, Category $category)
    {
        $category->name=$request->name;
        $category->slug=Str::slug($request->name);
        $category->save();


        return response(
            [
                'data'=> $category,
                'message'=>'Category updated'
            ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response([
            'message'=>'Product deleted'
        ],200);
    }
}
