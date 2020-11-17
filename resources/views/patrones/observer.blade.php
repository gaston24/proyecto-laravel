@extends('plantilla')

@section('seccion')

<h3>Patrón {{$type}}</h3>
<div class="alert alert-dark">

<?php

  abstract class AbstractSuscriptor {
      abstract function update(AbstractPublicador $Publicador_in);
  }

  abstract class AbstractPublicador {
      abstract function suscribir(AbstractSuscriptor $Suscriptor_in);
      abstract function desuscribir(AbstractSuscriptor $Suscriptor_in);
      abstract function notify();
  }

  function writeln($line_in, $color=null) {
      echo "<p style='color:$color'>$line_in</p>";
  }

  class PatternSuscriptor extends AbstractSuscriptor {
      private $nombre = '';
      public function __construct($nombre) {
        $this->nombre = $nombre;
      }
      public function update(AbstractPublicador $Publicador) {
        //writeln('');
        writeln($this->nombre.' ->* PUBLICACION NUEVA! *','blue');
        writeln($Publicador->getDatos(),'red');
        writeln('');
      }
  }

  class PatternPublicador extends AbstractPublicador {

      private $favoritePatterns = NULL;
      private $Suscriptors = array();
      private $Datos = '';

      function __construct() {
      }
      function suscribir(AbstractSuscriptor $Suscriptor_in) {
        //could also use array_push($this->Suscriptors, $Suscriptor_in);
        $this->Suscriptors[] = $Suscriptor_in;
      }
      function desuscribir(AbstractSuscriptor $Suscriptor_in) {
        //$key = array_search($Suscriptor_in, $this->Suscriptors);
        foreach($this->Suscriptors as $okey => $oval) {
          if ($oval == $Suscriptor_in) { 
            unset($this->Suscriptors[$okey]);
          }
        }
      }
      function notify() {
        foreach($this->Suscriptors as $suscriptor) {
          $suscriptor->update($this);
        }
      }
      function publicar($newDatos) {
        $this->Datos = $newDatos;
        $this->notify();
      }
      function getDatos() {
        return $this->Datos;
      }
  }

    writeln('');
    writeln('COMIENZO TESTING OBSERVER PATTERN','green');
    writeln('');

    $patternPublicador = new PatternPublicador();
    $patternSuscriptor1 = new PatternSuscriptor('Dany');
    $patternSuscriptor2 = new PatternSuscriptor('Pedro');
    $patternSuscriptor3 = new PatternSuscriptor('Ana');

    $patternPublicador->suscribir($patternSuscriptor1);
    $patternPublicador->suscribir($patternSuscriptor2);
    $patternPublicador->publicar('publicación 1');
    $patternPublicador->desuscribir($patternSuscriptor1);
    $patternPublicador->publicar('publicación 2');
    $patternPublicador->publicar('publicación 3');
    $patternPublicador->desuscribir($patternSuscriptor2);
    
    $patternPublicador->suscribir($patternSuscriptor3);
    $patternPublicador->publicar('publicación 4');
    $patternPublicador->desuscribir($patternSuscriptor3);

    writeln('');
    writeln('FIN TESTING OBSERVER PATTERN','green');
    
    /*
    
    Output
    BEGIN TESTING Suscriptor PATTERN

    *IN PATTERN Suscriptor - NEW PATTERN GOSSIP ALERT*
    new favorite patterns: abstract factory, decorator, visitor
    *IN PATTERN Suscriptor - PATTERN GOSSIP ALERT OVER*

    *IN PATTERN Suscriptor - NEW PATTERN GOSSIP ALERT*
    new favorite patterns: abstract factory, Suscriptor, decorator
    *IN PATTERN Suscriptor - PATTERN GOSSIP ALERT OVER*

    END TESTING Suscriptor PATTERN

    
    */
    ?>
</div>
@endsection

