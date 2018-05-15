<head>
	<title>LISTA DE RAMAIS</title>
	<meta charset="utf-8">

	<script src="Js/jquery-2.2.3.js"></script>
	<script src="Js/angular.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/ramaisNovo.css">
	
</head>

			<h1 align="center">LISTA DE RAMAIS</h1>

<?php 
//incluindo conexao com banco 

	include('conexao.php');
	

	$grupo = selectAllArea();



 ?>
 <div>
 			<form name="dadosRamal" action="funcoes.php" method="POST" >
 				<label for="btnSelect" class="col-2 col-form-label">SELECIONE AREA</label>
					<select  name="setorValor" id="btnSelect">
						<option  value="" >Selecione</option> 
   				
   				<?php foreach ($grupo as $pessoa) { ?>

   						<option  value=<?=$pessoa["area"]?>><?=utf8_encode($pessoa["area"])?>	</option>
   				<?php } ?>

   					</select>
   				
   				
   				<label for="nome"  id="labelInput" class="col-2 col-form-label">INFORME NOME/SETOR</label>
   						<input type="text" name="nome" placeholder="Nome">
   						<input type="text" name="nome_Setor" placeholder="Setor">
   						<button type="submit" class="btn btn-primary" name="enviar" value="enviar">ENVIAR</button>
 </div>
    		</form>		


