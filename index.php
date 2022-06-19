<?php
	include("conexao/bd.php");
	session_start();
	define("raiz","/sites/agenda/"); // insira aqui a pasta de instalação do script
	//define("raiz","/"); // Raíz
?>
<!DOCTYPE html>

<html lang="pt-BR">
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Titulo" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>&Aacute;rea restrita</title>
		<link rel="stylesheet" href="<?php echo raiz ?>bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="<?php echo raiz ?>bootstrap/css/bootstrap-theme.css">
		<link rel="stylesheet" href="<?php echo raiz ?>media/css/style.css">
		<link rel="stylesheet" href="<?php echo raiz ?>media/css/lateral.css">
		<link rel="stylesheet" href="<?php echo raiz ?>media/css/jquery.autocomplete.css">
		<!-- <link rel="icon" type="image/ico" href="<?php echo raiz ?>media/imagens/LOGO.ico" />  -->
		<link rel="stylesheet" href="<?php echo raiz ?>font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo raiz ?>media/css/jquery-ui-1.10.1.custom.css">
		<link rel="stylesheet" href="<?php echo raiz ?>media/css/fullcalendar.css">
	</head>
	<body style="background: none">
		<script type="text/javascript" src="<?php echo raiz ?>media/js/jquery-1.11.2.js"></script>
		<script type="text/javascript" src="<?php echo raiz ?>media/js/jquery-ui.js"></script>
		<script type="text/javascript" src="<?php echo raiz ?>media/js/fullcalendar.min.js"></script>
		<script type="text/javascript" src="<?php echo raiz ?>media/js/jquery.maskedinput.js"></script>

		<script type='text/javascript'>
			$(function(){
				$('#agenda').fullCalendar({

					defaultView: 'month',
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,agendaWeek,agendaDay'

					},
					//editable: true,

					events: "<?php echo raiz ?>conexao/events.php"
				});
			});

		</script>
		<script type='text/javascript'>
			$(function(){
				$('#calendario').fullCalendar({

					defaultView: 'agendaDay',

					//editable: true,

					events: "<?php echo raiz ?>conexao/events.php"
				});
			});

		</script>
		<script>
			$(document).ready(function(){
			$(".date").datepicker({
			    dateFormat: 'dd/mm/yy',
			    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
			    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
			    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
			    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
			    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
			    nextText: 'Próximo',
			    prevText: 'Anterior'
			});
			});
		</script>
		<script>
		jQuery(function($){
		   $(".data").mask("99/99/9999");
		   $(".cep").mask("99999-999");
		   //$(".telefone").mask("(99)9999-9999");
		   $(".hora").mask("99:99");
		   $(".cpf").mask("999.999.999-99");
		   $(".estado").mask("99");
		   $(".cnpj").mask("99.999.999/9999-99");
		});
		</script>
		<script type='text/javascript'>//<![CDATA[
			$(function(){
			var maskBehavior = function (val) {
			  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
			},
			options = {onKeyPress: function(val, e, field, options) {
			        field.mask(maskBehavior.apply({}, arguments), options);
			    }
			};

			$('.telefone').mask(maskBehavior, options);
			});//]]>

		</script>



  		<script src="<?php echo raiz ?>bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo raiz ?>bootstrap/js/bootstrap.js"></script>

		<?php include("lateral.php"); ?>
			<article>
				<header>
					<div id="conteudo" class="col-md-12">

						<?php



							$atual = (isset($_GET['pag'])) ? $_GET['pag'] : 'home';
							$permissao = array('home','clientes','404','agenda','financeiro');
							$pasta = 'paginas';
							if(substr_count($atual, '/')>0){
								$atual = explode('/', $atual);
								$pagina = (file_exists("{$pasta}/".$atual[0].'.php') && in_array($atual[0], $permissao)) ? $atual[0] : '404';
								require("{$pasta}/{$atual[0]}/{$atual[1]}.php");
							}else{
								$pagina = (file_exists("{$pasta}/".$atual.'.php') && in_array($atual, $permissao)) ? $atual : '404';
								require("{$pasta}/{$pagina}.php");
							}



						?>
					</div>
				</header>


			</article>

	</body>
</html>