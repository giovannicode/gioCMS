<?php

class VNPLink
{
   private $id;
   private $name;
   private $linkx;
   private $order;
   
   private static $parentNum = 1;
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
      echo '<li id="' . self::$parentNum . '"><a href="' . $this->linkx . '">' . $this->name . '</a><span class="button" id="' . self::$parentNum * 100 . '" style="font-size:25px" onclick="myFunction(this.id)"><b>+</b></span>' . "\n";
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
      self::$parentNum++;
   }
   
   public function getValues()
   {
      return "'NULL', '$this->name', '$this->linkx', '$this->order'";
   }
}

?>