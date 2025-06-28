@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">أماكن العمل</h2>

    <a href="{{ route('places.create') }}" class="btn btn-success mb-3">➕ إضافة مكان جديد</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>type</th>
                <th>location</th>
                <th> description</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($places as $place)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $place->name }}</td>
                <td>{{ $place->type }}</td>
                <td>{{ $place->location }}</td>
                <td>{{ $place->description }}</td>
                <td>
                    <a href="{{ route('places.edit', $place->id) }}" class="btn btn-sm btn-primary">تعديل</a>
                    <form action="{{ route('places.destroy', $place->id) }}" method="POST" class="d-inline">
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
