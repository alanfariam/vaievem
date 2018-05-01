<?php
class TimesBolao extends model {

    private $array;
    private $id_time_bolao;
    private $id_bolao;
    private $id_time;
	public  $Erro;
	public 	$numRows;

    public function getId_time_bolao() {
		return $this->id_time_bolao;
    }

    public function setId_bolao($i) {
		$this->id_bolao = $i;
    }

    public function getId_bolao() {
		return $this->id_bolao;
    }

    public function setId_time($i) {
		$this->id_time = $i;
    }

    public function getId_time() {
		return $this->id_time;
    }
    
    public function __construct() {
		parent::__construct();
	}

	public function incluir() {
		if (empty($this->id_time_bolao)) {
			$sql = "INSERT INTO times_bolao 
					   SET  id_time 	    = 	?,
                            id_bolao 	    = 	?";


			$sql = $this->db->prepare($sql);
			$sql->execute(array($this->id_time,
                                $this->id_bolao));
		}
	}

	public function atualizar($id) {
		$sql = "UPDATE times_bolao 
					   SET  id_time 	  =	?,
                            id_bolao 	  =	?
					WHERE id_time_bolao   = ?";

			$sql = $this->db->prepare($sql);
            $sql->execute(array($this->id_time,
                                $this->id_bolao,
                               	$id));

	}

	public function lista($i)
	{
		$sql = $this->db->prepare("SELECT B.id_time,
                                          T.nome 
                                     FROM times_bolao B
                                     JOIN times T
                                       ON B.id_time = T.id_time
                                    WHERE B.id_bolao = :id");
		$sql->bindValue(":id", $i);
		$sql->execute();

		$this->numRows = $sql->RowCount();
		$this->array = $sql->fetchAll();

		return $this->array;

	}

}
?>