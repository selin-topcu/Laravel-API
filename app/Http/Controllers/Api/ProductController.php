<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $request
     * @return void
     */
    public function index(Request $request)
    {
        //veri tabanındaki verileri kullanıcıya vermek
        //return Product::all();
        //return response()->json(Product::all(),200);
        //return response(Product::all(),200);

        //offset kaçıncı kayıttan itibaren alacağını belirler, limit değeri ise bir sayfa içerinde kaç tane kayıt alacağını belirler
        $offset = $request->offset ? $request->query('offset'): 0;
        $limit = $request->limit ? $request->query('limit'): 10;

        // içinde q harfi varsa bu filtreyi uygular
         $list=Product::query();
        if($request->has('q'))
            $list->where('name','like','%'.$request->query('q').'%');

        //sıralama
        if($request->has('sortBy'))
            $list->orderBy($request->query('sortBy'),$request->query('sort','DESC'));

            $data=$list->offset($offset)->limit($limit)->get();
        return response($data,200);


        //kaç tane kayıt listeleyeceğini belirleyen kod
        //return response(Product::paginate(10),200);





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
        $product=Product::create($input);
        return response(
            [
                'data'=> $product,
                'message'=>'Product created'
            ],201);

    }

    /**
     * Display the specified resource.
     * @param  \App\Product  $product
     * @return Response
     */
    public function show($id)
    {
        //belirtilen id değerine göre kaydı görüntüleyen kod
        //özelleştirilmiş hata kodu if else blogu içinde
        $product=Product::find($id);
        if($product)
        {
            return response($product,200);
        }
        return response(['message'=>'Product not found'],404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Product  $product
     * @return Response
     */
    public function update(Request $request, Product $product)
    {

        $input= $request->all();
        $product->update($input);
        return response(
            [
                'data'=> $product,
                'message'=>'Product updated'
            ],200);
        //200 success başarılı bir istek duurm kodunu bildirir
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return Response
     */
    public function destroy(Product $product)
    {
        //silme işlemi
        $product->delete();
        return response([
            'message'=>'Product deleted'
        ],200);
    }
}
