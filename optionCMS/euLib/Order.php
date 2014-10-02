<?php

class Order
{
   private $id;
   private $customerID;
   private $orderDate;
   private $total;
   private $crdtCrdNum;
   
   function __construct($id, $customerID, $orderDate, $total, $credit_card_number)
   {
     $this->id = $id;
     $this->customerID = $customerID;
     $this->orderDate = $orderDate;
     $this->total = $total;
     $this->crdtCrdNum = $crdtCrdNum;
   }

   public function getSaveQuery()
   {
      return "INSERT INTO orders (id, customer_id, order_date, total,credit_card_number) VALUES (NULL, '$this->customerID', '$this->orderDate'," .
      "'$this->total', $this->crdtCrdNum')";
   }
?>