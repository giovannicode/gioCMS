<?php

class Product
{
   private $id;
   private $subCategoryID;
   private $categoryID;
   private $name;
   private $image;
   private $price;
   private $description;
   
   function __construct($id, $subCategoryID, $categoryID, $name, $image, $price, $description)
   {
      $this->id = $id;
      $this->subCategoryID = $subCategoryID;
      $this->categoryID = $categoryID;
      $this->name = $name;
      $this->image = $image;
      $this->price = $price;
      $this->description = $description;
      
   }
   
   function getQuery()
   {
      return "INSERT INTO products(id, sub_category_id, category_id, name, image, price, description) VALUES (NULL, '$this->subCategoryID', '$this->categoryID', '$this->name', '$this->image', $this->price, '$this->description')";
   }
}
?>