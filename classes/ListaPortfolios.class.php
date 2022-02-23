<?php

require_once('classes/Lista.class.php');

class ListaPortfolios extends Lista {

    
    protected function adicionarCampos() {
		$this->adicionarCampo('id');
		$this->adicionarCampo('local');
        $this->adicionarCampo('nome');
        $this->adicionarCampo('descricao');
		$this->adicionarCampo('data_inicio');
        $this->adicionarCampo('estado');
		$this->adicionarCampo('cidade');
		$this->adicionarCampo('id_usuario');
    }
    
    protected function adicionarDescricoesCampos() {
		$this->adicionarDescricao('Id');		
		$this->adicionarDescricao('Local');
		$this->adicionarDescricao('Nome');
        $this->adicionarDescricao('Descrição');
        $this->adicionarDescricao('Data Início');
        $this->adicionarDescricao('Estado');
		$this->adicionarDescricao('Cidade');
		$this->adicionarDescricao('Usuário');
    }
}
?>
