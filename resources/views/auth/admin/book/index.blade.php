@extends('layouts.admin')

@section('content')
<div class="p-3">
    <div class="col-12 mt-5">
        <div class="row">
            @foreach($books as $book)
            <div class="col-3 mb-3">
                <div class="card" style="width: 18rem;">
                    <img class="book-image" src="{{ URL::asset('/storage/book_image/'.$book->image) }}">
                    <div class="card-body">
                        <h5 class="card-title">{{$book->title}}</h5>
                        <p class="card-text">sedikit deskripsi</p>
                        <div class="d-flex justify-content-around">
                            <div class="">
                                <a href="/admin/buku/{{$book->id}}" class="btn btn-primary">LIHAT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-12 mt-3 text-center">
            {{ $books->links() }}
        </div>
    </div>
</div>
@endsection