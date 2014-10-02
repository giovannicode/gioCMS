<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . '/gioCMS/config/config.inc.php');
include_once(MYSQL);

include_once(GIOLIB . 'navigation/HNPLink.php');
include_once(GIOLIB . 'navigation/HNCLink.php');
class HoriNavRetriver
{
   private $links = array();
   private $childLinkks = array();

   function __construct()
   {
      global $dbc;
      
      $q = "SELECT * FROM hnplinks ORDER BY orderx";
      $r = mysqli_query($dbc, $q);
      
      while($row = $r->fetch_object())
      {
         $this->links[] = new HNPLink($row->id, $row->name, $row->location, $row->orderx);
      }
      
      $q = "SELECT * FROM hnclinks ORDER BY orderx";
      $r = mysqli_query($dbc, $q);
      
      while($row = $r->fetch_object())
      {
         $this->childLinks[] = new HNCLink($row->parent_id, $row->name, $row->location, $row->orderx);
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