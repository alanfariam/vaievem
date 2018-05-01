<?php
class Usuarios extends model {

	private $array;
	private $id_usuario;
	private $nome;
	private $usuario;
	private $email;
	private $senha;
	private $tipo;
	public  $Erro;
	public 	$numRows;

	public function getId_usuario() {
		return $this->id_usuario;
	}

	public function setNome($i) {
		$this->nome = $i;
	}
	
	public function getNome() {
		return $this->nome;
	}

	public function setUsuario($i) {
		$this->usuario = $i;
	}
	
	public function getUsuario() {
		return $this->usuario;
	}

	public function setEmail($i) {
		$this->email = $i;
	}
	
	public function getEmail() {
		return $this->email;
	}

	public function setSenha($i) {
		$this->senha = md5($i);
	}

	public function setTipo($i) {
		$this->tipo = $i;
	}
	
	public function getTipo() {
		return $this->tipo;
	}

	public function __construct() {
		parent::__construct();
	}

	public function buscaUsuarios($i) {
		$sql = "SELECT * FROM usuarios WHERE id_usuario = ?";
		$sql = $this->db->prepare($sql);
		$sql->execute(array($i));
		if ($sql->rowCount() > 0) {
			$data = $sql->fetch();
			$this->id_usuario = $data['id_usuario'];
			$this->nome = $data['nome'];
			$this->usuario = $data['usuario'];
			$this->email = $data['email'];
			$this->senha = $data['senha'];
			$this->tipo = $data['tipo'];
			return true;
		} else {
			return false;
		}
	}

	public function buscaUsuariosE($e) {
		$sql = "SELECT * FROM usuarios WHERE email = ?";
		$sql = $this->db->prepare($sql);
		$sql->execute(array($e));
		if ($sql->rowCount() > 0) {
			$data = $sql->fetch();
			$this->id_usuario = $data['id_usuario'];
			$this->nome = $data['nome'];
			$this->usuario = $data['usuario'];
			$this->email = $data['email'];
			$this->senha = $data['senha'];
			$this->tipo = $data['tipo'];
			return true;
		} else {
			return false;
		}
	}

	public function salvar() {
		if (!empty($this->id_usuario)) {
			$sql = "UPDATE usuarios 
					   SET nome 	= 	?,
						   usuario 	=	?,
						   email 	=	?,
						   senha 	=	?,
						   tipo  	=	?
					WHERE id_usuario = ?  ";

			$sql = $this->db->prepare($sql);
			$sql->execute(array($this->nome,
								$this->usuario,
								$this->email,
								$this->senha,
								$this->tipo));
		} else { 
			$sql = "INSERT INTO usuarios 
					   SET nome 	= 	?,
						   usuario 	=	?,
						   email 	=	?,
						   senha 	=	?,
						   tipo  	=	?";

			$sql = $this->db->prepare($sql);
			$sql->execute(array($this->nome,
								$this->usuario,
								$this->email,
								$this->senha,
								$this->tipo));
		}
	}

	public function getTotalUsuarios() {

		$sql = $this->db->query("SELECT COUNT(*) as c FROM usuarios");
		$row = $sql->fetch();

		return $row['c'];
	}

	public function cadastrar($nome,$usuario, $email, $senha, $tipo) {

		$sql = $this->db->prepare("SELECT id_usuario FROM usuarios WHERE (email = :email or usuario = :usuario)");
		$sql->bindValue(":email", $email);
		$sql->bindValue(":usuario", $usuario);
		$sql->execute();

		if($sql->rowCount() == 0) {

			$sql = $this->db->prepare("INSERT INTO usuarios SET nome = :nome, usuario = :usuario, email = :email, senha = :senha, tipo = :tipo");
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":usuario", $usuario);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":senha", md5($senha));
			$sql->bindValue(":tipo", $tipo);

			try{
				$sql->execute();
	
			} catch (PDOException $sql){
				$this->erro = "Falha ao incluir os dados: ".$sql->getMessage();
				return false;
			}
			$this->erro = "Dados incluidos con sucesso.";
			return true;

		} else {
			$this->erro = "Dados não incluidos, E-mail ou Usuário já cadastrado.";
			return false;
		}

	}

	public function login($email, $senha) {

		$sql = $this->db->prepare("SELECT id_usuario,usuario,tipo, nome FROM usuarios WHERE email = :email AND senha = :senha");
		$sql->bindValue(":email", $email);
		$sql->bindValue(":senha", md5($senha));

		try{
			$sql->execute();

		} catch (PDOException $sql){
			$this->erro = "Falha ao conectar com o banco de dados: ".$sql->getMessage();
			return false;
		}

		if($sql->rowCount() > 0) {
			$dado = $sql->fetch();
			$_SESSION['id_usuario'] = $dado['id_usuario'];
			$_SESSION['usuario'] = $dado['usuario'];
			$_SESSION['tipo'] = $dado['tipo'];
			$_SESSION['nome'] = $dado['nome'];
			$_SESSION['email'] = $email;
			return true;
		} else {
			$this->erro = "Usuário ou Senha Inválida.";
			return false;
		}

	}


	public function lista()
	{
		$sql = $this->db->query("SELECT * FROM usuarios");
		$this->numRows = $sql->RowCount();
		$this->array = $sql->fetchAll();

		return $this->array;

	}

}
?>