<?php

$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . '/gioCMS/config/config.inc.php');
include_once(MYSQL);
include_once(MYSQLF);

include_once(GIOLIB . 'forms/FormCreator.php');
include_once(GIOLIB . 'navigation/VNCLink.php');

include_once(VIEWS . 'header.html');



if($_SERVER['REQUEST_METHOD'] == 'POST')
{
   $newLink = DBG_Link($_POST['parentID'], 'vnplinks') . $_POST['link'];
   if(DBS_VNCLink(new VNCLink($_POST['parentID'], $_POST['name'], $newLink, $_POST['order'])))
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


   $form = new FormCreator('form', 'navForm', 'post', $_SERVER['PHP_SELF'], '', '');
   $form->addLCB('Parent', 'parentID',DBG_CB('vnplinks') );
   $form->addLTB('Name', 'name', '');
   $form->addLTB('Link', 'link', '');
   $form->addLTB('Order', 'order', '');
   $form->addSB('submitBtn', '', '');
   $form->ec();

include_once(VIEWS . 'footer.html');
?>