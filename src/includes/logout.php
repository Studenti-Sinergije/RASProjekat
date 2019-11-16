<?php

require_once("user.php");

if (session_id() == '' || !isset($_SESSION))
    session_start();

if(isset($_SESSION["loggedin"])) {
    $_SESSION = array();
    session_destroy();
}

header("Location: ../index.php");

?>
