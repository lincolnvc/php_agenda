<?php
	
	include("../conexao/bd.php");
	$id = $_POST['idaltera'];
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$telefone_residencial = $_POST["telefone_residencial"];
	$telefone_celular = $_POST["telefone_celular"];
	$cpf = $_POST["cpf"];
	$rg = $_POST["rg"];
	$rua = $_POST["rua"];
	$numero = $_POST["numero"];
	$cidade = $_POST["cidade"];
	$estado = $_POST["estado"];
	$bairro = $_POST["bairro"];
	$cep = $_POST["cep"];
	$dt_nascimento = $_POST["dt_nascimento"];
	$dt_nasc = explode("/", $dt_nascimento);
	$ano = $dt_nasc[2];
	$mes = $dt_nasc[1];
	$dia = $dt_nasc[0];
	$dt_nascimento = "$ano"."-"."$mes"."-"."$dia";
	$status = $_POST["status"];
	$dt_alt = date("Y-m-d");

	$query = "update `clientes` set `nome` = '$nome',`email` = '$email',`telefone_res` = '$telefone_residencial',`telefone_cel` = '$telefone_celular',`cpf` = '$cpf',`rg` = '$rg',`rua` = '$rua',`numero` = '$numero',`bairro` = '$bairro',`cidade` = '$cidade',`estado` = '$estado',`cep` = '$cep',`data_nasc` = '$dt_nascimento',`status` = '$status',`data_alt` = '$dt_alt' where `id`='$id'";
	if($mysqli->query($query)){
		echo "Atualizou";
		header ("location: ../clientes");
	}else{
		echo '<script type="text/javascript">
			alert("Não foi possível editar o cliente!");
			window.location.href="../clientes";
			</script>';

		
	}
?>