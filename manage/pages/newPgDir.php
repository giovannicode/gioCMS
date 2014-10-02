<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . '/gioCMS/config/config.inc.php');
include_once(MYSQL);
include_once(MYSQLF);

include_once(GIOLIB . 'forms/FormCreator.php');
include_once(GIOLIB . 'pages/PagableDir.php');

include_once(VIEWS . 'header.html');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
   if(mkdir(BASE_URL . '/' . $_POST['compName']))
   {
      echo 'succes';
      DBS_PagableDir(new PagableDir(NULL, $_POST['humName'], '/' . $_POST['compName'], 0));
   }
}


$form = new FormCreator('form', 'pgDirFrm', 'post', $_SERVER['PHP_SELF'], '', '');
$form->addLTB('Human Name', 'humName', '');
$form->addLTB('Computer Name', 'compName', '');
$form->addSB('sbBtn', '', '');
$form->ec();

include_once(VIEWS . 'footer.html');
?>