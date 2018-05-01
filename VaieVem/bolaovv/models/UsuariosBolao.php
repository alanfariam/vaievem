<?php
class UsuariosBolao extends model {

	private $array;
	private $id_usuarios_bolao;
	private $id_bolao;
	private $id_usuario;
	private $situacao;
	public  $Erro;
	public 	$numRows;
	public  $total_inscritos;

	public function getId_usuarios_bolao() {
		return $this->id_usuarios_bolao;
	}

	public function setId_bolao($i) {
		$this->id_bolao = $i;
	}
	
	public function geId_Bolao() {
		return $this->id_bolao;
	}

	public function setId_usuario($i) {
		$this->id_usuario = $i;
	}
	
	public function getId_usuario() {
		return $this->id_usuario;
	}

	public function setSituacao($i) {
		$this->situacao = $i;
	}
	
	public function getSituacao() {
		return $this->situacao;
	}

	public function __construct() {
		parent::__construct();
	}

	public function salvar() {
		if (!empty($this->id_usuarios_bolao)) {
			$sql = "UPDATE usuarios_bolao 
					   SET id_bolao 	= 	?,
                            id_usuario 	=	?,
                            situacao 	=	?
					WHERE id_usuarios_bolao = ?  ";

			$sql = $this->db->prepare($sql);
			$sql->execute(array($this->id_bolao,
								$this->id_usuario,
								$this->situacao));
		} else { 
			$sql = "INSERT INTO bolao 
					   SET  id_bolao 	= 	?,
                            id_usuario 	=	?,
                            situacao 	=	?";

			$sql = $this->db->prepare($sql);
			$sql->execute(array($this->id_bolao,
								$this->id_usuario,
								$this->situacao));
		}
	}

	public function lista($i)
	{
        $sql = "SELECT UB.id_usuario,
					   U.usuario,
					   U.nome,
					   U.email,
		               UB.situacao 
		          FROM usuarios_bolao UB
				  JOIN usuarios U
				    ON UB.id_usuario = U.id_usuario
				 WHERE UB.id_bolao = ?";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($i));
		$this->numRows = $sql->RowCount();
		$this->array = $sql->fetchAll();

		return $this->array;

    }
    
    public function verifica_inscricao($id_bolao, $id_usuario) {

		$sql = $this->db->prepare("SELECT count(1) as conta FROM usuarios_bolao WHERE id_bolao = :id_bolao AND id_usuario = :id_usuario");
		$sql->bindValue(":id_bolao", $id_bolao);
		$sql->bindValue(":id_usuario", $id_usuario);

		try{
			$sql->execute();

		} catch (PDOException $sql){
			$this->erro = "Falha ao conectar com o banco de dados: ".$sql->getMessage();
			return false;
		}

		if($sql->rowCount() > 0) {
			$dado = $sql->fetch();
			$conta = $dado['conta'];
			if ($conta > 0) {
				return true;
			} else{
				return false;
			};
			
		} else {
			return false;
		}
	}

	public function inscrever($id_bolao, $id_usuario) {

		$sql = "INSERT INTO usuarios_bolao 
					   SET id_bolao 	= 	?,
						   id_usuario 	=	?,
						   situacao 	=	'P'";

			$sql = $this->db->prepare($sql);
			$sql->execute(array($id_bolao,
								$id_usuario));

	}

	public function verifica_bolao($id_usuario) {
		$sql = $this->db->prepare("SELECT max(U.id_bolao) as id_bolao
									FROM bolao B
									JOIN usuarios_bolao U
									  ON B.id_bolao = U.id_bolao
								   WHERE B.situacao = 'A'
									 AND U.id_usuario = :id_usuario");

		$sql->bindValue(":id_usuario", $id_usuario);

		try{
			$sql->execute();

		} catch (PDOException $sql){
			$this->erro = "Falha ao conectar com o banco de dados: ".$sql->getMessage();
			return $this->erro;
		}

		if($sql->rowCount() > 0) {
			$dado = $sql->fetch();
			$id_bolao = $dado['id_bolao'];
			$this->id_bolao = $id_bolao;

			if ($id_bolao == NULL) {
				$this->total_inscritos = 0;
				return 'Nenhum';
			}

			$sql = $this->db->prepare("SELECT B.descricao as ds_bolao
									     FROM bolao B
								        WHERE B.id_bolao = :id_bolao");

			$sql->bindValue(":id_bolao", $id_bolao);

			try{
				$sql->execute();

			} catch (PDOException $sql){
				$this->erro = "Falha ao conectar com o banco de dados: ".$sql->getMessage();
				return $this->erro;
			}
			$dado = $sql->fetch();
			$ds_bolao = $dado['ds_bolao'];
			
			$sql = $this->db->prepare("SELECT count(1) as conta
									     FROM usuarios_bolao U
								        WHERE U.id_bolao = :id_bolao");

			$sql->bindValue(":id_bolao", $id_bolao);

			try{
				$sql->execute();

			} catch (PDOException $sql){
				$this->erro = "Falha ao conectar com o banco de dados: ".$sql->getMessage();
				return $this->erro;
			}
			$dado = $sql->fetch();
			$this->total_inscritos = $dado['conta'];
			return $ds_bolao;
		} else {
			return "Nenhum";
		}
	}

}
?>