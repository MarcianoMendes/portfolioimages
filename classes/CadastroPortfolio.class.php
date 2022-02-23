<?php

require_once("classes/Cadastro.class.php");

class CadastroPortfolio extends Cadastro {


  public function __construct() {
    parent::__construct();
    $this->setTabela("portfolios");
  }

  protected function adicionarCampos() {
    $this->adicionarCampo("local", "Local","alfanumerico");
    $this->adicionarCampo("nome", "Nome");
    $this->adicionarCampo("descricao", "Descrição","alfanumerico");
    $this->adicionarCampo("data_inicio", "Data Início", "data");
    $estados = array("AC"=>"Acre", "AL"=>"Alagoas","AM"=>"Amazonas",
    "AP"=>"Amapá","BA"=>"Bahia","CE"=>"Ceará","DF"=>"Distrito Federal",
    "ES"=>"Espírito Santo","GO"=>"Goiás","MA"=>"Maranhão","MT"=>"Mato Grosso",
    "MS"=>"Mato Grosso do Sul","MG"=>"Minas Gerais","PA"=>"Pará",
    "PB"=>"Paraíba","PR"=>"Paraná","PE"=>"Pernambuco","PI"=>"Piauí",
    "RJ"=>"Rio de Janeiro","RN"=>"Rio Grande do Norte","RO"=>"Rondônia",
    "RS"=>"Rio Grande do Sul","RR"=>"Roraima","SC"=>"Santa Catarina",
    "SE"=>"Sergipe","SP"=>"São Paulo","TO"=>"Tocantins");
    $this->adicionarCampoSelecao("estado", "Estado",$estados);
    $this->adicionarCampo("cidade", "Cidade");
    $this->adicionarcampo("id_usuario", "usuario", "sessao");
  }
}
?>
