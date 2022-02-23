<?php

require_once("Campo.class.php");

class CampoDataHora extends Campo {

	public function retornarHtml($valores) {
		$nome = $this->getNome();
		$valor = "";
		if (!empty($valores)) {
			$valor = $valores[$nome];
			$valor = date('Y-m-dTH:m:s',strtotime($valor));
			$valor = str_replace("BRST","T",$valor);
			$valor = str_replace("BRT","T",$valor);
		}

		$descricao = $this->getDescricao();
		$requerido = $this->getRequerido();
		return("<label for=$nome class='col-sm-2 control-label'>$descricao:</label><div class='col-sm-3'><input type='datetime-local' step='1' $requerido name='$nome' value='$valor' class='form-control' pattern='[0-9]{2}\/[0-9]{2}\/[0-9]{4} [0-9]{2}:[0-9]{2}:[0-9]{2}$' title='Informe o valor no formato dd/mm/aaaa hh:mm:ss'/></div>");
	}
}

?>
