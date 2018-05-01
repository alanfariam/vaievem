<?php
require '../config.php';
require '../Classes/usuarios.class.php';


$u = new Usuarios($pdo);

$lista = $u->lista();

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
  		<script src="assets\js\bootstrap.bundle.min.js"></script>

		</style>
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

                    <?php
                    if ($u->numRows > 0)  {
                        foreach($lista as $usuarios) {

                            echo "<tr>";
                            echo "<td>".$usuarios['id_usuario']."</td>";
                            echo "<td>"."<input type='text' class='form-control' id='nome' name='nome' value='".$usuarios['nome']."'>"."</td>";
                            echo "<td>"."<input type='text' class='form-control' id='usuario' name='usuario' value='".$usuarios['usuario']."'>"."</td>";
                            echo "<td>"."<input type='email' class='form-control' id='email' name='email' value='".$usuarios['email']."'>"."</td>";
                            echo "<td>"."<input type='text' class='form-control' id='tipo' name='tipo' value='".$usuarios['tipo']."'>"."</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<h1>"."Não existe usuários"."</h1>";
                    }
                    ?>

                </tbody>
            </table>
            <input type="submit" class="btn btn-success" value="Salvar">
            </form>
        </div>
    </body>
</html>


<?php



if(isset($_POST['nome'])) {
    echo 'entrou </br>';
    echo $_POST['nome'];
//	$nome = htmlentities($_POST['nome'], ENT_QUOTES | ENT_HTML5, 'UTF-8');

//	echo $nome;
}
?>