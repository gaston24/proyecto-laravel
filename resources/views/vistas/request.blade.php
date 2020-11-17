@extends('plantilla')

@section('seccion')

<h2 class="alert alert-success">
    <i>
        Objeto request
    </i>
</h2>

<h5 style="color:purple">Request GET</h5>

<a href="/datos">/datos</a><br>
<a href="/datos?dni=1234&nombre=maria">/datos2</a><br>

<a href="{{route('misDatos')}}">/misdatos</a><br>
<a href="{{route('misDatos', ['dni'=>'34567', 'nombre'=> 'gaston'])}}">/misdatos2</a><br>


<form action="{{route('datosForm')}}" method="POST">

    @csrf

    @method('POST')

    Nombre: <input type="text" name="nombre" id="">
    edad: <input type="text" name="edad" id="">
    <button type="submit">Enviar</button>

</form>

@endsection