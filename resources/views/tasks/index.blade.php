@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4"> المهام</h2>

    <a href="{{ route('tasks.create') }}" class="btn btn-success mb-3">➕ إضافة مهمة جديد</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>title</th>
                <th> description</th>
                <th>place_name</th>
                <th>category</th>
               <th>date</th>
               <th>status</th>



                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->place->name }}</td>
                <td>{{ $task->category }}</td>
                 <td>{{ $task->date }}</td>
                <td>{{ $task->status }}</td>

                <td>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-primary">تعديل</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
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
