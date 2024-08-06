@extends('admin.adminlayout')

@section('content')

    <div class="page-header">
        <h3 class="page-title">Add Quantity</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Inventry</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Add Quantity
                </li>
            </ol>
        </nav>
    </div>
    <div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Create New Order </h4>
            <form id="update_quantity" action="{{  route('update_quantity', ['id' => ':product_id']) }}" method="post">
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
                        <button  type="submit" name="addItem" class="btn btn-primary">Add Quantity</button>
                    </div>
                </div>     

            </form>

            <script>
    document.getElementById('update_quantity').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
        
        // Get the selected product ID
        var selectedProductId = document.getElementById('product_id').value;
        console.log(selectedProductId);

        // Replace the ":product_id" placeholder in the form action attribute with the selected product ID
        var formAction = "{{ route('update_quantity', ['id' => ':product_id']) }}".replace(':product_id', selectedProductId);
        
        // Log the selected product ID (optional)
        console.log("Selected Product ID: " + selectedProductId);

        // Set the form action attribute to the updated URL
        this.setAttribute('action', formAction);
        
        // Submit the form
        this.submit();
    });
</script>
           
@stop