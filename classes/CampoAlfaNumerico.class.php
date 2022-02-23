<?php

require_once("Campo.class.php");

class CampoAlfaNumerico extends Campo {

  public function retornarHtml($valores) {
    $nome = $this->getNome();
    $valor = "";
    if (!empty($valores)) {
      $valor = $valores[$nome];
    }

    $descricao = $this->getDescricao();
    $requerido = $this->getRequerido();
    return("<label for=$nome class='col-sm-2 control-label'>$descricao:</label><div class='col-sm-4'><input type='text' name='$nome' value='$valor' title='Informe coerentemente o valor solicitado' $requerido class='form-control'/></div>");
  }
}

?>
