@extends('plantilla')

@section('seccion')
    <h2 class="alert alert-success mb-4"> <i>Notas</i> </h2>
    <br>

    <div class="alert alert-info">
        <h4><i><b>Id: </b>{{$nota->id}}</i></h4>
        <h4><i><b>Nombre: </b>{{$nota->nombre}}</i></h4>
        <h4><i><b>Dscripcion: </b>{{$nota->descripcion}}</i></h4>
    </div>



@endsection