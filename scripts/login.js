$(
	function(){
		$('#usuario').click(
			function(){

				if($(this).val() == 'Usuario'){
					$(this).val('');
				}
			}
		);

		$('#senha').click(
			function(){

				if($(this).val() == 'Senha'){
					$(this).val('');
				}
			}
		);

		$('#botao').click(
			function(){
				$('#alerta').slideUp('fast');
				if($('#usuario').val() == '' || $('#usuario').val() == 'Usuario'){
					$('#alerta').html('Usuário é inválido!');
					$('#alerta').slideDown('fast');
					return;
				}

				if($('#senha').val() == '' || $('#senha').val() == 'Senha'){

					$('#alerta').html('Senha é inválida!');
					$('#alerta').slideDown('fast');
					return;
				}


				$.post('processarlogin.php',
				{
					usuario: $('#usuario').val(), senha: $('#senha').val()
				}
				, function(dados){
					if(dados == 'valido'){
						window.location.replace("menusistema.php");
						return;
					}

					$('#alerta').html('Usuário ou Senha informados estão incorretos!');
					$('#alerta').slideDown('fast');
				}
				);

			}
		);

		$('#alerta').click(
			function(){

				$(this).slideUp();
			}
		);
	}

);
