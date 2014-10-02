<?php
function DBS_HNCLink($hnclink)
{
   global $dbc;
   $q = "INSERT INTO hnclinks (id, parent_id, name, link, orderx) VALUES (" . $hnclink->getValues() . ")";
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
   $q = "INSERT INTO hnplinks (id, name, link, orderx) VALUES (" . $hnplink->getValues() . ")";
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

function  DBS_comment($comment)
{
   global $dbc;
   
   $q = "INSERT INTO comments (id, name, comment) VALUES (" . $comment->getValues() . ")";
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

function DBS_File($file)
{
   global $dbc;
   
   $q = "INSERT INTO files (id, name, description, location) VALUES (" . $file->getValues() . ")";
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
?>