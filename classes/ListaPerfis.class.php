<?php

require_once('classes/Lista.class.php');

class ListaPerfis extends Lista {

  public function __construct($tabela) {
    $this->setAcessoLiberado(false);
    Lista::__construct($tabela);
  }

  protected function adicionarCampos() {
    $this->adicionarCampo('id');
    $this->adicionarCampo('identificacao');
    $this->adicionarCampo('nivel_acesso');
  }

  protected function adicionarDescricoesCampos() {
    $this->adicionarDescricao('Id');
    $this->adicionarDescricao('Identificação');
    $this->adicionarDescricao('Nível Acesso');
  }
}
?>
