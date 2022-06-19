<div class="col-md-12">
	<div class="col-md-10 titulo">Adicionar evento para clientes cadastrados
</div>
<div id="adicionar">
	<form name="form1" action="<?php echo raiz?>servicosbd/adicionaragenda.php" method="POST">
		<div class="col-md-6 item">
			<div class="texto">
				Cliente:
			</div>
			<select name="nome_cliente" id="" required>
				<option value="">Escolha o cliente</option>
				<?php 
					
					$query = "select `id`,`nome` from `clientes` order by nome asc";
					$result = $mysqli->query($query);
					$num_results = $result->num_rows;
					if($num_results > 0){
						while ($row = $result->fetch_assoc()) {
							$id_cliente = $row['id'];
							$nome_cliente = $row['nome'];
							if(!empty($nome_cliente)){

				?>

					<option value="<?php echo $nome_cliente; ?>"><?php echo $nome_cliente; ?></option>
				
				<?php
							}
						}
					}
				?>
			</select>
			<?php if(!empty($id_cliente)){ ?>
				<input type="hidden" name="id_cliente" value="<?php echo $id_cliente; ?>">
			<?php } ?>
		</div>
		<div class="col-md-2 item">
			<div class="texto">
				Data: 
			</div>
			<input type="text" class="date data" required name="start" placeholder="__/__/____">
		</div>
		<div class="col-md-2">
			<div class="texto">
				Hora In&iacute;cio: 
			</div>
			<input type="text" class="hora" required name="hr_inicio" placeholder="__:__">
		</div>
		<div class="col-md-2">
			<div class="texto">
				Hora Fim: 
			</div>
			<input type="text" class="hora" required name="hr_fim" placeholder="__:__">
		</div>
		<div class="col-md-6">
			<div class="texto">
				Obs.:
			</div>
			<textarea name="procedimento" placeholder="Informe detalhes"></textarea>
		</div>
		<div class="col-md-3">
			<div class="texto">
				Forma de pagamento:
			</div>
			<select name="forma_pagamento" id="forma_pagamento">
				<option value="avista">À vista</option>
				<option value="cartao_credito">Cart&atilde;o de cr&eacute;dito</option>
				<option value="cartao_debito">Cart&atilde;o de d&eacute;bito</option>
			</select>
		</div>
		<div class="col-md-2">
			<div class="texto">
			Valor:
			</div>
			<input type="text" name="valor" placeholder="R$">
		</div>
		
		<div class="col-md-12" style="margin-top: 20px; text-align: center">
			<button type="submit" class="botao_adicionar">Adicionar</i></button>
		</div>
	</form>


</div>


<div class="col-md-10 titulo">Adicionar evento para clientes não cadastrados
</div>
<div id="adicionar">
	<form name="form2" action="<?php echo raiz?>servicosbd/adicionaragendacliente.php" method="POST">
		<div class="col-md-6 item">
			<div class="texto">
				Cliente:
			</div>
			
			<input type="text" name="nome_cliente" placeholder="Informe o nome do cliente">
		</div>
		
		<div class="col-md-2 item">
			<div class="texto">
				Data: 
			</div>
			<input type="text" class="date data" required name="start" placeholder="__/__/____">
		</div>
		<div class="col-md-2">
			<div class="texto">
				Hora In&iacute;cio: 
			</div>
			<input type="text" class="hora" required name="hr_inicio" placeholder="__:__">
		</div>
		<div class="col-md-2">
			<div class="texto">
				Hora Fim: 
			</div>
			<input type="text" class="hora" required name="hr_fim" placeholder="__:__">
		</div>
		<div class="col-md-6">
			<div class="texto">
				Obs.:
			</div>
			<textarea name="procedimento" placeholder="Informe detalhes"></textarea>
		</div>
		<div class="col-md-3">
			<div class="texto">
				Forma de pagamento:
			</div>
			<select name="forma_pagamento" id="forma_pagamento">
				<option value="avista">À vista</option>
				<option value="cartao_credito">Cart&atilde;o de cr&eacute;dito</option>
				<option value="cartao_debito">Cart&atilde;o de d&eacute;bito</option>
			</select>
		</div>
		<div class="col-md-2">
			<div class="texto">
			Valor:
			</div>
			<input type="text" name="valor" placeholder="R$">
		</div>
		
		<div class="col-md-12" style="margin-top: 20px; text-align: center">
			<button type="submit" class="botao_adicionar">Adicionar</i></button>
		</div>
	</form>


</div>