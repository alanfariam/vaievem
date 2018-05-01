
<div class="container">
    <br>
    <h2>Cadastrar Jogos</h2>
    <br>
    <form method='POST'>
    <br>
    <table class="table table-bordered table-striped table-hover table-sm">
        <thead class="thead-dark">
            <tr>
                <th>Time Casa</th>
                <th>Time Visitante</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>

        <td> 
            <select class="form-control" name='e_casa'>
                <option value=null> </option>
                <?php
                    foreach($times as $t) {
                        echo "<option value='".$t['id_time']."'>".$t['nome']."</option>";
                    }
                ?>
             </select>
        </td>

        <td> 
            <select class="form-control" name='e_visitante'>
                <option value=null> </option>
                <?php
                    foreach($times as $t) {
                        echo "<option value='".$t['id_time']."'>".$t['nome']."</option>";
                    }
                ?>
             </select>
        </td>
            
        <td> <input type='date' class='form-control' name='e_data' ></td>
        </tbody>
    </table>
    <input type="submit" class="btn btn-success" value="Adicionar">

    <br><br>
    <br><br>
    <table class="table table-bordered table-striped table-hover table-sm">
        <thead class="thead-dark">
            <tr>
                <th>Excluir</th>
                <th>ID</th>
                <th>Time Casa</th>
                <th>Gols Casa</th>
                <th>Time Visitante</th>
                <th>Gols Visitante</th>
                <th>Situação</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach($lista as $jogo) {

            echo "<tr>";
            echo "<td>"."<input type='checkbox' name='exclui[".$i."]' value='true'>"."</td>";
            echo "<td>"."<input readonly='readonly' type='number' class='form-control' name='id_jogo_rodada[".$i."]' value='".$jogo['id_jogo_rodada']."'>"."</td>";
            echo "<td>".$jogo['nm_casa']."</td>";
            echo "<td>"."<input type='number' class='form-control' name='nr_gols_casa[".$i."]' value='".$jogo['nr_gols_casa']."'>"."</td>";
            echo "<td>".$jogo['nm_visitante']."</td>";
            echo "<td>"."<input type='number' class='form-control' name='nr_gols_visitante[".$i."]' value='".$jogo['nr_gols_visitante']."'>"."</td>";
            echo "<td>"."<input type='text' class='form-control' name='situacao[".$i."]' value='".$jogo['situacao']."'>"."</td>";
            echo "<td>"."<input type='text' class='form-control' name='dt_jogo[".$i."]' value='".$jogo['dt_jogo']."'>"."</td>";
            echo "</tr>";
            $i++;
        }
        ?>
        </tbody>
    </table>
        <input type="submit" class="btn btn-success" value="Salvar">
    </form>
</div>

