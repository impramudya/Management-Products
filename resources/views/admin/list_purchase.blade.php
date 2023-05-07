@extends('admin.utama')

@section('content')
<div class="col-lg-15 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">Purchase Table</h4>
        <p class="card-description">
        Add Purchase <code>.table</code>
        </p>
        <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>ID PURCHASE</th>
                <th>ID PRODUCT</th>
                <th>ID SUPPLIER</th>
                <th>STOCK</th>
                <th>COMMENT</th>
                <th>ACTION</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data_purchase as $key)
            <tr>
                <td>{{ $key->purchase_id }}</td>
                <td>{{ $key->products_id }}</td>
                <td>{{ $key->supplier_id }}</td>
                <td>{{ $key->stock }}</td>
                <td>{{ $key->comment }}</td>
                <td><button type="button" onclick="window.location.href='{{url('purchase/delete/'.$key->purchase_id)}}';" class="btn btn-danger">HAPUS</button>
                <button type="button" onclick="window.location.href='{{url('purchase/edit/'.$key->purchase_id)}}';" class="btn btn-warning">EDIT</button></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>
@endsection