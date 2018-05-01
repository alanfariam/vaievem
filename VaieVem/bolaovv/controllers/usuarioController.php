<?php
class usuarioController extends controller {

    public function index() {
        $dados = array();
        $u = new Usuarios();

        $lista = $u->lista();

        $dados['lista'] = $lista;

        if ($u->numRows > 0){
            $this->loadTemplate('usuarios',$dados);
        } else {
            echo "<h1>"."Não existe usuários"."</h1>";
        }
    }

    public function cadastrar() {
        $dados = array();

        $u = new Usuarios();
        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
            $nome 		= addslashes($_POST['nome']);
            $usuario 	= addslashes($_POST['usuario']);
            $email 		= addslashes($_POST['email']);
            $senha 		= addslashes($_POST['senha']);
            $tipo 		= 'U';

            if (!empty($nome) && !empty($usuario) && !empty($email) && !empty($senha)) {
                $valida = $u->cadastrar($nome,$usuario,$email,$senha,$tipo);
                if ($valida) {
                    ?>
                    <br/>
                    <div class="alert alert-success">
                        Cadastro realizado com sucesso. <a href="<?php echo BASE_URL; ?>login" class="alert-link">Faça o login agora</a>
                    </div>
                    <?php
                } else {
                    ?>
                        <br/>
                        <div class="alert alert-danger">
                            <?php echo $u->erro; ?>
                        </div>
                        <?php
                }

            } else {
                ?>
                <div class="alert alert-warning">
                    Favor preencher todos os campos.
                </div>
                <?php
            }	
        }
            
        $this->loadView('cadastrar_usuario',$dados);

    }
}