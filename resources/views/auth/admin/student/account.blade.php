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
                <form action="/admin/mahasiswa/{{$student->id}}/edit/akun" method="POST">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password Baru</label>
                        <input type="password" class="form-control" name="password">
                        <small id="emailHelp" class="form-text text-muted">minimal 6 huruf atau angka atau kominasi keduanya</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" name="re-password">
                        <small id="emailHelp" class="form-text text-muted">minimal 6 huruf atau angka atau kominasi keduanya</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection