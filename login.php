<?php
	session_start();
	unset($_SESSION['id']);
	require "banco.php";

	$banco = new Banco();
	$usuarios = array();
	$usuarios = $banco->listar("usuarios");
					
?>
	



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="assets/css/estilo.css" />
	<title>Pagina de Login - Cadastro</title>
</head>
<body>

	<div class="container">

		<?php
			if(isset($_POST['email']) && !empty($_POST['email'])){
						$email = $_POST['email'];
						$senha = $_POST['senha'];
						$id = $banco->logar($email, $senha);

						if($id){
									$_SESSION['id'] = $id;
									header("Location: index.php");
									exit;
						} else {
									echo "<div class='alert alert-danger alert-dismissible fade show' 			role='alert'>E-mail e/ou senha invalidos
											<button class='close' data-dismiss='alert'>
												<span aria-hidden='true'>&times;</span>
											</button>
										</div>";

						}
					} 

		?>


		
		<div class="row">
			<div class="col" >
				<div class="envolve">
					
					<div class="formulario">
						<form method="POST">
							<div class="form-group">
								<label for="email"> E-mail:</label>
								<input class="form-control" type="email" name="email" id="email" required="true" placeholder="Digite seu e-mail aqui..." />
							</div>
							<div class="form-group">
								<label for="senha">Senha:</label>
								<input class="form-control" type="password" name="senha"id="senha" required="true" placeholder="Digite sua senha aqui...">
							</div>
							<input class="btn btn-primary" type="submit" value="Entrar">
						</form>
						
					</div>
					

				</div>

			</div>

		</div>

	</div>


		


		<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>