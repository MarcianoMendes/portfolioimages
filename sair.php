<?php 
require_once("index.php");
session_destroy();
header("location: index.php");
?>

