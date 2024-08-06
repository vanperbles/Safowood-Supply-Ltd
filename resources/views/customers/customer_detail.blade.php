@extends('admin.adminlayout')

@section('content')

<div class="page-header">
    <h3 class="page-title">Customer</h3>
    <button  type="submit" class="btn btn-primary ms-auto" >Debit Total: GHC {{$totalT}}</button>

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

<div class="row ">
    <div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
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
        <div class="row">
            <h4 class="card-title col-md-4 mb-3">Customer {{$user->name}} orders history</h4>
        </div>
        
        <div class="table-responsive">
            <table class="table">
            <thead>
                <tr>
                <th>
                    <div class="form-check form-check-muted m-0">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                    </label>
                    </div>
                </th>

                
                <th> Product Image </th>
                <th> Product Name </th>
                
                <th> Product Price </th>
                <th> Product Quantity </th>            
                <th> Payment Structure  </th>
                <th> Status </th>
                <th> Deliverd</th>
                <th> Date</th>


                </tr>
            </thead>
            <tbody>
                @forelse($user_orders as $o)
                <tr class="{{ $o->created_at->diffInDays(now()) < 1 ? 'table-success' : '' }}">
                <td>
                    <div class="form-check form-check-muted m-0">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                    </label>
                    </div>
                </td>
                <td> <img src="{{ asset('uploads/'.$o->image) }}" alt="product image"> </td>
                <td> {{$o->product_title}} </td>
                <td> GHC {{$o->price}} </td>
                <td> {{$o->quantity}} </td>
                <td>   {{$o->payment_status}}</td>
                <td> {{$o->delivery_status}}</td>
                
                @if ($o->delivery_status == "Processing")
                <td> <a href="{{route('deliver', $o->id)}}"><div class="badge badge-outline-warning">Delivered <span class="mdi mdi-cash-edit"></span> </div></a></td>
                @else
                <td>Delivered </td>
                @endif
                <td>{{ $o->created_at->format('Y-m-d H:i') }}</td>
                
            </tr>
            @empty
                <div><p>No Data Found</p> </div>
            @endforelse
                </tr>
                
            </tbody>
            </table>
        </div>
        </div>
    </div>
    </div>
</div>
</div>

@stop
