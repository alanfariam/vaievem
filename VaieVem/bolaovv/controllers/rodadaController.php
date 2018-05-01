<?php
class rodadaController extends controller {

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
        }
        */
    }

    public function cadastrar($id_bolao) {
        $dados = array();
        $r = new Rodada();
        if (isset($_POST['e_descricao']) && !empty($_POST['e_descricao'])) {
            $nulo = null;
            $r->setId_bolao($id_bolao);
            $r->setDescricao($_POST['e_descricao']);
            $r->setNumero($_POST['e_numero']);
            $r->setDtInicio($_POST['e_dt_inicio']);
            $r->setDtFim($_POST['e_dt_fim']);
            $r->setSituacao($_POST['e_situacao']);
            $r->incluir();
            unset($_POST['e_descricao']);
            $_POST['e_descricao'] = null;
        }

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


        $lista = $r->lista($id_bolao);
        $dados['lista'] = $lista;
        $dados['id_bolao'] = $id_bolao;
        $dados['rows'] = $r->numRows;

        $tot = $r->numRows;

        $this->loadTemplate('cadastrar_rodada',$dados);

    }
}

