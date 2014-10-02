<?php

class PagableDir
{
   private $id;
   private $name;
   private $location;
   private $cms;
   
   function __construct($id, $name, $location, $cms)
   {
      $this->id = $id;
      $this->name = $name;
      $this->location = $location;
      $this->cms = $cms;
   }
   
   public function getSaveQuery()
   {
      if($this->cms == 0)
      {
         return "INSERT INTO gio_pagabledirs (id, name, location) VALUES (NULL, '$this->name', '$this->location')";
      }
      elseif($this->cms ==1)
      {
         return "INSERT INTO opt_pagabledirs (id, name, location) VALUES (NULL, '$this->name', '$this->location')";
      }
   }
}