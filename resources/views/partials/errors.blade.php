@if($errors->any())
    <div class="mb-4">
        <ul class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            @foreach($errors->all() as $error)
                <li class="list-disc ml-5">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif