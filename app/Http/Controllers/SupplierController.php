<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Laracasts\Flash\Flash;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data_supplier = Supplier::all();

        if ($request->is('api/*')){
            return $data_supplier;
        }else{
            return view('admin.list_supplier', compact('data_supplier'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supplier');
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
            'name' => $request-> name, 
            'name_company' => $request-> name_company,
            'address' => $request-> address,
            'contact' => $request-> contact,
            'telp' => $request-> telp,
            'information' => $request-> information,
        ];
        $proses = Supplier::create($data);
        if($proses) flash('Data Berhasil Disimpan')->success();
        if(!$proses) flash('Data Gagal Disimpan')->error();
        return redirect('supplier/view'); 
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
        $data_supplier = Supplier::where('supplier_id', $id)->get();
        return view('admin.edit_supplier', compact('data_supplier'));
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
        $supplier_data = Supplier::find($id);
    
        $supplier_data->name = $request->name;
        $supplier_data->name_company = $request->name_company;
        $supplier_data->address = $request->address;
        $supplier_data->contact = $request->contact;
        $supplier_data->telp = $request->telp;
        $supplier_data->information = $request->information;

        $proses = $supplier_data->save();

        return redirect('supplier/view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proses = Supplier::where('supplier_id', $id)->delete();
        if($proses) flash('Data Berhasil Dihapus')->success();
        if(!$proses) flash('Data Gagal Dihapus')->error();
        return redirect('supplier/view');   
    }
}
