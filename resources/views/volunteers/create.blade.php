@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>إضافة متطوع جديد</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    @if(session()->has('status'))
     @if (session('status'))
        <p class="alert alert-success">{{ ' Processed successfully!' }}</p>
        @else
        <p class="alert alert-danger">{{ ' Processed Faild!' }}</p>
        @endif
    @endif
    <form action="{{  route('volunteers.store')  }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label>name</label>
            <input type="text" name="name" class="form-control"  required>
        </div>


        <div class="form-group mb-3">
            <label>email</label>
            <input type="email" name="email" class="form-control"  required>
        </div>
        <div class="form-group mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control"  >
        </div>
        <div class="form-group mb-3">
            <label>Skills</label>
            <input type="text" name="skils" class="form-control"  required>
        </div>
        <div class="form-group mb-3">
            <label>availabilty</label>
            <input type="text" name="availabilty" class="form-control"  >
        </div>



        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
