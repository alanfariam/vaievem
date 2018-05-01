
<div class="container">
    <br>
    <h2>Bolões Ativos</h2>
    <br>
    <form method='POST'>
    <table class="table table-bordered table-striped table-hover table-sm">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Dt. Inicio</th>
                <th>Dt. Fim</th>
                <th>Valor</th>
                <th>Incrição</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($lista as $boloes) {

            echo "<tr>";
            echo "<td>".$boloes['id_bolao']."</td>";
            echo "<td>".$boloes['descricao']."</td>";
            echo "<td>".$boloes['dt_inicio']."</td>";
            echo "<td>".$boloes['dt_fim']."</td>";
            echo "<td>".$boloes['valor']."</td>";
            ?>
            <td><a href="<?php echo BASE_URL; ?>usuarios_bolao/inscrever/<?php echo $boloes['id_bolao']; ?>" class="btn btn-success btn-xs" role="button">Increver</a></td>
            <?php
            echo "</tr>";
        }
        
        ?>
        
        </tbody>
    </table>
    </form>
</div>