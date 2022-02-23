<?php

require_once("classes/Cadastro.class.php");

class CadastroImagem extends Cadastro {


  public function __construct() {
    parent::__construct();
    $this->setTabela("imagens");
  }

  protected function adicionarCampos() {
    $this->adicionarCampo("nome", "Nome");
    $this->adicionarCampo("descricao", "Descrição","alfanumerico");
    $this->adicionarCampo("coordenada_x", "Coordenada X","alfanumerico");
    $this->adicionarCampo("coordenada_y", "Coordenada Y","alfanumerico");
    $this->adicionarCampo("data_hora", "Data e Hora","datahora");
    $this->adicionarCampo("foto", "Foto","imagem");
    $this->setTabelaEstrangeira("portfolios");
    $this->setCampoEstrangeiro("nome");
    $this->adicionarcampo("id_portifolio", "Portfólio", "combobox");
  }
}
?>
