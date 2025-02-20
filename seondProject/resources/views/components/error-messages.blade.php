@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Error!</strong>   Please Fix Error :
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
