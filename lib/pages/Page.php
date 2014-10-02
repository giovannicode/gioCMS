<?php

class Page
{
   private $id;
   private $parentID;
   private $name;
   private $fileName;
   
   function __construct($id, $parentID, $name, $fileName)
   {
      $this->id = $id;
      $this->parentID = $parentID;
      $this->name = $name;
      $this->fileName = $fileName;
   }
   
   public function getSaveQuery()
   {
      return "INSERT INTO gio_pages (id, parent_id, name, file_name) VALUES (NULL, '$this->parentID', '$this->name', '$this->fileName')";
   }
}