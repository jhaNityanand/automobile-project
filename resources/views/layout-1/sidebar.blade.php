
@include("layout-1.style")

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{url('public/assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span id="admin_name" class="brand-text font-weight-light">Automobile</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false">
        <li class="nav-item">
            <a href="#" class="nav-link">
              <i style="color: white; size: 25px" class="nav-icon fas fa-user"></i>
              <p id="admin_name" class="info">{{session('name')}}</p>
            </a>
            <hr><hr>
          </li>
    </ul>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
                <a href="{{url('siteAdmin')}}" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p id="p">Dashboard</p>
                </a>
              </li>

            <li class="nav-item {{-- menu-open --}}">
                <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cart-arrow-down"></i>
              <p id="p">
                Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('product')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p id="p">Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('order')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p id="p">Order</p>
                </a>
              </li>
            </ul>
        </li>

          <li class="nav-item {{-- menu-open --}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-stream"></i>
              <p id="p">
                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('category')}}" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p id="p">Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('subCategory')}}" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p id="p">Sub-Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('brand')}}" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p id="p">Brand</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-stream"></i>
              <p id="p">
                Varation
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p id="p">Size</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p id="p">Color</p>
                </a>
              </li>
            </ul>
          </li> -->

          <li class="nav-item {{-- menu-open --}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p id="p">
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('adminData')}}" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p id="p">Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('viewCustomer')}}" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p id="p">Customers</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{-- menu-open --}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-feather-alt"></i>
              <p id="p">
                Others
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('viewFeedback')}}" class="nav-link">
                  <i class="fas fa-comments nav-icon"></i>
                  <p id="p">Feedback</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('viewRating')}}" class="nav-link">
                  <i class="fas fa-star nav-icon"></i>
                  <p id="p">Rating</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('payType')}}" class="nav-link">
                  <i class="fas fa-rupee-sign nav-icon"></i>
                  <p id="p">PayType</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('city')}}" class="nav-link">
                  <i class="fas fa-building nav-icon"></i>
                  <p id="p">City</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p id="p">Others</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{url('about')}}" class="nav-link">
              <i class="nav-icon far fa-address-card"></i>
              <p id="p">About Us</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('contact')}}" class="nav-link">
              <i class="nav-icon fas fa-id-card-alt"></i>
              <p id="p">Contact Us</p>
            </a>
          </li>

          <li class="nav-item {{-- menu-open --}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cube"></i>
              <p id="p">
                Upcoming
                <i class="right badge badge-danger">New</i>
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  {{-- <script>
      setInterval(
            function () {
                var colors = Math.floor(Math.random()*16777215).toString(16);
                var abc = document.getElementById("abc");
                abc.style.color = "#"+colors;
            },1000);
  </script> --}}
