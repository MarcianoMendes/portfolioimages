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

  $html = "<!DOCTYPE html>";
  $html .= "<html>";
  $html .= "<head>";
  $html .= "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>";
  $html .= "<title>Menu Principal</title>";
  $html .= "<link rel='stylesheet' type='text/css' href='bootstrap/css/bootstrap.css'></head>";
  $html .= "<body>";
  $html .= "<ul class='nav nav-pills'>";
  $html .= "<li role='presentation' " . definirComoAtivo("home") . "><a href='#'>Home</a></li>";
  $html .= "<li role='presentation' " . definirComoAtivo("mensagem") . "><a href='contato/mensagem.php'>Contato</a></li>";
  $html .= "<li role='presentation' " . definirComoAtivo("login") . "><a href='login.php'>Login</a></li>";
  $html .= "</ul>";
  $html .= "</body>";
  $html .= "</html>";

  echo $html;
?>
