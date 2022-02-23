<?php
session_start();
$parametros = filter_input_array(INPUT_GET);
$tabela = $_SESSION["tabela"];
$id = $parametros["id"];
excluir($tabela,$id);
redirecionar($tabela);

function excluir($tabela, $id) {
  require_once 'classes/Exclusao.class.php';
  $exclusao = new Exclusao($tabela, $id);
  $exclusao->executar();
}

function redirecionar($tabela)
{
  echo "<html><head><title>window.location</title>
  <script type='text/javascript'>
  window.location='lista$tabela.php';</script>
  </head><body></body></html>";
}
?>
