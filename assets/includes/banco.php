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
			$senha = md5($senha);
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

		public function buscar($tabela, $id){
			$sql = "SELECT * FROM ". $tabela . " WHERE id='".$id."'";
			$query = $this->conexao->query($sql);
			$resultado = $query->fetch();
			return $resultado;
		}

		public function adicionar($tabela, $data){
			if(!empty($tabela) && (is_array($data) && count($data) > 0)){
				$sql = "INSERT INTO ".$tabela." SET ";
				$dados = array();
				foreach($data as $chave=>$valor){
					$dados[] = $chave. " = '".$valor."'";
				}
				$sql .= implode(", ", $dados);
				$this->conexao->query($sql);
			}
		}

		public function modificar(){

		}

		public function deletar(){

		}

	}
?>