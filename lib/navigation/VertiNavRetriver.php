<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . '/gioCMS/config/config.inc.php');
include_once(MYSQL);

include_once(GIOLIB . 'navigation/VNPLink.php');
include_once(GIOLIB . 'navigation/VNCLink.php');
class VertiNavRetriver
{
   private $links = array();
   private $childLinkks = array();

   function __construct()
   {
      global $dbc;
      
      $q = "SELECT * FROM vnplinks ORDER BY orderx";
      $r = mysqli_query($dbc, $q);
      
      while($row = $r->fetch_object())
      {
         $this->links[] = new VNPLink($row->id, $row->name, $row->link, $row->orderx);
      }
      
      $q = "SELECT * FROM vnclinks ORDER BY orderx";
      $r = mysqli_query($dbc, $q);
      
      while($row = $r->fetch_object())
      {
         $this->childLinks[] = new VNCLink($row->parent_id, $row->name, $row->link, $row->orderx);
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