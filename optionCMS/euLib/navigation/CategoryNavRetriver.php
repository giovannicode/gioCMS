<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . '/gioCMS/config/config.inc.php');
include_once(MYSQL);

include_once(EULIB . 'SubCategory.php');
include_once(EULIB . 'Category.php');
class CategoryNavRetriver
{
   private $links = array();
   private $childLinkks = array();

   function __construct()
   {
      global $dbc;
      
      $q = "SELECT * FROM categories ORDER BY name asc ";
      $r = mysqli_query($dbc, $q);
      
      while($row = $r->fetch_object())
      {
         $this->links[] = new Category($row->id, $row->name);
      }
      
      $q = "SELECT * FROM subcategories ORDER BY name asc";
      $r = mysqli_query($dbc, $q);
      
      while($row = $r->fetch_object())
      {
         $this->childLinks[] = new SubCategory($row->id, $row->parent_id, $row->name);
      }
      
      foreach($this->links as $link)
      {
         foreach($this->childLinks AS $childLink)
         {
            if($childLink->getPID() == $link->getID())
            {
               $link->addCLink($childLink);
            }
         }
      }
      
      
   }
   
   public function ec()
   {
      foreach($this->links AS $link)
      {
         $link->ec();
      }
   }
}

?>