<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      
        <!-- partial:partials/_navbar.html -->
        @include('admin.head')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          @if(session()->has('message'))
            <div  class="alert alert-success alert-dismissible fade show" role="alert">
                <button style="float: right;" type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session()->get('message') }}
            </div>
            @endif

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
                            <th> Customer Price </th>
                            <th> Customer Quantity </th>
                            <th> Customer Category </th>
                            
                            <th> Edit </th>
                            <th> Delete </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $c)
                          <tr>
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
         
@include('admin.script')
  </body>
</html>