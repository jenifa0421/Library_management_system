<?php

session_start();
unset($_SESSION["id"]);
unset($_SESSION["uid"]);
session_destroy();
header("location: home.php");

?>