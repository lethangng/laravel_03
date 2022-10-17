@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('main-content')
    <h1>{{ $title }}</h1>
    <hr>
    <form action="{{ route('student.edit', ['student' => $student]) }}" method="post" class="mb-3">
        <div class="mb-3 mt-3">
            <label for="exampleInputEmail1" class="form-label">Họ và tên</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="fullname"
                required value="{{ $student->fullname }}">
            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Ngày sinh</label>
            <input type="date" class="form-control" id="exampleInputPassword1" name="birthday"
                value="{{ $student->birthday }}" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="address"
                value="{{ $student->address }}" required>
        </div>
        @csrf
        @method('PUT')

        <button type="submit" class="btn btn-warning text-light">Submit</button>
        <a href="{{ route('student') }}" type="button" class="btn btn-primary">Exit</a>
    </form>
@endsection
