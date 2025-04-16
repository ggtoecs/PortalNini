@extends('layouts.gandy')

@section('content')
<div class="container mt-5">
    <h2>Editar Perfil</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups!</strong> Hubo algunos problemas con tus datos.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vacantes.updatePerfil', $mejorarPerfil->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="4">{{ old('descripcion', $mejorarPerfil->descripcion) }}</textarea>
        </div>

        <div class="form-group">
            <label for="cv">CV Actual:</label>
            @if ($mejorarPerfil->cv)
                <a href="{{ asset('storage/' . $mejorarPerfil->cv) }}" target="_blank">Ver CV</a>
            @else
                <p>No has subido un CV aún.</p>
            @endif
        </div>

        <div class="form-group">
            <label for="cv">Actualizar CV (PDF)</label>
            <input type="file" name="cv" class="form-control-file" accept=".pdf">
        </div>

        <div class="form-group d-flex justify-content-between mt-3">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="{{ route('vacantes.perfil') }}" class="btn btn-primary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
