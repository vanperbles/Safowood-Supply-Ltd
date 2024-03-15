@extends('admin.adminlayout')

@section('content')

<div class="page-header">
    <h3 class="page-title">Product</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Inventry</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                    Product
            </li>
        </ol>
    </nav>
</div>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">New Product </h4>
            <form action="{{route('create_product')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label  class="col-sm-3 col-form-label">Name</label>
                    <input type="text" name="name" class="form-control" fdprocessedid="brllum">
                </div>
                
                <div class="form-group">
                
                    <label class="col-sm-3 col-form-label" id="category_id">Category</label>
                    
                    <select class="form-control" name="category_id" id="category_id">
                    @foreach($category as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                   
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 col-form-label">Price</label>
                    <input type="number" name="price" class="form-control" fdprocessedid="brllum" >
                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-form-label">Quantity</label>
                    <input type="number" name="quantity" class="form-control" fdprocessedid="brllum">
                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-form-label">Product Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-form-label">Description</label>
                    <textarea name="description" class="form-control" fdprocessedid="brllum" ></textarea>
                </div>

                <button type="submit" class="btn btn-primary me-2" >Add Product</button>
            </form>
        </div>
    </div>
</div>
</div>

@stop

<!-- 
<div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-9">
                                <input type="number" name="price" step="0.01" min="0" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label ">Quantity</label>
                            <div class="col-sm-9">
                                <input type="number" name="quantity" min="0" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="col-sm-3 col-form-label ">Select Category</label>
                        <select name="" id="" class="col-sm-8 js-example-basic-single select2-hidden-accessible">
                            <option value="a">Arsenal</option>
                            <option value="b">Baca</option>
                            <option value="m">Manchester</option>
                        </select>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label ">Quantity</label>
                            <div class="col-sm-9">
                                <input type="number" name="quantity" min="0" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 col-form-label " for="cartegoryslug">Description</label>
                        <input type="text" name="category_slug" class="form-control" fdprocessedid="brllum" id="exampleInputUsername2">
                    </div>
                </div> -->