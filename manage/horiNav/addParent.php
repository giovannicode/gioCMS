<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . '/gioCMS/config/config.inc.php');
include_once(MYSQL);
include_once(MYSQLF);

include_once(GIOLIB . 'forms/FormCreator.php');
include_once(GIOLIB . 'navigation/HNPLink.php');

include(VIEWS . 'header.html');


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
   /*if($_POST['type'] == 'newFolder')
   {
	   if(DBS_HNPLink(new HNPLink('', $_POST['name'], '/' . $_POST['link'], $_POST['order'])))
	   {
	      if(mkdir(BASE_URL . '/' . $_POST['link']))
	      {
	         $fw = fopen(BASE_URL . '/' . $_POST['link']. '/index.php', 'a+');
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
   else*/if($_POST['type'] == 'newFile')
   {
   }
   else if($_POST['type'] == 'existFolder')
   {
      $link = DBG_Link($_POST['pgDir'], 'gio_pagabledirs');
      if(DBS_HNPLink(new HNPLink('', $_POST['name'], $link, $_POST['order'])))
      {
         echo 'sucess';
      }
      else
      {
         echo 'failure';
      }
   }
   else if($_POST['type'] == 'existFile')
   {
   }
}



$form = new FormCreator('form', 'adminForm', 'post', $_SERVER['PHP_SELF'], '', '');

$options = array(
//array('newFolder', 'New Folder'),
array('existFolder', 'Existing Folder'),
//array('newFile', 'New File'),
array('existFile', 'Existing File'));
$form->addLR('type', 'Type', $options);

$form->addLTB('name', 'Name', '');

$options = DBG_CB('gio_pagabledirs');
$ajaxOb = $form->addLCB('pgDir', 'Dir',$options);
$ajaxOb->setOnChange('getPages(this.value)');


$options = DBG_CB('gio_pages');
$form->addLCB('pgs', 'Page', $options);

//$form->addLTB('link', 'Link', '');
$form->addLTB('order', 'Order', '');
$form->addSB('submitBtn', '', '');
$form->ec();

echo'<script type="text/javascript">
$("#pgDir").prop("disabled", true);
$("input[name=\'type\']").change(function() 
{
   $("#pgDir").prop("disabled", true);
   $("#pgs").prop("disabled", true);
   $("#link").prop("disabled", true);
   
   /*if($("input[@name=type]:checked").val() == "newFolder")
   {
      $("#link").prop("disabled", false);
   }
   else*/if($("input[@name=type]:checked").val() == "existFolder")
   {
      $("#pgDir").prop("disabled", false);
   }
   else if($("input[@name=type]:checked").val() == "existFile")
   {
      $("#pgDir").prop("disabled", false);
      $("#pgs").prop("disabled", false);
   }
});
</script>';
?>
<script type="text/javascript">
function getPages(str)
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
    document.getElementById("pgs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajaxes.php?parent_id="+str,true);
xmlhttp.send();
}
</script>   
<?
include_once(VIEWS . 'footer.html');
?>