<?php

require_once("Cadastro.class.php");

class CadastroUsuario extends Cadastro {


    public function __construct() {
        parent::__construct();
        $this->setTabela("usuarios");
    }

    protected function adicionarCampos() {
		$this->adicionarCampo("nome", "Nome");
		$this->adicionarCampo("login", "Usuário","alfanumerico");
		$this->adicionarCampo("pwd", "Senha","password");
		$this->setTabelaEstrangeira("perfis");
		$this->setCampoEstrangeiro("identificacao");
		$this->adicionarcampo("id_perfil", "Perfil", "combobox");
    }
}
?>
