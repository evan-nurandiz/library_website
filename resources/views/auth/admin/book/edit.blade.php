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
            <form action="/admin/buku/{{$book->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="exampleInputEmail1">penulis</label>
                    <input type="text" class="form-control" name="writter" value="{{$book->writter}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">judul</label>
                    <input type="text" class="form-control" name="title" value="{{$book->title}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">deskripsi</label>
                    <input type="text" class="form-control" name="description" value="{{$book->description}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">tahun terbit</label>
                    <input type="text" class="form-control" name="release_year" value={{$book->release_year}}>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">barcode</label>
                    <input type="text" class="form-control" name="barcode_id" value="{{$book->barcode}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">stock</label>
                    <input type="text" class="form-control" name="barcode_id" value="{{$book->stock}}">
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