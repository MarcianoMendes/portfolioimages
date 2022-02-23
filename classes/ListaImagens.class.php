<?php

require_once('classes/Lista.class.php');

class ListaImagens extends Lista {

  protected function adicionarCampos() {
    $this->adicionarCampo('id');
    $this->adicionarCampo('nome');
    $this->adicionarCampo('descricao');
    $this->adicionarCampo('coordenada_x');
    $this->adicionarCampo('coordenada_y');
    $this->adicionarCampo('data_hora');
    $this->adicionarCampo('id_portifolio');
  }

  protected function adicionarDescricoesCampos() {
    $this->adicionarDescricao('Id');
    $this->adicionarDescricao('Nome');
    $this->adicionarDescricao('Descrição');
    $this->adicionarDescricao('Coordenada X');
    $this->adicionarDescricao('Coordenada Y');
    $this->adicionarDescricao('Data e Hora');
    $this->adicionarDescricao('Portifólio');
  }
}
?>
