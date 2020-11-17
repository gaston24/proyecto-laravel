@extends('plantilla')

@section('seccion')

<h2 class="alert aleert-success"><i> Productos </i></h2>

<div class="table-responsive">

    <table class="table table-dark">
        <thead>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Precio</th>
    </thead>
    
    <tbody>
        @foreach ($productos as $producto)
        <tr>
            <td>  {{$producto->codigo}}</td>
            <td>  {{$producto->nombre}}</td>
            <td>  {{$producto->descripcion}}</td>
            <td>$ {{$producto->precio}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>

@endsection