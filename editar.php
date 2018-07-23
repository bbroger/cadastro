<?php
	session_start();
	require "assets/includes/banco.php";
	$banco = new Banco();
	$titulo = "Editar cliente ";

	if(!isset($_SESSION['logado']) && empty($_SESSION['logado'])){
		header("Location: login.php");
	}
	$logado = $_SESSION['logado'];

	if(isset($_GET['id']) && !empty($_GET['id'])){
		$id = $_GET['id'];
		$cliente = $banco->buscar("clientes", $id);
	}

	if(isset($_POST['nome']) && !empty($_POST['nome'])){
		$nome = addslashes(htmlspecialchars($_POST['nome'])) ;
		$email = addslashes(htmlspecialchars($_POST['email'])) ;
		$endereco = addslashes(htmlspecialchars($_POST['endereco'])) ;

		$dados = array(
			"nome" => "$nome",
			"email" => "$email",
			"endereco" => "$endereco"
		);

		$banco->editar("clientes", $dados, $id);
		header("Location: index.php");

	}		

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="assets/css/estilo.css" />
	<title><?php echo $titulo ?> - Cadastro</title>
</head>
<body>
	<div class="container">
	<?php
		include "assets/includes/navbar.php";
	?>	
	<h2><?php echo $titulo ?></h2>
	<hr/>
	<div class="conteudo">
		<form method="POST">
			<div class="form-group">
				<label for="nome">Nome</label>
				<input class="form-control"  type="text" name="nome" id="nome" required="true" value="<?php echo $cliente['nome'];  ?>">
			</div>
			<div class="form-group">
				<label for="email">E-mail</label>
				<input class="form-control" type="email" name="email" id="email" required="true" value="<?php echo $cliente['email']  ?>">
			</div>
			<div class="form-group">
				<label for="endereco">Endereço</label>
				<input class="form-control" type="text" name="endereco" id="endereco" required="true" value="<?php echo $cliente['endereco'] ?>">
			</div>
			<input class="btn btn-info" type="submit" value="Salvar">
		</form>



		<div class="text-right">
			<a href="index.php" class="btn btn-danger btn-sm ">Voltar</a>
		</div>
		
	</div>
		
	</div>
	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>