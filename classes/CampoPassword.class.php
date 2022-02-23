<?php

require_once("Campo.class.php");

class CampoPassword extends Campo {


	public function retornarHtml($valores) {
		$nome = $this->getNome();
		$valor = "";
        if (!empty($valores)) {
        	$valor = $valores[$nome];
        }

		$descricao = $this->getDescricao();
		$requerido = $this->getRequerido();
		return("<label for=$nome class='col-sm-2 control-label'>$descricao:</label><div class='col-sm-2'><input type='password' name='$nome' value='$valor' $requerido class='form-control' title='Informe um valor coerente com uma senha forte'/></div>");
	}
}

?>
