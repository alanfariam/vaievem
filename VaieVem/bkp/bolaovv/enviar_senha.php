<?php

require 'config.php';
require 'Classes/usuarios.class.php';

if (isset($_POST['email']) && empty($_POST['email']) == false) {
	$email = addslashes($_POST['email']);

    $u = new Usuarios($pdo);
    
    $ret = $u->buscaUsuariosE($email);

    if ($ret) {
        $id         = $u->getId_usuario();
        $nome       = $u->getNome();
        $md5        = md5($id);
        //$link       = "http://www.portalvv.com.br/bolaovv/alterar_senha.php?h=".$md5;
        $link       = "http://localhost/VaieVem/bolaovv/alterar_senha.php?h=".$md5;
        $assunto    = "Alterar senhar portal Vai e Vem";
        $msg        = "Click no link abaixo para alterar sua senha:\n\n".$link;
        $header     = "From: PortalVaiEVem@gmail.com"."\r\n".
                      "X-Mailer: PHP/".phpversion();
        mail($email,$assunto,$msg ,$header);

        ?>
            <br/>
            <div class="alert alert-info">
                Link para alteração e senha enviada para seu e-mail.
            </div>
        <?php
        exit;

    } else {
        ?>
            <br/>
            <div class="alert alert-danger">
                E-mail não encontrado.
            </div>
		<?php
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
									<label class="control-label col-sm-2" for="email">E-mail:</label>
									<input type="email" class="form-control" id="email" placeholder="informe email" name="email">
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
