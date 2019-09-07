<?php
  function is_username_valid($username)
  {
    if (preg_match("/^[a-z]{5,9}$/",$username)) {
      echo "true";
    }
    else {
      echo "false";
    }
  }  

 function is_password_valid($password){
     $valid = preg_match("/[a-zA-Z]+\W[0-9]+/",$password);
     $numPassword = strlen($password);

    if($numPassword < 8 || !$valid){
        echo 'false ';
     } else{
         echo 'true';
     }
 }

  is_username_valid('cod3r');
  echo '<br>';
  is_username_valid('siska');
  echo '<br>';
  is_password_valid('p4s$gW');
  echo '<br>';
  is_password_valid('codeYourFuture!123');

?>