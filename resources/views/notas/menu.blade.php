@extends('plantilla')

@section('seccion')
    <h2 class="alert alert-success mb-4"> <i>Notas</i> </h2>

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
@if (session('mensajeActualizado'))
    <div class="alert alert-success">
        {{session('mensajeActualizado')}}
    </div>
@endif


<form action="{{route('notas.crear')}}" method="post" autocomplete="off">

    @csrf

    <input type="text" name="nombre" placeholder="Nombre" class="form-control" value="{{old('nombre')}}">
    @error('nombre')
        <div class="alert alert-danger mt-2">
            El campo nombre es requerido
        </div>
    @enderror

    <input type="text" name="descripcion" placeholder="Descripcion" class="form-control" value="{{old('descripcion')}}">
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
    
    <button class="btn btn-info btn-block mb-3">Agregar</button>

</form>

    <div class="table responsive">
        <table class="table table-dark">
            <thead>
                <th>#id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Creado</th>
                <th>Actualizado</th>
                <th>Accion</th>
            </thead>
            <tbody>

                @foreach ($notas as $nota)

                <tr>
                    <th>{{$nota->id}}</th>
                <td> <a href="{{route('notas.detalle', $nota->id)}}"> {{$nota->nombre}}</a></td>
                    <td>{{$nota->descripcion}}</td>
                    <td>{{$nota->create_at}}</td>
                    <td>{{$nota->update_at}}</td>
                    <td>
                        <a href="{{route('notas.editar', $nota->id)}}">
                            <button type="submit" class="btn btn-warning btn-sm">
                                Edit
                            </button>
                        </a>
                        <form action="{{route('notas.eliminar', $nota->id)}}" class="d-inline" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">
                                X
                            </button>
                        </form>
                    </td>
                </tr>
                    
                @endforeach

            </tbody>
        </table>
    </div>


@endsection