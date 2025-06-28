@extends('layouts.app')

@section('title', 'قائمة المتطوعين ومهامهم')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">قائمة المتطوعين ومهامهم</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>المهمة</th>
                <th>المتطوعين</th>
                <th>مكان العمل</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($tasks as $task)
                <tr>
               <td>{{ $task->title }}</td>

                    <td>
                        <ul>
                        @foreach($task->volunteers as $volunteer)
                          <li>{{$volunteer->name}}</li>
                        @endforeach
                    </ul>
                </td>
                    <td>{{ $task->place->name }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">لا توجد بيانات حالياً.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
