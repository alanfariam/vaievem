<?php
class Times extends model {

    private $array;
    private $id_time;
    private $nome;
	public  $Erro;
	public 	$numRows;

    public function getId_time() {
		return $this->id_time;
    }

    public function setNome($i) {
		$this->nome = $i;
    }

    public function getNome() {
		return $this->nome;
    }

	public function __construct() {
		parent::__construct();
	}

	public function incluir() {
		if (empty($this->id_time)) {
			$sql = "INSERT INTO times 
					   SET  nome  =   ?";

			$sql = $this->db->prepare($sql);
			$sql->execute(array($this->nome));
		}
	}

	public function atualizar($id) {
		$sql = "UPDATE times 
				   SET nome 	 = ?
				 WHERE id_time   = ?  ";

			$sql = $this->db->prepare($sql);
            $sql->execute(array($this->nome,
                                $id));

	}

	public function lista($i)
	{
		$sql = $this->db->prepare("SELECT * FROM times order by nome");
		$sql->execute();

		$this->numRows = $sql->RowCount();
		$this->array = $sql->fetchAll();

		return $this->array;

	}

}
?>