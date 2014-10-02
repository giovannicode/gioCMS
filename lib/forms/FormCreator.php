<?php
include ('LabelTextbox.php');
include ('LabelTextarea.php');
include ('LabelCombobox.php');
include ('LabelRadio.php');
include ('LabelFile.php');
include ('HiddenInput.php');
include('SbmButton.php');


class formCreator
{
    private $classe;
    private $name;
    private $id;
    private $location;
    private $method;
    private $onSubmit;
    private $errClass;
    private $inputs = array();
    private $index = 0;
    private $sbIndex;
    
    private $enctype;
    
    function __construct($classe, $id, $method, $location, $onSubmit, $errClass)
    {
       $this->classe = $classe;
       $this->name = $id;
       $this->id = $id;
       $this->location = $location;
       $this->method = $method;
       $this->onSubmit = $onSubmit;
       $this->errClass = $errClass;
    }
    
    public function postEnctype()
    {
       $this->enctype = "set";
    }
    
    public function addLTB($name, $label, $text)
    {
       $this->inputs[] = new LabelTextbox($this->classe, $name, $label, $text, $this->errClass);
       
       $temp = $this->index;
       $this->index++;
       return $temp;
    }
    
    public function addLTA($name, $label, $rows, $cols, $text)
    {
    	$this->inputs[] = new LabelTextarea($this->classe, $name, $label, $rows, $cols, $text, $this->errClass);
    	
    	$temp = $this->index;
        $this->index++;
        return $temp;
    }
    
    public function addLCB($name, $label, $options)
    {
       $this->inputs[] = new LabelCombobox($this->classe, $name, $label, $options, $this->errClass);
       
       $temp = $this->index;
       $this->index++;
       return $this->inputs[$this->index-1];
    }
    
    public function addLR($name, $label, $options)
    {
       $this->inputs[] = new LabelRadio($name, $label, $options);
       
       $temp = $this->index;
       $this->index++;
       return $temp;
    }
    
    public function addLF($name, $label)
    {
       $this->inputs[] = new LabelFile($this->classe, $name, $label, $this->errClass);
       
       $temp = $this->index;
       $this->index++;
       return $temp;
    } 
    
    public function addHI($name, $value)
    {
       $this->inputs[] = new HiddenInput($name, $value);
       
       $temp = $this->index;
       $this->index++;
       return $temp;
    }
    
    public function addSB($id, $subVal, $resVal)
    {
       $this->inputs[] = new SbmButton($id, $subVal, $resVal);
       
       $temp = $this->index;
       $this->sbIndex = $this->index;
       return $temp;
    }
    
    public function setEcType($index, $type)
    {
       $this->inputs[$index]->setEcType($type);
    }
    
    public function ec()
    {
       $this->ecHTML();
       $this->ecCSS();
    }
    
    private function ecHTML()
    {
      echo '<form class="' . $this->classe . '" id="' . $this->id . '" name="' . $this->name . '" method="' . $this->method . '" action="' .         $this->location . '" onsubmit="' . $this->onSubmit . '" ' . $this->ecEnctype() . '>' . "\n";
       foreach ($this->inputs AS $input)
       {
          $input->ec();
       }
       echo "\n" . '</form>' . "\n";
       $this->inputs[$this->sbIndex]->ecCSS();
    }
    
    private function ecCSS()
    {
       $id = $this->id;
       
       echo '<style type="text/css"><!--' . "
	#$id
	{
	   float: left;
	}
	
	/***************************/
	#$id  .ltb
	{
	   height: 40px;
	}
	
	#$id .ltb .inputDiv 
	{
	float: left;
	width: 300px;
	}
	
	#$id .ltb .inputDiv label
	{
	   float: left;
	}
	
	#$id .ltb .inputDiv input
	{
	   float: right;
	}
	/*******************************/
	#$id .lcb
	{
	   height: 40px;
	} 
	
	#$id .lcb .inputDiv
	{
	float: left;
	width: 300px;
	}
	
	#$id .lcb .inputDiv label
	{
	   float: left;
	}
	
	#$id .lcb .inputDiv select
	{
	   float: right;
	}
	
	/****************************************/
	#$id .lf
	{
	   height: 40px;
	}
	
	#$id .lf .inputDiv
	{
	   float: left;
	   width: 300px;
	}
	
	#$id .lf .inputDiv label
	{
	   float: left;
	}
	
	#$id .lf .inputDiv input
	{
	   float: right;
	}
	/******************************************/
	
	#$id .lta
	{
	}
	
	#$id .lta .inputDiv label
	{
	  float: left;
	}
	
	#$id .lta .inputDiv textarea;
	{
	   float: right;
	}
	
	/**********************************/
	
	#$id .lta2
	{
	   width: 270px;
	}
	
	#$id .lta2 .inputDiv label
	{
	   float: left;
	}
	
	#$id .lta2 .inputDiv textarea
	{
	   float: left;
	}
	
	/******************************/
	
	#$id .lr2
	{
	}
	
	#$id .lr2 .inputDiv .lrBtn
	{
	   float: left;
	}
	/******************************/
	
	
	#sbmButton
	{
	   float: left;
	}
			
	#$id .errorDiv
	{
	   float: left;
	}
		
	.NAFerror
	{
	  color: red;
	}
	
	--></style>" . "\n";
    }
    
    public function ecEnctype()
    {
       if(isset($this->enctype))
       {
          return 'enctype="multipart/form-data"';
       }
    }
    
    
}
?>