<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . '/gioCMS/config/config.inc.php');
include_once(MYSQL);
include_once(MYSQLF);

include_once(GIOCMS . 'forms/FormCreator.php');
include_once(EULIB . 'Product.php');
include_once(BASE_URL . '/manager/mysql/mysqlFunctions.php');
include_once(VIEWS . 'header.html');
   
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
   echo 'it got here';
   echo 'The value is' . $_POST['subCategory'];
   if(is_uploaded_file($_FILES['picture']['tmp_name']) && ($_FILES['picture']['error'] == UPLOAD_ERR_OK))
   {
   
      $file = $_FILES['picture'];
      
      $newName = sha1($file['name'] . uniqid('', true));
      $des = BASE_URL . '/manager/images/';
      
      if(move_uploaded_file($file['tmp_name'], $des . $newName . '.jpg'))
      {
         
         if(DBS_Product(new Product('', $_POST['subCategory'], $_POST['category'], $_POST['name'], '/manager/images/' . $newName . '.jpg' , $_POST['price'], $_POST['description'])))
         {
         }
         else
         {
            echo 'it did not work';
            unlink($file['tmp_name']);
         }
      }
      else
      {
         echo 'The file could not be moved';
         unlink($file['tmp_name']);
      }
   }
   else
   {
      echo 'There was an upload error';
   }
}
   
$cbArray = DBG_CB('categories');
$form = new FormCreator('form', 'productForm', 'post', $_SERVER['PHP_SELF'], '', '');
$form->postEnctype();
$ajaxOb = $form->addLCB('Category', 'category', $cbArray);
$ajaxOb->setOnChange('getSubCats(this.value)');
$form->addLCB('SubCategory', 'subCategory',$cbArray);
$form->addLTB('Name', 'name', '');
$form->addLF('Picture', 'picture');
$form->addLTB('Price', 'price', '');
$form->addLTA('Description', 'description', 5, 30, '');
$form->addSB('submitBtn', '', '');
$form->ec();
?>
<script type="text/javascript">
function getSubCats(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("subCategory").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","subCats.php?category_id="+str,true);
xmlhttp.send();
}
</script>