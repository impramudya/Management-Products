@extends('admin.utama')

@section('content')
<div class="col-lg-15 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">Supplier Table</h4>
        <p class="card-description">
        Add Supplier <code>.table</code>
        </p>
        <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>ID SUPPLIER</th>
                <th>NAME</th>
                <th>NAME COMPANY</th>
                <th>ADDRESS</th>
                <th>CONTACT</th>
                <th>TELP</th>
                <th>INFORMATION</th>
                <th>ACTION</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data_supplier as $key)
            <tr>
                <td>{{ $key->supplier_id }}</td>
                <td>{{ $key->name }}</td>
                <td>{{ $key->name_company }}</td>
                <td>{{ $key->address }}</td>
                <td>{{ $key->contact }}</td>
                <td>{{ $key->telp }}</td>
                <td>{{ $key->information }}</td>
                <td><button type="button" onclick="window.location.href='{{url('supplier/delete/'.$key->supplier_id)}}';" class="btn btn-danger">HAPUS</button>
                <button type="button" onclick="window.location.href='{{url('supplier/edit/'.$key->supplier_id)}}';" class="btn btn-warning">EDIT</button></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>
@endsection