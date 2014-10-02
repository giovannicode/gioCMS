<?php

class HNPLink
{
   private $id;
   private $name;
   private $linkx;
   private $order;
   
   private $childLinks;

   function __construct($id, $name, $linkx, $order)
   {
      $this->id = $id;
      $this->name = $name;
      $this->linkx = $linkx;
      $this->order = $order;
   }
   
   public function getID()
   {
      return $this->id;
   }
   
   public function addCLink($CLink)
   {
      $this->childLinks[] = $CLink;
   }
   
   public function ec()
   {
      echo '<li><a href="' . $this->linkx . '">' . $this->name . '</a>' . "\n";
      if(isset($this->childLinks))
      {
         echo'<ul>';
         foreach($this->childLinks AS $clink)
         {
            echo '<li><a href="' . $clink->getLink() . '">' . $clink->getName() . '</a></li>' . "\n";
         }
         echo'</ul>';
      }
      echo "</li>\n\n";
   }
   
   public function getSaveQuery()
   {
      return "INSERT INTO hnplinks (id, name, location, orderx) VALUES (NULL, '$this->name', '$this->linkx', '$this->order')";
   }
}

?>