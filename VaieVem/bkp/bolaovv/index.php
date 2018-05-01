

<?php 
session_start();

if (isset($_SESSION['id_usuario']) && empty($_SESSION['id_usuario']) == false) {
	
} else {
	header("Location: login.php");
}


require 'header.php'; 
?>



<div class="container">
	<div class="container-fluid">
		<div class="jumbotron">
			<h4> Seja Bem Vindo <?php echo $_SESSION['nome']?>!</h4>
		</div>
	</div>
</div>