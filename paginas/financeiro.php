<div class="col-md-12">
	<div class="col-md-10 titulo">Saldo</div>
	
	
</div>

<div id="lista" class="col-md-12" style="margin-bottom:30px;">
	<div class="pesquisa col-md-12">
		<div class="col-md-4 nome_tabela">
			Escolha o per&iacute;odo:
		</div>
		<form action="financeiro" method="POST">
			<div class="col-md-12">
				<div class="col-md-2 texto" style="width:10%">
					Data inicial:
				</div>
				<div class="col-md-2">
					<input type="text" name="data_inicio" class="data date" placeholder="__/__/____">
				</div>
				<div class="col-md-2 texto" style="width:10%">
					Data final:
				</div>
				<div class="col-md-2">
					<input type="text" name="data_fim" class="data date" placeholder="__/__/____">
				</div>
				<div class="col-md-1">
					<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
				</div>
				
			</div>
		</form>		
	</div>

	<?php 


		$total_geral = 0;
		$total_debito = 0;
		$total_credito = 0;
		$total_avista = 0;

		
		if(!empty($_POST)){
			$data_inicio = $_POST["data_inicio"];
			$data_fim = $_POST["data_fim"];
			if((!empty($_POST))&&(isset($_POST["data_inicio"]))&&($_POST["data_inicio"]!=null)&&(isset($_POST["data_fim"]))&&($_POST["data_fim"]!=null)){
				$data_inicio = $_POST["data_inicio"];
				$dt_ini = explode("/", $data_inicio);
				//pega as pocicoes e colocam dentro de suas respectiveis variaveis
				$ano = $dt_ini[0];
				$mes = $dt_ini[1];
				$dia = $dt_ini[2];
				$data_inicio = "$dia"."-"."$mes"."-"."$ano"." "."00:00:00";
				
				$data_fim = $_POST["data_fim"];
				$dt_fim = explode("/", $data_fim);
				//pega as pocicoes e colocam dentro de suas respectiveis variaveis
				$ano2 = $dt_fim[0];
				$mes2 = $dt_fim[1];
				$dia2 = $dt_fim[2];
				$data_fim = "$dia2"."-"."$mes2"."-"."$ano2"." "."23:59:59";
				
				$condicao_data = "and `start` >= '$data_inicio' and `end` <= '$data_fim'";
				$query = "select * from agenda where 1=1 $condicao_data";	
				$result = $mysqli->query($query);

			}else{
				$query = "select * from agenda order by forma_pagamento asc";
				//executar a query
				$result = $mysqli->query($query);
			}

			//mostrar o numero de linhas retornadas
			$num_results = $result->num_rows;
			if($num_results > 0){


			while ($row = $result->fetch_assoc()) {
				
				$data = $row['start'];
				$valor = $row['valor'];
				$forma_pagamento = $row['forma_pagamento'];
				if($forma_pagamento == "cartao_credito"){
					$pg = "Cartão de crédito";
				}
				if($forma_pagamento == "cartao_debito"){
					$pg = "Cartão de débito";
				}
				if($forma_pagamento == "avista"){
					$pg = "&Agrave; vista";
				}	
				if($forma_pagamento=="cartao_debito"){
					$total_debito = $valor + $total_debito;
					
				}
				if($forma_pagamento=="cartao_credito"){
					$total_credito = $valor + $total_credito;
					
				}
				if($forma_pagamento=="avista"){
					$total_avista = $valor + $total_avista;
				}
				
				$total_geral = $total_avista + $total_debito + $total_credito;
				

			}
		}

		$result->free();
		$mysqli->close();
	}

	?>
			
	<table border="1px">
		<tr class="titulo">
			<td>Total Cart&atilde;o de Cr&eacute;dito</td>	

			<td><strong>R$ <?php echo $total_credito = number_format($total_credito, 2, ',', ' '); ?></strong></td>
		</tr>
		<tr class="titulo">
			<td>Total Cart&atilde;o de D&eacute;bito</td>		
							
			<td><strong>R$ <?php echo $total_debito = number_format($total_debito, 2, ',', ' '); ?></strong></td>
		</tr>
		<tr class="titulo">
			<td>Total Dinheiro</td>		
							
			<td><strong>R$ <?php echo $total_avista = number_format($total_avista, 2, ',', ' '); ?></strong></td>
		</tr>
		<tr class="titulo">
			<td><strong>Total Geral</strong></td>						
			<td><strong>R$ <?php echo $total_geral = number_format($total_geral, 2, ',', ' '); ?></strong></td>
			
		</tr>
	</table>
</div>
