<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:title" content="perpustakaan elektro">

    <title>Pepustakaan Elektro - Mahasiswa</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="col-12">
        <div class="row">
            <div class="col-12 py-5 bg-gray">
                <div class="d-block">
                    <div class="d-flex">
                        <div class="mr-auto">
                            <div class="information">
                                <h5>{{ Auth::user()->name }}</h5>
                                <h5>{{ Auth::user()->student->nim }}</h5>
                            </div>
                        </div>
                        <div class="ml-auto">
                            <div class="book">
                                <button type="button" class="btn btn-danger px-5 py-2" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                    Logout</button>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex mt-4">
                        <div class="mr-auto">

                        </div>
                        <div class="book mx-auto d-flex">
                            <div class="row">
                                <div class="col-6 col-lg-4 mb-2">
                                    <a href="/student/dashboard/kunjungan" class="text-decoration-none">
                                        <button type="button " class="btn {{ Request::routeIs('student-dashboard') ? 'btn btn-success' : 'btn btn-light' }}
                                            btn-block px-5 py-2 ">Kunjungan</button>
                                    </a>
                                </div>
                                <div class="col-6 col-lg-4 mb-2">
                                    <a href="/student/dashboard/peminjaman" class="text-decoration-none">
                                        <button type="button " class="btn {{ Request::routeIs('student-borrow') ? 'btn btn-success' : 'btn btn-light' }}
                                            btn-block px-5 py-2 ">Peminjaman</button>
                                    </a>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <a href="/student/dashboard/buku" class="text-decoration-none">
                                        <button type="button " class="btn {{ Request::routeIs('student-book') ? 'btn btn-success' : 'btn btn-light' }}
                                            btn-block px-5 py-2 ">Buku</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="ml-auto">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>