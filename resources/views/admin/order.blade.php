@extends('admin.adminlayout')

@section('content')

<div class="page-header">
    <h3 class="page-title">Orders</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Order</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                    Order
            </li>
        </ol>
    </nav>
</div>

<div class="row ">
    <div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
        <div class="row">
            <h4 class="card-title col-md-4 mb-3">Order List</h4>
            <div class="col-md-5 mb-4">
                <form action="{{url('search_order')}}" method="post" class="form-inline">
                    @csrf
                    <div class="badge badge-outline-info"><input  type="text" placeholder="Search Order" name="search" aria-label="Search"> <span class="mdi mdi-cash-edit"></span> </div>
                    
                    
                    <div class="badge badge-outline-info"><input value="Search" type="submit"> <span class="mdi mdi-cash-edit"></span> </div>
                    
                </form>
            </div>
            <h4 class="card-title col-md-2 mb-3">Order List</h4>

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

                
                <th>Name</th>                
                <th>Phone</th>
                <th> Product Name </th>
                <th> Product Price </th>
                <th> Product Quantity </th>            
                <th> Payment Structure  </th>
                <th> Status </th>
                <th> Product Image </th>
                <th> Deliverd</th>
                <th> Invoice</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $o)
                <tr>
                <td>
                    <div class="form-check form-check-muted m-0">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                    </label>
                    </div>
                </td>
                <td> {{$o->name}} </td>
                <td> {{$o->phone}} </td>
                <td> {{$o->product_title}} </td>
                <td> GHC {{$o->price}} </td>
                <td> {{$o->quantity}} </td>
                <td>   {{$o->payment_status}}</td>
                <td> {{$o->delivery_status}}</td>
                <td> <img src="{{ asset('uploads/'.$o->image) }}" alt="product image"> </td>
                @if ($o->delivery_status == "Processing")
                <td> <a href="{{route('deliver', $o->id)}}"><div class="badge badge-outline-warning">Delivered <span class="mdi mdi-cash-edit"></span> </div></a></td>
                @else
                <td>Delivered </td>
                @endif
                <td><a href="{{route("invoice", $o->id)}}"><div class="badge badge-outline-info">Invoice <span class="mdi mdi-cash-edit"></span> </div> </a> </td>
                <td><a href="{{route("send_mail", $o->id)}}"><div class="badge badge-outline-info">Send Mail <span class="mdi mdi-cash-edit"></span> </div> </a> </td>

            </tr>
                
                </tr>
                @empty
                <div><p>No Data Found</p> </div>
                @endforelse
            </tbody>
            </table>
        </div>
        </div>
    </div>
    </div>
</div>

</div>
</div>

@stop
