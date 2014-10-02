<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . '/gioCMS/config/config.inc.php');
include_once(MYSQL);
include_once(MYSQLF);

include_once(GIOCMS . 'forms/FormCreator.php');
include_once(EULIB . 'SubCategory.php');
include_once(BASE_URL . '/manager/mysql/mysqlFunctions.php');
include_once(VIEWS . 'header.html');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
   if(DBS_SubCategory(new SubCategory('', $_POST['category'], $_POST['name'])));
   {
      echo 'success';
   }
}
$cbData = DBG_CB('categories');
$form = new FormCreator('form', 'categoryForm', 'post', $_SERVER['PHP_SELF'], '', '');
$form->addLCB('Category', 'category', $cbData);
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