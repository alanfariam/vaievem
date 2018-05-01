<?php
class sairController extends controller {

    public function index() {
        $dados = array();
        unset($_SESSION['id_usuario']);
        //header("Location: ".BASE_URL);
        ?>
				<script type="text/javascript">window.location.href="login";</script>
		<?php
        exit;
    }
}