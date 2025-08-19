<?php
session_start();
session_destroy();
header("location:/todo/login.php");

?>