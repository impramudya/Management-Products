@extends('admin.utama')

@section('content')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">Supplier Form</h4>
        <p class="card-description">
        Input data
        </p>
        {!! Form::open(array('url'=>url('supplier/'.$data_supplier[0]->supplier_id.'/update/'), 'method'=> 'post', 'class'=>'form-horizontal')) !!}
        <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
            <input type="text" value="{{$data_supplier[0]->name}}" class="form-control" id="exampleInputUsername2" placeholder="Name" name="name">
            </div>
        </div>
        <div class="form-group row">
            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Name Company</label>
            <div class="col-sm-9">
            <input type="text" value="{{$data_supplier[0]->name_company}}"class="form-control" id="exampleInputEmail2" placeholder="Name Company" name="name_company">
            </div>
        </div>
        <div class="form-group row">
            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Address</label>
            <div class="col-sm-9">
            <input type="text" value="{{$data_supplier[0]->address}}" class="form-control" id="exampleInputMobile" placeholder="Address" name="address">
            </div>
        </div>
        <div class="form-group row">
            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Contact</label>
            <div class="col-sm-9">
            <input type="email" value="{{$data_supplier[0]->contact}}" class="form-control" id="exampleInputPassword2" placeholder="Contact" name="contact">
            </div>
        </div>
        <div class="form-group row">
            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Telp</label>
            <div class="col-sm-9">
            <input type="text" value="{{$data_supplier[0]->telp}}" class="form-control" id="exampleInputConfirmPassword2" placeholder="Telp" name="telp">
            </div>
        </div>
        <div class="form-group row">
            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Information</label>
            <div class="col-sm-9">
            <input type="text" value="{{$data_supplier[0]->information}}" class="form-control" id="exampleInputConfirmPassword2" placeholder="Information" name="information">
            </div>
        </div>
        <div class="form-check form-check-flat form-check-primary">
            <label class="form-check-label">
            <input type="checkbox" class="form-check-input">
            Remember me
            </label>
        </div>
        <button type="submit" class="btn btn-primary me-2">Submit</button>
        <button class="btn btn-light">Cancel</button>
        {!! Form::close() !!}
    </div>
    </div>
</div>
@endsection