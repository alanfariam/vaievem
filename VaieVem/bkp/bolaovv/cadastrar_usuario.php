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
			<?php
			require 'config.php';
			require 'Classes/usuarios.class.php';

			$u = new Usuarios($pdo);
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
							Cadastro realizado com sucesso. <a href="login.php" class="alert-link">Faça o login agora</a>
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

			?>
			<br/><br/><br/>
			<div class="well">

				<nav class="navbar">

					<table align="center">
						<tr>
							<td align="center"> <img src="../assets/images/Logo.png" alt="Lights" style="width:50%"> </td>
							
							<td align="center"> <h2>Cadastrar</h2> </td>
							
						</tr>
					</table>
				</nav>

				<form method="POST">
					<div class="form-group">
						<br/>
						<label class="control-label col-sm-2" for="nome">Nome:</label>
						<input type="text" class="form-control" id="nome" placeholder="Informe o Nome Completo" name="nome">
						<br/>
						<label class="control-label col-sm-2" for="usuario">Usuário:</label>
						<input type="text" class="form-control" id="usuario" placeholder="Informe o usuário" name="usuario">
						<br/>
						<label class="control-label col-sm-2" for="email">E-mail:</label>
						<input type="email" class="form-control" id="email" placeholder="Informe o e-mail" name="email">
						<br/>
						<label class="control-label col-sm-2" for="senha">Senha:</label>
						<input type="password" class="form-control" id="senha" placeholder="Informe a senha" name="senha">
						<br/><br/>
						<input type="submit" class="btn btn-success" value="Cadastrar">
					</div>
				</form>
				
			</div>
		</div>
	</body>
</html>

