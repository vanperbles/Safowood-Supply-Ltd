@extends('admin.adminlayout')

@section('content')

            <div class="page-header">
                <h3 class="page-title">Customer</h3>
                <button style="float: right;" type="submit" class="btn btn-primary ms-auto" ><a href="{{route('customers.create')}}">Add Customer</a></button>
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
                    <h4 class="card-title">Customer List</h4>
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
                            <th> Profile Picture </th>
                            <th> Customer Name </th>
                            <th> Customer Email </th>
                            <th> Customer Phone </th>
                            <th> Customer Address </th>
                            
                            <th> Edit </th>
                            <th> Delete </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $c)
                          <tr class="customer-detail" data-href="{{url('customer-detail', $c->id)}}">
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            <td>  </td>
                            <td> {{$c->name}} </td>
                            <td> {{$c->email}} </td>
                            <td> {{$c->phone}} </td>
                            <td> {{$c->address}} </td>
                            <td>
                              <a href="{{route('customers.edit', $c->id)}}"><div class="badge badge-outline-warning">Edit <span class="mdi mdi-cash-edit"></span> </div></a>
                            </td>
                            <td>
                            <form action="{{ route('customers.destroy', $c) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Do you want to delete this User?')" class="badge badge-outline-danger">
                                    Delete <span class="mdi mdi-trash-can-outline"></span>
                                </button>
                            </form> 
                            </td>
                          </tr>
                          
                          </tr>
                          @endforeach
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