<?php

class CheckoutBox
{
   private $id;
   private $name;
   private $image;
   private $price;
   private $qty;
   
   function __construct($id, $name, $image, $price, $qty)
   {
      $this->id = $id;
      $this->name = $name;
      $this->image = $image;
      $this->price = $price;
      $this->qty = $qty;
   }
   
   public function ec()
   {
      $this->ecHTML();
      $this->ecCSS();
 
   }
   
   public function ecHTML()
   {
      echo '<div class="CheckoutBox">
      <div class="image">
      <img src="' . $this->image . '" alt="Some shoes" width="200px" height="200px"/>
      </div>
      <div class="name">
      <div class="tableHead">
      <p>
      Product Info      
      </p>
      </div>
      <p>' .
      $this->name . 
      '</p>
      </div>
      <div class="price">
      <div class="tableHead">
      <p>
      Price      
      </p>
      </div>
      <p>' . 
      $this->price . 
      '</p>
      </div>
      <div class="qty">
      <div class="tableHead">
      <p>
      quantity      
      </p>
      </div>
      <p>' . 
      $this->qty . 
      '</p>
      </div>
         </div>';
   }
   
   public function ecCSS()
   {
      echo '<style type="text/css"><!--
      .CheckoutBox
      {
         float: left;
         width: 800px;
         background-color: rgb(235, 250, 235);
      }
      .CheckoutBox div
      {
          float: left;   
      }
      
      .CheckoutBox .tableHead
      {
          width: inherit;
          background-color:rgb(25, 200, 50);
          border: 1px solid blue;
      }
       
      .CheckoutBox p
       {
           text-align: center;
       } 
      
      .CheckoutBox .name
      {
          width: 300px;
      }
      
      .CheckoutBox .price
      {
          width: 150px;
      }
      
      .CheckoutBox .qty
      {
         width: 150px;
      }   
      --></style>';
   }


}
?>