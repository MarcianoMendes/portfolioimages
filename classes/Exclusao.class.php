<?php

require_once("conexao.php");

class Exclusao {

  private $tabela;
  private $id;

  public function __construct($tabela, $id) {
    $this->tabela = $tabela;
    $this->id = $id;
  }

  public function executar() {
    if (!$this->validouExclusao()) {
      $_SESSION["mensagem_exclusao"] =
      "Registro já foi excluido anteriormente!";
      return;
    }

    if (mysql_query($this->gerarScriptExclusao())) {
      $_SESSION["mensagem_exclusao"] = "Registro excluido com sucesso!";
      return;
    }

    $erro = $this->traduzirErro();
    $_SESSION["erro_exclusao"] = "Erro ao excluir registro. $erro";
  }

  private function traduzirErro(){
    if(strpos(mysql_error(),"FOREIGN KEY")){
      return("Registro está sendo referenciado em outra tabela!");
    }
  }

  private function validouExclusao() {
    $retorno = mysql_query("select id from $this->tabela where id = $this->id");
    if (mysql_num_rows($retorno) > 0) {
      return(true);
    }

    return(false);
  }

  private function gerarScriptExclusao() {
    return("delete from $this->tabela where id = $this->id");
  }
}
