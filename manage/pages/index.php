<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . '/gioCMS/config/config.inc.php');
include_once(MYSQL);
include_once(MYSQLF);

include_once(VIEWS . 'header.html');

echo'<a href="/gioCMS/manage/pages/newPage.php">New Page</a>';
echo'<a href="/gioCMS/manage/pages/newPgDir.php">New Pagable Directory</a>';

include_once(VIEWS . 'footer.html');
?>