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
                <form action="/admin/tambah-admin" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">re-Password</label>
                        <input type="password" class="form-control" name="re-password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection