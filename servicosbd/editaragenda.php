<?php
	
	include("../conexao/bd.php");
	$id = $_POST['idaltera'];
	$nome_cliente = $_POST["nome_cliente"];
	$query_clientes = "select * from `clientes` where `nome` like '$nome_cliente' ";
	$resultado_clientes = $mysqli->query($query_clientes);
	$row_clientes = $resultado_clientes->fetch_assoc();
	$id_cliente = $row_clientes["id"];

	$start = $_POST["dt_inicio"];
	$end = $_POST["dt_fim"];
	$hr_inicio = $_POST["hr_inicio"];
	$hr_fim = $_POST["hr_fim"];
	$procedimento = $_POST["procedimento"];
	$status=1;

	$valor = $_POST["valor"];
	$forma_pagamento = $_POST["forma_pagamento"];
	$tipo_evento = $_POST["tipo_evento"];
	if($tipo_evento == "Cirurgia"){
		$color = "green";
	}
	if($tipo_evento=="Retorno"){
		$color = "gray";
	}
	if($tipo_evento=="Consulta"){
		$color = "#337ab7";
	}

	//usa explode pra explodir o que tem na variavel
	$dt_inicio = explode("/", $start);
	//pega as pocicoes e colocam dentro de suas respectiveis variaveis
	$ano = $dt_inicio[2];
	$mes = $dt_inicio[1];
	$dia = $dt_inicio[0];
	//acrescenta :00 (segundos) no valor de horas
	$hr_inicio = "$hr_inicio".":00";
	//concatena a data no novo estilo com traços mais a hora virando datetime
	$start = "$ano"."-"."$mes"."-"."$dia"." "."$hr_inicio";

	$hr_fim = "$hr_fim".":00";
	$end = "$ano"."-"."$mes"."-"."$dia"." "."$hr_fim";


	$query = "update `agenda` set `title`='$nome_cliente',`start`='$start',`end`='$end', `color`='$color', `status`='$status', `procedimento`='$procedimento', `id_cliente`='$id_cliente', `valor`='$valor', `forma_pagamento`='$forma_pagamento', `tipo_evento`='$tipo_evento' where `id`='$id'";

	if($mysqli->query($query)){
		echo "Atualizou";
	}else{
		echo "Erro";
	}
	mysql_close($mysqli);
	header ("location: ../agenda");
?>