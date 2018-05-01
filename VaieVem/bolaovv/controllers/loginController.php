<?php
class loginController extends controller {

    public function index() {
        $dados = array();
        if (isset($_POST['email']) && empty($_POST['email']) == false) {

            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);

            $u = new Usuarios();
        
            try{
                $valida = $u->login($email,$senha);
        
                if ($valida) {
                    //$this->loadTemplate('home',$dados);
                    header("Location: ".BASE_URL."home");
                    exit;
                } else {
                    ?>
                        <br/>
                        <div class="alert alert-danger">
                            <?php echo $u->erro; exit;?>
                        </div>
                    <?php
                }
        
            } catch (PDOException $e) {
                echo "Falhou: ".$e->getMessage();
            }
        } 
        $this->loadView('login',$dados);
  
    }
}

