@if ($errors->any())
    <div class="alert alert-danger mb-3 py-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif