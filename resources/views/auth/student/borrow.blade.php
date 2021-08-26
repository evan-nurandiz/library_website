@extends('layouts.student')

@section('content')
<section>
    <div class="container">
        <div class="row justify-content-center">
            @foreach($borrows as $borrow)
            <div class="col-12 mt-3  mb-3">
                <a href="/student/dashboard/peminjaman/{{$borrow->id}}" class="text-decoration-none">
                    <div class="p-3 mb-2 bg-info text-white rounded">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <div class="col-12">
                                        <th scope="col">
                                            <p class="text-dark h5">status : {{$borrow->status}}</p>
                                        </th>
                                    </div>
                                    <div class="col-12">
                                        <th scope="col">
                                            <p class="text-dark h5">jumlah buku : {{count($borrow->borrowBook)}}</p>
                                        </th>
                                    </div>
                                </div>
                                <div class="col-6 text-right">
                                    <div class="col-12">
                                        <th scope="col">
                                            <p class="text-dark h5">tanggal peminjaman : {{$borrow->date_borrowed}}</p>
                                        </th>
                                    </div>
                                    <div class="col-12">
                                        <th scope="col">
                                            <p class="text-dark h5">
                                                tanggal dikembalikan : {{$borrow->date_returned}}
                                            </p>
                                        </th>
                                    </div>
                                    <div class="col-12">
                                        <th scope="col">
                                            <p class="text-dark h5">
                                                dikembalikan tanggal : {{$borrow->return_date}}
                                            </p>
                                        </th>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </a>
            </div>
            @endforeach
            <div class="col-12 mt-3 text-center">
                {{ $borrows->links() }}
            </div>
        </div>
    </div>
</section>
@endsection