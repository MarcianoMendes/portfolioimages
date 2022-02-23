<?php

require_once('classes/Lista.class.php');

class ListaUsuarios extends Lista {

  public function __construct($tabela) {
    $this->setAcessoLiberado(false);
    Lista::__construct($tabela);
  }

  protected function adicionarCampos() {
    $this->adicionarCampo('id');
    $this->adicionarCampo('nome');
    $this->adicionarCampo('login');
    $this->adicionarCampo('data_cadastro');
    $this->adicionarCampo('id_perfil');
  }

  protected function adicionarDescricoesCampos() {
    $this->adicionarDescricao('Id');
    $this->adicionarDescricao('Nome');
    $this->adicionarDescricao('Usuário');
    $this->adicionarDescricao('Data Cadastro');
    $this->adicionarDescricao('Perfil');
  }
}
?>
