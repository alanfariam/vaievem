<?php
class usuarios_bolaoController extends controller {

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

    public function inscrever($id_bolao) {
        $dados = array();
        $u = new UsuariosBolao();
        $id_usuario = $_SESSION['id_usuario'];
        $existe = $u->verifica_inscricao($id_bolao,$id_usuario);

        if ($existe) {
            $mensagem = "Usuário já cadastrado nesse bolão!";
        } else {
            $msg = $u->inscrever($id_bolao,$id_usuario);
            $mensagem = "Usuário cadastrado com sucesso!";
        }

        $dados['mensagem'] = $mensagem;

        $lista = $u->lista($id_bolao);

        $dados['inscritos'] = $lista;

        $this->loadTemplate('inscricao',$dados);
        $this->loadView('inscritos',$dados);

    }

    public function inscritos() {
        $dados = array();
        $u = new UsuariosBolao();
        $id_bolao_ativo = $_SESSION['id_bolao_ativo'];

        $lista = $u->lista($id_bolao_ativo);

        $dados['inscritos'] = $lista;

        $this->loadTemplate('inscritos',$dados);

    }
}