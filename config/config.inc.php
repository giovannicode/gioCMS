<?php

$live = false;

$contact_email = 'you@example.com';
$new = "wwew";
$newPageString = "<?php\n" . 
'$root = $_SERVER[\'DOCUMENT_ROOT\'];' . "\n" . 
'include_once($root . \'/gioCMS/config/config.inc.php\');' . "\n" . 
"include_once(MYSQL);" . "\n" . 
"include_once(MYSQLF);" . "\n" . 
"include_once(VIEWS . 'header.html');" . "\n" . 
"include_once(VIEWS . 'footer.html');" . "\n" .
"?>";

define('BASE_URI', '/home/garroyo0/');
define('BASE_URL', $_SERVER['DOCUMENT_ROOT']);
define('MYSQL', BASE_URI . 'myAccess/mysql.inc.php');

define('GIOCMS', BASE_URL . '/gioCMS/');
define('MYSQLF', GIOCMS . 'mysql/mysqlFunctions.php');
define('GIOLIB', GIOCMS . 'lib/');
define('VIEWS', GIOCMS . 'views/');

define('OPTCMS', GIOCMS . 'optionCMS/');
define('OPTMYSQL', OPTCMS . 'mysql/mysql.inc.php');
define('OPTMYSQLF', OPTCMS . 'mysql/mysqlFunctions.php');
define('EULIB', OPTCMS . 'euLib/');

define('NEWPAGE_STRING', $newPageString);



session_start();

function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars)
{

   global $live, $contact_email;

   $message = "An error occured in script '$e_file' on line $e_line:\n$e_message\n";
   
   $message .= "<pre>" . print_r(debug_backtrace(), 1) . "</pre>\n";
   
   if(!$live)
   {
      echo '<div class="error">' . nl2br($message) . '</div>';
   }
   else
   {
      error_log($message, 1, $contact_email, 'FROM:admin@example.com');
      
      if($e_number != $E_NOTICE)
      {
         echo '<div class="error">A system error occured. We apologize for the inconvinience.</div>';
      }     
   }  
   return true;
}

set_error_handler('my_error_handler');
 
function redirect_invalid_user($check = 'user_id', $destination, $protocol = 'http://')
{
   if(!isset($_SESSION[$check]))
   {
      $url = $protocol. 'businessdotlink.com/'.$destination;
      header("Location: $url");
      exit();
   }
}