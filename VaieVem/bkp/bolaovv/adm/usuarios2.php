<?php
require '../config.php';
require '../Classes/usuarios.class.php';


$u = new Usuarios($pdo);

$lista = $u->lista();





?>

<!doctype html>
<html>
	<head lang="pt-br">
		<meta content="text/html; charset=utf8" http-equiv="Content-Type">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Vai-e-Vem</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

		<link rel="stylesheet" href="assets\css\style.css" />
	</head>
    <body>
        <div class="container">
            <h2>Usuários Cadastrados</h2>
            <form method='POST'>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Usuário</th>
                        <th>E-mail</th>
                        <th>Tipo</th>
                    </tr>
                </thead>
                <tbody>

                  <?php if ($u->numRows > 0): ?>
                        <?php foreach($lista as $usuarios): ?>

                            <tr>;
                            <td>$usuarios['id_usuario'].</td>;
                            <td><input type='text' class='form-control' id='nome' name='nome' value='<?php echo htmlentities($usuarios['nome'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>' /></td>"
                            <td><input type='text' class='form-control' id='usuario' name='usuario' value='<?php echo htmlentities($usuarios['usuario'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>' /></td>
                            <td><input type='email' class='form-control' id='email' name='email' value='<?php echo htmlentities($usuarios['email'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>' /></td>
                            <td><input type='text' class='form-control' id='tipo' name='tipo' value='<?php echo htmlentities($usuarios['tipo'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>' /></td>
                            </tr>";
                        <?php endforeach; ?>
                    
                    <?php else: ?>
                        echo "<h1>"."Não existe usuários"."</h1>";
                    <?php endif; ?>
                    ?>

                </tbody>
            </table>
            <button class="btn btn-success">Enviar</button>
            </form>
        </div>
        <script src="assets\js\jquery.min.js"></script>
  		<script src="assets\js\bootstrap.bundle.min.js"></script>
    </body>
</html>

<?php

if(isset($_POST['nome'])) {
	$nome = htmlentities($_POST['nome'], ENT_QUOTES | ENT_HTML5, 'UTF-8');

	echo $nome;
}
?>