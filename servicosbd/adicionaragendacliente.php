<?php
	
	include("../conexao/bd.php");


	$nome_cliente = $_POST["nome_cliente"];
	$query_clientes = "insert into `clientes` (`nome`) VALUES ('$nome_cliente') ";
	if($mysqli->query($query_clientes)){
		
		$ultimo_id_cliente = mysqli_insert_id($mysqli);
		$id_cliente = "$ultimo_id_cliente";
		$valor = $_POST["valor"];
		$procedimento = $_POST["procedimento"];
		$start = $_POST["start"];
		$hr_inicio = $_POST["hr_inicio"];
		$hr_fim = $_POST["hr_fim"];
		
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
		$tipo_evento = $_POST["tipo_evento"];
		if($tipo_evento=="Retorno"){
			$color = "gray";
		}
		if($tipo_evento=="Consulta"){
			$color = "#337ab7";
		}
		$forma_pagamento = $_POST["forma_pagamento"];
	    $query = "insert into `agenda` (`title`,`start`,`end`,`url`,`allDay`,`status`,`id_cliente`,`tipo_evento`,`color`,`forma_pagamento`,`procedimento`,`valor`) 
	    VALUES ('$nome_cliente','$start','$end','','','1','$id_cliente','$tipo_evento','$color','$forma_pagamento','$procedimento','$valor')";
	    
		if($mysqli->query($query)){

			$ultimo_id = mysqli_insert_id($mysqli);
			$url = "agenda/editar/"."$ultimo_id";
			$query2 = "update `agenda` set `url`='$url' where `id`='$ultimo_id'";
			$mysqli->query($query2);
			echo "Inseriu";	
			mysqli_close($mysqli);

		header ("location: ../agenda");	
		
		}else{
			echo '<script type="text/javascript">
				alert("Não foi possível adicionar a consulta! Tente novamente!");
				window.location.href="../agenda/adicionar";
				</script>';
		}

	}else{
	echo '<script type="text/javascript">
		alert("Não foi possível adicionar o usuário! Tente novamente!");
		window.location.href="../agenda";
		</script>';

	
	}
	
?>