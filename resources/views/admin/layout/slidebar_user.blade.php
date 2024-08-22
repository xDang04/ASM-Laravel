
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
        <a href="index.html" class="logo">
          <img
            src="/assets/images/logo_light.svg"
            alt="navbar brand"
            class="navbar-brand"
            height="20"
          />
        </a>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
          </button>
          <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
          </button>
        </div>
        <button class="topbar-toggler more">
          <i class="gg-more-vertical-alt"></i>
        </button>
      </div>
      <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <ul class="nav nav-secondary">
          <li class="nav-item active">
            <a href="{{ route('users.home') }}" aria-expanded="false">
              {{-- <i class="fas fa-home"></i> --}}
              <p>Trang chủ</p>
            </a>
          </li>
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#store">
              {{-- <i class="fas fa-layer-group"></i> --}}
              <p>Cửa hàng</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="store">
              <ul class="nav nav-collapse">
                <li>
                  <a href="">
                    <span class="sub-item">Quần</span>
                  </a>
                </li>
                <li>
                  <a href="">
                    <span class="sub-item">Áo</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#products">
              {{-- <i class="fas fa-pen-square"></i> --}}
              <p>Giới thiệu</p>
              {{-- <span class="caret"></span> --}}
            </a>
            <div class="collapse" id="products">
              <ul class="nav nav-collapse">
                {{-- <li>
                  <a href="{{ route('admin.products.listProducts')}}">
                    <span class="sub-item">List Product</span>
                  </a>
                  <a href="{{ route('admin.products.addProduct')}}">
                    <span class="sub-item">Add Product</span>
                  </a>
                </li> --}}
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a href="{{ route('users.cart.viewCart') }}">
              {{-- <i class="fas fa-pen-square"></i> --}}
              <p>Giỏ hàng</p>
              {{-- <span class="caret"></span> --}}
            </a>
            {{-- <div class="collapse" id="categories">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{ route('admin.category.listCategories')}}">
                    <span class="sub-item">List Category</span>
                  </a>
                  <a href="{{ route('admin.category.addCategory')}}">
                    <span class="sub-item">Add Category</span>
                  </a>
                </li>
              </ul>
            </div> --}}
          </li>
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#tables">
              {{-- <i class="fas fa-table"></i> --}}
              <p>Thanh toán</p>
              {{-- <span class="caret"></span> --}}
            </a>
            {{-- <div class="collapse" id="tables">
              <ul class="nav nav-collapse">
                <li>
                  <a href="tables/tables.html">
                    <span class="sub-item">Basic Table</span>
                  </a>
                </li>
                <li>
                  <a href="tables/datatables.html">
                    <span class="sub-item">Datatables</span>
                  </a>
                </li>
              </ul>
            </div> --}}
          </li>
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#maps">
              {{-- <i class="fas fa-map-marker-alt"></i> --}}
              <p>Khuyến mại</p>
              {{-- <span class="caret"></span> --}}
            </a>
            {{-- <div class="collapse" id="maps">
              <ul class="nav nav-collapse">
                <li>
                  <a href="maps/googlemaps.html">
                    <span class="sub-item">Google Maps</span>
                  </a>
                </li>
                <li>
                  <a href="maps/jsvectormap.html">
                    <span class="sub-item">Jsvectormap</span>
                  </a>
                </li>
              </ul>
            </div> --}}
          </li>
          {{-- <li class="nav-item">
            <a data-bs-toggle="collapse" href="#charts">
              <i class="far fa-chart-bar"></i>
              <p>Charts</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav nav-collapse">
                <li>
                  <a href="charts/charts.html">
                    <span class="sub-item">Chart Js</span>
                  </a>
                </li>
                <li>
                  <a href="charts/sparkline.html">
                    <span class="sub-item">Sparkline</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a href="widgets.html">
              <i class="fas fa-desktop"></i>
              <p>Widgets</p>
              <span class="badge badge-success">4</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../documentation/index.html">
              <i class="fas fa-file"></i>
              <p>Documentation</p>
              <span class="badge badge-secondary">1</span>
            </a>
          </li>
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#submenu">
              <i class="fas fa-bars"></i>
              <p>Menu Levels</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="submenu">
              <ul class="nav nav-collapse">
                <li>
                  <a data-bs-toggle="collapse" href="#subnav1">
                    <span class="sub-item">Level 1</span>
                    <span class="caret"></span>
                  </a>
                  <div class="collapse" id="subnav1">
                    <ul class="nav nav-collapse subnav">
                      <li>
                        <a href="#">
                          <span class="sub-item">Level 2</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <span class="sub-item">Level 2</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li>
                  <a data-bs-toggle="collapse" href="#subnav2">
                    <span class="sub-item">Level 1</span>
                    <span class="caret"></span>
                  </a>
                  <div class="collapse" id="subnav2">
                    <ul class="nav nav-collapse subnav">
                      <li>
                        <a href="#">
                          <span class="sub-item">Level 2</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li>
                  <a href="#">
                    <span class="sub-item">Level 1</span>
                  </a>
                </li>
              </ul>
            </div>
          </li> --}}
        </ul>
      </div>
    </div>
  </div>