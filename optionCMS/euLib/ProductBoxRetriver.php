<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . '/gioCMS/config/config.inc.php');
include_once(EULIB . 'ProductBox.php');

class ProductBoxRetriver
{
   private $products = array();
   
   function __construct($field, $id)
   {
      global $dbc;
      
      $q = "SELECT * FROM products WHERE $field = $id";
      $r = mysqli_query($dbc, $q);
      
      while($row = $r->fetch_object())
      {
         $id = $row->id;
         $name = $row->name;
         $image = $row->image;
         $price = $row->price;
         $description = $row->description;
         
         $this->products[] = new ProductBox($id, $name, $image, $price,$description);
       }
    }
    
    public function ec()
    {
       $this->ecHTML();
       $this->ecCSS();
    }
       
    private function ecHTML()
    {
      echo '<div class="ProductBoxRetriver">';
      foreach($this->products as $product)
      {
	 $product->ec();
      } 
      echo '</div>';
    }
    
    private function ecCSS()
    {
	 echo'<style type="text/css">
	 
	.ProductBoxRetriver
	{
	  float: left;
	  width: 800px;
	  
	} 
	 
	.productBox
	{
	   border: 2px solid rgb(200, 80, 160);
	   width: 200px;
	   background-color: rgb(255, 237, 232);
	   float: left;
	   margin: 2px;
	}
	.productBox p
	{
	   margin: 2px;
	}
	
	.infoBox
	{
	   border-top: 2px solid black;
	   border-bottom: 1px solid black;
	}
	
	
	.name
	{
	   color: gray;
	   font-family: Arial;
	   font-weight: 600;
	   font-size: 17px;
	   font-style: italic;
	
	}
	
	
	.price
	{
	   color: rgb(80, 160, 200);
	   font-family: Arial Narrow;
	   font-weight: 600;
	   font-size: 15px;
	}
	
	.description
	{
	   color: rgb(50, 50, 50);
	   font-family: Arial;
	   font-size: 15px;
	}
	-->
	</style>';
    }
         

}

?>