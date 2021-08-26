@extends('layouts.admin')

@section('content')
<div class="p-5">
    <div class="col-12">
        <div class="row">
            <div class="col-12 bg-primary p-5">
                <div class="d-flex justify-content-around">
                    <div class="d-block text-center">
                        <p>CARI MAHASISWA</p>
                        <form class="form-inline" action="/admin/cari-mahasiswa" method="POST">
                            @csrf
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="inputPassword2" class="sr-only">Nama Mahasiswa</label>
                                <input class="form-control form-control-lg" type="text" placeholder="Nama Mahasiswa"
                                    name="student">
                            </div>
                            <button type="submit" class="btn btn-success mb-2">Confirm identity</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 mt-5 px-0">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">no</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Konsentrasi</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$student->name}}</td>
                    <td>{{$student->nim}}</td>
                    <td>{{$student->departement}}</td>
                    <td>{{$student->majors}}</td>
                    <td>
                        @if($student->gender == 'men')
                        Laki-Laki
                        @else
                        Perempuan
                        @endif
                    </td>
                    <td>
                        <a href="/admin/mahasiswa/{{$student->id}}">
                            <button class="btn bg-primary text-white">
                                DETAIL
                            </button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection