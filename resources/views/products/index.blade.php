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
                <h3 class="page-title">Product</h3>
                <button style="float: right;" type="submit" class="btn btn-primary ms-auto" ><a href="{{route('add_product')}}">Add Product</a></button>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="">Inventry</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                             Product
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Product List</h4>
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
                            <th> Product Category </th>
                            
                            <th> Edit </th>
                            <th> Delete </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $p)
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            <td> <img src="{{ asset('uploads/'.$p->image) }}" alt="product image"> </td>
                            <td> {{$p->name}} </td>
                            <td> $ {{$p->price}} </td>
                            <td> {{$p->quantity}} </td>
                            <td> {{$p->category->name}} </td>
                            <td>
                              <a href="{{url('update_product', $p->id)}}"><div class="badge badge-outline-warning">Edit <span class="mdi mdi-cash-edit"></span> </div></a>
                            </td>
                            <td>
                              <a onclick="return confirm(' Are you sure you want to Delete this Item')" href="{{url('delete_product', $p->id)}}"><div class="badge badge-outline-danger">Delete <span class="mdi mdi-trash-can-outline"></span></i></div></a>
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