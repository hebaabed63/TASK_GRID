@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>إضافة مكان جديد</h2>
    @if(session()->has('status'))
     @if (session('status'))
        <p class="alert alert-success">{{ ' Processed successfully!' }}</p>
        @else
        <p class="alert alert-danger">{{ ' Processed Faild!' }}</p>
        @endif
    @endif
    <form action="{{  route('places.store')  }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label>name place</label>
            <input type="text" name="name" class="form-control"  required>
        </div>

        <div class="form-group mb-3">
            <label>type place</label>
            <select name="type" class="form-control" required>
                <option value="مركز شفاء" >مركز شفاء</option>
                <option value="مركز توزيع" >مركز توزيع</option>
                <option value="مساعدات" >مساعدات</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label>location</label>
            <input type="text" name="location" class="form-control"  required>
        </div>
        <div class="form-group mb-3">
            <label>description</label>
            <input type="text" name="description" class="form-control"  >
        </div>


        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
