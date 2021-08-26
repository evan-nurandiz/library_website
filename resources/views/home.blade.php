@section('admincss')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="/css/admin-dashboard.css">
@endsection

@extends('layouts.admin')

@section('content')
<section>
    <div class="col-12 mt-5">
        <div class="row">
            <div class="col-12">
                <div class="d-block">
                    <p class="h5">Cari Mahasiswa</p>
                    <form action="/admin/cari-mahasiswa" method="POST">
                        @csrf
                        <div class="form-group mb-2 mt-4">
                            <label for="inputPassword2" class="sr-only">Nama Mahasiswa</label>
                            <input class="form-control form-control-lg" type="text" placeholder="Nama Mahasiswa"
                                name="student">
                        </div>
                        <button type="submit" class="btn btn-success mb-2">Cari mahasiswa</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-blue order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Jumlah Mahasiswa</h6>
                        <h2 class="text-right"><i class="fa fa-user-plus f-left"></i><span>{{count($total_student)}}</span></h2>
                        <p class="m-b-0">Perempuan : {{$total_student->where('gender','women')->count()}}<span class="f-right">Pria : {{$total_student->where('gender','men')->count()}}</span></p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-green order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Jumlah Pengunjung</h6>
                        <h2 class="text-right"><i class="fa fa-building f-left"></i><span>{{$total_visitor->count()}}</span></h2>
                        <p class="m-b-0">Pengunjung Hari Ini<span class="f-right">{{$total_visitor_today->count()}}</span></p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-yellow order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Peminjaman</h6>
                        <h2 class="text-right"><i class="fa fa-book f-left"></i><span>{{$total_borrow->count()}}</span></h2>
                        <p class="m-b-0">peminjaman berlangsung<span class="f-right">{{$total_borrow->where('status','ongoing')->count()}}</span></p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-pink order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Pengembalian</h6>
                        <h2 class="text-right"><i class="fa fa-book f-left"></i><span>{{$total_borrow->where('status','pending')->count()}}</span></h2>
                        <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-pink order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Book</h6>
                        <h2 class="text-right"><i class="fa fa-book f-left"></i><span>{{$total_book}}</span></h2>
                        <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-pink order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Peminjaman Melewati Batas</h6>
                        <h2 class="text-right"><i class="fa fa-book f-left"></i><span>{{count($borrow_lates)}}</span></h2>
                        <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-pink order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Kas Perpustakaan</h6>
                        <h2 class="text-right">Rp <i class="fa fa-book f-left"></i><span>{{ number_format($total_penalty->sum('penalty'))}}</span></h2>
                        <p class="m-b-0">Total Denda<span class="f-right">{{$total_penalty->count()}}</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center my-4">
                <h5>Peminjaman Yang Belum Dikembalikan</h5>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Jumlah Buku</th>
                            <th scope="col">tanggal pinjam</th>
                            <th scope="col">tanggal pengembalian</th>
                            <th scope="col">status</th>
                            <th scope="col">lewat selama</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    @foreach($borrow_lates as $borrow)
                    <tbody>
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$borrow->student->name}}</td>
                            <td>{{$borrow->student->class}}</td>
                            <td>{{count($borrow->BorrowBook)}}</td>
                            <td>{{$borrow->date_borrowed}}</td>
                            <td>{{$borrow->date_returned}}</td>
                            @if($borrow->status = 'ongoing')
                            <td>pinjam</td>
                            @endif
                            <td>{{$borrow->day_pass}} hari</td>
                            <td>
                                <a href="/admin/peminjaman/{{$borrow->id}}">
                                    <button class="btn-sm btn bg-primary text-white">
                                        Detail
                                    </button>
                                   
                                </a>
                                <a href="/student-{{$borrow->student->email}}-{{$borrow->day_pass}}-{{1000*$borrow->day_pass}}">
                                    <button class="btn-sm btn bg-primary text-white">
                                        Kirim Email
                                    </button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</section>
@endsection