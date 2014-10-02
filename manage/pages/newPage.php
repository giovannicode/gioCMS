<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . '/gioCMS/config/config.inc.php');
include_once(MYSQL);
include_once(MYSQLF);

include_once(GIOLIB . 'forms/FormCreator.php');
include_once(GIOLIB . 'pages/Page.php');

include_once(VIEWS . 'header.html');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
   if(DBS_Page(new Page('', $_POST['dir'], $_POST['pgName'], $_POST['fileName'])))
   {
      $parentDir = DBG_Link($_POST['dir'], 'gio_pagabledirs');
      $file = fopen(BASE_URL . '/' . $parentDir . '/' . $_POST['pgName'], 'a+');
      fwrite($file, NEWPAGE_STRING);
      fclose($file);
   }
   else
   {
      echo 'failed';
   }
}


$form = new FormCreator('form', 'newPageFrm', 'post', $_SERVER['PHP_SELF'], '', '');
$cbArray = DBG_CB('gio_pagabledirs');
$form->addLCB('dir', 'Directory', $cbArray);
$form->addLTB('pgName', 'Page Name', '');
$form->addLTB('fileName', 'File Name', '');
$form->addSB('sbBtn','','');
$form->ec();

include_once(VIEWS . 'footer.html');
?>