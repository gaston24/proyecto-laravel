@extends('plantilla')

@section('seccion')
<h2 class="alert alert-success "><i> Patrones</i></h2>

<h3 style="color:purple;"><u><i>Patrones de Creacion</i></u></h3>
<a href="{{route('patron', 'factory')}}">Patron Factory</a><br>
<a href="{{route('patron', 'prototype')}}">Patron Prototype</a><br>
<a href="{{route('patron', 'singleton')}}">Patron Singleton</a><br>
<br>
<h3 style="color:purple;"><u><i>Patrones Estructurales</i></u></h3>
<a href="{{route('patron', 'adapter')}}">Patron Adapter</a><br>
<a href="{{route('patron', 'decorate')}}">Patron Decorate</a><br>
<a href="{{route('patron', 'facade')}}">Patron Facade</a><br>
<br>
<h3 style="color:purple;"><u><i>Patrones de Comportamiento</i></u></h3>
<a href="{{route('patron', 'iterator')}}">Patron Iterator</a><br>
<a href="{{route('patron', 'observer')}}">Patron Observer</a><br>
<a href="{{route('patron', 'strategy')}}">Patron Strategy</a><br>
@endsection