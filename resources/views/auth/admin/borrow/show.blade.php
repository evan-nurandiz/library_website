@extends('layouts.admin')

@section('content')
<div class="py-5">
    <div class="col-12">
        <div class="row">
            <div class="col-6">
                <div class="col-12">
                    <img src="/img/profile/Profile-720.png" alt="" class="profile-image rounded-circle">
                </div>
                <div class="col-12 mt-5">
                    <h5>Nama : {{$borrow->student->name}}</h5>
                    <h5>Nim : {{$borrow->student->nim}}</h5>
                    <h5>Jurusan : {{$borrow->student->departement}}</h5>
                    <h5>Konsentrasi : {{$borrow->student->majors}}</h5>
                    <h5>Kelas : {{$borrow->student->class}}</h5>
                    <h5>Jenis Kelamin : {{$borrow->student->gender}}</h5>
                </div>
                <div class="col-12 mt-4">
                    @if(($borrow->status == 'ongoing' || $borrow->status == 'pending') && $day_pass > 0)
                        <h4>Peminjaman melebihi waktu selama {{$day_pass}} hari</h4>
                        <h4>denda: {{1000 * $day_pass}}</h4>
                        @if(!$borrow->penalty)
                        <form action="/admin/penalty" method="POST">
                            @csrf
                            <input type="hidden" value="{{$borrow->student->id}}" name="student_id">
                            <input type="hidden" value="{{$borrow->id}}" name="borrow_id">
                            <input type="hidden" value="{{1000 * $day_pass}}" name="penalty">
                            <input type="hidden" value="{{$day_pass}}" name="date_late">
                            <button type="submit" class="btn btn-success">Lunasi Denda</button>
                        </form>
                        @else
                        <h4>Denda Telah Dilunasi</h4>
                        @endif
                    @elseif($borrow->status == 'complete')
                        @if($borrow->penalty)
                        <h4>Peminjaman melebihi waktu selama {{$day_pass}} hari</h4>
                        <h4>denda: {{1000 * $day_pass}}</h4>
                        <h4>Denda Telah Dilunasi</h4>
                        @endif
                    @endif
                </div>
            </div>
            <div class="col-6">
                @foreach($borrow->BorrowBook as $book)
                    <div class="col-6">
                        <img src="{{ URL::asset('/storage/book_image/'.$book->book->image) }}" alt="" class="w-100">
                        <div class="info">
                            <h5>Penulis: {{$book->book->writter}}</h5>
                            <h5>Judul: {{$book->book->title}}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection