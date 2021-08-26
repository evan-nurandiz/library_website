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
                <form action="/admin/mahasiswa" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIM</label>
                        <input type="text" class="form-control" name="nim">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Jurusan</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="departement">
                            <option value="Teknik Elektro">Teknik Elektro</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Konsentrasi</label>
                        <input type="text" class="form-control" name="majors">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kelas</label>
                        <input type="text" class="form-control" name="class">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="gender">
                            <option value="men">Laki-Laki</option>
                            <option value="women">Perempua</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Rfid</label>
                        <input type="text" class="form-control" name="rfid">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection