<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <!-- Custom fonts for this template -->
  <link href="{{url('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{url('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>

  <!-- Custom styles for this page -->
  
  <link href="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-bath"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Aplikasi Inventory Stok</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ (request()->is('home*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('home')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
     

      <!-- Nav Item - Utilities Collapse Menu -->
     
      <!-- Nav Item - Charts -->
      
      <!--  <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                 <i class="fas fa-fw fa-cog"></i>
                    <span>Master Data</span>
                </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Master Data</h6>
                  <a class="collapse-item" href="/kategori">Kategori</a>
                  <a class="collapse-item" href="/supplier">Data Supplier</a>
                  <a class="collapse-item" href="/barang">Data Barang</a>
              </div>
          </div>
      </li> -->
      <li class="nav-item {{ (request()->is('admin*')) ? 'active' : '' }}">
        <a class="nav-link" href="/kategori">
          <i class="fa fa-fw fa-list-alt" aria-hidden="true"></i>
          <span>Kategori</span></a>
      </li>
      <li class="nav-item {{ (request()->is('admin*')) ? 'active' : '' }}">
        <a class="nav-link" href="/supplier">
          <i class="fas fa-fw fa-industry"></i>
          <span>Supplier</span></a>
      </li>
      <li class="nav-item {{ (request()->is('admin*')) ? 'active' : '' }}">
        <a class="nav-link" href="/barang">
          <i class="fas fa-fw fa-briefcase"></i>
          <span>Barang</span></a>
      </li>
      <li class="nav-item {{ (request()->is('admin*')) ? 'active' : '' }}">
        <a class="nav-link" href="/transaksi">
          <i class="fas fa-fw fa-dollar-sign"></i>
          <span>Transaksi</span></a>
      </li>
      <li class="nav-item {{ (request()->is('admin*')) ? 'active' : '' }}">
        <a class="nav-link" href="/barangIn">
          <i class="fas fa-fw fa-briefcase"></i>
          <span>Barang Masuk</span></a>
      </li>
     <!--  <li class="nav-item {{ (request()->is('admin*')) ? 'active' : '' }}">
        <a class="nav-link" href="/terjual">
          <i class="fas fa-fw fa-user"></i>
          <span>Barang Terjual</span></a>
      </li> -->
      
   <!--    <li class="nav-item {{ (request()->is('admin*')) ? 'active' : '' }}">
        <a class="nav-link" href="/stok">
          <i class="fas fa-fw fa-user"></i>
          <span>Stok Barang</span></a>
      </li> -->
      <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#one"
                aria-expanded="true" aria-controls="one">
                 <i class="fas fa-fw fa-book"></i>
                    <span>Laporan ALl</span>
                </a>
          <div id="one" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Laporan ALL</h6>
                  <a class="collapse-item" href="/laporan">Laporan Penjualan</a>
                  <a class="collapse-item" href="/laporan/barang-masuk/">Laporan Barang Masuk</a>
              </div>
          </div>
      </li>
      <li class="nav-item {{ (request()->is('admin*')) ? 'active' : '' }}">
        <a class="nav-link" href="/logout">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>
    
      <!-- <li class="nav-item {{ (request()->is('kasir*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('kasir')}}">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Kasir</span></a>
      </li>

      <li class="nav-item {{ (request()->is('owner*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('owner')}}">
          <i class="fas fa-fw fa-address-card"></i>
          <span>Data Owner</span></a>
      </li>

      <li class="nav-item {{ (request()->is('member*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('member')}}">
          <i class="fas fa-fw fa-user-circle   "></i>
          <span>Data Member</span></a>
      </li>

      <li class="nav-item {{ (request()->is('outlet*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('outlet')}}">
          <i class="fas fa-fw fa-building"></i>
          <span>Data Outlet</span></a>
      </li>

      <li class="nav-item {{ (request()->is('jenis*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('jenis')}}">
          <i class="fas fa-fw fa-database"></i>
          <span>Data Jenis</span></a>
      </li>

      <li class="nav-item {{ (request()->is('paket*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('paket')}}">
          <i class="fas fa-fw fa-briefcase"></i>
          <span>Data Paket Cucian</span></a>
      </li>

      <li class="nav-item {{ (request()->is('transaksi*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('transaksi')}}">
          <i class="fas fa-fw fa-shopping-basket  "></i>
          <span>Transaksi</span></a>
      </li>

      <li class="nav-item {{ (request()->is('laporan*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('laporan')}}">
          <i class="fas fa-fw fa-file  "></i>
          <span>Data Laporan</span></a>
      </li>
      

      <li class="nav-item {{ (request()->is('member*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('member')}}">
          <i class="fas fa-fw fa-user-circle   "></i>
          <span>Data Member</span></a>
      </li>

      <li class="nav-item {{ (request()->is('transaksi*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('transaksi')}}">
          <i class="fas fa-fw fa-shopping-basket  "></i>
          <span>Transaksi</span></a>
      </li>

      <li class="nav-item {{ (request()->is('laporan*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('laporan')}}">
          <i class="fas fa-fw fa-file  "></i>
          <span>Data Laporan</span></a>
      </li>

  
      
      <li class="nav-item {{ (request()->is('laporan*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('laporan')}}">
          <i class="fas fa-fw fa-file  "></i>
          <span>Data Laporan</span></a>
      </li>
     -->

     

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="group">
                <div class="mr-2">
                    {{ Carbon\Carbon::now()->format('l, d F Y')}}
                </div>
              </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{url('change-password')}}">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          
          <!-- DataTales Example -->
          @yield('content')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Ramdani Syaputra 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
         <a class="btn btn-dark" href="#"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>

          <form id="logout-form" action="#" method="POST" style="display: none;">
              @csrf
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
 <script src="{{url('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{url('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{url('assets/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{url('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <script src="{{url('assets/js/demo/datatables-demo.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>
</body>

</html>
