<?php

class LabelTextbox
{
    private $classe;
    private $id;
    private $name;
    private $label;
    private $text = "";
    private $errClass;
    
    function __construct($classe, $name, $label, $text, $errClass)
    {
          $this->classe = $classe;
          $this->id = $name;
          $this->name = $name;
          $this->label = $label;
          $this->text = $text;
          $this->errClass = $errClass;
    }
    
    public function ec()
    {
       echo '<div class="ltb"><div class="inputDiv"><label for="' . $this->name . '">' . $this->label . '</label><input type="text" name="' . $this->name . '" id="' . $this->name . '" value="' .                    $this->text . '"/></div><div class="errorDiv"><span class="' . $this->errClass . '" id="' . $this->name . '_error"> </span></div></div>' . "\n";
    }
}

?>