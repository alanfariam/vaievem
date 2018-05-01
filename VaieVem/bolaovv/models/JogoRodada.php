<?php
class JogoRodada extends model {

    private $array;
    private $id_jogo_rodada;
    private $id_rodada;
    private $id_time_casa;
    private $id_time_visitante;
    private $nr_gols_casa;
    private $nr_gols_visitante;
    private $situacao;
    private $dt_jogo;
    public  $Erro;
    public 	$numRows;

    public function getId_jogo_rodada() {
		return $this->id_jogo_rodada;
    }

    public function setId_rodada($i) {
		$this->id_rodada = $i;
    }

    public function getId_rodada() {
		return $this->id_rodada;
    }
    
    public function setId_time_casa($i) {
		$this->id_time_casa = $i;
    }

    public function getId_time_casa() {
		return $this->id_time_casa;
    }
    public function setId_time_visitante($i) {
		$this->id_time_visitante = $i;
    }

    public function getId_time_visitante() {
		return $this->id_time_visitante;
    }
    public function setNr_gols_casa($i) {
		$this->nr_gols_casa = $i;
    }

    public function getNr_gols_casa() {
		return $this->nr_gols_casa;
    }
    public function setNr_gols_visitante($i) {
		$this->nr_gols_visitante = $i;
    }

    public function getNr_gols_visitante() {
		return $this->nr_gols_visitante;
	}  

	public function setSituacao($i) {
		$this->situacao = $i;
    }
    
    public function getSituacao() {
		return $this->situacao;
    }
    
    public function setDt_jogo($i) {
		$this->dt_jogo = $i;
    }
    
    public function getDt_jogo() {
		return $this->dt_jogo;
	}

	public function __construct() {
		parent::__construct();
	}

	public function incluir() {
		if (empty($this->id_jogo_rodada)) {
			$sql = "INSERT INTO jogo_rodada 
					   SET  id_rodada 	        = 	?,
                            id_time_casa 	    = 	?,
                            id_time_visitante 	=	?,
                            nr_gols_casa 	    =	?,
                            nr_gols_visitante   =	?,
                            situacao 	        =	?,
                            dt_jogo             =   ?";


			$sql = $this->db->prepare($sql);
			$sql->execute(array($this->id_rodada,
                                $this->id_time_casa,
                                $this->id_time_visitante,
                                $this->nr_gols_casa,
                                $this->nr_gols_visitante,
                                $this->situacao,
                                $this->dt_jogo));
		}
	}

	public function atualizar($id) {
		$sql = "UPDATE jogo_rodada 
					   SET  id_rodada 	        = 	?,
                            id_time_casa 	    = 	?,
                            id_time_visitante 	=	?,
                            nr_gols_casa 	    =	?,
                            nr_gols_visitante   =	?,
                            situacao 	        =	?,
                            dt_jogo             =   ?
					WHERE id_jogo_rodada   = ?  ";

			$sql = $this->db->prepare($sql);
            $sql->execute(array($this->id_rodada,
                                $this->id_time_casa,
                                $this->id_time_visitante,
                                $this->nr_gols_casa,
                                $this->nr_gols_visitante,
                                $this->situacao,
                                $this->dt_jogo,
								$id));

	}

	public function lista($i)
	{
		$sql = $this->db->prepare("SELECT J.*,
                                      TC.nome as nm_casa,
                                      TV.nome as nm_visitante
                                 FROM jogo_rodada J 
                                 JOIN times TC
                                   ON J.id_time_casa = TC.id_time
                                   JOIN times TV
                                   ON J.id_time_visitante = TV.id_time
                                WHERE J.id_rodada = :id 
                             order by J.dt_jogo");
		$sql->bindValue(":id", $i);
		$sql->execute();

		$this->numRows = $sql->RowCount();
		$this->array = $sql->fetchAll();

		return $this->array;

	}

}
?>