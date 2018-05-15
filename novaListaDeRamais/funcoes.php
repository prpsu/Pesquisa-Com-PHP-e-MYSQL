<head>
	
	<title>LISTA DE RAMAIS</title>
	<meta charset="utf-8">

	<script src="jquery-2.2.3.js"></script>
	<script src="angular.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/ramaisNovoTabela.css">
	

</head>
<h1 align="center">LISTA DE RAMAIS</h1>
<a href="index.php"><button class="btn btn-primary"> Nova pesquisa</button></a>
<table border="4" class="table table-hover" align="center">
	
<thead align="center">
<tr>
	
	<td class="info">
		<label for="listaRamal" class="col-2 col-form-label" ><b>Area</b></label>
	</td>

	<td class="info">
		<label for="listaRamal" class="col-2 col-form-label" ><b>Descrição</b></label>
	</td>
	
	<td class="info">
		<label for="listaRamal" class="col-2 col-form-label" ><b>Usuario</b>
		</label>
	</td>

	<td class="info">
		<label for="listaRamal" class="col-2 col-form-label"><b>Ramal</b>
		</label>
	</td>
</tr>	



</thead>




<?php 

include('conexao.php');



 ?>


 <?php 


// pegando retorno do formulario php
if (isset($_POST["enviar"])) {


//======================== select join===================
 
//função para busca dados do banco com inner join 

function selectAllAreaGrupo(){
$lula = $_POST['nome'];
$dilma = $_POST['setorValor'];
$nomeDoSetor = $_POST['nome_Setor'];

	$banco = abrirBanco();

	$sql = "SELECT setorramal.area, descricaoAreaRamal.descricao, listaderamais.usuario,listaderamais.ramal FROM listaderamais left JOIN setorramal ON setorRamal.idsetor =listaderamais.setorDoRamal left JOIN descricaoAreaRamal ON listaDeRamais.descricaoSetor = descricaoAreaRamal.idDescricaoAreaRamal where setorramal.area like'%".$dilma."%'"."and listaderamais.usuario like '%".$lula."%' and descricaoAreaRamal.descricao like '%".$nomeDoSetor."%'";
	
	$resultado = $banco->query($sql);
	
	while ($row = mysqli_fetch_array($resultado)) {
//criando arrey com  retorno do banco 
		$grupoArea[] = $row;
		
}


// quando o retorno e Igual a Zero exibe mensagem
if ($grupoArea == null ) {
	echo "0 resultados,   ";
	unset($grupoArea);
}else{

// qualdo ha retorno do banco a função retorna um arry 
return $grupoArea;
}
			
	}



}

//====================IF de seguranca para retorno nulo da função=======
if (selectAllAreaGrupo() == null) {
	echo "Nenhum registro encontrado para essa Pesquisa!..";
} else{
  //coso retorno da função  executa foreach para  exibir dados do bando 
$grupoSetorNome = selectAllAreaGrupo();

// função Utf8_encode para tratar caracteres especiais 

foreach ($grupoSetorNome as $area) {  ?>
<tr>
				
				<td><b><?=utf8_encode($area["area"])?><b/></td>	

						
				<td><b><?=utf8_encode($area["descricao"])?><b/></td>


	
				<td><b><?=utf8_encode($area["usuario"])?><b/></td>


	
				<td><b><?=utf8_encode($area["ramal"])?><b/></td>
			</tr>





	<?php } } ?>




	</table>


