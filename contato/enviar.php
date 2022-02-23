<?php
$parametros = filter_input_array(INPUT_POST);
$nome = trim($parametros['nome']);
$email = trim($parametros['email']);
$assunto_usuario = trim($parametros['assunto']);
$mensagem = trim($parametros['mensagem']);
$enviar = $parametros['enviar'];
ini_set("SMTP","xvants@gmail.com");
ini_set("smtp_port","25");
ini_set('sendmail_from','xvants@gmail.com');

if($enviar) {
	$quebra_linha = "\n";
	$email_remetente = "xvants@gmail.com";
	$nome_remetente = "Site Xvants";
	$email_destinatario = "xvants@gmail.com";
	$assunto = "Contato via Site Xvants";
	$headers = "MIME-Version: 1.0" . $quebra_linha;
	$headers .= "Content-type: text/html; charset=iso-8859-1" . $quebra_linha;
	$headers .= "From: " . $email_remetente . $quebra_linha;
	$headers .= "Return-Path: " . $email_remetente . $quebra_linha;
	$conteudo = "<strong>Nome:</strong> $nome<br/>";
	$conteudo .= "<strong>Email:</strong> $email<br/>";
	$conteudo .= "<strong>Assunto:</strong> $assunto_usuario<br/>";
	$conteudo .= "<strong>Mensagem:</strong> $mensagem<br/>";
	$enviado = mail($email_destinatario, $assunto, $conteudo, $headers, "-r" . $email_remetente);
	//$enviado = mail($email_destinatario, $assunto, $conteudo, $headers, $email_remetente);
	if($enviado) {
		$html = "<div class='alert alert-success alert-dismissible' role='alert'>Mensagem enviada com sucesso!";
		$html .= "<button type='button' class='close' data-dismiss='alert' aria-label='Fechar'><span aria-hidden='true'>&times;</span></button></div>";
		echo $html;
		return;
	}

	$html = "<div class='alert alert-danger alert-dismissible' role='alert'><b>$nome</b><br>Ouve um erro no envio, desculpe-nos pelo transtorno!";
	$html .= "<button type='button' class='close' data-dismiss='alert' aria-label='Fechar'><span aria-hidden='true'>&times;</span></button></div>";
	echo $html;

	/*$parametros = filter_input_array(INPUT_POST);
	$nome = trim($parametros['nome']);
	$email = trim($parametros['email']);
	$assunto_user = trim($parametros['assunto']);
	$mensagem = trim($parametros['mensagem']);
	$enviar = $parametros['enviar'];

	if($enviar) {
		$emailenvio = "nmendes94@hotmail.com";
		$assunto = "Contato do Site Xvants";
		$headers = "MIME-Version: 1.0\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\n";
		$headers .= "From: $emailenvio\n";
		$conteudo = "<strong>Nome:</strong> $nome<br />";
		$conteudo .= "<strong>Email:</strong> $email<br />";
		$conteudo .= "<strong>Assunto:</strong> $assunto_user<br />";
		$conteudo .= "<strong>Mensagem:</strong> $mensagem<br />";
		$enviando = mail($emailenvio, $assunto, $conteudo, $headers);
		if($enviando) {
			$html = "<div class='alert alert-success alert-dismissible' role='alert'>Mensagem enviada com sucesso!";
			$html .= "<button type='button' class='close' data-dismiss='alert' aria-label='Fechar'><span aria-hidden='true'>&times;</span></button></div>";
			echo $html;
			return;
		}

		$html = "<div class='alert alert-danger alert-dismissible' role='alert'><b>$nome</b><br>Ouve um erro no envio, desculpe-nos pelo transtorno!";
		$html .= "<button type='button' class='close' data-dismiss='alert' aria-label='Fechar'><span aria-hidden='true'>&times;</span></button></div>";
		echo $html;*/
}
?>
