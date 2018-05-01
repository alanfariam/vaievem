<?php

if (isset($_POST['email']) && empty($_POST['email']) == false) {
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);

	$u = new Usuarios($pdo);


	try{
		$valida = $u->login($email,$senha);

		if ($valida) {
			header("Location: index.php");
		} else {
			?>
				<br/>
				<div class="alert alert-danger">
					<?php echo $u->erro; ?>
				</div>
			<?php
		}

	} catch (PDOException $e) {
		echo "Falhou: ".$e->getMessage();
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
									<label class="control-label col-sm-2" for="senha">Senha:</label>
									<input type="password" class="form-control" id="senha" placeholder="Informe a senha" name="senha">
									<br/><br/>
									<button type="submit" class="btn btn-success">Enviar</button>

							</form>
							<br/>
							<a href="cadastrar_usuario.php">Cadastrar</a>
							<br/>
							<a href="enviar_senha.php">Esqueci a senha</a>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
		</div>
	</body>
</html>
