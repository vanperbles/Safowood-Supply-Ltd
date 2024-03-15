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
                <h3 class="page-title">Add Category</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="">Inventry</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Add Category
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">New Category </h4>
                            <p class="card-description">New categery item</p>
                            <form action="{{url('/add_category_item')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="categoryname" class="categoryname">Name</label>
                                    <input type="text" name="name" class="form-control" fdprocessedid="brllum" id="exampleInputUsername1">
                                </div>
                                <div class="form-group">
                                    <label for="cartegoryslug">Category Slug</label>
                                    <input type="text" name="category_slug" class="form-control" fdprocessedid="brllum" id="exampleInputUsername2">
                                </div>

                                <button type="submit" class="btn btn-primary me-2" >Add Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



          </div>
        </div>
         
@include('admin.script')
  </body>
</html>