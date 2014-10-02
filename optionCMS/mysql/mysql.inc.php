<?php
define('OPTDB_USER', 'garroyo0_b12min2');
define('OPTDB_PASSWORD', 'techrun1611');
define('OPTDB_HOST', 'localhost');
define('OPTDB_NAME', 'garroyo0_optionCMS');

$opdbc = mysqli_connect(OPTDB_HOST, OPTDB_USER, OPTDB_PASSWORD, OPTDB_NAME);

mysqli_set_charset($opdbc, 'utf8');
