<?php
    $conexao_mysql = mysql_connect("localhost","root","");
    mysql_select_db("xvants",$conexao_mysql);
	
	$conexao_pdo = new PDO("mysql:host=localhost;dbname=xvants","root","");
?>
