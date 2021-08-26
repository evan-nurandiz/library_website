@extends('layouts.admin')

@section('content')
<div class="row mt-5">
            <div class="col-12 text-center my-4">
                <h5>Peminjaman Yang Belum Dikembalikan</h5>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">no</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">tanggal pinjam</th> 
                            <th scope="col">tanggal pengembalian</th>
                            <th scope="col">denda</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    @foreach($penalties as $penalty)
                    <tbody>
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$penalty->student->name}}</td>
                            <td>{{$penalty->student->class}}</td>
                            <td>{{$penalty->borrow->date_borrowed}}</td>
                            <td>{{$penalty->borrow->date_returned}}</td>
                            <td>Rp {{$penalty->penalty}}</td>
                            <td>
                                <a href="/admin/peminjaman/{{$penalty->borrow->id}}">
                                    <button class="btn-sm btn bg-primary text-white">
                                        Detail
                                    </button>
                                   
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
</div>
@endsection