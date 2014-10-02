<?php

class SubCategory
{

   private $id;
   private $parent_id;
   private $name;
   
   function __construct($id, $parent_id, $name)
   {
      $this->id = $id;
      $this->parent_id = $parent_id;
      $this->name = $name;
   }
   
   public function getPID()
   {
      return $this->parent_id;
   } 
   
   public function getID()
   {
      return $this->id;
   }
   
   public function getName()
   {
      return $this->name;
   }
   
   public function getQuery()
   {
      return "INSERT INTO subcategories (id, parent_id, name) VALUES ('','$this->parent_id', '$this->name');";
   }
}
?>