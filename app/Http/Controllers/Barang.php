<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class Barang extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('pertemuan5/barang', [
            'isi_data' => $id
        ]);
    }
    public function coba()
    {
        return view('admin_rep/utama');
    }

    public function simpan_get(){
        $data = [
            'name' => 'Indomie',
            'stock' => 100,
            'brand' => 'Indofood',
            'buy_price' => 2500,
            'sell_price' => 3000,
            'comment' => 'barang pertama kali'
        ];
        $proses = Products::create($data);
    }

    public function hapus_get($id){
        $proses = Products::where('products_id',$id)->delete();
        if($proses){
            echo 'data berhasil dihapus';
        }
    }

    public function update_get($id){
        $data = [
            'name' => 'Indomie Goreng',
            'stock' => 1000,
            'brand' => 'Indofood Indo',
            'buy_price' => 2300,
            'sell_price' => 2800,
            'comment' => 'barang pertama kali'
        ];
        $proses = Products::find($id)->update($data);
    }

    public function view_get(){
        $data = Products::all();
        // dd($data);
        echo $data[0] -> name;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
