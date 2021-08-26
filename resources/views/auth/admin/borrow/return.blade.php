@extends('layouts.admin')

@section('content')
<div class="py-5">
    <div class="col-12">
        <div class="row">
            <div class="col-12 p-5">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @elseif (session('fail'))
                <div class="alert alert-danger" role="alert">
                    {{ session('status') }}
                </div>
                @endif
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
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    @foreach($borrows as $borrow)
                    <tbody>
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$borrow->student->name}}</td>
                            <td>{{$borrow->student->class}}</td>
                            <td>{{count($borrow->BorrowBook)}}</td>
                            <td>{{$borrow->date_borrowed}}</td>
                            <td>{{$borrow->date_returned}}</td>
                            <td>{{$borrow->status}}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="/admin/peminjaman/{{$borrow->id}}">
                                        <button class="btn-sm btn bg-primary text-white mr-2">
                                            Detail
                                        </button>
                                    </a>
                                    <form action="/admin/pengembalian/{{$borrow->id}}" method="POST">
                                        @csrf
                                        <button class="btn-sm btn bg-warning text-black">
                                            Konfirmasi
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <div class="col-12 mt-3 text-center">
                {{ $borrows->links() }}
            </div>
        </div>
    </div>
</div>
@endsection