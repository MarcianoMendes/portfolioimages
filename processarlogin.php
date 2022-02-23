<?php
session_start();
require_once("conexao.php");
$login = $_POST['usuario'];
$senha = $_POST['senha'];
$sql = $conexao_pdo->prepare('select usuarios.id, nivel_acesso from usuarios inner join perfis on id_perfil = perfis.id where login = :login and pwd = :senha');
$sql->bindValue(":login", $login);
$sql->bindValue(":senha", $senha);
$execucao = $sql->execute();
$resultado = $sql->fetch(PDO::FETCH_ASSOC);
if($resultado) {
	$_SESSION["usuario"] = $resultado["id"];
	$_SESSION["nivel_acesso"] = $resultado["nivel_acesso"];
	echo "valido";
	return;
}

echo "Erro";

?>
