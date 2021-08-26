@extends('layouts.student')

@section('content')
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mt-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">no</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($visitors as $visit)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$visit->date}}</td>
                            <td>{{$visit->time}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-12 mt-3 text-center">
                {{ $visitors->links() }}
            </div>
        </div>
    </div>
</section>
@endsection