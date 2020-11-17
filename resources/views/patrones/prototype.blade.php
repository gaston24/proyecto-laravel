@extends('plantilla')

@section('seccion')

<h3>Patrón {{$type}}</h3>
<div class="alert alert-dark">

<?php

    abstract class BookPrototype
    {
        protected $title;
        protected $category;
        abstract public function __clone();
        public function getTitle(): string
        {
            return $this->title;
        }

        public function setTitle($title)
        {
            $this->title = $title;
        }
    }

    class BarBookPrototype extends BookPrototype
    {
        /**
         * @var string
         */
        protected $category = 'Bar';

        public function __clone()
        {
        }
    }

    class FooBookPrototype extends BookPrototype
    {
        /**
         * @var string
         */
        protected $category = 'Foo';

        public function __clone()
        {
        }
    }


    $fooPrototype = new FooBookPrototype();
    $barPrototype = new BarBookPrototype();

    /* ------------------------------------------ */
    /* CREAMOS CLONES DE LAS INSTANCIAS PROTOTIPO */
    /* ------------------------------------------ */
    for ($i = 0; $i < 10; $i++) {
        $bookfoo[$i] = clone $fooPrototype;
    }
    for ($i = 0; $i < 5; $i++) {
        $bookbar[$i] = clone $barPrototype;
    }

    /* ------------------------------------- */
    /* CARGAMOS DATOS EN C/U DE ESTOS CLONES */
    /* ------------------------------------- */
    for ($i = 0; $i < 10; $i++) {
        $bookfoo[$i]->setTitle('Foo Book No ' . $i);
    }
    for ($i = 0; $i < 5; $i++) {
        $bookbar[$i]->setTitle('Bar Book No ' . $i);
    }

    /* ------------------------------------------------ */
    /* REPRESENTAMOS LOS DATOS CONTENIDOS EN LOS CLONES */
    /* ------------------------------------------------ */
    echo "<p>";
    for ($i = 0; $i < 10; $i++) {
        echo $bookfoo[$i]->getTitle().', ';
    }
    echo "</p>";

    echo "<p>";
    for ($i = 0; $i < 5; $i++) {
        echo $bookbar[$i]->getTitle().', ';
    }
    echo "</p>";

    ?>
</div>
@endsection
