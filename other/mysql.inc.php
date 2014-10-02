<?php   ?>
define('DB_USER', 'garroyo2_b12min1');
define('DB_PASSWORD', 'techrun1611');
define('DB_HOST', 'localhost');
define('DB_NAME', 'garroyo2_business');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

mysqli_set_charset($dbc, 'utf8');

function escape_data($data)
{
   global $dbc;
   
   if(get_magic_quotes_gpc())
   {
      $data = stripslashes($data);
   }
   
   return mysqli_real_escape_string($dbc, trim($data));
}

function get_password_hash($password)
{
   global $dbc;
   
   return mysqli_real_escape_string($dbc, hash_hmac('sha256', $password, 'c#haRl895', true));
}

