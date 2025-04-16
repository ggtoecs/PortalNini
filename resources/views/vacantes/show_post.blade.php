@extends('layouts.gandy')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Detalles de la Vacante: {{ $vacante->titulo }}</h3>
        </div>
        <div class="card-body">
            <p><strong class= "mt-4">Descripción:</strong> {{ $vacante->descripcion }}</p>

            <ul class="list-group">
                @foreach($postulantes as $postulante)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <h5>{{ $postulante['nombre'] }}</h5>
                        </div>
                        <!-- Botón para ver el CV en un modal -->
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalCV{{ $postulante['id'] }}">
                            Ver CV
                        </button>
                    </li>

                    <!-- Modal para mostrar detalles del postulante -->
                    <div class="modal fade" id="modalCV{{ $postulante['id'] }}" tabindex="-1" role="dialog" aria-labelledby="cvModalLabel{{ $postulante['id'] }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="cvModalLabel{{ $postulante['id'] }}">Detalles del Postulante: {{ $postulante['nombre'] }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Nombre:</strong> {{ $postulante['nombre'] }}</p>
                                    <p><strong>Descripción:</strong> {{ $postulante['descripcion'] }}</p>
                                    <p><strong>CV:</strong> 
                                    @if($postulante['cv'])
                                            <a href="{{ asset('storage/' . $postulante['cv']) }}" target="_blank">Ver archivo</a>
                                        @else
                                            No hay CV disponible
                                        @endif

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
