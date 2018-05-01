<?php
class bolaoController extends controller {

    public function index() {
        $dados = array();
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
    }
}