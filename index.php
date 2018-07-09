<?php	
	session_start();
	require "banco.php";

	if(!isset($_SESSION['id']) && empty($_SESSION['id'])){
		header("Location: login.php");
	}

	$id = $_SESSION['id'];

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


Você está no index






	<br/>
	<a href="sair.php">Sair da pagina</a>


		<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>