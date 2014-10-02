<?php

$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . '/gioCMS/config/config.inc.php');
include_once(MYSQL);
include_once(MYSQLF);

include_once(GIOLIB . 'forms/FormCreator.php');
include_once(GIOLIB . 'navigation/HNCLink.php');

include(VIEWS . 'header.html');


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
   if($_POST['type'] == 'newFolder')
   {
	   $newLink = DBG_Location($_POST['parentID'], 'hnplinks') . $_POST['link'];
	   if(DBS_HNCLink(new HNCLink($_POST['parentID'], $_POST['name'], $newLink, $_POST['order'])))
	   {
	      if(mkdir(BASE_URL . $newLink))
	      {
	         $fw = fopen(BASE_URL . $newLink. '/index.php', 'a+');
	         fwrite($fw, NEWPAGE_STRING);
	         fclose($fw);
	         echo 'sucess!';
	      }
	      else
	      {
	         echo 'Could not create directory';
	      }
	   }
	   else
	   {
	      echo 'failure';
	   }
   }
   elseif($_POST['type'] == 'existFile')
   {
      	   $newLink = DBG_Location($_POST['parentDir'] ,'gio_pagabledirs') .  '/' . DBG_FileName($_POST['page'], 'gio_pages');
	   if(DBS_HNCLink(new HNCLink($_POST['parentNav'], $_POST['name'], $newLink, $_POST['order'])))
	   {
              echo 'Link Created';
	   }
	   else
	   {
	      echo 'failure';
	   }
   }
}

   

   $form = new FormCreator('form', 'navForm', 'post', $_SERVER['PHP_SELF'], '', '');
   
   $form->addLCB('parentNav', 'Parent Nav', DBG_CB('hnplinks'));
   
   $options = array(
   array('newFolder', 'New Folder'),
   array('existFolder', 'Existing Folder'),
   array('newFile', 'New File'),
   array('existFile', 'Existing File'));
   $form->addLR('type','Type', $options);
   
   
   $ajaxOb = $form->addLCB('parentDir', 'ParentDirectory',DBG_CB('gio_pagabledirs'));
   $ajaxOb->setOnChange('getSubCats(this.value)');
   
   $form->addLCB('page', 'Page', DBG_CB('gio_pages'));
   $form->addLTB('name', 'Name', '');
   $form->addLTB('fileName', 'File Name', '');
   $form->addLTB('link', 'Link', '');
   $form->addLTB('order', 'Order', '');
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
    document.getElementById("pageID").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajaxes.php?parent_id="+str,true);
xmlhttp.send();
}
</script>   
<?
include_once(VIEWS . 'footer.html');
?>

 