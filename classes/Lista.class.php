<?php

session_start();
require_once("conexao.php");
abstract class Lista {
  private $campos = array();
  private $descricoes = array();
  private $tabela;
  private $acesso_liberado = true;
  private $registros_por_pagina = 10;
  private $pagina;
  private $quantide_paginas;

  public function __construct($tabela) {
    if(!$this->autenticado()) {
      require_once("login.php");
      return;
    }

    if(!$this->possuiPrivilegio()){
      return;
    }

    $this->adicionarCampos();
    $this->adicionarDescricoesCampos();
    $_SESSION["tabela"] = $tabela;
    $this->tabela = $tabela;
    $this->ajustarPagina();
  }

  private function ajustarPagina(){
    if(isset($_GET['pagina'])){
      $this->pagina = $_GET['pagina'];
      return;
    }

    $this->pagina = 1;
  }

  protected function setAcessoLiberado($acesso_liberado){
    $this->acesso_liberado = $acesso_liberado;
  }

  protected function autenticado() {
    if(isset($_SESSION["usuario"])) {
      return(true);
    }

    require_once("login.php");
    return(false);
  }

  private function possuiPrivilegio(){
    $nivel_acesso = $_SESSION["nivel_acesso"];
    if($nivel_acesso > 1 && !$this->acesso_liberado){
      return(false);
    }

    return(true);
  }

  protected function adicionarCampo($campo) {
    $this->campos[] = $campo;
  }

  protected function adicionarDescricao($descricao) {
    $this->descricoes[] = $descricao;
  }

  abstract protected function adicionarCampos();

  abstract protected function adicionarDescricoesCampos();

  private function selecionarRegistros(){
    $registro_inicial = $this->getRegistroInicial();
    return(mysql_query("select * from $this->tabela order by id desc limit
      $registro_inicial,$this->registros_por_pagina"));
  }

  private function quantidadePaginas(){
    $retorno = mysql_query("select count(id) as qtde from $this->tabela");
    $registro = mysql_fetch_array($retorno);
    $quantidade_registros = $registro["qtde"];
    $quantide_paginas =
      (int)($quantidade_registros / $this->registros_por_pagina);
    $resto = $quantidade_registros % $this->registros_por_pagina;
    if($resto > 0){
      $quantide_paginas++;
    }

    return($quantide_paginas);
  }


  private function getRegistroInicial(){
    if($this->pagina == 1){
      return(0);
    }

    return($this->pagina * $this->registros_por_pagina -
      $this->registros_por_pagina);
  }

  public function criarFormulario($titulo) {
    if(!$this->autenticado()) {
      return;
    }

    if(!$this->possuiPrivilegio()) {
      require_once("menucruds.php");
      return;
    }

    $html = "<!DOCTYPE html>";
    $html .= "<html>";
    $html .= "<head>";
    $html .= "<meta charset='utf-8'>";
    $html .= "<link rel='stylesheet' type='text/css' href='bootstrap/css/bootstrap.css'>";
    $html .= "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>";
    $html .= "<script src='bootstrap/js/bootstrap.min.js'></script>";
    $html .= "<title>$titulo</title>";
    $html .= "</head>";
    $html .= "<body>";
    $html .= "<form class='form-vertical' role='form' method=post>";
    $this->inserirMenu();
    $html .= $this->criarAlertaInserido();
    $html .= $this->criarAlertaEditado();
    $html .= $this->criarAlertaExcluido();
    $html .= "<div class='panel panel-default'>";
    $html .= "<div class='panel-heading text-muted'>$titulo</div>";
    $html .= $this->criarTabela();
    $html .= "</div>";
    $html .= $this->gerarPaginacao();
    $html .= "<input type='button' value='Cadastrar' onclick=window.location.href='inserir.php' class='btn btn-primary btn-sm'>";
    $html .= "</form>";
    $html .= "</body>";
    $html .= "</html>";
    return($html);
  }

  private function inserirMenu(){
    return(require_once("menucruds.php"));
  }

  private function criarAlertaInserido(){
    if(!isset($_SESSION["inserido"])){
      return("");
    }

    if($_SESSION["inserido"] == "sim"){
      $_SESSION["inserido"] = "nao";
      $html = $this->criarAlertaSucesso();
      $html .= "Registro inserido com sucesso!</div>";
      return($html);
    }
  }

  private function criarAlertaEditado(){
    if(!isset($_SESSION["editado"])){
      return("");
    }

    if($_SESSION["editado"] == "sim"){
      $_SESSION["editado"] = "nao";
      $html = $this->criarAlertaSucesso();
      $html .= "Registro alterado com sucesso!</div>";
      return($html);
    }
  }

  private function criarAlertaExcluido(){
    if(isset($_SESSION["erro_exclusao"])){
      $html = $this->criarAlertaErro();
      $erro = $_SESSION["erro_exclusao"];
      unset($_SESSION["erro_exclusao"]);
      $html .= "$erro</div>";
      return($html);
    }

    if(!isset($_SESSION["mensagem_exclusao"])){
      return("");
    }

    $html = $this->criarAlertaSucesso();
    $mensagem = $_SESSION["mensagem_exclusao"];
    $html .= "$mensagem</div>";
    unset($_SESSION["mensagem_exclusao"]);
    return($html);
  }

  private function criarAlertaSucesso(){
    $html = "<div class='alert alert-success alert-dismissible' role='alert'>";
    $html .= $this->criarBotaoFecharAlerta();
    return($html);
  }

  private function criarAlertaErro(){
    $html = "<div class='alert alert-danger alert-dismissible' role='alert'>";
    $html .= $this->criarBotaoFecharAlerta();
    return($html);
  }

  private function criarBotaoFecharAlerta(){
    return("<button type='button' class='close' data-dismiss='alert' aria-label='Fechar'><span aria-hidden='true'>&times;</span></button>");
  }

  private function criarTabela() {
    $html = "<div class='table-responsive'>";
    $html .= "<table class='table table-striped table-hover table-bordered table-condensed'>";
    $html .= "<tr class='info'>";
    $html .= $this->criarHeaderTabela();
    $html .= $this->inserirLinhas();
    $html .= "</tr>";
    $html .= "</tbody>";
    $html .= "</table>";
    $html .= "</div>";
    return($html);
  }

  private function criarHeaderTabela() {
    $html = '';
    foreach ($this->descricoes as $descricao) {
      $html .= "<td align ='left'><b>$descricao</b></td>";
    }

    return($html);
  }

  private function inserirLinhas() {
    $resultado = $this->selecionarRegistros();
    $html = '';
    $linha = 1;
    while ($registro = mysql_fetch_array($resultado)) {
      $classe = $this->classeDaLinha($linha);
      $html .= "<tr class=$classe>";
      foreach ($this->campos as $campo) {
        $html .= "<td align=left>$registro[$campo]</td>";
      }

      $id = $registro["id"];
      $html .= "<td><a href=editar.php?id=$id class='btn btn-default btn-xs'><span class='glyphicon glyphicon-pencil' title='Editar Registro'></span></a></td>";
      $html .= "<td><a href=excluir.php?id=$id onclick=\"return confirm('Deseja excluir o registro?');\" class='btn btn-default btn-xs'><span class='glyphicon glyphicon-remove' title='Excluir Registro'></span></a></td>";
      $html .= "</tr>";
      $linha++;
    }

    return($html);
  }

  private function classeDaLinha($linha) {
    if ($linha % 2 == 0) {
      return("cor-sim");
    }

    return("cor-nao");
  }

  private function gerarPaginacao(){
    $html = "<nav>";
    $html .= "<ul class = 'pagination'>";
    $html .= "<li>";
    $pagina = $this->paginaAnterior();
    $html .= "<a href='?pagina=$pagina' aria-label='Previous'>";
    $html .= "<span aria-hidden='true'>&laquo;</span>";
    $html .= "</a>";
    $html .= "</li>";
    $i = 1;
    while($i <= $this->quantidadePaginas()){
      $html .= "<li><a href='?pagina=$i'>$i</a></li>";
      $i++;
    }

    $pagina = $this->proximaPagina();
    $html .= "<li>";
    $html .= "<a href='?pagina=$pagina' aria-label='Next'>";
    $html .= "<span aria-hidden='true'>&raquo;</span>";
    $html .= "</a>";
    $html .= "</li>";
    $html .= "</ul>";
    $html .= "</nav>";
    return($html);
  }

  private function paginaAnterior(){
    $pagina = $this->pagina - 1;
    if($pagina < 1){
      return(1);
    }

    return($pagina);
  }

  private function proximaPagina(){
    $pagina = $this->pagina + 1;
    if($pagina > $this->quantidadePaginas()){
      return($this->quantidadePaginas());
    }

    return($pagina);
  }
}

?>
