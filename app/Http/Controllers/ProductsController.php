<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Laracasts\Flash\Flash;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data_product = Products::all();

        if ($request->is('api/*')){
            return $data_product;
        }else{
            return view('admin.list_products', compact('data_product'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request-> product_name, 
            'stock' => $request-> stock,
            'brand' => $request-> brand,
            'buy_price' => $request-> buy_price,
            'sell_price' => $request-> sell_price,
            'comment' => $request-> comment,
        ];
        $proses = Products::create($data);
        if($proses) flash('Data Berhasil Disimpan')->success();
        if(!$proses) flash('Data Gagal Disimpan')->error();
        return redirect('products/view');  
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_product = Products::where('products_id', $id)->get();
        return view('admin.edit_products', compact('data_product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products_data = Products::find($id);

        $products_data->name = $request-> product_name;
        $products_data->stock = $request-> stock;
        $products_data->brand = $request-> brand;
        $products_data->buy_price = $request-> buy_price;
        $products_data->sell_price = $request-> sell_price;
        $products_data->comment = $request-> comment;

        $proses = $products_data->save();

         return redirect('products/view');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proses = Products::where('products_id', $id)->delete();
        if($proses) flash('Data Berhasil Dihapus')->success();
        if(!$proses) flash('Data Gagal Dihapus')->error();
        return redirect('products/view');   
    }
}
