<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Penjualan Kredit</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('asset/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('style/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-light sidebar sidebar-light accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-0">
                
                </div>
                <br> <div class="sidebar-brand-text mx-3">PT. Hee Jung Jawa Barat<sup></sup></div>
            </a>


            <!-- Divider -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            @hasanyrole('Marketing|Direktur|Keuangan')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-folder-open"></i>
                        <span>Master Data</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            @hasanyrole('Marketing|Direktur')
                                <a class="collapse-item" href="{{ route('user.index') }}">Data
                                    Pengguna</a>
                            @endhasanyrole
                            @role('Marketing')
                                <a class="collapse-item" href="{{ route('barang.index') }}">Data
                                    Barang</a>
                            @endrole
                            @role('Marketing')
                                <a class="collapse-item" href="{{ route('customer.index') }}">Data
                                    Customer</a>
                            @endrole
                            @role('Keuangan')
                                <a class="collapse-item" href="{{ route('akun.index') }}">Data
                                    Akun</a>
                            @endrole
                            <!-- @role('Keuangan')
                                <a class="collapse-item" href="{{ route('setting.index') }}">Data
                                    Setting Akun</a>
                            @endrole -->
                        </div>
                    </div>
                </li>
            @endhasanyrole


            <!-- Nav Item - Utilities Collapse Menu -->
            @hasanyrole('Marketing|Keuangan')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-folder-open"></i>
                        <span>Master Transaksi</span>
                    </a>
                    <div id="collapseUtilities" class="collapse"
                        aria-labelledby="headingUtilities"data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            @role('Marketing')
                            <a class="collapse-item" href="{{ route('pemesanan.transaksi') }}">Pemesanan</a>
                            @endrole
                            @role('Marketing')
                                <a class="collapse-item" href="{{ route('pengiriman.pengiriman') }}">Pengiriman</a>
                            @endrole
                            @role('Keuangan')
                                <a class="collapse-item" href="{{ route('pembayaran.index') }}">Pembayaran</a>
                            @endrole
                        </div>
                    </div>
                </li>
            @endhasanyrole

            <!-- Nav Item - Pages Collapse Menu -->
            @hasanyrole('Marketing|Direktur|Keuangan')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse"
                        data-target="#collapsePages1"aria-expanded="true" aria-controls="collapsePages1">
                        <i class="fas fa-fw fa-folder-open"></i>
                        <span>Laporan</span>
                    </a>
                    <div id="collapsePages1" class="collapse" aria-labelledby="headingPages"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            @hasanyrole('Direktur|Keuangan')
                                <a class="collapse-item" href="{{ route('laporan-jurnal') }}">
                                    Laporan Jurnal</a>
                            @endhasanyrole
                            @hasanyrole('Marketing|Direktur')
                                <a class="collapse-item" href="{{ route('laporan-penjualan') }}">
                                    Laporan Penjualan</a>
                            @endhasanyrole
                        </div>
                    </div>
                </li>
            @endhasanyrole

            <!-- Divider -->
            <hr class="sidebar-divider">

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
                <nav class="navbar navbar-expand navbar-light bg-light topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->

                    <!-- Topbar Search -->
                    
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                      

                            <!-- Dropdown - Messages -->

                            <!-- Nav Item - Messages -->

                            <!-- Dropdown - Messages -->


                            <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-white-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="{{ asset('asset/img/adm2.jpg') }}">
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#logoutModal">
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

                    <!-- DataTales Example -->
                    <!-- Page Heading -->
                    @yield('content')
                    @include('sweetalert::alert')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar aplikasi ?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Pilih "Logout" apabila ingin keluar aplikasi</div>
                        <div class="modal-footer">
                            <a class="btn btn-primary" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="style/vendor/jquery/jquery.min.js"></script>
            <script src="style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="style/vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="style/js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="style/vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="style/js/demo/chart-area-demo.js"></script>
            <script src="style/js/demo/chart-pie-demo.js"></script>
            <script src="style/js/demo/chart-bar-demo.js"></script>

</body>

</html>
