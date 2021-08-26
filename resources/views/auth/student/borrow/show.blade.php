@extends('layouts.student')

@section('content')
<div class="py-5 container">
    <div class="col-12">
        <div class="row justify-content-center">
            @foreach($borrow->BorrowBook as $book)
            <div class="col-12 col-lg-4">
                <img src="{{ URL::asset('/storage/book_image/'.$book->book->image) }}" alt="" class="w-100 rounded">
                <div class="info">
                    <div class="col-12 col-lg-12 mt-2">
                        <div class="writter">
                            <p class="h3 text-muted">Penulis :</p>
                            <p class="h4 "> {{$book->book->writter}}</p>
                        </div>
                        <div class="title">
                            <p class="h3 text-muted">Judul :</p>
                            <p class="h4 "> {{$book->book->title}}</p>
                        </div>
                        <div class="release">
                            <p class="h3 text-muted">Tahun Terbit :</p>
                            <p class="h4 ">{{$book->book->release_year}}</p>
                        </div>
                        <div class="description">
                            <p class="h3 text-muted">Deskripsi :</p>
                            <p class="h4 ">{{$book->book->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection