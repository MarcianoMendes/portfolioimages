<?php

session_start();
$parametros = filter_input_array(INPUT_GET);
$tabela = $_SESSION["tabela"];
$id = $parametros["id"];
editar($tabela, $id);

function editar($tabela, $id) {
  $arquivo = "cadastro$tabela.php";
  require_once ($arquivo);
  $cadastro->recuperarRegistro($id);
  $tabela = ucfirst($tabela);
  echo $cadastro->criarFormulario("Editando $tabela", "Alterar");
  $parametros = filter_input_array(INPUT_POST);
  if ($parametros["Alterar"] == "Alterar") {
    $cadastro->editarRegistro();
  }
}

?>
