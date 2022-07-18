<?php
    include "class.email.php";
    include "../views/index.php";
    $ref = new Email();
    $useremail = $_POST['email'];
    $message = $_POST['msg'];
    
    $ref->SendEmail($useremail, "MR.", "Msg from Sether", $message);
    
   
?>