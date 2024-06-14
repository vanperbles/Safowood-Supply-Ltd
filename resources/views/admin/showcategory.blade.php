@extends('admin.adminlayout')

@section('content')

            <div class="page-header">
                <h3 class="page-title">Category</h3>
                <button style="float: right;" type="submit" class="btn btn-primary ms-auto" ><a href="{{url('add-category')}}">Add Category</a></button>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="">Inventry</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                             Category
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Category List</h4>
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
                            <th> Category Name </th>
                            
                            <th> Edit </th>
                            <th> Delete </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $c)
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            
                            <td> {{$c->name}} </td>
                            
                            <td>
                              <div class="badge badge-outline-warning">Edit <span class="mdi mdi-cash-edit"></span> </div>
                            </td>
                            <td>
                              <a onclick="return confirm(' Are you sure you want to Delete this Item')" href="{{url('delete_category', $c->id)}}"><div class="badge badge-outline-danger">Delete <span class="mdi mdi-trash-can-outline"></span></i></div></a>
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