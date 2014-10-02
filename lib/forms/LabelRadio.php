<?php
class LabelRadio
{
   private $label;
   private $id;
   private $name;
   private $options = array();
   private $ecType = 0;
   

   function __construct($name, $label, $options)
   {
      $this->id = $name;
      $this->name = $name;
      $this->label = $label;
      $this->options = $options;
   }
   
   public function ec()
   {
      if($this->ecType == 0)
      {
         $this->ec0();
      }
      elseif($this->ecType == 1)
      {
         $this->ec1();
      }
   }
   
   public function setEcType($type)
   {
      $this->ecType = $type;
   }
   
   private function ec0()
   {
      echo '<div class="lr"><div class="inputDiv"><fieldset><legend>' . $this->label . '</legend>' . "\n";
      
      foreach($this->options AS $option)
      {
         echo '<input selected="false" type="radio" id="' . $this->id . '" name="' . $this->name . '" value="' . $option[0] . '"/>' . $option[1] . '<br/>' . "\n";
      }
      
      echo '</fieldset></div></div>' . "\n";
   }
   
   private function ec1()
   {
      echo '<div class="lr2"><div class="inputDiv"><fieldset><legend>' . $this->label . '</legend>' . "\n";
      
      foreach($this->options AS $option)
      {
         echo '<div class="lrBtn"><input type="radio" name="' . $this->name . '" value="' . $option[0] . '"/>' . $option[1] . '</div>' . "\n";
      }
      
      echo '</fieldset></div></div>' . "\n";
   }
}
?>