<?php
	
	include("../conexao/bd.php");

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
	$dt_abertura = date("Y-m-d");

	$query = "insert into `clientes` (`nome`,`email`,`telefone_res`,`telefone_cel`,`cpf`,`rg`,`rua`,`numero`,`bairro`,`cidade`,`estado`,`cep`,`data_nasc`,`status`,`data_inc`) VALUES ('$nome','$email','$telefone_residencial','$telefone_celular','$cpf','$rg','$rua','$numero','$bairro','$cidade','$estado','$cep','$dt_nascimento','$status','$dt_abertura')";
	if($mysqli->query($query)){
		echo "Atualizou";
		header ("location: ../clientes");
	}else{
		echo '<script type="text/javascript">
			alert("Não foi possível adicionar o usuário! Tente novamente!");
			window.location.href="../clientes";
			</script>';

		
	}
?>