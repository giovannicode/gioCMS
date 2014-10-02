<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . '/gioCMS/config/config.inc.php');
include_once(MYSQL);
include_once(MYSQLF);

include_once(GIOLIB . 'forms/FormCreator.php');

include_once(VIEWS . 'header.html');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
   $parentDir = DBG_field('location', 'opt_pagabledirs', 'id', $_POST['dir']);
   $file = fopen(BASE_URL . $parentDir . '/' . $_POST['pgName'], 'a+');
   fclose($file);
}


$form = new FormCreator('form', 'newPageFrm', 'post', $_SERVER['PHP_SELF'], '', '');
$cbArray = DBG_CB('opt_pagabledirs');
$form->addLCB('Directory', 'dir', $cbArray);
$form->addLTB('Name of Page', 'pgName', '');
$form->addSB('sbBtn','','');
$form->ec();

include_once(VIEWS . 'footer.html');
?>