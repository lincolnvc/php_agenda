<div class="col-md-12">
	<div class="col-md-10 titulo">Editar Cliente
</div>
<?php

	$id = $atual[2];

	$query = "select * from clientes where `id` = '$id'";
	
	$result = $mysqli->query($query);
	$row = $result->fetch_assoc();
	$nome = $row["nome"];
	$email = $row["email"];
	$telefone_residencial = $row["telefone_res"];
	$telefone_celular = $row["telefone_cel"];
	$cpf = $row["cpf"];
	$rg = $row["rg"];
	$rua = $row["rua"];
	$numero = $row["numero"];
	$cidade = $row["cidade"];
	$estado = $row["estado"];
	$bairro = $row["bairro"];
	$cep = $row["cep"];
	$dt_nascimento = $row["data_nasc"];
	$dt_nasc = explode("-", $dt_nascimento);
	$ano = $dt_nasc[0];
	$mes = $dt_nasc[1];
	$dia = $dt_nasc[2];
	$dt_nascimento = "$dia"."/"."$mes"."/"."$ano";
	$status = $row["status"];
	$dt_abertura = date("Y-m-d");
	if($status==1){
		$t_status = "Ativo";
	}
	if($status==0){
		$t_status = "Inativo";
	}
?>
<div id="editar">
	<form action="<?php echo raiz?>servicosbd/editarclientes.php" method="POST">
		<input type="hidden" name="idaltera" value="<?php echo $id; ?>">
		<div class="col-md-6 item">
			<div class="texto">
				Nome*:
			</div>
			<input type="text" required name="nome" value="<?php echo $nome; ?>">
		</div>
		<div class="col-md-6 item">
			<div class="texto">
				Email:
			</div>
			<input type="text" name="email" placeholder="email@host.com" value="<?php echo $email; ?>">
		</div>
		<div class="col-md-3 item">
			<div class="texto">
				Telefone Residencial: 
			</div>
			<input type="text" name="telefone_residencial" class="telefone" id="telefone_residencial" placeholder="(__)_____-____" value="<?php echo $telefone_residencial; ?>" maxlength="15">
		</div>
		<div class="col-md-3 item">
			<div class="texto">
				Telefone Celular: 
			</div>
			<input type="text" name="telefone_celular" class="telefone" id="telefone_celular" placeholder="(__)_____-____" value="<?php echo $telefone_celular; ?>" maxlength="15">
		</div>
		<div class="col-md-3 item">
			<div class="texto">
				CPF:
			</div> 
			<input type="text" class="cpf" name="cpf" placeholder="___.___.___-__" value="<?php echo $cpf; ?>">
		</div>
		<div class="col-md-3 item">
			<div class="texto">
				RG:
			</div> 
			<input type="text" name="rg" placeholder="" value="<?php echo $rg; ?>">
		</div>

		<div class="col-md-6 item">
			<div class="texto">
				Rua: 
			</div>
			<input type="text" name="rua" value="<?php echo $rua; ?>">
		</div>
		<div class="col-md-2 item">
			<div class="texto">
				N&uacute;mero: 
			</div>
			<input type="text" name="numero" value="<?php echo $numero; ?>">
		</div>
		<div class="col-md-4 item">
			<div class="texto">
				Bairro: 
			</div>
			<input type="text" name="bairro" value="<?php echo $bairro; ?>">
		</div>
		
		<div class="col-md-4 item">
			<div class="texto">
				Cidade: 
			</div>
			<input type="text" name="cidade" value="<?php echo $cidade; ?>">
		</div>
		<div class="col-md-2 item">
			<div class="texto">
				Estado: 
			</div>
			<input type="text" name="estado" placeholder="__" value="<?php echo $estado; ?>">
		</div>
		<div class="col-md-2 item">
			<div class="texto">
				Cep: 
			</div>
			<input type="text" class="cep" name="cep" placeholder="_____-___" value="<?php echo $cep; ?>"> 
		</div>
		<div class="col-md-3 item">
			<div class="texto">
				Data de Nascimento:
			</div>
			<input type="text" class="date data" name="dt_nascimento" placeholder="__/__/____" value="<?php echo $dt_nascimento; ?>">
		</div>
		<div class="col-md-2 item">
			<div class="texto">
				Status:
			</div>
			<select name="status" id="">
				<option value="<?php echo $status; ?>"><?php echo $t_status; ?></option>
				<option value="<?php if($t_status=="Ativo"){echo $status="0";} else{ echo $status="1";}?>"><?php if($t_status=="Ativo"){$t_status="Inativo";} else{$t_status="Ativo";} echo $t_status; ?></option>
			</select>
		</div>
		<div class="col-md-12" style="margin-top: 20px; text-align: center">
			<button type="submit" class="botao_adicionar">Editar</i></button>
		</div>
	</form>
</div>