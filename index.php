<?php	
	session_start();
	require "assets/includes/banco.php";
	$banco = new Banco();

	if(!isset($_SESSION['id']) && empty($_SESSION['id'])){
		header("Location: login.php");
	}

	$id = $_SESSION['id'];
	
	$clientes = $banco->listar("clientes");
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="assets/css/estilo.css" />
	<title>Pagina principal - Cadastro</title>
</head>
<body>
	<div class="container">
		
		<?php 
			include "assets/includes/navbar.php";
		?>
		<h2>Cadastro de Clientes</h2>
		<hr/>
			<div class="conteudo">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover table-sm">
					<thead class="thead-dark">
						<tr>
							<th>#</th>
							<th>NOME</th>
							<th>EMAIL</th>
							<th>ENDEREÇO</th>
							<th>OPÇÕES</th>
						</tr>
					</thead>
					<tbody>
							<?php
								if(count($clientes) > 0){
									foreach($clientes as $cliente){
										echo "<tr>";
										echo "<td>".$cliente['id']."</td>";
										echo "<td>".$cliente['nome']."</td>";
										echo "<td>".$cliente['email']."</td>";
										echo "<td>".$cliente['endereco']."</td>";
										echo "<td><a href='editar.php?id=".$cliente['id']."'>Editar</a> - <a href='excluir.php?id=".$cliente['id']."'>Excluir</a></td>";
										echo "</tr>";
									}
								} else {
									echo "<tr>";
									echo "<td colspan='4'>Nenhum Registro encontrado !</td>";
									echo "</tr>";
								}
								
							?>
					</tbody>
				</table>
			</div>



			
			<a href="adicionar.php" class="btn btn-danger btn-sm ">Adicionar</a>
		</div>
	</div>
	
	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>