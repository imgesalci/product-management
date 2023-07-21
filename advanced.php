<?php
  interface Operation{
    public function calculate($number1, $number2);
  }
  class Addition implements Operation{
    public function calculate($number1, $number2){
      return $number1 + $number2;
    }
  }
  class Subtraction implements Operation{
    public function calculate($number1, $number2){
      return $number1 - $number2;
    }
  }
  class Multiplication implements Operation{
    public function calculate($number1, $number2){
      return $number1 * $number2;
    }
  }
  class Division implements Operation{
    public function calculate($number1, $number2){
      if($number2 != 0){
        return $number1 / $number2;
      }
      else{
        echo "Denominator cannot be 0";
      }
    }
  }
  
  class Calculator{
    private $number1;
    private $number2;
    
    public function __construct($number1, $number2){
      $this->number1 = $number1;
      $this->number2 = $number2;
    }
    
    public function performCalculation(Operation $operation){
      return $operation->calculate($this->number1, $this->number2);
    }
  }
  $num1 = 20;
  $num2 = 0;
  $calculation = new Calculator($num1, $num2);
  echo "numbers are ", $num1, " and ", $num2."<br>";
  
  $addition = new Addition();
  echo "addition result: ", $calculation->performCalculation($addition)."<br>";
  
  $subtraction = new Subtraction();
  echo "subtraction result: ", $calculation->performCalculation($subtraction)."<br>";
  
  $multiplication = new Multiplication();
  echo "multiplication result: ", $calculation->performCalculation($multiplication)."<br>";
  
  $division = new Division();
  echo "division result: ", $calculation->performCalculation($division)."<br>";
?>
