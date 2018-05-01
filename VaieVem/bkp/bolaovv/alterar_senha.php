<?php

require 'config.php';
require 'Classes/usuarios.class.php';

$h = $_GET('h');

if (isset($_POST['senha']) && empty($_POST['senha']) == false) {
    $senha = addslashes($_POST['senha']);
    $senha2 = addslashes($_POST['senha2']);
    if ($senha != $senha2) {
        ?>
            <br/>
            <div class="alert alert-danger">
                Senhas informadas são divergentes.
            </div>
        <?php
    } else {
        $u = new Usuarios($pdo);
    
        $ret = $u->buscaUsuarios($id);

        if ($ret) {
            $u->setSenha($senha);
            $u->salvar();
        } else {
            ?>
                <br/>
                <div class="alert alert-danger">
                    E-mail não cadastrado.
                </div>
            <?php
        }
    }
} 
?>
 
<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Vai-e-Vem</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets\css\style.css" />
		<script src="assets\js\jquery.min.js"></script>
  		<script src="assets\js\bootstrap.min.js"></script>

	</head>
	<body>
		<div class="container">
			<br/><br/><br/><br/>
	
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<nav class="navbar">
							<table align="center">
								<tr>
									<td align="center"> <img src="../assets/images/Logo.png" alt="Lights" style="width:50%"> </td>
									<td align="center" style="color:#FFFFFF;"> <h1>Login</h1> </td>
								</tr>
							</table>
						</nav>

						<div class="well">
							<form method="POST">
										
									<br/><br/>
									<label class="control-label col-sm-2" for="senha">Senha:</label>
									<input type="password" class="form-control" id="senha" placeholder="Informe a senha" name="senha">
									<br/><br/>
                                    <label class="control-label col-sm-2" for="senha2">Confirmar:</label>
									<input type="password" class="form-control" id="senha2" placeholder="Confirme a senha" name="senha2">
									<br/><br/>
									<button type="submit" class="btn btn-success">Enviar</button>

							</form>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
		</div>
	</body>
</html>
