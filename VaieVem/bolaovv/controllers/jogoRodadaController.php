<?php
class jogoRodadaController extends controller {

    public function index() {
        $dados = array();
        /*
        $u = new Bolao();

        $lista = $u->lista();

        $dados['lista'] = $lista;

        if ($u->numRows > 0){
            $this->loadTemplate('bolao',$dados);
        } else {
            ?>
            <br/>
            <div class="alert alert-warning">
                <strong>Atenção!</strong> Não existe bolões ativos
            </div>
            <?php
        }*/
    }

    public function cadastrar($id_rodada) {
        $dados = array();
        $r = new JogoRodada();
        $t = new TimesBolao();
        
        if (isset($_POST['e_casa']) && !empty($_POST['e_casa'])) {
            $nulo = null;

            $r->setId_rodada($id_rodada);
            $r->setId_time_casa($_POST['e_casa']);
            $r->setId_time_visitante($_POST['e_visitante']);
            $r->setSituacao('A');
            $r->setDt_jogo($_POST['e_data']);
            $r->incluir();
            unset($_POST['e_casa']);
            $_POST['e_casa'] = null;
        }
        
        /*
        if (isset($_POST['descricao']) && !empty($_POST['descricao'])) {
            $i = 1;
            foreach($_POST['descricao'] as $u) {
                $r->setId_bolao($id_bolao);
                $r->setDescricao($_POST['descricao'][$i]);
                $r->setNumero($_POST['numero'][$i]);
                $r->setDtInicio($_POST['dt_inicio'][$i]);
                $r->setDtFim($_POST['dt_fim'][$i]);
                $r->setSituacao($_POST['situacao'][$i]);
                $r->atualizar($_POST['id_rodada'][$i]);

                $i++;
            }
        }
        */

        $id_bolao = $_SESSION['id_bolao_ativo'] ;
        $lista = $r->lista($id_rodada);
        $times = $t->lista($id_bolao);
        $dados['lista'] = $lista;
        $dados['times'] = $times;
        $dados['id_rodada'] = $id_rodada;
        $dados['rows'] = $r->numRows;

        $this->loadTemplate('cadastrar_jogos',$dados);

    }
}

