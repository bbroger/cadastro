<?php

	class Banco {
		private $dsn = "mysql:dbname=cadastro;host:localhost;charset=utf8";
		private $dbuser = "root";
		private $dbsenha = "";

		private $conexao;
		private $numLinhas;
		
		

		public function __construct(){
			try{
				$this->conexao = new PDO($this->dsn, $this->dbuser, $this->dbsenha);

			} catch(PDOException $e){
				echo "Erro : " . $e->getMessage();
			}
		}

		public function query($sql){
			
		}

		public function logar($email, $senha){
			$id = null;
			$sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
			$resposta = $this->conexao->query($sql);
			if($resposta->rowCount() > 0){
				$usuario = $resposta->fetch();
				$id = $usuario['id'];
			}
			return $id;
		}

		public function listar($tabela){
			$sql = "SELECT * FROM ".$tabela;
			$query = $this->conexao->query($sql);
			$this->numLinhas = $query->rowCount();
			$resultado = $query->fetchAll();
			return $resultado;
		}

		public function adicionar(){

		}

		public function modificar(){

		}

		public function deletar(){

		}

	}
?>