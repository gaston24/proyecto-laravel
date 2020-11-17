@extends('plantilla')

@section('seccion')

<h3>Patrón {{$type}}</h3>
<div class="alert alert-dark">

   <?php
   interface Strategy {
      public function doOperation($num1, $num2);
   }

   class OperationAdd implements Strategy{
      public function doOperation( $num1,  $num2) {
         return $num1 + $num2;
      }
   }

   class OperationSubstract implements Strategy{
      public function  doOperation( $num1,  $num2) {
         return $num1 - $num2;
      }
   }

   class OperationMultiply implements Strategy{
      public function  doOperation( $num1,  $num2) {
         return $num1 * $num2;
      }
   }

   class OperationDivision implements Strategy{
      public function  doOperation( $num1,  $num2) {
         return $num1 / $num2;
      }
   }

   class OperationModulo implements Strategy{
      public function  doOperation( $num1,  $num2) {
         return $num1 % $num2;
      }
   }

   class Context {
      private $strategy;

      public function __construct(Strategy $strategy){
         $this->strategy = $strategy;
      }

      public function  executeStrategy( $num1,  $num2){
         return $this->strategy->doOperation($num1, $num2);
      }
   }

   $context = new Context(new OperationAdd());		
   echo '<p>';
   echo "10 + 5 = " . $context->executeStrategy(10, 5);
   echo '</p>';

   $context = new Context(new OperationSubstract());		
   echo '<p>';
   echo "10 - 5 = " . $context->executeStrategy(10, 5);
   echo '</p>';

   $context = new Context(new OperationMultiply());		
   echo '<p>';
   echo "10 * 5 = " . $context->executeStrategy(10, 5);
   echo '</p>';

   $context = new Context(new OperationDivision());		
   echo '<p>';
   echo "10 / 5 = " . $context->executeStrategy(10, 5);
   echo '</p>';

   $context = new Context(new OperationModulo());		
   echo '<p>';
   echo "10 % 5 = " . $context->executeStrategy(10, 5);
   echo '</p>';
   ?>
</div>
@endsection
