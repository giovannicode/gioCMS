<?php

$root = $_SERVER['DOCUMENT_ROOT'];
$live = false;

$contact_email = 'you@example.com';

define('BASE_URI', 'www.imperialmoves.com/');
define('BASE_URL', 'www.imperialmoves.com/');
define('MYSQL', $root . '/mysql.inc.php');

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