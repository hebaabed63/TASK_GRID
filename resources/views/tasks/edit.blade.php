@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>تعديل مهمة جديد</h2>
        @if (session()->has('stat'))
            @if (session('stat'))
                <p class="alert alert-success">{{ ' Processed successfully!' }}</p>
            @else
                <p class="alert alert-danger">{{ ' Processed Faild!' }}</p>
            @endif
        @endif
        <form action="{{ route('tasks.update',$task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label>title </label>
                <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
            </div>
            <div class="form-group mb-3">
                <label>description</label>
                <input type="text" name="description" class="form-control" value="{{ $task->description }}">
            </div>



            <div class="form-group mb-3">
                <label> place</label>
                <select name="place_id" class="form-control"  required>
                    <option></option>
                    @foreach ($places as $place)
                        <option value="{{ $place->id }}" @selected(old('place_id',$place->id))>{{ $place->name }}</option>
                    @endforeach
                </select>
            </div>
            <label for="category">category</label>

            <select name="category" class="form-control">
                <option value="">اختر الفئة</option>
                @foreach ($categories as $category)
                    <option value="{{ $category }}"@selected(old('category',$task->category))>{{ $category }}</option>
                @endforeach
            </select>
            <label for="date">date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ $task->date }}">

            <label for="status">status</label>

            <select name="status" id="status" class="form-control">
    <option value="">اختر الحالة</option>
    <option value="pending" @selected(old('status', $task->status) == 'pending')>قيد الانتظار</option>
    <option value="assigned" @selected(old('status', $task->status) == 'assigned')>تم التعيين</option>
    <option value="done" @selected(old('status', $task->status) == 'done')>منتهية</option>
</select>

            <button type="submit" id="submit-btn" class="btn btn-primary">update</button>
        </form>
    </div>
    <script>

    $(document).ready(function(){
        $('#submit-btn').click(function(e){
            e.preventDefault();
            var s=confirm('Are You Sure?');
            if(s){
                $('form').submit();
            }else{
                return;
            }
        })
    })
    </script>
@endsection






















