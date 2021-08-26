@extends('layouts.admin')

@section('content')
<div class="py-5">
    <div class="col-12">
        <div class="row">
            <div class="col-12 p-5">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">no</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nim</th>
                            <th scope="col">Major</th>
                            <th scope="col">tanggal</th>
                            <th scope="col">waktu</th>
                            <th scope="col">aksi</th>
                        </tr>
                    </thead>
                    @foreach($visitors as $visitor)
                    <tbody>
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$visitor->student->name}}</td>
                            <td>{{$visitor->student->nim}}</td>
                            <td>{{$visitor->student->majors}}</td>
                            <td>{{$visitor->date}}</td>
                            <td>{{$visitor->time}}</td>
                            <td>
                                <a href="/admin/mahasiswa/{{$visitor->student_id}}">
                                <button type="button" class="btn btn-primary">Lihat Siswa</button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <div class="col-12 mt-3 text-center">
                {{ $visitors->links() }}
            </div>
        </div>
    </div>
</div>
@endsection