<?php
class Rodada extends model {

	private $array;
    private $id_rodada;
    private $id_bolao;
    private $descricao;
	private $numero;
	private $dt_inicio;
	private $dt_fim;
	private $situacao;
	public  $Erro;
	public 	$numRows;

    public function getId_rodada() {
		return $this->id_rodada;
	}
    
    public function setId_bolao($i) {
		$this->id_bolao = $i;
    }
    
    public function getId_bolao() {
		return $this->id_bolao;
	}

	public function setDescricao($i) {
		$this->descricao = $i;
	}
	
	public function getDescricao() {
		return $this->descricao;
    }
    
    public function setNumero($i) {
		$this->numero = $i;
	}
	
	public function getNumero() {
		return $this->numero;
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

	public function __construct() {
		parent::__construct();
	}

	public function incluir() {
		if (empty($this->id_rodada)) {
			$sql = "INSERT INTO rodada 
					   SET  id_bolao 	= 	?,
                            descricao 	= 	?,
                            dt_inicio 	=	?,
                            dt_fim 	    =	?,
                            numero 	    =	?,
                            situacao 	=	?";

			$sql = $this->db->prepare($sql);
			$sql->execute(array($this->id_bolao,
                                $this->descricao,
                                $this->dt_inicio,
                                $this->dt_fim,
                                $this->numero,
                                $this->situacao));
		}
	}

	public function atualizar($id) {
		$sql = "UPDATE rodada 
					   SET  id_bolao 	= 	?,
                            descricao 	= 	?,
                            dt_inicio 	=	?,
                            dt_fim 	    =	?,
                            numero 	    =	?,
                            situacao 	=	?
					WHERE id_rodada     = ?  ";

			$sql = $this->db->prepare($sql);
            $sql->execute(array($this->id_bolao,
                                $this->descricao,
								$this->dt_inicio,
                                $this->dt_fim,
                                $this->numero,
								$this->situacao,
								$id));

	}

	public function lista($i)
	{
		$sql = $this->db->prepare("SELECT * FROM rodada WHERE id_bolao = :id order by numero");
		$sql->bindValue(":id", $i);
		$sql->execute();

		$this->numRows = $sql->RowCount();
		$this->array = $sql->fetchAll();

		return $this->array;


	}

	public function rodada_atual($bolao){
		$sql = $this->db->prepare("SELECT MIN(numero) rodada
									 FROM rodada
								    WHERE situacao = 'A'
									  AND id_bolao = :bolao");
		$sql->bindValue(":bolao", $bolao);
		$sql->execute();

		$row = $sql->fetch();

		return $row['rodada'];
	}

}
?>