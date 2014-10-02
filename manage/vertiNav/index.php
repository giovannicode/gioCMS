<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . '/gioCMS/config/config.inc.php');
include_once(MYSQL);
include_once(MYSQLF);

include_once(VIEWS . 'header.html');

echo '<a href="./addParent.php">Add a Parent</a>';
echo '<br/>';
echo '<a href="./addChild.php">Add a Child</a>';
?>