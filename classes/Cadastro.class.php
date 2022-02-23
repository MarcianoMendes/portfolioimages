<?php

require_once("conexao.php");
require_once("CampoTexto.class.php");
require_once("CampoAlfaNumerico.class.php");
require_once("CampoSelecao.class.php");
require_once("CampoPassword.class.php");
require_once("CampoData.class.php");
require_once("CampoDataHora.class.php");
require_once("CampoImagem.class.php");
require_once("CampoSessao.class.php");
require_once("CampoComboBox.class.php");
abstract class Cadastro {

	private $tabela;
	private $tabelaestrangeira;
	private $campoestrangeiro;
	private $campos = array();
	private $valores = array();

	public function __construct() {
		if(!isset($_SESSION["usuario"])) {
			require_once("login.php");
			return;
		}

		$this->adicionarCampos();
	}

	protected function setTabela($tabela) {
		$this->tabela = $tabela;
	}

	private function getTabela() {
		return($this->tabela);
	}

	protected function setTabelaEstrangeira($tabelaestrangeira) {
		$this->tabelaestrangeira = $tabelaestrangeira;
	}

	private function getTabelaEstrangeira() {
		return($this->tabelaestrangeira);
	}

	protected function setCampoEstrangeiro($campoestrangeiro) {
		$this->campoestrangeiro	= $campoestrangeiro;
	}

	private function getCampoEstrangeiro() {
		return($this->campoestrangeiro);
	}

	protected function adicionarCampo($nome, $descricao, $tipo = "texto") {
		if($tipo == "texto") {
			$campotexto = new CampoTexto;
			$campotexto->setNome($nome);
			$campotexto->setDescricao($descricao);
			$this->campos[] = $campotexto;
			return;
		}

		if($tipo == "alfanumerico") {
			$campoalfanumerico = new CampoAlfaNumerico;
			$campoalfanumerico->setNome($nome);
			$campoalfanumerico->setDescricao($descricao);
			$this->campos[] = $campoalfanumerico;
			return;
		}

		if($tipo == "combobox") {
			$campocombobox = new CampoComboBox;
			$campocombobox->setNome($nome);
			$campocombobox->setDescricao($descricao);
			$campocombobox->setTabela($this->getTabelaEstrangeira());
			$campocombobox->setCampoEstrangeiro($this->getCampoEstrangeiro());
			$this->campos[] = $campocombobox;
			return;
		}

		if($tipo == "password") {
			$campopassword = new CampoPassword;
			$campopassword->setNome($nome);
			$campopassword->setDescricao($descricao);
			$this->campos[] = $campopassword;
			return;
		}

		if($tipo == "data") {
			$campodata = new CampoData;
			$campodata->setNome($nome);
			$campodata->setDescricao($descricao);
			$this->campos[] = $campodata;
			return;
		}

		if($tipo == "datahora") {
			$campodatahora = new CampoDataHora;
			$campodatahora->setNome($nome);
			$campodatahora->setDescricao($descricao);
			$this->campos[] = $campodatahora;
			return;
		}

		if($tipo == "imagem") {
			$campoimagem = new CampoImagem;
			$campoimagem->setNome($nome);
			$campoimagem->setDescricao($descricao);
			$this->campos[] = $campoimagem;
		}

		if($tipo == "sessao") {
			$camposessao = new CampoSessao;
			$camposessao->setNome($nome);
			$camposessao->setDescricao($descricao);
			$this->campos[] = $camposessao;
			return;
		}
	}

	protected function adicionarCampoSelecao($nome, $descricao, $lista) {
		$camposelecao = new CampoSelecao;
		$camposelecao->setNome($nome);
		$camposelecao->setDescricao($descricao);
		$camposelecao->setLista($lista);
		$this->campos[] = $camposelecao;
	}

	abstract protected function adicionarCampos();

	public function criarFormulario($titulo, $operacao) {
		$html = "<!DOCTYPE html>";
		$html .= "<html>";
		$html .= "<head>";
		$html .= "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>";
		$html .= "<title>$titulo</title>";
		$html .= "<link rel='stylesheet' type='text/css' href='bootstrap/css/bootstrap.css'>";
		$html .= "</head>";
		$html .= "<body>";
		$this->inserirMenu();
		$html .= "<form method=post id='form' name='form' class='form-horizontal'>";
		$html .= "<div class='form-group'><div class='col-sm-offset-2 col- sm-10'><h2 class='text-primary'>$titulo</h2></div></div>";
		$html .= $this->inserirCampos();
		$html .= "<div class='form-group'><div class='col-sm-offset-2 col-sm-10'>";
		$html .= "<input type='submit' id='$operacao' name='$operacao' value='$operacao' class='btn btn-primary btn-sm'><span>  </span>";
		$html .= "<input type='button' value='Cancelar' onclick=window.location.href='lista$this->tabela.php' class='btn btn-primary btn-sm'></div></div>";
		$html .= "</form>";
		$html .= "</body>";
		$html .= "</html>";
		return($html);
	}

	private function inserirMenu(){
		return(require_once("menucruds.php"));
	}

	private function inserirCampos() {
		$html = "";
		$valor = "";
		foreach ($this->campos as $campo) {
			$html .= "<div class='form-group'>";
			$html .= $campo->retornarHtml($this->valores);
			$html .="</div>";
		}

		return($html);
	}

	public function inserirRegistro() {
		if (!$this->validouPreencimento()) {
			return;
		}

		if (mysql_query($this->gerarScriptInsercao())) {
			$this->redirecionar();
			$_SESSION["inserido"] = "sim";
			return;
		}

		$this->redirecionar();
		$_SESSION["erro_insercao"] =
		"Erro ao inserir registro na tabela: '$this->getTabela()'" . mysql_error();
	}

	private function validouPreencimento() {
		$parametros = filter_input_array(INPUT_POST);
		foreach ($this->campos as $campo) {
			if(get_class($campo) == "CampoSessao") {
				return(true);
			}

			$nome = $campo->getNome();
			if (!isset($parametros[$nome])) {
				return(false);
			}

			if (!$parametros[$nome]) {
				return(false);
			}
		}

		return(true);
	}

	private function redirecionar() {
		echo "<html><head><title>window.location</title>
		<script type='text/javascript'>
		window.location='lista$this->tabela.php';</script>
		</head><body></body></html>";
	}

	private function gerarScriptInsercao() {
		$tabela = $this->getTabela();
		$sql = "insert into $tabela (";
		foreach ($this->campos as $campo) {
			$nome = $campo->getNome();
			$sql .= "$nome, ";
		}

		$sql = $this->substituirUltimoCaracter($sql) . ") values(";
		$parametros = filter_input_array(INPUT_POST);
		foreach ($this->campos as $campo) {
			$nome = $campo->getNome();
			if(get_class($campo) == "CampoImagem") {
				$sql .= "LOAD_FILE('$parametros[$nome]'), ";
				continue;
			}

			if(get_class($campo) == "CampoSessao") {
				$descricao = $campo->getDescricao();
				$sql .= "'$_SESSION[$descricao]', ";
				continue;
			}

			$sql .= "'$parametros[$nome]', ";
		}

		return($this->substituirUltimoCaracter($sql) . ")");
	}

	private function substituirUltimoCaracter($valor) {
		return (substr($valor, 0, strlen($valor) - 2));
	}

	public function editarRegistro() {
		if (!$this->validouPreencimento()) {
			return;
		}

		if (mysql_query($this->gerarScriptEdicao())) {
			$this->redirecionar();
			$_SESSION["editado"] = "sim";
			return;
		}

		$tabela = $this->tabela;
		$_SESSION["erro_edicao"] = "Erro ao inserir registro na tabela: '$tabela'" .
		mysql_error();
	}

	public function recuperarRegistro($id) {
		$tabela = $this->getTabela();
		$resultado = mysql_query("select * from $tabela where id = $id");
		while ($registro = mysql_fetch_array($resultado)) {
			foreach ($this->campos as $campo) {
				$nome = $campo->getNome();
				$this->valores[$nome] = $registro[$nome];
			}
		}
	}

	private function gerarScriptEdicao() {
		$parametrosget = filter_input_array(INPUT_GET);
		$id = $parametrosget["id"];
		$parametros = filter_input_array(INPUT_POST);
		$tabela = $this->getTabela();
		$sql = "update $tabela set ";
		foreach ($this->campos as $campo) {
			if(get_class($campo) == "CampoSessao") {
				continue;
			}

			$nome = $campo->getNome();
			$sql .= "$nome = '$parametros[$nome]', ";
		}

		return($this->substituirUltimoCaracter($sql) . " where id = $id");
	}
}

?>
