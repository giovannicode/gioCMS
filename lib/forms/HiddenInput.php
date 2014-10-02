<?php

class HiddenInput
{
   private $name;
   private $value;
   
   function __construct($name, $value)
   {
      $this->name = $name;
      $this->value = $value;
   }
   
   public function ec()
   {
      echo '<input type="hidden" name="' . $this->name . '" value="' . $this->value . '"/>' . "\n";
   }
      
      
}
?>