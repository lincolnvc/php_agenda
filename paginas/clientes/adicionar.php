<div class="col-md-12">
	<div class="col-md-10 titulo">Adicionar Clientes
</div>
<div id="adicionar">
	<form action="<?php echo raiz?>servicosbd/adicionarclientes.php" method="POST">
		<div class="col-md-6 item">
			<div class="texto">
				Nome*:
			</div>
			<input type="text" required name="nome">
		</div>
		<div class="col-md-6 item">
			<div class="texto">
				Email:
			</div>
			<input type="text" name="email" placeholder="email@host.com">
		</div>
		<div class="col-md-3 item">
			<div class="texto">
				Telefone Residencial: 
			</div>
			<input type="text" class="telefone" name="telefone_residencial" placeholder="(__)_____-____" maxlength="15">
		</div>
		<div class="col-md-3 item">
			<div class="texto">
				Telefone Celular: 
			</div>
			<input type="text" class="telefone" name="telefone_celular" placeholder="(__)_____-____" maxlength="15">
		</div>
		<div class="col-md-3 item">
			<div class="texto">
				CPF:
			</div> 
			<input type="text" class="cpf" name="cpf" placeholder="___.___.___-__">
		</div>
		<div class="col-md-3 item">
			<div class="texto">
				RG:
			</div> 
			<input type="text" name="rg" placeholder="">
		</div>

		<div class="col-md-6 item">
			<div class="texto">
				Rua: 
			</div>
			<input type="text" name="rua">
		</div>
		<div class="col-md-2 item">
			<div class="texto">
				N&uacute;mero: 
			</div>
			<input type="text" name="numero">
		</div>
		<div class="col-md-4 item">
			<div class="texto">
				Bairro: 
			</div>
			<input type="text" name="bairro">
		</div>
		
		<div class="col-md-4 item">
			<div class="texto">
				Cidade: 
			</div>
			<input type="text" name="cidade">
		</div>
		<div class="col-md-2 item">
			<div class="texto">
				Estado: 
			</div>
			<input type="text" name="estado" placeholder="__">
		</div>
		<div class="col-md-2 item">
			<div class="texto">
				Cep: 
			</div>
			<input type="text" class="cep" name="cep" placeholder="_____-___">
		</div>
		<div class="col-md-3 item">
			<div class="texto">
				Data de Nascimento:
			</div>
			<input type="text" class="date data" name="dt_nascimento" placeholder="__/__/____">
		</div>
		<div class="col-md-2 item">
			<div class="texto">
				Status:
			</div>
			<select name="status" id="">
				<option value="1">Ativo</option>
				<option value="0">Inativo</option>
			</select> 
		</div>
		<div class="col-md-12" style="margin-top: 20px; text-align: center">
			<button type="submit" class="botao_adicionar">Adicionar</i></button>
		</div>
	</form>


</div>