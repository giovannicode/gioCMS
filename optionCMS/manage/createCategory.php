<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . '/gioCMS/config/config.inc.php');
include_once(MYSQL);
include_once(MYSQLF);

include_once(GIOCMS . 'forms/FormCreator.php');
include_once(EULIB . 'Category.php');
include_once(VIEWS . 'header.html');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
   if(DBS_Category(new Category('', $_POST['name'])));
   {
      echo 'success';
   }
}

$form = new FormCreator('form', 'categoryForm', 'post', $_SERVER['PHP_SELF'], '', '');
$form->addLTB('Name', 'name', '');
$form->addSB('submitBtn', '', '');
$form->ec();
?>
<style type="text/css">
.form
{
   background-color: rgb(234, 23, 74);
}
</style>