<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:title" content="perpustakaan elektro">

    <title>Pepustakaan Elektro - Admin</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('admincss')
</head>

<body>
    <div class="col-12">
        <div class="row">
            <div class="col-3 py-5 bg-gray">
                <div class="d-flex py-4 justify-content-center">
                    <img src="/img/profile/Profile-720.png" alt="" class="profile-image rounded-circle">
                </div>
                <div class="d-block text-center">
                    <div class="information">
                        <h3>{{ Auth::user()->name }}</h3>
                        <h3>NIP: 230132131231</h3>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="logout mt-4 mb-5">
                            <button type="button" class="btn btn-danger px-5 py-2" href="{{ route('logout') }}" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                Logout</button>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                        <div class="logout mt-4 mb-5" class="text-decoration-none">
                            <a href="/admin/tambah-admin" class="text-decoration-none">
                                <button type="button " class="btn {{ Request::routeIs('add-admin') ? 'btn btn-success' : 'btn btn-light' }}
                                btn-block px-5 py-2">Tambah Admin</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <a href="/admin/mahasiswa/create" class="text-decoration-none">
                                <button type="button " class="btn {{ Request::routeIs('admin.student.create') ? 'btn btn-success' : 'btn btn-light' }}
                                btn-block px-2 py-2">Tambah Siswa</button>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="/admin/buku/create" class="text-decoration-none">
                                <button type="button " class="btn {{ Request::routeIs('admin.book.create') ? 'btn btn-success' : 'btn btn-light' }}
                                btn-block px-2 py-2">Tambah Buku</button>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="d-block text-center pt-3">
                    <div class="book mt-3">
                        <a href="/home" class="text-decoration-none">
                            <button type="button " class="btn {{ Request::routeIs('home') ? 'btn btn-success' : 'btn btn-light' }}
                            btn-block px-5 py-2">DASHBOARD</button>
                        </a>
                    </div>
                    <div class="book mt-3">
                        <a href="/admin/mahasiswa" class="text-decoration-none">
                            <button type="button " class="btn {{ Request::routeIs('admin.student') ? 'btn btn-success' : 'btn btn-light' }}
                            btn-block px-5 py-2">DATA SISWA</button>
                        </a>
                    </div>
                    <div class="book mt-3">
                        <a href="/admin/buku" class="text-decoration-none">
                            <button type="button " class="btn {{ Request::routeIs('admin.book') ? 'btn btn-success' : 'btn btn-light' }}
                            btn-block px-5 py-2 ">DAFTAR BUKU</button>
                        </a>
                    </div>
                    <div class="book mt-3">
                        <a href="/admin/peminjaman" class="text-decoration-none">
                            <button type="button " class="btn {{ Request::routeIs('admin.borrow') ? 'btn btn-success' : 'btn btn-light' }}
                            btn-block px-5 py-2 ">PEMINJAMAN</button>
                        </a>
                    </div>
                    <div class="book mt-3">
                        <a href="/admin/penalty" class="text-decoration-none">
                            <button type="button " class="btn {{ Request::routeIs('admin.penalty') ? 'btn btn-success' : 'btn btn-light' }}
                            btn-block px-5 py-2 ">Denda</button>
                        </a>
                    </div>
                    <div class="book mt-3">
                        <a href="/admin/pengembalian" class="text-decoration-none">
                            <button type="button " class="btn {{ Request::routeIs('admin.return') ? 'btn btn-success' : 'btn btn-light' }}
                            btn-block px-5 py-2 ">PENGEMBALIAN</button>
                        </a>
                    </div>
                    <div class="book mt-3">
                        <a href="/admin/kunjugan" class="text-decoration-none">
                            <button type="button " class="btn {{ Request::routeIs('admin.visit') ? 'btn btn-success' : 'btn btn-light' }}
                            btn-block px-5 py-2 ">KUNJUNGAN</button>
                        </a>
                    </div>
                    <a href="/admin/riwayat" class="text-decoration-none">
                        <div class="book mt-3">
                            <button type="button " class="btn {{ Request::routeIs('admin.history') ? 'btn btn-success' : 'btn btn-light' }}
                            btn-block px-5 py-2  ">RIWAYAT</button>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-9">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>