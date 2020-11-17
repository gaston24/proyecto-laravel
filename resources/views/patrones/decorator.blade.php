@extends('plantilla')

@section('seccion')

<h3>Patrón {{$type}}</h3>
<div class="alert alert-dark">
    <?php


    interface eMailBody {
        public function loadBody();
    }

    class eMail implements eMailBody {
        public function loadBody() {
            echo "<p>";
            echo "This is Main Email body.<br />";
            echo "</p>";
        } 
    }
    
    abstract class emailBodyDecorator implements eMailBody {    
        protected $emailBody;    
        public function __construct(eMailBody $emailBody) {
            $this->emailBody = $emailBody;
        }  
        abstract public function loadBody();    
    } 
    
    class christmasEmailBody extends emailBodyDecorator {   
        public function loadBody() {     
            echo "<p>";
            echo 'This is Extra Content for Christmas<br />';
            echo "</p>";
            $this->emailBody->loadBody();        
        }   
    }
    
    class newYearEmailBody extends emailBodyDecorator {
        public function loadBody() {      
            echo "<p>";
            echo 'This is Extra Content for New Year.<br />';
            echo "</p>";
            $this->emailBody->loadBody();      
        }
    }

    class miDecorador extends emailBodyDecorator {
        public function loadBody() {      
            echo "<p>";
            echo 'Hola soy un decorador personalizado.<br />';
            echo "</p>";
            $this->emailBody->loadBody();      
        }
    }

    /*Normal Email*/
    $email = new eMail();
    $email->loadBody();
    // Output
    //This is Main Email body.
    echo "<p>-----------------</p>";

    /* Email with Xmas Greetings*/ 
    $email = new eMail();
    $email = new christmasEmailBody($email);
    $email->loadBody();
    echo "<p>-----------------</p>";

    // Output
    //This is Extra Content for Christmas
    //This is Main Email body.
    
    /* Email with New Year Greetings*/
    
    $email = new eMail();
    $email = new newYearEmailBody($email);
    $email->loadBody();
    echo "<p>-----------------</p>";
    
    // Output
    //This is Extra Content for New Year.
    //This is Main Email body.
    
    /*Email with Xmas and New Year Greetings*/
    $email = new eMail();
    $email = new christmasEmailBody($email);
    $email = new newYearEmailBody($email);
    $email = new miDecorador($email);
    $email->loadBody(); 
    // Output
    //This is Extra Content for New Year.
    //This is Extra Content for Christmas
    //This is Main Email body.
    ?>
</div>
@endsection


