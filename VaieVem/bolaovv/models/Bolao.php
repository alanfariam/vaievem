<?php
class Bolao extends model {

	private $array;
	private $id_bolao;
	private $descricao;
	private $dt_inicio;
	private $dt_fim;
	private $situacao;
	private $valor;
	public  $Erro;
	public 	$numRows;

	public function getId_bolao() {
		return $this->id_bolao;
	}

	public function setDescricao($i) {
		$this->Descricao = $i;
	}
	
	public function getDescricao() {
		return $this->descricao;
	}

	public function setDtInicio($i) {
		$this->dt_inicio = $i;
	}
	
	public function getDtInicio() {
		return $this->dt_inicio;
	}

	public function setDtFim($i) {
		$this->dt_fim = $i;
	}
	
	public function getDtFim() {
		return $this->dt_fim;
	}

	public function setSituacao($i) {
		$this->situacao = $i;
    }
    
    public function getSituacao() {
		return $this->situacao;
	}

	public function setValor($i) {
		$this->valor = $i;
	}
	
	public function getValor() {
		return $this->valor;
	}

	public function __construct() {
		parent::__construct();
	}

	public function buscaBolao($i) {
		$sql = "SELECT * FROM bolao WHERE id_bolao = ?";
		$sql = $this->db->prepare($sql);
		$sql->execute(array($i));
		if ($sql->rowCount() > 0) {
			$data = $sql->fetch();
			$this->id_bolao = $data['id_bolao'];
			$this->descricao = $data['descricao'];
			$this->dt_inicio = $data['dt_inicio'];
			$this->dt_fim = $data['dt_fim'];
			$this->situacao = $data['situacao'];
			$this->valor = $data['valor'];
			return true;
		} else {
			return false;
		}
	}

	public function salvar() {
		if (!empty($this->id_bolao)) {
			$sql = "UPDATE bolao 
					   SET descricao 	= 	?,
                            dt_inicio 	=	?,
                            dt_fim 	=	?,
                            situacao 	=	?,
                            valor  	=	?
					WHERE id_bolao = ?  ";

			$sql = $this->db->prepare($sql);
			$sql->execute(array($this->descricao,
								$this->dt_inicio,
								$this->dt_fim,
								$this->situacao,
								$this->valor));
		} else { 
			$sql = "INSERT INTO bolao 
					   SET  descricao 	= 	?,
                            dt_inicio 	=	?,
                            dt_fim 	    =	?,
                            situacao 	=	?,
                            valor  	    =	?";

			$sql = $this->db->prepare($sql);
			$sql->execute(array($this->descricao,
								$this->dt_inicio,
								$this->dt_fim,
								$this->situacao,
								$this->valor));
		}
	}

	public function lista()
	{
		$sql = $this->db->query("SELECT * FROM bolao WHERE situacao = 'A'");
		$this->numRows = $sql->RowCount();
		$this->array = $sql->fetchAll();

		return $this->array;

	}

}
?>