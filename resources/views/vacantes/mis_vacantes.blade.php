@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Mis Vacantes Publicadas</h2>

    @if($vacantes->isEmpty())
        <div class="alert alert-info">Aún no has publicado ninguna vacante.</div>
    @else
        <div class="row">
            @foreach($vacantes as $vacante)
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $vacante->titulo }}</h5>
                            <p><strong>Salario:</strong> ${{ $vacante->salario }}</p>
                            <p><strong>Ubicación:</strong> {{ $vacante->ubicacion }}</p>
                            <p><strong>Tipo:</strong> {{ $vacante->tipo_trabajo }}</p>

                            <a href="{{ route('vacantes.show', ['id' => $vacante->id, 'empleador_id' => $vacante->empleador_id]) }}" class="btn btn-primary">Ver</a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
