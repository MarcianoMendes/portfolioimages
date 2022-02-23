<?php
function getNomePagina(){
  $pagina = $_SERVER["REQUEST_URI"];
  $pagina = explode("/",$pagina);
  $pagina = end($pagina);
  $pagina = explode(".",$pagina);
  return($pagina[0]);
}

function definirComoAtivo($pagina){
  if(getNomePagina() == $pagina){
    return("class='active'");
  }
}

$html = "<link rel='stylesheet' type='text/css' href='bootstrap/css/bootstrap.css'>";
$html .= "<ul class='nav nav-pills'>";
$html .= "<li role='presentation' " . definirComoAtivo("listaperfis") . "><a href='listaperfis.php'>Perfis</a></li>";
$html .= "<li role='presentation' " . definirComoAtivo("listausuarios") . "><a href='listausuarios.php'>Usuarios</a></li>";
$html .= "<li role='presentation' " . definirComoAtivo("listaportfolios") . "><a href='listaportfolios.php'>Portfolios</a></li>";
$html .= "<li role='presentation' " . definirComoAtivo("listaimagens") . "><a href='listaimagens.php'>Imagens</a></li>";
$html .= "<li role='presentation'><a href='sair.php'>Sair</a></li></ul>";
//$html .= "<div class='alert alert-danger' role='alert'>Acesso negado ao recurso!</div>";
echo $html;
?>
