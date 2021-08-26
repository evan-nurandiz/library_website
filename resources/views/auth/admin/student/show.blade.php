@extends('layouts.admin')

@section('content')
<div class="p-5">
    <div class="col-12 p-5 border rounded shadow-lg">
        <div class="row">
            <div class="col-2">
                <img src="/img/profile/Profile-720.png" alt="" class="w-100">
            </div>
            <div class="col-10 d-flex justify-content-between">
                <div class="text-left">
                    <p>NAMA : {{$student->name}}</p>
                    <p>NIM : {{$student->nim}}</p>
                    <p>Jurusan : {{$student->departement}}</p>
                    <p>Konsentrasi : {{$student->majors}}</p>
                    <p>Kelas: {{$student->class}}</p>
                    <p>Jenis Kelamin:
                        @if($student->gender == 'men')
                        Laki-laki
                        @else
                        Perempuan
                        @endif
                    </p>
                    <P>Email: {{$student->email}}</P>
                </div>
                <div class="text-right">
                    <a href="/admin/mahasiswa/{{$student->id}}/edit">
                        <button class="btn btn-md bg-primary text-white">
                            Edit Data
                        </button>
                    </a>
                    <a href="/admin/mahasiswa/{{$student->id}}/edit/akun">
                        <button class="btn btn-md bg-primary text-white">
                            Edit Akun
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 mt-5">
        <div class="row">
            <div class="col-6 mt-4">
                <h3>Riwayat Peminjaman</h3>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
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
                            <td>{{count($borrow->BorrowBook)}}</td>
                            <td>{{$borrow->date_borrowed}}</td>
                            <td>{{$borrow->date_returned}}</td>
                            <td>{{$borrow->status}}</td>
                            <td>
                                <a href="/admin/mahasiswa/{{$student->id}}/peminjaman/{{$borrow->id}}">
                                    <button class="btn-sm btn bg-primary text-white">
                                        Detail
                                    </button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                {{ $borrows->links() }}
            </div>
            <div class="col-6 mt-4">
                <h3>Riwayat Kunjungan</h3>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">tanggal</th>
                            <th scope="col">waktu</th>
                        </tr>
                    </thead>
                    @foreach($visit as $visitor)
                    <tbody>
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$visitor->date}}</td>
                            <td>{{$visitor->time}}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                {{ $visit->links() }}
            </div>
        </div>
    </div>
</div>
@endsection