<?php

require_once("classes/Cadastro.class.php");

class CadastroPerfil extends Cadastro {

    public function __construct() {
        parent::__construct();
        $this->setTabela("perfis");
    }

    protected function adicionarCampos() {
        $this->adicionarCampo("identificacao", "Identificação","alfanumerico");
        $niveis = array("1" => "Administrador","2" => "Operador");
        $this->adicionarCampoSelecao("nivel_acesso", "Nível Acesso",$niveis);
    }
}
