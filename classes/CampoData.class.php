<?php

require_once("Campo.class.php");

class CampoData extends Campo {

	public function retornarHtml($valores) {
		$nome = $this->getNome();
		$valor = "";
		if (!empty($valores)) {
			$valor = $valores[$nome];
		}

		$descricao = $this->getDescricao();
		$requerido = $this->getRequerido();
		return("<label for=$nome class='col-sm-2 control-label'>$descricao:</label><div class='col-sm-2'><input type='date' $requerido maxlength='10' name='$nome' value='$valor' class='form-control' title='Informe o valor no formato dd/mm/aaaa' pattern='[0-9]{2}\/[0-9]{2}\/[0-9]{4}$'/></div>");
	}
}

?>
