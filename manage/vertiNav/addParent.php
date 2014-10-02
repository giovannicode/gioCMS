<?php

$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . '/gioCMS/config/config.inc.php');
include_once(MYSQL);
include_once(MYSQLF);

include_once(GIOLIB . 'forms/FormCreator.php');
include_once(GIOLIB . 'navigation/VNPLink.php');

include_once(VIEWS . 'header.html');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
   if(DBS_VNPLink(new VNPLink('', $_POST['name'], '/' . $_POST['link'], $_POST['order'])))
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

if(isset($_GET['id']))
{
   $form = new FormCreator('form', 'navForm', 'post', 'manage2.php', '', '');
   $form->addLTB('Name', 'name', '');
   $form->addLTB('Link', 'link', '');
   $form->addLTB('Order', 'order', '');
   $form->addSB('submitBtn', '', '');
   $form->ec();
}

$form = new FormCreator('form', 'adminForm', 'post', $_SERVER['PHP_SELF'], '', '');
$form->addLTB('Name', 'name', '');
$form->addLTB('Link', 'link', '');
$form->addLTB('Order', 'order', '');
$form->addSB('submitBtn', '', '');
$form->ec();

include_once(VIEWS . 'footer.html');
?>