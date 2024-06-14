@extends('admin.adminlayout')

@section('content')

<div class="page-header">
    <h3 class="page-title">Customer</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Inventry</a>
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
            <h4 class="card-title">Update Customer </h4>
            <form action="{{route('customers.update', $customer)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Use PUT method for updating -->
                <div class="form-group">
                    <label  class="col-sm-3 col-form-label">Name</label>
                    <input type="text" name="name" value="{{$customer->name}}" class="form-control" fdprocessedid="brllum">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>              
                               
                <div class="form-group">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <input type="email" name="email" value="{{$customer->email}}" class="form-control" fdprocessedid="brllum" >
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-form-label">Phone</label>
                    <input type="email" name="email" value="{{$customer->phone}}" class="form-control" fdprocessedid="brllum" >
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 col-form-label">Address</label>
                    <input type="text" name="address" value="{{$customer->address}}" class="form-control" fdprocessedid="brllum">
                    @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                

                <button onclick="return confirm(' Are you sure you want to Update this Item')"  type="submit" class="btn btn-primary me-2" >Update Customer Details</button>
            </form>
        </div>
    </div>
</div>
</div>

@stop
