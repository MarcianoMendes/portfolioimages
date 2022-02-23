<?php
session_start();
$tabela = $_SESSION["tabela"];
cadastrar($tabela);

function cadastrar($tabela) {
    $arquivo = "cadastro$tabela.php";
    require_once ($arquivo);
    $tabela = ucfirst($tabela);
    echo $cadastro->criarFormulario("Cadastro de $tabela", "Cadastrar");
    $cadastro->inserirRegistro();
    $_SESSION["cadastrar"] = "sim";
}

?>
