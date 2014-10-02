<?php

class LabelCombobox
{
   private $classe;
   private $label;
   private $id;
   private $name;
   private $options = array();
   private $errClass;
   
   private $onChange;
   
   function __construct($classe, $name, $label, $options, $errClass)
   {
      $this->classe = $classe;
      $this->name = $name;
      $this->id = $name;
      $this->label = $label;
      $this->options = $options;
      $this->errClass = $errClass;
      
   }
   
   public function ec()
   {
       echo '<div class="lcb"><div class="inputDiv"><label for="' . $this->name . '">' . $this->label . '</label><select name="' . $this->name . '" id="' . $this->name . '" ' . $this->ecOptions() . '/>';
       
       foreach ($this->options AS $option)
       {
        echo "<option value=\"$option[0]\">$option[1]</option>";
       }
       
       echo '</select></div><div class="errorDiv"><span class="' . $this->errClass . '" id="' . $this->name . '_error"> </span></div></div>' . "\n";
   }
   
   public function setOnChange($onChange)
   {
      $this->onChange = $onChange;
   }
   
   private function ecOptions()
   {
      if(isset($this->onChange))
      {
         return 'onchange="' . $this->onChange . '"';
      }
   }
   
}
?>