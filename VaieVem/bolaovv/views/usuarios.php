
<div class="container">
    <br>
    <h2>Usuários Cadastrados no Site</h2>
    <br>
    <form method='POST'>
    <table class="table table-bordered table-striped table-hover table-sm">
        <thead class="thead-dark">
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
            foreach($lista as $usuarios) {

                echo "<tr>";
                echo "<td>".$usuarios['id_usuario']."</td>";
                echo "<td>".$usuarios['nome']."</td>";
                echo "<td>".$usuarios['usuario']."</td>";
                echo "<td>".$usuarios['email']."</td>";
                echo "<td>".$usuarios['tipo']."</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    </form>
</div>