@extends('plantilla')

@section('seccion')
    <h2 class="alert alert-success mb-4"> <i>Notas Editar</i> </h2>

@if (session('mensaje'))
    <div class="alert alert-success">
        {{session('mensaje')}}
    </div>
@endif
@if (session('mensajeEliminar'))
    <div class="alert alert-danger">
        {{session('mensajeEliminar')}}
    </div>
@endif


<form action="{{route('notas.update', $nota->id)}}" method="post" autocomplete="off">

    @method('PUT')
    @csrf

    <input type="text" name="nombre" placeholder="Nombre" class="form-control" value="{{$nota->nombre}}">
    @error('nombre')
        <div class="alert alert-danger mt-2">
            El campo nombre es requerido
        </div>
    @enderror

    <input type="text" name="descripcion" placeholder="Descripcion" class="form-control" value="{{$nota->descripcion}}">
    {{-- @error('descripcion')
        <div class="alert alert-danger mt-2">
            El campo descripcion es requerido
        </div>
    @enderror --}}

    @if ($errors->has('descripcion'))
        <div class="alert alert-danger mt-2">
            El campo descripcion es requerido
        </div>
    @endif
    
    <button class="btn btn-warning btn-block mb-3">Editar</button>

</form>

<a href="{{route('editar.volver')}}" class="btn btn-success btn-block mb-3">Volver</a>

    


@endsection