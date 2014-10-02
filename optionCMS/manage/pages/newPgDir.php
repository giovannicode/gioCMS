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
   if($_POST['type'] == 'new')
   {
      if(mkdir(OPTCMS . $_POST['compName']))
      {
         echo 'succes';
         DBS_PagableDir(new PagableDir(NULL, $_POST['humName'], '/gioCMS/optionCMS/' . $_POST['compName'], 1));
      }
   }
   else
   {
      DBS_PagableDir(new PagableDir(NULL, $_POST['humName'], '/gioCMS/optionCMS/' . $_POST['compName'], 1));
   }
}


$form = new FormCreator('form', 'pgDirFrm', 'post', $_SERVER['PHP_SELF'], '', '');
$form->addLTB('Human Name', 'humName', '');
$form->addLTB('Computer Name', 'compName', '');
$rbData = array(
array('New', 'new'),
array('Existing', 'exist'));
$form->addLR('Type', 'type', $rbData);
$form->addSB('sbBtn', '', '');
$form->ec();

include_once(VIEWS . 'footer.html');
?>