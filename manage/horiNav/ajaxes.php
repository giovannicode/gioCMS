<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . '/gioCMS/config/config.inc.php');
include_once(MYSQL);
include_once(MYSQLF);
include_once(OPTMYSQL);
include_once(OPTMYSQLF);

$parent_id = $_GET['parent_id'];

$q = "SELECT id, name FROM gio_pages WHERE parent_id = $parent_id";
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