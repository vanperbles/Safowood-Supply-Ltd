<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          
          <a class="sidebar-brand brand-logo" href="{{url('redirect')}}"><img src="{{asset('admin/assets/images/Safowood-logo.PNG')}}" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="{{url('redirect')}}"><img src="{{asset('admin/assets/images/Safowood-logo.PNG')}}" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="admin/assets/images/faces/face15.jpg" alt="">
                  <span class="count bg-success"></span>
                </div>
                @auth
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">{{ auth()->user()->name}}</h5>
                  <span>{{auth()->user()->email}}</span>
                </div>
              </div>
              @endauth
              <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('redirect')}}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Inventory</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('show_category_item')}}">Category</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('products')}}">Product</a></li>
                <li class="nav-item"> <a class="nav-link" href="#">Add Quantity</a></li>
                <li class="nav-item"> <a class="nav-link" href="#">Stock Remaining</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#customer" aria-expanded="false" aria-controls="customer">
              <span class="menu-icon">
                <i class="mdi mdi-account"></i>
              </span>
              <span class="menu-title">Customers</span>
              <i class="menu-arrow"></i>              
            </a>
            <div class="collapse" id="customer">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('customers')}}">Customer List</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('customers.create')}}">Add Customer</a></li>
                
              </ul>
            </div>
          </li>
          
          <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#myauth" aria-expanded="false" aria-controls="myauth">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <span class="menu-title">POS</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="myauth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route ('create_orders')}}"> Creat Orders</a></li>
                <li class="nav-item"> <a class="nav-link" href="orders.php"> Ordes </a></li>
                <li class="nav-item"> <a class="nav-link" href="#"> 500 </a></li>
                <li class="nav-item"> <a class="nav-link" href="#"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="#"> Register </a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>


      <div class="container-fluid page-body-wrapper">