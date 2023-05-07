<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Products;
use App\Models\Supplier;
use Laracasts\Flash\Flash;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data_purchase = Purchase::with('products', 'supplier')->get();

        if ($request->is('api/*')){
            return $data_purchase;
        }else{
            return view('admin.list_purchase', compact('data_purchase'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_products = array();
        foreach (Products::all() as $key){
            $data_products[$key->products_id] = $key->name;
        }

        $data_supplier = array();
        foreach (Supplier::all() as $key){
            $data_supplier[$key->supplier_id] = $key->name;
        }

        return view('admin.purchase', compact('data_products','data_supplier'));
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
            'products_id' => $request->products_id,
            'supplier_id' => $request->supplier_id,
            'stock' => $request-> stock, 
            'comment' => $request-> comment,
        ];
        $proses = Purchase::create($data);
        if($proses) flash('Data Berhasil Disimpan')->success();
        if(!$proses) flash('Data Gagal Disimpan')->error();
        return redirect('purchase/view');  
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
        $data_products = array();
        foreach (Products::all() as $key){
            $data_products[$key->products_id] = $key->name;
        }

        $data_supplier = array();
        foreach (Supplier::all() as $key){
            $data_supplier[$key->supplier_id] = $key->name;
        }

        $data_purchase = Purchase::with('products','supplier')->where('purchase_id', $id)->get();

        return view('admin.edit_purchase', compact('data_products','data_supplier','data_purchase'));
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
        $purchase_data = Purchase::find($id);

        $purchase_data -> products_id = $request -> products_id;
        $purchase_data -> supplier_id = $request -> supplier_id;
        $purchase_data -> stock = $request -> stock;
        $purchase_data -> comment = $request -> comment;
       
        $proses = $purchase_data->save();

        return redirect('purchase/view');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proses = Purchase::where('purchase_id', $id)->delete();
        if($proses) flash('Data Berhasil Dihapus')->success();
        if(!$proses) flash('Data Gagal Dihapus')->error();
        return redirect('purchase/view');   
    }
}
