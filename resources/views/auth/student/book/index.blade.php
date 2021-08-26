@extends('layouts.student')

@section('content')
<section>
    <div class="container">
    <div class="col-12 mt-5">
        <div class="row">
            <div class="col-12 mb-5">
                <div class="d-block">
                    <p class="h5">Cari Buku</p>
                    <form action="/student/book/search" method="POST">
                        @csrf
                        <div class="form-group mb-2 mt-4">
                            <label for="inputPassword2" class="sr-only">Nama Buku</label>
                            <input class="form-control form-control-lg" type="text" placeholder="Nama Buku"
                                name="name">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success mb-2">Cari Buku</button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($books as $book)
            <div class="col-12 col-md-6 col-lg-4 mb-3">
                <div class="card" style="width: 18rem;">
                    <img class="book-image" src="{{ URL::asset('/storage/book_image/'.$book->image) }}">
                    <div class="card-body">
                        <h5 class="card-title">{{$book->title}}</h5>
                        <p class="card-text">sedikit deskripsi</p>
                        <div class="d-flex justify-content-around">
                            <div class="">
                                <a href="/student/dashboard/buku/{{$book->id}}" class="btn btn-primary">LIHAT</a>
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

</section>
@endsection