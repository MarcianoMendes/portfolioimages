<?php

require_once("Campo.class.php");

class CampoImagem extends Campo {


	public function retornarHtml($valores) {
		$nome = $this->getNome();
		$valor = "";
        if (!empty($valores)) {
        	$valor = $valores[$nome];
        }

		$descricao = $this->getDescricao();
		$requerido = $this->getRequerido();
		return("<label for=$nome class='col-sm-2 control-label'>$descricao:</label><div class='col-sm-4'><input type='file' name='$nome' value='$valor' $requerido class='form-control' title='Selecione um arquivo de imagem'/></div>");
//http://www.devmedia.com.br/upload-de-imagens-em-php-e-mysql/10041
//http://www.linhadecodigo.com.br/artigo/100/blob-fields-in-mysql-databases.aspx
	}
}

?>
