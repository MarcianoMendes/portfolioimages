<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=utf-8">
	<title>Formulario para contato com a XVANTS</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body class = "bodycontato">
	<form method="post" class="form-horizontal">
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10"><h2 class='text-primary'>Entre em Contato</h2></div>
		</div>
		<?php include("enviar.php")?>
		<div class="form-group">
			<label for="nome" class="col-sm-2 control-label"></label>
			<div class="col-sm-4"><input id="nome" name="nome" size="31" type="text" placeholder="Nome" class="form-control" required pattern='^[a-zA-Z\b]+$' title='Informe somente letras do alfabeto'/></div>
		</div>
		<div class="form-group">
			<label for="email" class="col-sm-2 control-label"></label>
			<div class="col-sm-4"><input id="email" name="email" size="31" type="email" placeholder="e-mail" class="form-control" required title='Informe seu e-mail'/></div>
		</div>
		<div class="form-group">
			<label for="assunto" class="col-sm-2 control-label"></label>
			<div class="col-sm-4"><input id="assunto" maxlength="50" name="assunto" size="15" type="text" placeholder="Assunto" class="form-control" required title='Informe o assunto a ser tratado'/></div>
		</div>
		<div class="form-group">
			<label for="mensagem" class="col-sm-2 control-label"></label>
			<div class="col-sm-4"><textarea id="mensagem" cols="53" rows="5" name="mensagem" placeholder="Mensagem" class="form-control" required title='Informe a mensagem referente ao assunto'></textarea></div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input name="enviar" type="submit" value="Enviar" class="btn btn-primary btn-sm">
				<input name="cancelar" type="reset" value="Limpar" class="btn btn-primary btn-sm">
			</div>
		</div>
	</form>
</body>
</html>
