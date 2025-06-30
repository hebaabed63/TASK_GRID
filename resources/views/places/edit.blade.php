@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>'تعديل مكان عمل' </h2>
    @if(session()->has('status'))
     @if (session('status'))
        <p class="alert alert-success">{{ ' Processed successfully!' }}</p>
        @else
        <p class="alert alert-danger">{{ ' Processed Faild!' }}</p>
        @endif
    @endif

    <form action="{{route('places.update', $place->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>name </label>
            <input type="text" name="name" class="form-control" value="{{ $place->name  }}" required>
        </div>

        <div class="form-group mb-3">
            <label>type</label>
            <select name="type" class="form-control" required>
                <option value="مركز شفاء" @selected(old('type',$place->type)=='مركز شفاء')>مركز شفاء</option>
                <option value="مركز توزيع" @selected(old('type',$place->type)=='مركز توزيع')>مركز توزيع</option>
                <option value="مساعدات" @selected(old('type',$place->type)=="مساعدات")>مساعدات</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label>location</label>
            <input type="text" name="location" class="form-control" value="{{ $place->location }}" required>
        </div>
        <div class="form-group mb-3">
            <label>description</label>
            <input type="text" name="description" class="form-control" value="{{ $place->description }}" >
        </div>

        <button type="button" id="submit-btn"  class="btn btn-primary">update</button>
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
