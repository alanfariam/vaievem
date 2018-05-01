<?php

class Banco {
	private $numRows;
	private $array;
	private $pdo;

	public function __construct($bd) {
		$this->pdo = $bd;
	}

	public function query($sql) {
		$q = $this->pdo->query($sql);
		$this->numRows = $q->rowCount();
	}

	public function numRows() {
		return $this->numRows;
	}

}


//$banco = new Banco();

//$banco->query("select * from usuarios");
//$numero2 = $banco->numRows();

//$sql = $bd->query("select * from usuarios");
//$numero = $sql->rowCount();

//echo "QUANTIDADE: ".$numero;
?>