<?php

session_start();

if (isset($_SESSION['id_usuario']) && empty($_SESSION['id_usuario']) == false) {
	
} else {
	header("Location: login.php");
}


?>


<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Vai-e-Vem</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<script src="assets/js/jquery.min.js"></script>
  		<script src="assets/js/bootstrap.min.js"></script>
  		<link href="assets/css/style.css" rel="stylesheet"/>
	</head>
	<body>
		<div class="container">

			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
			      		<li><a href="./"><img src="../assets/images/Logo.png" border = "0" width="40" ></a></li>
			    	</div>

					<ul class="nav navbar-nav">
						<li><a href="index.php"> Home</a></li>
						<li><a href="../construcao.html"> Colunistas</a></li>
						<li><a href="../construcao.html"> Ajuda</a></li>

						
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li><a href="https://www.facebook.com/vaievemfutebol/"><img src="../assets/images/facebook.png" border = "0" width="30"></a></li>
						<li><a href="https://twitter.com/vaievem_futebol"><img src="../assets/images/twitter.png" border = "0" width="30"></a></li>
						<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> 
							<?php echo $_SESSION['usuario'] ?>
						</a></li>

					</ul>

					
				</div>
			</nav>

			<div class="alert alert-info">
			  	<h4> <strong>Seja nosso colaborador: </strong> Poste notícias de seu clube com a tag #PortalVV e veja seu twitter divulgado no site.</h4>
			</div>

			<div class="row">
				<div class="col-sm-6">
					
				</div>
				<div class="col-sm-6">
          
				</div>
			</div>
	
		</div>

	</body>
</html>