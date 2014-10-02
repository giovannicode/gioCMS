<?php

class Category
{

   private $id;
   private $name;
   private $childLinks;
   
   private static $parentNum = 1;
   
   function __construct($id, $name)
   {
      $this->id = $id;
      $this->name = $name;
   }
   
   public function getID()
   {
       return $this->id;
   }
   
   public function getName()
   {
      return $this->name;
   }      
           
   public function addCLink($Clink)
   {
      $this->childLinks[] = $Clink;
   }
   
   public function getValues()
   {
      return "'NULL', '$this->name'";
   }
   
      public function ec()
   {
      echo '<li id="' . self::$parentNum . '"><a href="/browse.php?catID=' . $this->id . '">' . $this->name . '</a><span class="button" id="' . self::$parentNum * 100 . '" style="font-size:25px" onclick="myFunction(this.id)"><b>+</b></span>' . "\n";
      if(isset($this->childLinks))
      {
         echo'<ul>';
         foreach($this->childLinks AS $clink)
         {
            echo '<li><a href="/browse.php?subCatID=' . $clink->getID() . '">' . $clink->getName() . '</a></li>' . "\n";
         }
         echo'</ul>';
      }
      echo "</li>\n\n";
      self::$parentNum++;
   }
}
?>