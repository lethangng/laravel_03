@extends('layouts.app');
@section('title')
    {{ $title }}
@endsection

@section('main-content')
    <h1>{{ $title }}</h1>
    <hr>
    <a href="{{ route('student.add_student') }}" class="btn btn-primary" type="button">Thêm sinh viên</a>
    <hr>
    <table class="table table-striped table-bordered align-middle">
        <thead class="table-warning">
            <th>STT</th>
            <th>Họ và tên</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr class="table-info">
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $student->fullname }}</td>
                    <td>{{ date('m-d-Y', strtotime($student->birthday)) }}</td>
                    <td>{{ $student->address }}</td>
                    <td><a href="{{ route('student.detail', ['student' => $student]) }}" class="btn btn-warning">Edit</a></td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Delete
                        </button>
                    </td>
                </tr>
            @empty
                <tr class="table-info">
                    <td colspan="100%" class="text-center">Không có dữ liệu.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    @if ($students->count() > 0)
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Xóa sinh viên</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Bạn chắc chắn muốn xóa ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form action="{{ route('student.delete_student', ['student' => $student]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
