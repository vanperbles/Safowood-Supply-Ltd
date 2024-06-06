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
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <button style="float: right;" type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  {{ session()->get('message') }}
              </div>
          @else
              @if(session()->has('error'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <button style="float: right;" type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                      {{ session()->get('error') }}
                  </div>
              @endif
          @endif


            <div class="container">
                @yield('content')
            </div>  
                
        </div>
         
@include('admin.script')
  </body>
</html>