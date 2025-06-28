@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">المتطوعين</h2>

    <a href="{{ route('volunteers.create') }}" class="btn btn-success mb-3">➕ إضافة متطوع جديد</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>email</th>
                <th>phone</th>
                <th> skills</th>
                <th>availabilty</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($volunteers as $volunteer)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $volunteer->name }}</td>
                <td>{{ $volunteer->email }}</td>
                <td>{{ $volunteer->phone }}</td>
                <td>{{ $volunteer->skils }}</td>
                <td>{{ $volunteer->availabilty }}</td>
                <td>
                    <a href="{{ route('volunteers.edit', $volunteer->id) }}" class="btn btn-sm btn-primary">تعديل</a>
                    <form action="{{ route('volunteers.destroy', $volunteer->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
