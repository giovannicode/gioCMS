<?php

class ProductBox
{
   private $id;
   private $name;
   private $image;
   private $price;
   private $description;
   
   function __construct($id, $name, $image, $price, $description)
   {
      $this->id = $id;
      $this->name = $name;
      $this->image = $image;
      $this->price = $price;
      $this->description = $description;
   }
   
   function ec()
   {
      echo '<div class="productBox"/>
<img src="' . $this->image . '" alt="a picture" width="200px" height="200px"/>
<div class="infoBox">
<p>
<span class = "name">' . $this-> name . '</span>
</p>
<p>
<span class="price">&#36;' . $this->price . '</span>
</p>
<p>
<span class="description">' . $this->description . '</span>
</p>
<a href="/checkout.php?id='. $this->id . '">Button</a>
</div>
</div>';
      
   }
   

}
?>