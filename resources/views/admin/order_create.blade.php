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
                    <h4 class="mb-0 total" style="float: right;">Total Price: GH </h4>
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
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $c['product_title'] }}</td>
                                <td class="unit-price">{{ $c['price'] }}</td>
                                <td>
                                    <div class="input-group" style="max-width: 150px;">
                                        <button class="input-group-text decrease-quantity" style="background-color: #343a40; color: white;">-</button>
                                        <input type="text" class="qty form-control" value="{{ $c['quantity'] }}" style="background-color: #343a40; color: white;">
                                        <button class="input-group-text increase-quantity" style="background-color: #343a40; color: white;">+</button>
                                    </div>
                                </td>
                                <td class="total-price">{{ number_format($c['price'] * $c['quantity'], 2) }}</td>


                                <td>
                                    <a href="{{route('remove_cart',$c->id)}}"><div class="badge badge-danger">Remove  </div></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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

    document.querySelectorAll('.increase-quantity').forEach(button => {
        button.addEventListener('click', function() {
            const qtyInput = this.parentElement.querySelector('.qty');
            const currentQty = parseInt(qtyInput.value);
            const newQty = currentQty + 1;
            qtyInput.value = newQty;
            updateTotalPrice(this.closest('tr'), newQty);
        });
    });

    document.querySelectorAll('.decrease-quantity').forEach(button => {
        button.addEventListener('click', function() {
            const qtyInput = this.parentElement.querySelector('.qty');
            const currentQty = parseInt(qtyInput.value);
            if (currentQty > 1) {
                const newQty = currentQty - 1;
                qtyInput.value = newQty;
                updateTotalPrice(this.closest('tr'), newQty);
            }
        });
    });

    function updateTotalPrice(row, quantity) {
        const price = parseFloat(row.querySelector('.unit-price').textContent);
        const newTotalPrice = price * quantity;
        row.querySelector('.total-price').textContent = newTotalPrice.toFixed(2);
    }
    
</script>

@stop
