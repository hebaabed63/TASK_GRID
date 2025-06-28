@extends('layouts.app')

@section('title', 'لوحة التحكم الرئيسية')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">مرحبًا بك في لوحة التحكم 👋</h2>

    <div class="row">

        <!-- مكان العمل -->
        <div class="col-md-4 mb-4">
            <a href="{{ route('places.index') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-hospital fa-2x mb-3 text-primary"></i>
                        <h5 class="card-title">أماكن العمل</h5>
                        <p class="card-text text-muted">إضافة، تعديل، حذف وعرض أماكن العمل.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- المهام -->
        <div class="col-md-4 mb-4">
            <a href="{{ route('tasks.index') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-tasks fa-2x mb-3 text-success"></i>
                        <h5 class="card-title">المهام</h5>
                        <p class="card-text text-muted">متابعة وتعيين المهام حسب الأماكن.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- المتطوعين -->
        <div class="col-md-4 mb-4">
            <a href="{{ route('volunteers.index') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-users fa-2x mb-3 text-warning"></i>
                        <h5 class="card-title">المتطوعين</h5>
                        <p class="card-text text-muted">عرض وإدارة معلومات المتطوعين.</p>
                    </div>
                </div>
            </a>
        </div>
<!-- تعيين مهمة لمكان عمل -->
<div class="col-md-4 mb-4">
    <a href="{{ route('assignments.create') }}" class="text-decoration-none">
        <div class="card shadow-sm h-100">
            <div class="card-body text-center">
                <i class="fas fa-plus-square fa-2x mb-3 text-info"></i>
                <h5 class="card-title">تنسيب متطوع  لمكان عمل</h5>
                <p class="card-text text-muted">تنسيب المتطوع إلى مكان عمل من الأماكن المُضافة مسبقًا، مع اختيار المهمة.</p>
            </div>
        </div>
    </a>
</div>

    </div>
</div>
@endsection
