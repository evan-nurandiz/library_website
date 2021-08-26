@extends('layouts.admin')

@section('content')
<div class="col-12 p-5">
    <div class="row">
        <div class="col-2">
            <img src="{{ URL::asset('/storage/book_image/'.$book->image) }}" alt="" class="w-100">
        </div>
        <div class="col-5">
            <p>{{$book->writter}}</p>
            <p>{{$book->title}}</p>
            <p>{{$book->release_date}}</p>
            <p>{{$book->barcode_id}}</p>
            <p>{{$book->description}}</p>
        </div>
        <div class="col-5 text-right">
            <div class="d-block">
                <form action="/admin/buku/{{$book->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="/admin/buku/{{$book->id}}/edit">
                        <button type="button" class="btn btn-lg bg-primary px-5 py-2 text-white">
                            Edit
                        </button>
                    </a>
                    <a href="/admin/buku/{{$book->id}}">
                        <button type="submit" class="btn btn-lg bg-danger px-5 py-2 text-white">
                            Delete
                        </button>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection