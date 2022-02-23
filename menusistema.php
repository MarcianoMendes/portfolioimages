<?php
session_start();
if(!isset($_SESSION["usuario"])) {
	require_once("login.php");
	return;
}

require_once("menucruds.php");
?>
