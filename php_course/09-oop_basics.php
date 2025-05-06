<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>OOP Basics.</title>
    </head>
    <body>
<?php
    /* 
    A class is a structure that can contain properties and methods.
    After its declaration, a class
     is used as a data type in its instances (objects).
    A class is declared using the keyword class.
    */
    
    class Car {
        public $color;// Can be accessed anywhere
        protected $model;// Can be accessed within the class and subclasses
        private $make;// Can be accessed only within the class

        public function __construct($color, $model, $make) {
            $this->color = $color;
            $this->model = $model;
            $this->make = $make;
        }

        public function getMake() {
            return $this->make;
        }
    }

    $car1 = new Car("Red", "Toyota", "Corolla");
    // echo $car1->make; // This would cause an error because 'make' is private
    echo $car1->getMake(); // This works because we use a public method


    class BankAcc{
        public $iban;
        public $balance;

        public function deposit($amount){
            if($amount>0){
                $this->balance+=$amount;
            }
        }

        public function withdraw($amount){
            if($amount>0){
                $this->balance-=$amount;
            }
        }
    }

    $ba=new BankAcc();
    $ba->deposit(100);
    $ba->withdraw(50);

    echo "You have".$ba->balance."euros<br>";
?>
    </body>
</html>