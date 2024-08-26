@extends('admin.adminlayout')

@section('content')

    <div class="page-header">
        <h3 class="page-title">Payment</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Customer</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Payment 
                </li>
            </ol>
        </nav>
    </div>

    <div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Make Payment  </h4>
            <form  action="{{route('credit-payment',$user->id)}}" method="post">
                @csrf
                               
  
                <div class="row">
                    <div class="col-md-3">
                    <div class="form-group row">                    
                        <div class="col-sm-9">
                           <h1>{{$user->name}}</h1>                        
                            
                        </div>
                    </div>
                    </div>
                    <div class="col-md-5 mb-2">
                        <div class="form-group row">
                            <div class="col-sm-9">
                                
                                <label for="dropdown" id="payment_type">Payment Type</label>
                                <select name="payment_method" class="form-select form-select-lg" id="payment_type" fdprocessedid="67q24">
                                    <option value="">Select payment option</option>
                                    <option value="cash">Cash</option>
                                    <option value="momo">MOMO</option>
                                    <option value="bank">Bank</option>
                                </select>

                            
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <label for="" class="col-form-label ">Amount</label>
                                <input type="number" name="payment_amount" class="form-control" value="1">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 mb-4 text-end" >
                        <br>
                        <button  type="submit" name="addItem" class="btn btn-primary">Make Payment</button>
                    </div>
                </div>     

            </form>
  

    


@stop