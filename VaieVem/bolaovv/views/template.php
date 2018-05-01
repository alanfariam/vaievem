
<!doctype html>
<html>
	<head>
		<?php
			if(!isset($_SESSION['id_usuario'])) { 
				?>
				<script type="text/javascript">window.location.href="login";</script>
				<?php
				exit;
			}
			?>

		<meta charset="utf-8" />
		<title>BOLÃO VAI-E-VEM</title>
		<link rel="icon" href="<?php echo BASE_URL; ?>assets/images/icon.png">
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap4.min.css"/>
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css"/>

	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>assets/images/Logo.png" border = "0" width="40" > BolãoVV</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo BASE_URL; ?>">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item dropdown active">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Usuários
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?php echo BASE_URL."usuarios_bolao"; ?>">Inscrever</a>
						<a class="dropdown-item" href="<?php echo BASE_URL."usuarios_bolao/inscritos"; ?>">Inscritos</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo BASE_URL."palpite/enviar/1"; ?>">Jogos</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="#">Classificação</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="#">Regulamento</a>
					</li>
					
				</ul>
				<ul class="navbar-nav mr-right">
					
					<?php
						if ($_SESSION['tipo'] == 'A') {
							?>
							<li class="nav-item dropdown active">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Administração
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="<?php echo BASE_URL."usuario"; ?>">Usuários</a>
									<a class="dropdown-item" href="<?php echo BASE_URL."rodada/cadastrar/".$_SESSION['id_bolao_ativo']; ?>">Rodada</a>
									<a class="dropdown-item" href="<?php echo BASE_URL."#"; ?>">Jogos</a>
									<a class="dropdown-item" href="<?php echo BASE_URL."#"; ?>">Resultados</a>
								</div>
							</li>
							<?php
						}

					?>
					
					<li class="nav-item">
						<a class="nav-link" href="<?php echo BASE_URL; ?>sair"><span class="glyphicon glyphicon-log-in"></span> 
								Sair de <?php echo $_SESSION['usuario'] ?></a>
					</li>
				</ul>
				
		</nav>


		<div class="container">
            <?php $this->loadViewInTemplate($viewName, $viewData);?>
		</div>



        <script src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
  		<script src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo BASE_URL; ?>assets/js/script.js"></script>

	</body>
</html>