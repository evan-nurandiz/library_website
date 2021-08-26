@extends('layouts.admin')

@section('content')
<div class="containter">
    <div class="row">
        <div class="col-12 mt-5 px-5">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @elseif (session('fail'))
            <div class="alert alert-danger" role="alert">
                {{ session('fail') }}
            </div>
            @endif
            <form action="/admin/buku" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">penulis</label>
                    <input type="text" class="form-control" name="writter">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">judul</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">deskripsi</label>
                    <input type="text" class="form-control" name="description">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">tahun terbit</label>
                    <input type="text" class="form-control" name="release_year">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">barcode</label>
                    <input type="text" class="form-control" name="barcode"
                        onkeypress="return (event.charCode > 47 && event.charCode < 58)">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">stock</label>
                    <input type="text" class="form-control" name="stock">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Foto Buku</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                </div>
                <div class="button text-right mt-5">
                    <button type="submit" class="btn btn-lg px-5 py-2 bg-primary text-white">
                        Simpan
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>



@endsection