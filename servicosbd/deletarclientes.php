<?php
	
	include("../conexao/bd.php");
	$id = $_GET['valorid'];
	
	$query = "delete from `clientes` where `id`='$id'";

	if($mysqli->query($query)){
		echo "Atualizou";
	}else{
		echo "Erro";
	}
	mysql_close($mysqli);
	header ("location: ../clientes");
?>