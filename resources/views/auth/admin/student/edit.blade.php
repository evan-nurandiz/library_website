@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="col-12">
        <div class="row-justify-content-center">
            <div class="col py-5 my-5">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @elseif (session('fail'))
                <div class="alert alert-danger" role="alert">
                    {{ session('fail') }}
                </div>
                @endif
                <form action="/admin/mahasiswa/{{$student->id}}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$student->name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIM</label>
                        <input type="text" class="form-control" name="nim" value="{{$student->nim}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Jurusan</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="departement"
                            value="{{$student->departement}}">
                            <option value="Teknik Elektro">Teknik Elektro</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Konsentrasi</label>
                        <input type="text" class="form-control" name="majors" value="{{$student->majors}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kelas</label>
                        <input type="text" class="form-control" name="class" value="{{$student->class}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="gender">
                            <option value="men">Laki-Laki</option>
                            <option value="women">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Rfid</label>
                        <input type="text" class="form-control" name="rfid" value="{{$student->rfid}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" name="email" value="{{$student->email}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection