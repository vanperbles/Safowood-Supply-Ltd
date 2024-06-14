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
            <form id="add_to_cart_form" action="{{ route('add_to_cart', ['id' => ':product_id']) }}" method="post">
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
                        <button  type="submit" name="addItem" class="btn btn-primary">Add Item</button>
                    </div>
                </div>     

            </form>
            
                    
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="mb-0">Products</h4>
                    <h4 class="mb-0 total" id="total-price" style="float: right;">GH </h4>
                    
                </div>
                <div class="card-body">

                </div>

            </div>

            <!-- Display added items section -->
            
                <div class="mt-4">
                    <h4>Added Items:</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Remove</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($cart as  $index =>$c)
                            <tr data-product-id="{{ $c['id'] }}">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $c['product_title'] }}</td>
                                <td class="unit-price">{{ $c['price'] }}</td>
                                <td>
                                    <div class="input-group" style="max-width: 150px;">
                                        <button class="input-group-text decrease-quantity" style="background-color: #343a40; color: white;" data-id="{{ $c['id'] }}">-</button>
                                        <input type="text" class="qty form-control" value="{{ $c['quantity'] }}" style="background-color: #343a40; color: white;" readonly>
                                        <button class="input-group-text increase-quantity" style="background-color: #343a40; color: white;" data-id="{{ $c['id'] }}">+</button>
                                    </div>

                                </td>
                                <td class="total-price">GHC {{ number_format($c['price'] * $c['quantity'], 2) }}</td>


                                <td>
                                    <a href="{{route('remove_cart',$c->id)}}"><div class="badge badge-danger">Remove  </div></a>
                                </td>
                                
                            </tr>
                        @endforeach

                        
                        </tbody>
                        
                    </table>
                </div>
                <div style="align-items: center; margin-top: 20px">
                    <h1 style="font-size: 18px; padding-bottom: 12px; align-items: center;">Proceed to Order</h1>
                    <a href="{{route('cash_order')}}" class="btn btn-success">Pay With Cash</a>
                    <a href="{{route('momo_order')}}"class="btn btn-success " >Pay With MOMO</a>
                </div>

        </div>
    </div>
</div>
</div>


<script>
    document.getElementById('add_to_cart_form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
        
        // Get the selected product ID
        var selectedProductId = document.getElementById('product_id').value;
        console.log(selectedProductId);

        // Replace the ":product_id" placeholder in the form action attribute with the selected product ID
        var formAction = "{{ route('add_to_cart', ['id' => ':product_id']) }}".replace(':product_id', selectedProductId);
        
        // Log the selected product ID (optional)
        console.log("Selected Product ID: " + selectedProductId);

        // Set the form action attribute to the updated URL
        this.setAttribute('action', formAction);
        
        // Submit the form
        this.submit();
    });
</script>

@stop
