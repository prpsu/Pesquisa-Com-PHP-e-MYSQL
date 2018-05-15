

<?php 

function abrirBanco(){

	$conexao = new mysqli("localhost", "root", "root", "ramais");

	return $conexao;

}


function selectAllArea(){

	$banco = abrirBanco();

	$sql = "SELECT * FROM setorRamal";
	$resultado = $banco->query($sql);
	
	while ($row = mysqli_fetch_array($resultado)){

		$grupo[] = $row;
	

			}

		return $grupo;
			
						}




 ?>
