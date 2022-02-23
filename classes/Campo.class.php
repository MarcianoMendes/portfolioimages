<?php

require_once("conexao.php");

abstract class Campo{

  private $nome;
  private $descricao;
  private $requerido = true;

  public function setNome($nome) {
    $this->nome = $nome;
  }

	public function getNome() {
		return($this->nome);
	}

	public function setDescricao($descricao) {
    $this->descricao = $descricao;
  }

	public function getDescricao() {
		return($this->descricao);
	}

  public function setRequerido($requerido) {
    $this->requerido = $requerido;
  }

	public function getRequerido() {
    if($this->requerido){
		  return("required");
    }

    return("");
	}

	abstract public function retornarHtml($valores);
}

?>
