<?php
class homeController extends controller {

    public function index() {
        $dados                      = array();
        $id                         = $_SESSION['id_usuario'];
        $dados['id_usuario']        = $id;
        $dados['tipo']              = $_SESSION['tipo'];
        $dados['NomeUsuario']       = $_SESSION['nome'];

        $u = new UsuariosBolao();

        $ds_bolao = $u->verifica_bolao($id);

        $dados['ds_bolao']          = $ds_bolao;
        $dados['total_inscritos']   = $u->total_inscritos;
        $dados['id_bolao_ativo']    = $u->geId_Bolao();
        $_SESSION['id_bolao_ativo'] = $u->geId_Bolao();
        $dados['num_rodada']        = 1;

        if ($u->geId_Bolao() > 0) {
            $r = new Rodada();
            $rodadaAtual = $r->rodada_atual($u->geId_Bolao());
            $_SESSION['rodada_atual'] = $rodadaAtual;

        }

        $this->loadTemplate('home',$dados);
    }
}