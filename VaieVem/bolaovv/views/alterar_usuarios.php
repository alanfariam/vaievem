
<div class="container">
    <h2>Usuários Cadastrados</h2>
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
            echo "<td>"."<input type='text' class='form-control' id='nome' name='nome' value='".$usuarios['nome']."'>"."</td>";
            echo "<td>"."<input type='text' class='form-control' id='usuario' name='usuario' value='".$usuarios['usuario']."'>"."</td>";
            echo "<td>"."<input type='email' class='form-control' id='email' name='email' value='".$usuarios['email']."'>"."</td>";
            echo "<td>"."<input type='text' class='form-control' id='tipo' name='tipo' value='".$usuarios['tipo']."'>"."</td>";
            echo "</tr>";
        }
        
        ?>
        
        </tbody>
    </table>
    </form>
</div>