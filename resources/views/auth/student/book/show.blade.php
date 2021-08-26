@extends('layouts.student')

@section('content')
<div class="container">
    <div class="col-12 p-5">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-4">
                <img src="{{ URL::asset('/storage/book_image/'.$book->image) }}" alt="" class="w-100">
            </div>
            <div class="col-12 col-lg-8 mt-2">
                <div class="writter">
                    <p class="h3 text-muted">Penulis :</p>
                    <p class="h4 ">{{$book->writter}}</p>
                </div>
                <div class="title">
                    <p class="h3 text-muted">Judul :</p>
                    <p class="h4 ">{{$book->title}}</p>
                </div>
                <div class="release">
                    <p class="h3 text-muted">Tahun Terbit :</p>
                    <p class="h4 ">{{$book->release_year}}</p>
                </div>
                <div class="description">
                    <p class="h3 text-muted">Deskripsi :</p>
                    <p class="h4 ">{{$book->description}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection