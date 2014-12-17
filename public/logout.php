<?php require_once("../includes/functions.php");?>
<?php 
    session_destroy();
    redirect_to("login.php")
;?>