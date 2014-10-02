<?php

$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . '/gioCMS/config/config.inc.php');
include_once(MYSQL);
include_once(MYSQLF);

include_once(VIEWS . 'header.html');

include_once(VIEWS . 'footer.html');
?>