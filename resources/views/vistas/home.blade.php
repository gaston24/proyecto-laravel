@extends('plantilla')

@section('seccion')

<style>
    .table td, .table th, p{
        vertical-align: middle;
    }
</style>
    <h2 class="alert alert-success "><i> Homeeee</i></h2>
    
    @foreach ($alumnos as $alumno)
    {{-- <a href="/home/{{$alumno['nombre']}}"> {{$alumno['nombre']}} </a> --}}
    <a href="{{route('home', $alumno['nombre'])}}"> {{$alumno['nombre']}} </a>
    @endforeach
    

    @if (!empty($nombre))
    <h3 class="alert alert-secondary">el nombre ingresado es: {{$nombre}}</h3>

    @switch($nombre)
        @case('Juan')
        @case('Pedro')
        @case('Lucas')
            <p class="alert alert-warning">El usuario {{$nombre}} esta registrado</p>
            @break

            @case('Ana')
            @case('Lucia')
            <p class="alert alert-warning">La usuaria {{$nombre}} esta registrada</p>
            
            @break
            @default
            <p class="alert alert-warning">El usuario/a {{$nombre}} no esta registrado/a</p>
            
    @endswitch
    @else
    <h3 class="alert alert-danger">nombre no ingresado</h3>
    @endif
    

<div class="table-responsive my-4">

    <table class="table">
        <thead class="bg-success text-white">
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Foto</th>
        </thead>
        @foreach ($alumnos as $alumno)
        <tr>
                <td>{{$alumno->nombre}}</td>
                <td>{{$alumno->apellido}}</td>
                <td>{{$alumno->edad}}</td>
                <td><img src="{{$alumno->foto}}" width="50px" alt="Foto de {{$alumno->nombre}} {{$alumno->apellido}}" srcset=""> </td>
            </tr>
            @endforeach
            
        </table>
        
    </div>


    @foreach ($alumnos as $index => $alumno)
        <div class="media alert alert-info">
            <img src="{{$alumno['foto']}}" width="220px" alt="Foto de {{$alumno['nombre']}} {{$alumno['apellido']}}" srcset="">    
            <div class="media-body ml-3">
                <h4><u>Nro alumno: {{$index+1}}</u></h4>
                <br>
                <p>Nombre: {{$alumno['nombre']}} {{$alumno['apellido']}}</p>
                <p>Edad: {{$alumno['edad']}}</p>
                <i>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum magnam placeat, labore accusantium totam eius corporis consequatur ut odit alias voluptatem. Harum blanditiis quam minima magnam, voluptas nemo omnis animi.</i>
            </div>
        </div>        
    @endforeach



@endsection

