<?php
class palpiteController extends controller {

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
        echo "Página não existente.";
        exit;

        //$this->loadTemplate('palpite',$dados);
    }

    public function enviar($nr_rodada) {
        $dados = array();
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d H:i');
        $p = new Palpite();

        //Verifica se foi preenchido o placar
        if (isset($_POST['qt_gols_casa']) && !empty($_POST['qt_gols_casa'])) {
            $i = 1;
            
            
            foreach($_POST['qt_gols_casa'] as $u) {

                $p->setId_jogo_rodada($_POST['id_jogo_rodada'][$i]);
                $p->setId_usuario_bolao($_SESSION['id_usuario']);
                $p->setQt_gols_casa($_POST['qt_gols_casa'][$i]);
                $p->setQt_gols_fora($_POST['qt_gols_fora'][$i]);
                $p->setSituacao('P');
                $p->setDt_palpite($date);

                if (isset($_POST['qt_gols_casa'][$i]) && !empty($_POST['qt_gols_casa'][$i]) &&
                    isset($_POST['qt_gols_fora'][$i]) && !empty($_POST['qt_gols_fora'][$i]) ) {

                    if (isset($_POST['id_palpite'][$i]) && !empty($_POST['id_palpite'][$i])) {
   
                        $p->atualizar($_POST['id_palpite'][$i]);
                    } else {

                        $p->incluir();
                    }
                }
                $i++; 
            }
        } 
        
        $id_bolao = $_SESSION['id_bolao_ativo'];
        $id_usuario = $_SESSION['id_usuario'];
        $lista = $p->lista($nr_rodada,$id_bolao,$id_usuario);
        $dados['lista'] = $lista;
        $dados['rows'] = $p->numRows;
        //$dados['dsc_rodada'] = $lista['dsc_rodada'][0];

        if ($p->numRows <= 0) {
            echo "Rodada não existente";
            exit;
        }
        
        $tot = $p->numRows;
        
        $dados['Pagina'] = $nr_rodada;
        $this->loadTemplate('palpite',$dados);

    }
}

