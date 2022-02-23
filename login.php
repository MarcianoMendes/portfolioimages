<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Acesso Sistema</title>
	<link rel="stylesheet" type="text/css" href="css/padrao.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="scripts/login.js"></script>
</head>
<body class = "login">
	<div id="alerta" class="alert alert-danger alert-dismissible" role="alert"/></div>
	<div id="formulario_login">
		<div id="label_titulo_login">Acesso ao Sistema</div>
		<div class="input-div" id="input-usuario">
			<input id=usuario type="text" value="Usuario"/>
		</div>
		<div class="input-div" id="input-senha">
			<input id=senha type="password" value="Senha"/>
		</div>
		<div id="botoes">
			<div class="form-group">
				<div class="col-sm-offset col-sm">
					<div id="botao" class="btn btn-primary btn-sm-10">Entrar</div>
					<input id="botao_cancelar" type="button" value='Cancelar' onclick=window.location.href="index.php" class="btn btn-primary btn-sm-10">
				</div>
			</div>
		</div>
	</div>	
</body>
</html>
