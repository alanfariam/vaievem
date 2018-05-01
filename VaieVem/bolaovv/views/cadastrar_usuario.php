<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Bolão-Vai-e-Vem</title>
		<link rel="icon" href="assets/images/icon.png">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap4.min.css"/>
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css"/>
	</head>
	<body>
		<div class="container">
			<br/>
			<div class="jumbotron">

				<nav class="navbar">
					<table align="center">
						<tr>
							<td align="center"> <img src="<?php echo BASE_URL; ?>assets/images/Logo.png" alt="Lights" style="width:50%"> </td>
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

        <script src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
  		<script src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	</body>
</html>

