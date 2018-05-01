
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
				<div class="row justify-content-md-center">
					<!--<div class="col-4"></div>-->

					<div class="col col-lg-5">
						<div class="text-center">
							<br>
							<img src="<?php echo BASE_URL; ?>assets/images/Logo.png" class="img-fluid" alt="Responsive image">
							<br>
						</div>

						<div class="jumbotron">
							<form method="POST">
								<label class="control-label col-sm-4" for="email">E-mail:</label>
								<input type="email" class="form-control" id="email" placeholder="informe email" name="email">
								<br/>
								<label class="control-label col-sm-4" for="senha">Senha:</label>
								<input type="password" class="form-control" id="senha" placeholder="Informe a senha" name="senha">
								<br/>
								<button type="submit" class="btn btn-success">Enviar</button>
							</form>
							<br/>
							<a href="<?php echo BASE_URL; ?>usuario/cadastrar">Cadastrar</a>
							<br/>
							<a href="<?php echo BASE_URL; ?>usuario/senha">Esqueci a senha</a>
						</div>
					</div>

					<!--<div class="col-4"></div>-->

				</div>
		</div>
		<script src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
  		<script src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	</body>
</html>
