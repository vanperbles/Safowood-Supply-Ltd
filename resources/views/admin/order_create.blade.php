@extends('admin.adminlayout')

@section('content')



<div class="page-header">
    <h3 class="page-title">Create Orders </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Inventry</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                    Create Orders
            </li>
        </ol>
    </nav>
</div>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Create New Order </h4>
            <form action="{{route('addItem')}}" method="post">
                @csrf
                               
  
                <div class="row">
                    <div class="col-md-7">
                    <div class="form-group row">                    
                        <div class="col-sm-9">
                            <label for="" class="col-sm-3 col-form-label ">Select Product </label>
                            <select name="product_id" id="product_id" class="form-select mySelect2">
                                <option value="">--Select Product--</option>
                                
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <label for="" class="col-form-label ">Quantity</label>
                                <input type="number" name="quantity" class="form-control" value="1">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 mb-3 text-end" >
                        <br>
                        <button type="submit" name="addItem" class="btn btn-primary">Add Item</button>
                    </div>
                </div>     

            </form>

            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="mb-0">Products</h4>
                </div>
                <div class="card-body">

                </div>

            </div>

            <!-- Display added items section -->
            @if(Session::has('productItems') && count(Session::get('productItems')) > 0)
                <div class="mt-4">
                    <h4>Added Items:</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Remove</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Session::get('productItems') as $index => $addedItem)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $addedItem['name'] }}</td>
                                    <td>{{ $addedItem['price'] }}</td>
                                    <td>
                                        <div class="input-group" style="max-width: 150px;">
                                            <button class="input-group-text decrease-quantity" style="background-color: #343a40; color: white;">-</button>
                                            <input type="text" class="qty form-control" value="{{ $addedItem['quantity'] }}" style="background-color: #343a40; color: white;">
                                            <button class="input-group-text increase-quantity" style="background-color: #343a40; color: white;">+</button>
                                        </div>
                                    </td>
                                    <td class="total-price">{{ number_format($addedItem['price'] * $addedItem['quantity'], 2) }}</td>

                                    <td>
                                        <a  href="#"><div class="badge badge-danger">Remove  </div></a>

                                    </td>


                                     
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

           
        </div>
    </div>
</div>
</div>

@stop
