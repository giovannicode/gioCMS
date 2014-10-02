<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . '/gioCMS/config/config.inc.php');
include_once(MYSQL);
include_once(MYSQLF);


$category_id = $_GET['category_id'];

$q = "SELECT id, name FROM subcategories WHERE parent_id = $category_id";
$r = mysqli_query($dbc, $q);

   if(mysqli_error($dbc))
   {
      echo mysqli_error($dbc);
      return false;
   }
   else
   {
      while ($row = $r->fetch_object())
      {
       $cbArray[] = array($row->id, $row->name);
      }
      
      foreach ($cbArray AS $option)
      {
        echo "<option value=\"$option[0]\">$option[1]</option>";
      }
   
      return $cbArray;     
   }



?>