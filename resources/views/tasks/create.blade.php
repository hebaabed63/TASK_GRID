@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>إضافة مهمة جديد</h2>
        @if (session()->has('stat'))
            @if (session('stat'))
                <p class="alert alert-success">{{ ' Processed successfully!' }}</p>
            @else
                <p class="alert alert-danger">{{ ' Processed Faild!' }}</p>
            @endif
        @endif
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf


            <div class="form-group mb-3">
                <label>title </label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label>description</label>
                <input type="text" name="description" class="form-control">
            </div>



            <div class="form-group mb-3">
                <label> place</label>
                <select name="place_id" class="form-control" required>
                    <option></option>
                    @foreach ($places as $place)
                        <option value="{{ $place->id }}">{{ $place->name }}</option>
                    @endforeach
                </select>
            </div>
            <label for="category">category</label>

            <select name="category" class="form-control">
                <option value="">اختر الفئة</option>
                @foreach ($categories as $category)
                    <option value="{{ $category }}">{{ $category }}</option>
                @endforeach
            </select>
            <label for="date">date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}">

            <label for="status">status</label>
            <select name="status" id="status" class="form-control">
                <option value="">اختر الحالة</option>
                <option value="pending">قيد الانتظار</option>
                <option value="assigned">تم التعيين</option>
                <option value="done">منتهية</option>
            </select>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
