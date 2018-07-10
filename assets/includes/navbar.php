

<nav class="navbar navbar-expand-sm navbar-light bg-light" ">
	<a href="index.php"><img src="assets/images/logo.png"></a>
	
	<div class="navbar-collapse collapse" id="navbarMenu">
		<ul class="navbar-nav">
			<li class="navbar-item">
				<p class="nav-link">

					Logado como : 
					<?php 
					$usuario = $banco->buscar("usuarios", $id);
					$nome = $usuario['nome'];
					echo $nome;
					?>
					

				</p>
			</li>
		</ul>
		
		
	</div>

	
		<a class="btn btn-danger btn-sm " href="sair.php">Sair do sistema</a>

		
</nav>