<?php

class OrderContent
{
   private $id;
   private $order_id;
   private $productID;
   private $productPrice;
   private $qty;
   private $total;
   
   function __construct($id, $order_id, $productID, $productPrice, $qty, $total)
   {
      $this->id = $id;
      $this->orderID = $orderID;
      $this->productID = $productID;
      $this->productPrice = $productPrice;
      $this->qty = $qty;
      $this->total = $total;
   }
   
   public function getQuery()
   {
      return "INSERT INTO order_contents (id, order_id, product_id, product_price, qty, total) VALUES ('$this->id', '$this->orderID', '$this->productID'" . 
      "'$this->productPrice', $this->qty', $this->total')";
   }
}