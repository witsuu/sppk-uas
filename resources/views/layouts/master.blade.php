<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>
    <!-- favicon --->
    <link rel="shortcut icon" href={{ asset('favicon.png') }} type="image/x-icon">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href={{ asset('assets/css/custom.css') }}>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css"
        integrity="sha512-pDpLmYKym2pnF0DNYDKxRnOk1wkM9fISpSOjt8kWFKQeDmBTjSnBZhTd41tXwh8+bRMoSaFsRnznZUiH9i3pxA=="
        crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    @yield('head')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li>
                        <a href={{ route('logout') }} class="btn btn-danger mr-2" data-toggle="modal"
                            data-target="#logout">
                            <i class="fas fa-sign-out-alt"></i> KELUAR
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href={{ route('dashboard') }}>
                            <h4 class="mb-0 mt-4">SPPK</h4>
                        </a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href={{ route('dashboard')}}>
                            <i class="fas fa-home"></i>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="nav-item @if ($page=='dashboard') active @endif">
                            <a href={{ route('dashboard') }} class="nav-link"><i class="fas fa-home"></i><span
                                    class="font-weight-bolder">Dashboard</span></a>
                        </li>
                        <li class="nav-item @if ($page=='kriteria') active @endif">
                            <a href="{{ route('kriteria') }}" class="nav-link">
                                <i class="fas fa-th-list"></i>
                                <span class="font-weight-bolder">Data Kriteria</span>
                            </a>
                        </li>
                        <li class="nav-item @if ($page=='pegawai') active @endif">
                            <a href="{{ route('pegawai') }}">
                                <i class="fas fa-user"></i>
                                <span class="font-weight-bolder">Data Pegawai</span>
                            </a>
                        </li>
                        <li class="nav-item @if ($page=='nilai') active @endif">
                            <a href="{{ route('penilaian') }}" class="nav-link">
                                <i class="fas fa-book"></i>
                                <span class="font-weight-bolder">Penilaian/Hasil</span>
                            </a>
                        </li>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    @yield('content')
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; {!!date('Y')!!} <div class="bullet"></div>
                    Dinas Komunikasi dan Informatika Kabupaten Pamekasan
                </div>
            </footer>
        </div>
    </div>
    <div class="modal fade" id={{__('logout')}} tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <i class="fas fa-exclamation-circle text-warning mb-2" style="font-size: 100px"></i>
                    <p class="text-uppercase mb-0">Apa Kamu Yakin Ingin Keluar?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">TUTUP</button>
                    <form action="{{ route('logout') }}" method="POST" class="w-100">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100">LOGOUT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @yield('modal')

    <!-- General JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{asset('assets/js/stisla.js')}}"></script>

    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <script src="{{asset("assets/js/custom.js")}}"></script>
    @yield('script')

</body>

</html>
