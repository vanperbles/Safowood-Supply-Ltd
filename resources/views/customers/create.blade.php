@extends('admin.adminlayout')

@section('content')

<div class="page-header">
    <h3 class="page-title">Customer</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Customer</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                    Customer
            </li>
        </ol>
    </nav>
</div>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">New Customer </h4>
            <form action="{{url('customers')}}" method="post">
                @csrf
                <div class="form-group">
                    <label  class="col-sm-3 col-form-label">Name</label>
                    <input type="text" name="name" class="form-control" fdprocessedid="brllum">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>              
                               
                <div class="form-group">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <input type="email" name="email" class="form-control" fdprocessedid="brllum" >
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-form-label">Phone</label>
                    <input type="number" name="phone" class="form-control" fdprocessedid="brllum">
                    @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-form-label">Adress</label>
                    <input type="text" name="address" class="form-control" fdprocessedid="brllum">
                    @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                

                
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label ">Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password"  class="form-control">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label ">Confirm Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password_confirmation" class="form-control">
                                @error('password_confirmation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>     
                        
                

                <button type="submit" class="btn btn-primary me-2" >Add Customer</button>
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