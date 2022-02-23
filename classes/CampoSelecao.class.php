<?php

require_once("Campo.class.php");

class CampoSelecao extends Campo{

	private $lista = array();

	public function setLista($lista) {
		$this->lista = $lista;
	}

	private function getLista() {
		return($this->lista);
	}

	public function retornarHtml($valores) {
		$nome = $this->getNome();
		$descricao = $this->getDescricao();
		$html = "<label for=$nome class='col-sm-2 control-label'>$descricao:</label><div class='col-sm-3'><select name = $nome class='form-control' title='Selecione uma opção'>";
		$selecionado = "";
		if(array_key_exists($nome, $valores)) {
			$selecionado = $valores[$nome];
		}

		foreach ($this->lista as $valor => $descricao) {
			$opcaoselecionada = "";
			if($valor == $selecionado) {
				$opcaoselecionada = " selected='selected'";
			}

           $html .= "<option value='$valor'$opcaoselecionada>$descricao</option>";
		}

		$html .= " value='2'</select></div>";
		return($html . "<br>");
	}
}

?>
