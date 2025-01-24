@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container mt-5">
        <h1 class="text-center">Disponibles</h1>

        <!-- Comprobar si hay vacantes -->
        @if ($vacantes->isEmpty())
            <p>No hay vacantes disponibles actualmente.</p>
        @else
            <div class="row">
                @foreach ($vacantes as $vacante)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">{{ $vacante->titulo }}</h5>
                                {{-- <p class="card-text">{{ Str::limit($vacante->descripcion, 150) }}</p> --}}
                                <p><strong>Sueldo semanal:</strong> ${{ $vacante->salario }}</p>
                                <p><strong>Ubicación:</strong> {{ $vacante->ubicacion }}</p>
                                <p><strong>Tipo de Trabajo:</strong> {{ $vacante->tipo_trabajo }}</p>
                                <a href="#" class="btn btn-primary">Ver más</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.10/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endsection
