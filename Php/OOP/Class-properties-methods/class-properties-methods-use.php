<?php


class calculation{

    // public -> class variable can access outside the class with object
    public $a, $b, $c;   //----> Properties

    function sum(){    //-----> Methods
        $this->c = $this->a + $this->b;
        return $this->c;
    }

    function sub(){    //------> Methods
        $this->c = $this->a - $this->b;
        return $this->c;
    }
}
//$c1 is called object

$c1 = new calculation();
$c1->a = 20;
$c1->a = 10;



$c2 = new calculation();
$c2->a = 23;
$c2->a = 35;

echo "Sum value of c1 :" . $c1->sum() . "\n";

echo "Substraction value of c2 :" . $c2->sub();
?>