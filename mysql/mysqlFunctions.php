<?php
function DBS_HNCLink($hnclink)
{
   global $dbc;
   $q = $hnclink->getSaveQuery();
   $r = mysqli_query($dbc, $q);
   
   if(mysqli_error($dbc))
   {
      echo mysqli_error($dbc);
      return false;
   }
   else
   {
      return true;
   }
}

function DBS_HNPLink($hnplink)
{
   global $dbc;
   $q = $hnplink->getSaveQuery();
   $r = mysqli_query($dbc, $q);
   
   if(mysqli_error($dbc))
   {
      echo mysqli_error($dbc);
      return false;
   }
   else
   {
      return true;
   }
}

function DBS_VNPLink($vnplink)
{
   global $dbc;
   $q = "INSERT INTO vnplinks (id, name, link, orderx) VALUES (" . $vnplink->getValues() . ")";
   $r = mysqli_query($dbc, $q);
   
   if(mysqli_error($dbc))
   {
      echo mysqli_error($dbc);
      return false;
   }
   else
   {
      return true;
   }
}

function DBS_VNCLink($vnclink)
{
   global $dbc;
   $q = "INSERT INTO vnclinks (id, parent_id, name, link, orderx) VALUES (" . $vnclink->getValues() . ")";
   $r = mysqli_query($dbc, $q);
   
   if(mysqli_error($dbc))
   {
      echo mysqli_error($dbc);
      return false;
   }
   else
   {
      return true;
   }
}

function DBS_Page($page)
{
   global $dbc;
   $q = $page->getSaveQuery();
   $r = mysqli_query($dbc, $q);
   
   if(mysqli_error($dbc))
   {
      echo mysqli_error($dbc);
      return false;
   }
   else
   {
      return true;
   }
}

function DBS_PagableDir($pagableDir)
{
   global $dbc;
   $q = $pagableDir->getSaveQuery();
   $r = mysqli_query($dbc, $q);
   
   if(mysqli_error($dbc))
   {
      echo mysqli_error($dbc);
      return false;
   }
   else
   {
      return true;
   }
}

/*********************************************************/

function DBG_field($field, $table, $condition, $condiVar)
{
   global $dbc;

   $q = "SELECT $field FROM $table WHERE $condition = $condiVar";
   $r = mysqli_query($dbc, $q);
   
   if(mysqli_error($dbc))
   {
      echo mysqli_error($dbc);
      return false;
   }
   else
   {
      while($row = $r->fetch_assoc())
      {
       $answer = $row[$field];
      }
   
      return $answer;     
   }
}

function DBG_CB($table)
{
   $cbArray;
   
   global $dbc;
   
   $q = "SELECT id, name FROM $table";
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
   
      if(isset($cbArray))
      {
         return $cbArray;
      }    
   }
}

function DBG_FileName($id, $table)
{
   global $dbc;

   $q = "SELECT file_name FROM $table WHERE id = $id";
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
       $fileName = $row->file_name;
      }
   
      return $fileName;     
   }
}


function DBG_Location($id, $table)
{
   global $dbc;

   $q = "SELECT location FROM $table WHERE id = $id";
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
       $link = $row->location;
      }
   
      return $link;     
   }
}

?>