<?php

class LabelFile
{
    private $classe;
    private $label;
    private $id;
    private $name;
    private $errClass;

   function __construct($classe, $label, $name, $errClass)
   {
          $this->classe = $classe;
          $this->label = $label;
          $this->name = $name;
          $this->id = $name;
          $this->errClass = $errClass;
   }
   
    public function ec()
    {
       echo '<div class="lf"><div class="inputDiv"><label for="' . $this->name . '">' . $this->label . '</label><input type="file" name="' . $this->name . '" id="' . $this->name . '"/></div><div class="errorDiv"><span class="' . $this->errClass . '" id="' . $this->name . '_error"> </span></div></div>' . "\n";
    }
   
   
}

?>