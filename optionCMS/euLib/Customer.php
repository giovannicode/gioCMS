<?php

class Customer
{
   private $id;
   private $email;
   private $username;
   private $password;
   private $firstName;
   private $lastName;
   
   function __construct($id, $email, $username, $password, $firstName, $lastName)
   {
      $this->id = $id;
      $this->email = $email;
      $this->username = $username;
      $this->password = $password;
      $this->firstName = $firstName;
      $this->lastName = $lastName;
   }
   
   public function getSaveQuery()
   {
       return "INSERT INTO customers (id, email, username, password, first_name, last_name) VALUES (NULL, '$this->email', '$this->username', '$this->password'," . 
       "'$this->firstName', '$this->lastName')";
   }
   
   
}
?>