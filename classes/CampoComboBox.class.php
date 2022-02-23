<?php

require_once("conexao.php");
require_once("Campo.class.php");

class CampoComboBox extends Campo{

	private $tabela;
	private $campoestrangeiro;
	private $lista = array();

	public function setTabela($tabela) {
		$this->tabela = $tabela;
	}

	private function getTabela() {
		return($this->tabela);
	}

	public function setCampoEstrangeiro($campoestrangeiro) {
		$this->campoestrangeiro = $campoestrangeiro;
	}

	public function getCampoEstrangeiro() {
		return($this->campoestrangeiro);
	}

	public function retornarHtml($valores) {
		$nome = $this->getNome();
		$descricao = $this->getDescricao();
		$html = "<label for=$nome class='col-sm-2 control-label'>$descricao:</label><div class='col-sm-3'><select name = $nome class='form-control' title='Selecione uma opção'>";
		$this->recuperarRegistros();
		$selecionado = "";
		if(array_key_exists($nome, $valores)) {
			$selecionado = $valores[$nome];
		}

		foreach ($this->lista as $id => $valor) {
			$opcaoselecionada = "";
			if($id == $selecionado) {
				$opcaoselecionada = " selected='selected'";
			}

			$html .= "<option value='$id'$opcaoselecionada>$valor</option>";
		}

		$html .= " value='2'</select></div>";
		return($html);
	}

	private function recuperarRegistros() {
		$tabela = $this->getTabela();
		$campo = $this->getCampoEstrangeiro();
		$resultado = mysql_query("select id, $campo from $tabela");
		while ($registro = mysql_fetch_array($resultado)) {
			$this->lista[$registro['id']] = $registro[$campo];
		}
	}
}

?>
