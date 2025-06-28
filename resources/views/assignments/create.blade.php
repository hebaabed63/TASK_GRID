@extends('layouts.app')

@section('title', 'تنسيب متطوع')

@section('content')
<div class="max-w-xl mx-auto mt-8 bg-white p-6 rounded-xl shadow">
    <h2 class="text-2xl font-bold mb-6 text-center">تنسيب متطوع إلى مهمة</h2>
    @if(session()->has('success'))

    @if (session('success'))
        <p class="alert alert-success">{{ ' Processed successfully!' }}</p>
        @else
        <p class="alert alert-danger">{{ ' Processed Faild!' }}</p>
        @endif
 @endif

    <form method="POST" action="{{ route('assignments.store') }}">
        @csrf

        {{-- اختيار المتطوع --}}
        <div class="mb-4">
            <label for="volunteer_id" class="block mb-1 font-semibold">اختر المتطوع:</label>
            <select name="volunteer_id" id="volunteer_id" class="w-full border rounded p-2" required>
                <option value="">-- اختر متطوعاً --</option>
                @foreach ($volunteers as $volunteer)
                    <option value="{{ $volunteer->id }}">{{ $volunteer->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- اختيار مكان العمل --}}
        <div class="mb-4">
            <label for="place_id" class="block mb-1 font-semibold">اختر مكان العمل:   </label>
            <select name="place_id" id="place_id" class="w-full border rounded p-2" required>
                <option value="">-- اختر مكاناً --</option>
                @foreach ($places as $place)
                    <option value="{{ $place->id }}">{{ $place->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- اختيار المهمة --}}
        <div class="mb-4">
            <label for="task_id" class="block mb-1 font-semibold">اختر المهمة:</label>
            <select name="task_id" id="task_id" class="w-full border rounded p-2" required>
                <option value="">-- اختر مهمة --</option>
            </select>
        </div>

        {{-- ملاحظات --}}
        <div class="mb-4">
            <label for="notes" class="block mb-1 font-semibold">ملاحظات:</label>
            <textarea name="notes" id="notes" class="w-full border rounded p-2" rows="3"></textarea>
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded w-full" >
            تأكيد التنسيب
        </button>
    </form>

<br>
<br>
<br>
<br>
        <a class="btn btn-primary" href="{{ route('assignments.index') }}">عرض المهام والمتطوعين في أماكن العمل</a>


</div>

{{-- AJAX لجلب المهام بناء على المكان --}}
<script>

document.getElementById('place_id').addEventListener('change', function () {
    const placeId = this.value;
    const taskSelect = document.getElementById('task_id');
    taskSelect.innerHTML = '<option value="">جاري التحميل...</option>';

    fetch(`/places/${placeId}/tasks`)
        .then(response => response.json())
        .then(data => {
            taskSelect.innerHTML = '<option value="">-- اختر مهمة --</option>';
            data.forEach(task => {
                const option = document.createElement('option');
                option.value = task.id;
                option.textContent = task.title;
                taskSelect.appendChild(option);
            });
        })
        .catch(error => {
            taskSelect.innerHTML = '<option value="">فشل في التحميل</option>';
            console.error(error);
        });
});

</script>
@endsection
