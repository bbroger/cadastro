<?php

	class Banco {
		private $dsn = "mysql:dbname=cadastro;host:localhost;charset=utf8";
		private $dbuser = "root";
		private $dbsenha = "";

		private $conexao;
		
		public function __construct(){
			try{
				$this->conexao = new PDO($this->dsn, $this->dbuser, $this->dbsenha);

			} catch(PDOException $e){
				echo "Erro : " . $e->getMessage();
			}
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

		public function contarRegistros (){
			$sql = "SELECT COUNT(*) as c FROM clientes";
			$sql = $this->conexao->query($sql);
			$sql = $sql->fetch();
			$total = $sql['c'];
			return $total;

		}

		public function listar($pagina, $limite){
			$p = ($pagina - 1) * $limite;
			$sql = "SELECT * FROM clientes LIMIT $p, $limite";
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

		public function editar($tabela, $data, $id){
			if(!empty($tabela) && (is_array($data) && count($data) > 0)){
				$sql = "UPDATE ".$tabela. " SET ";
				$dados = array();
				foreach($data as $chave => $valor){
					$dados[] = $chave. " = '". $valor. "'" ;
				}
				$sql = $sql . implode(", ", $dados). " where id= ".$id;
				$this->conexao->query($sql);
			}
		}

		public function deletar($tabela, $id){
			if(!empty($tabela) && (isset($id))){
				$sql = "DELETE FROM ".$tabela." WHERE id= ". $id;
				$this->conexao->query($sql);
			}
		}

	}
?>