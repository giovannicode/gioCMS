<?php

class VNCLink
{
   private $parentID;
   private $name;
   private $link;
   private $order;
   

   function __construct($parentID, $name, $link, $order)
   {
      $this->parentID = $parentID;
      $this->name = $name;
      $this->link = $link;
      $this->order = $order;
   }
   
   public function getPID()
   {
      return $this->parentID;
   }
   
   public function getName()
   {
      return $this->name;
   }
   
   public function getLink()
   {
      return $this->link;
   }
   
   function getValues()
   {
      return "NULL, '$this->parentID', '$this->name', '$this->link', '$this->order'";
   }
   
}

?>