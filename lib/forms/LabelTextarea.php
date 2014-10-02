<?php

class LabelTextarea
{
        private $classe;
	private $label;
	private $name;
	private $rows;
	private $cols;
	private $text = "";
	private $ecType = 0;
	private $errClass;
	
	function __construct($classe, $label, $name, $rows, $cols, $text, $errClass)
	{
	  $this->classe = $classe;
	  $this->label = $label;
	  $this->name = $name;
	  $this->rows = $rows;
	  $this->cols = $cols;
	  $this->text = $text;
	  $this->errClass = $errClass;
	  
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
           echo '<div class="lta"><div class="inputDiv"><label for="' . $this->name . '">' . $this->label . '</label>
           <textarea name="' . $this->name . '" rows="' . $this->rows . '" cols="' . $this->cols . '">' . $this->text . '</textarea></div>
           <div class="errorDiv"><span class="' . $this->errClass . '" id="' . $this->name . '_error"></span></div></div>' . "\n";
	}
	
	private function ec1()
	{
	   echo '<div class="lta2"><div class="inputDiv"><label for="' . $this->name . '">' . $this->label . '</label>
           <textarea name="' . $this->name . '" rows="' . $this->rows . '" cols="' . $this->cols . '">' . $this->text . '</textarea></div>
           <div class="errorDiv"><span class="' . $this->errClass . '" id="' . $this->name . '_error"></span></div></div>' . "\n";
	}
}
?>