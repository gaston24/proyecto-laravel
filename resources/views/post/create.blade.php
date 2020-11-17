@extends('plantilla')

@section('seccion')
    <h2 class="alert alert-success"><i> Formularios </i></h2>

    @if (session('mensaje'))
        <div class="alert alert-success w-50">
            {{session('mensaje')}}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/post" method="POST" autocomplete="off" novalidate>
    
        @csrf('POST')

        {{-- NOMBRE --}}
        <div class="form-group w-50">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}">
            @error('nombre')
                <div class="alert alert-danger mt-1 w-50">Campo no valido</div>
            @enderror
        </div>

        {{-- apellido --}}
        <div class="form-group w-50">
            <label for="apellido">apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control" value="{{old('apellido')}}">
            @error('apellido')
                <div class="alert alert-danger mt-1 w-50">Campo no valido</div>
            @enderror
        </div>

        {{-- edad --}}
        <div class="form-group w-50">
            <label for="edad">edad</label>
            <input type="number" name="edad" id="edad" class="form-control" value="{{old('edad')}}">
            @error('edad')
                <div class="alert alert-danger mt-1 w-50">Campo no valido</div>
            @enderror
        </div>

        {{-- email --}}
        <div class="form-group w-50">
            <label for="email">email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}">
            @error('email')
                <div class="alert alert-danger mt-1 w-50">Campo no valido</div>
            @enderror
        </div>

        {{-- BOTON SUBMIT --}}
        <button type="submit" class="btn-success mt-3">Enviar</button>
    
    </form>
    
@endsection