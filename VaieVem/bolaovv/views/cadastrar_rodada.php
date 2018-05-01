
<div class="container">
    <br>
    <h2>Cadastrar Rodadas</h2>
    <br>
    <form method='POST'>
    <br>
    <table class="table table-bordered table-striped table-hover table-sm">
        <thead class="thead-dark">
            <tr>
                <th>Descrição</th>
                <th>Número</th>
                <th>Dt. Inicio</th>
                <th>Dt. Fim</th>
                <th>Situação</th>
            </tr>
        </thead>
        <tbody>

        <td> <input type='text' class='form-control' name='e_descricao' ></td>
        <td> <input type='value' class='form-control' name='e_numero' ></td>      
        <td> <input type='date' class='form-control' name='e_dt_inicio' ></td>
        <td> <input type='date' class='form-control' name='e_dt_fim' ></td>
        <td> <input type='text' class='form-control' name='e_situacao' ></td>
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
                <th>Descrição</th>
                <th>Número</th>
                <th>Dt. Inicio</th>
                <th>Dt. Fim</th>
                <th>Situação</th>
                <th>Jogos</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach($lista as $rodadas) {

            echo "<tr>";
            echo "<td>"."<input type='checkbox' name='exclui[".$i."]' value='true'>"."</td>";
            echo "<td>"."<input readonly='readonly' type='number' class='form-control' name='id_rodada[".$i."]' value='".$rodadas['id_rodada']."'>"."</td>";
            echo "<td>"."<input type='text' class='form-control' name='descricao[".$i."]' value='".$rodadas['descricao']."'>"."</td>";
            echo "<td>"."<input type='number' class='form-control' name='numero[".$i."]' value='".$rodadas['numero']."'>"."</td>";
            echo "<td>"."<input type='text' class='form-control' name='dt_inicio[".$i."]' value='".$rodadas['dt_inicio']."'>"."</td>";
            echo "<td>"."<input type='text' class='form-control' name='dt_fim[".$i."]' value='".$rodadas['dt_fim']."'>"."</td>";
            echo "<td>"."<input type='text' class='form-control' name='situacao[".$i."]' value='".$rodadas['situacao']."'>"."</td>";
            echo "<td>"."<a href='".BASE_URL."jogoRodada/cadastrar/".$rodadas['id_rodada']."' class='btn btn-info' role='button'>Jogos</a>"."</td>";
            echo "</tr>";
            $i++;
            //href='BASE_URL'."jogoRodada/cadastrar/".$rodadas['id_rodada']"

            //<a href='#' class='btn btn-info' role='button'>Salvar</a>
        }
        ?>
        </tbody>
    </table>
        <input type="submit" class="btn btn-success" value="Salvar">
    </form>
</div>

