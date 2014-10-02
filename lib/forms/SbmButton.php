<?php

class SbmButton
{
    private $id;
    private $sbmInAct;
    private $sbmAct;
    
    function __construct($id, $sbmInAct, $sbmAct)
    {
       $this->id =$id;
       $this->sbmInAct = $sbmInAct;
       $this->sbmAct = $sbmAct;
    }
    
    public function ec()
    {
       $this->ecHTML();
    }
    
    private function ecHTML()
    {
       echo '<div class="sbmButtom"><input id="' . $this->id . '" type="submit" value = "' . $this->ecValue() .  '"/></div>';  
    } 
    
    public function ecCSS()
    {
       if(strlen($this->sbmInAct) > 0)
       {
       echo'<style type="text/css"><!--
                #' . $this->id .
		'{
		background:url(\'' . $this->sbmInAct . '\') no-repeat;
		width: 100px;
		height: 35px;
		border: none;
		color: transparent;
		}
		
		#' . $this->id . ':hover
		{
		background:url(\'' . $this->sbmAct . '\') no-repeat;
		width: 100px;
		height: 35px;
		border: none;
		color: transparent;
		}
		--></style>';
       }
    }
    
    private function ecValue()
    {
       if(strlen($this->sbmInAct) == 0)
       {
          return "submit";
       }
    }
}

?>