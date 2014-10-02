<?
function DBS_Category($category)
{
   global $dbc;
   
   $q = "INSERT INTO categories(id, name) VALUES (" . $category->getValues() . ")";
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

function DBS_SubCategory($subCategory)
{
   global $dbc;
   
   $q = $subCategory->getQuery();
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

function DBS_Product($product)
{
      global $dbc;
   
   $q = $product->getQuery();
   echo $q;
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

function  DBS_Customer($customer)
{
   global $opdbc;
   
   $q = $customer->getSaveQuery();
   $r = mysqli_query($opdbc, $q);
   
   if(mysqli_error($opdbc))
   {
     echo mysqli_error($opdbc);
     return false;
   }
   else
   {
     return true;
   }
}
      

function  DBS_Comment($comment)
{
   global $opdbc;
   
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