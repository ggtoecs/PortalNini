@extends('layouts.gandy')

@section('content')
<div class="container">
    <h2>Mi Perfil</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($perfiles->isEmpty())
        <p>No has creado tu perfil aún.</p>
    @else
        @php
            $perfil = $perfiles->first();
            $user = Auth::user();
        @endphp

        <div class="card">
            <div class="card-header">
                Información del Usuario
            </div>
            <div class="card-body">
                <p><strong>Nombre:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>

                <p><strong>Descripción:</strong> 
                    @if(empty($perfil->descripcion))
                        <span class="text-muted">No has agregado una descripción aún.</span>
                    @else
                        {{ $perfil->descripcion }}
                    @endif
                </p>

                <p><strong>CV:</strong> 
                    @if(empty($perfil->cv))
                        <span class="text-muted">No has subido un CV aún.</span>
                    @else
                        <a href="{{ asset('storage/' . $perfil->cv) }}" target="_blank">Ver CV</a>
                    @endif
                </p>

                <a href="{{ route('vacantes.editPerfil', $perfil->id) }}" class="btn btn-primary">Editar Perfil</a>
            </div>
        </div>
    @endif
</div>
@endsection
