<?php
class Palpite extends model {

    private $array;
    private $id_palpite;
    private $id_jogo_rodada;
    private $id_usuario_bolao;
    private $qt_pontos;
    private $qt_gols_casa;
    private $qt_gols_fora;
    private $situacao;
    private $dt_palpite;
    public  $Erro;
    public 	$numRows;

    public function getId_palpite() {
		return $this->id_palpite;
    }

    public function setId_jogo_rodada($i) {
		$this->id_jogo_rodada = $i;
    }

    public function getId_jogo_rodada() {
		return $this->id_jogo_rodada;
    }

    public function setId_usuario_bolao($i) {
		$this->id_usuario_bolao = $i;
    }

    public function getId_usuario_bolao() {
		return $this->id_usuario_bolao;
    }
    
    public function setQt_gols_casa($i) {
		$this->qt_gols_casa = $i;
    }

    public function getQt_gols_casa() {
		return $this->qt_gols_casa;
    }
    public function setQt_gols_fora($i) {
		$this->qt_gols_fora = $i;
    }

    public function getQt_gols_fora() {
		return $this->qt_gols_fora;
	}  

	public function setSituacao($i) {
		$this->situacao = $i;
    }
    
    public function getSituacao() {
		return $this->situacao;
    }
    
    public function setDt_palpite($i) {
		$this->dt_palpite = $i;
    }
    
    public function getDt_palpite() {
		return $this->dt_palpite;
    }
    
    public function setQt_pontos($i) {
		$this->qt_pontos = $i;
    }
    
    public function getQt_pontos() {
		return $this->qt_pontos;
	}

	public function __construct() {
		parent::__construct();
	}

	public function incluir() {

		if (empty($this->id_palpite)) {
			$sql = "INSERT INTO palpite 
					   SET  id_jogo_rodada 	    = ?,
                  id_usuario_bolao	  =	?,
                  qt_gols_casa 	      =	?,
                  qt_gols_fora        =	?,
                  qt_pontos           = 0,
                  situacao 	          =	?,
                  dt_palpite          = ?";


			$sql = $this->db->prepare($sql);
			$sql->execute(array($this->id_jogo_rodada,
                                $this->id_usuario_bolao,
                                $this->qt_gols_casa,
                                $this->qt_gols_fora,
                                $this->situacao,
                                $this->dt_palpite));
		}
	}

	public function atualizar($id) {

		$sql = "UPDATE palpite 
					   SET  qt_gols_casa 	      =	?,
                  qt_gols_fora        =	?,
                  dt_palpite          = ?
					WHERE id_palpite            = ?  ";

			$sql = $this->db->prepare($sql);
           
                                
      try{
        $sql->execute(array($this->qt_gols_casa,
                            $this->qt_gols_fora,
                            $this->dt_palpite,
                            $id));
  
      } catch (PDOException $sql){

        $this->erro = "Falha ao incluir os dados: ".$sql->getMessage();
        echo $this->erro;
      }

	}

	public function lista($nr_rodada,$id_bolao,$id_usuario)
	{
		$sql = $this->db->prepare("SELECT R.numero as rodada,
                                      R.descricao as dsc_rodada,
                                      TC.nome AS casa,
                                      J.nr_gols_casa,
                                      TV.nome AS visitante,
                                      J.nr_gols_visitante,
                                      J.dt_jogo,
                                      J.id_jogo_rodada,
                                      P.id_palpite,
                                      P.qt_gols_casa,
                                      P.qt_gols_fora,
                                      P.dt_palpite
                                  FROM rodada R
                                  JOIN jogo_rodada J
                                    ON J.id_rodada = R.id_rodada
                                  JOIN times TC
                                    ON TC.id_time = J.id_time_casa
                                    JOIN times TV
                                    ON TV.id_time = J.id_time_visitante
                                    LEFT JOIN palpite P
                                    ON P.id_jogo_rodada = J.id_jogo_rodada
                                    AND P.id_usuario_bolao = :id_usuario
                                  WHERE R.id_bolao = :id_bolao
                                    AND R.numero = :nr_rodada
                                  ORDER BY R.numero,J.dt_jogo,J.id_jogo_rodada");
        $sql->bindValue(":nr_rodada", $nr_rodada);
        $sql->bindValue(":id_usuario", $id_usuario);
        $sql->bindValue(":id_bolao", $id_bolao);
		$sql->execute();

		$this->numRows = $sql->RowCount();
		$this->array = $sql->fetchAll();

		return $this->array;

	}

}
?>