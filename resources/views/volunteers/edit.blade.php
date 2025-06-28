@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>تعديل متطوع جديد</h2>
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
    <form action="{{route('volunteers.update',$volunteer->id)  }}" method="POST">
        @csrf
     @method('PUT')
        <div class="form-group mb-3">
            <label>name</label>
            <input type="text" name="name" class="form-control" value="{{$volunteer->name}}" required>
        </div>


        <div class="form-group mb-3">
            <label>email</label>
            <input type="email" name="email" class="form-control" value="{{$volunteer->email}}" required>
        </div>
        <div class="form-group mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{$volunteer->phone}}" >
        </div>
        <div class="form-group mb-3">
            <label>Skills</label>
            <input type="text" name="skils" class="form-control" value="{{$volunteer->skils}}"  required>
        </div>
        <div class="form-group mb-3">
            <label>availabilty</label>
            <input type="text" name="availabilty" class="form-control" value="{{$volunteer->availabilty}}" >
        </div>



        <button type="button" id="submit-btn" class="btn btn-primary">Update</button>
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
