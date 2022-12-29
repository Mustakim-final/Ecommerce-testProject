 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('frontend') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('frontend') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="{{ route('admin.page') }}" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('show.category') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  All Category
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('adcategory.page') }}" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Add Category
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('show.manufacture') }}" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  All Brands
                </p>
              </a>

            </li>

            <li class="nav-item">
              <a href="{{ route('manufacture.page') }}" class="nav-link">
                <i class="nav-icon fas fa-tree"></i>
                <p>
                  Add Breads
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Products
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('product.add') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Products</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('product.show') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Products</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                    Slider
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('slider.page') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Slider</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('slider.show') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>All Slider</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                    Brands
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('brand.page') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Brand</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('barnd.show') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>All Brands</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('brandproduct.page') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Brands Product</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('brandproduct.show') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Show Brands Product</p>
                    </a>
                  </li>
                </ul>
              </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Social Link
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Shop Name
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                    Delivery Man
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('deliveryman.add') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Man</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('deliveryman.show') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>All Man</p>
                    </a>
                  </li>
                </ul>
              </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
    <!-- /.sidebar -->
  </aside>
