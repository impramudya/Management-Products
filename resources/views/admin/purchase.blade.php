@extends('admin.utama')

@section('content')
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Products</h4>
            {!! Form::open(array('url'=>url('purchase/store'), 'method'=> 'post', 'class'=>'form-horizontal')) !!}
            <p class="card-description">
                Input Data
            </p>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Product Name</label>
                    <div class="col-sm-9">
                    {!! Form::select('products_id', $data_products, NULL , array('class' => 'form-control')) !!}
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Supllier Name</label>
                    <div class="col-sm-9">
                    {!! Form::select('supplier_id', $data_supplier, NULL, array('class' => 'form-control')) !!}
                    </div>
                </div>
                </div>
            </div>
            <!-- <p class="card-description">
                Address
            </p> -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Stock</label>
                        <div class="col-sm-9">
                            <input type="text" name="stock" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Comment</label>
                    <div class="col-sm-9">
                    <input type="text" name="comment" class="form-control" />
                    </div>
                </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary me-2"> Submit</button>
            <button class="btn btn-light">Cancel</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection