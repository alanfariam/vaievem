<div class="container">
    <br>
    <br>
    <h3> Rodada: 
    <?php
        echo $lista['0']['dsc_rodada'];
    ?>
    </h3>
    <br>
    <br>


    <div class="container">
        <div class="jumbotron">
        
            <form method='POST'>
            <div class="row justify-content-md-center">
                <div class="col-2 align-items-center style='text-align: center'"></div>
                <div class="col-2 align-items-center style='text-align: center'"><b>Data do Jogo</b></div>
                <div class="col-2 align-items-center style='text-align: center'"></div>
                <div class="col-2 align-items-center"><b>Jogo </b>        </div>
                <div class="col-2 align-items-center style='text-align: center'"></div>
                <div class="col-2 align-items-center"><b>Data do Palpite </b>        </div>
            </div>

                <?php
                $i = 1;
                
                foreach($lista as $jogo) {
                    echo "<div class='row justify-content-center align-items-center'>";

                    //echo "<div class='col-1' >";
                    echo "<input readonly='readonly' TYPE='hidden' style='text-align: center' class='form-control' name='id_jogo_rodada[".$i."]' value='".$jogo['id_jogo_rodada']."'>";
                    echo "<input readonly='readonly' TYPE='hidden' style='text-align: center' class='form-control' name='id_palpite[".$i."]' value='".$jogo['id_palpite']."'>";
                    //echo "</div>";

                    echo "<div class='col-2'>";
                    echo "<small>".$jogo['dt_jogo']."</small>"."</div>";

                    echo "<div class='col-1' style='text-align: left'>";
                    echo "<b>".$jogo['casa']."</b>"."</div>";

                    echo "<div class='col-1'>";
                    echo "<input  class='form-control' style='text-align: center' name='qt_gols_casa[".$i."]' value='".$jogo['qt_gols_casa']."'>"."</div>";
                    
                    echo "<div class='col-1' style='text-align: center'> <b> X </b> </div>";

                    echo "<div class='col-1'>";
                    echo "<input class='form-control' style='text-align: center' name='qt_gols_fora[".$i."]' value='".$jogo['qt_gols_fora']."'>"."</div>";

                    echo "<div class='col-1'>";
                    echo "<b>".$jogo['visitante']."</b>"."</div>";
                    
                    echo "<div class='col-2'>";
                    echo "<small>".$jogo['dt_palpite']."</small>"."</div>";
                
                    $i++;
                    echo "</div>";
                }
                ?>
            <br>
        </div>
        <input type="submit" class="btn btn-success" value="Salvar">
        </form>
    </div>

    <br>
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="<?php echo BASE_URL."palpite/enviar/".($Pagina-1); ?>">Anterior</a>
        </li>
        <li class="page-item"><a class="page-link" href="<?php echo BASE_URL."palpite/enviar/".($Pagina-1); ?>"><?php echo $Pagina-1; ?></a></li>
        <li class="page-item active">
            <span class="page-link">
                <?php echo $Pagina; ?>
                <span class="sr-only"><?php echo $Pagina; ?></span>
            </span>
        </li>
        <li class="page-item"><a class="page-link" href="<?php echo BASE_URL."palpite/enviar/".($Pagina+1); ?>"><?php echo $Pagina+1; ?></a></li>
        <li class="page-item">
            <a class="page-link" href="<?php echo BASE_URL."palpite/enviar/".($Pagina+1); ?>">Próximo</a>
        </li>
    </ul>
</div>