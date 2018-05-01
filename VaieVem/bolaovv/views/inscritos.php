<div class="container">
    <br>
    <h2>Usuários Inscritos</h2>
    <br>
    <form method='POST'>
    <table class="table table-bordered table-striped table-hover table-sm">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Nome</th>
                <th>Situação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($inscritos as $usuarios) {

                echo "<tr>";
                echo "<td>".$usuarios['id_usuario']."</td>";
                echo "<td>".$usuarios['usuario']."</td>";
                echo "<td>".$usuarios['nome']."</td>";
                echo "<td>".$usuarios['situacao']."</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    </form>
</div>