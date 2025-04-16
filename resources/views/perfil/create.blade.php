@extends('layouts.gandy')

@section('content')
<div class="container mt-4">
    <h2>Crear Perfil</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vacantes.storePerfil') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="4" placeholder="Cuéntanos algo sobre ti...">{{ old('descripcion') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="cv" class="form-label">Subir CV (PDF)</label>
            <input type="file" name="cv" id="cv" class="form-control" accept=".pdf">
        </div>

        <button type="submit" class="btn btn-success">Guardar Perfil</button>
    </form>
</div>
@endsection
