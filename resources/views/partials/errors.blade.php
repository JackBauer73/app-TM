@if ($errors->any())
    <div class="card bg-danger">
        <div class="card-header">
            <h3 class="card-title">Erreur</h3>
        </div>
        <div class="card-body">

            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    </div>

@endif
