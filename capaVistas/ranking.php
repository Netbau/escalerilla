<div class="tabbable">
    <ul class="nav nav-tabs">
        <?php
        include 'capaControladores/jugadores.php';
        $categorias = Jugadores::getCategorias();
        $contador = 0;
        foreach ($categorias as $categoria) {
            if ($contador == 0) {
                echo '<li class="active"><a href="#categoria' . $categoria['categoria'] . '" data-toggle="tab">Categor&iacute;a ' . $categoria['categoria'] . '</a></li>';
            } else {
                echo '<li><a href="#categoria' . $categoria['categoria'] . '" data-toggle="tab">Categor&iacute;a ' . $categoria['categoria'] . '</a></li>';
            }
            $contador++;
        }
        ?>
    </ul>

    <div class="tab-content">
        <?php
        $contador2 = 0;
        foreach ($categorias as $categoria) {
            if ($contador2 == 0) {
                echo '<div id="categoria' . $categoria['categoria'] . '" class="tab-pane active">';
            } else {
                echo '<div id="categoria' . $categoria['categoria'] . '" class="tab-pane">';
            }
            $letra = $categoria['categoria'];
            $ranking = Jugadores::getRankingPorCategoria($letra);
            echo '<table class="table table-hover table-bordered table-condensed">
                <tr class="">
                <th><center>Posici&oacute;n</center></th>
                <th><center>Foto</center></th>
                <th><center>Nombre Jugador</center></th>
                <th><center>Victorias</center></th>
                <th><center>Cambios</center></th>
                </tr>';
            foreach($ranking as $jugador){
                echo '<tr>';
                echo '<td><center>'.$jugador['ranking'].'</center></td>';
                echo '<td><center><img class="img img-rounded" src="'.$jugador['foto'].'" height ="100" width="100"></center></td>';
                echo '<td><center>'.$jugador['nombre'].' '.$jugador['apellido'].'</center></td>';
                echo '<td><center>0</center></td>';
                echo '<td><center>--</center></td>';
                echo '</tr>';
            }
            echo '</table>';
            echo '</div>';
            $contador2++;
        }
        ?>
        <div id="pane1" class="tab-pane">
            <!--<h4>Puede ir un T&iacute;tulo</h4>-->
            <table class="table table-hover table-bordered table-condensed">
                <tr class="">
                    <th><center>Posici&oacute;n</center></th>
                <th><center>Foto</center></th>
                <th><center>Nombre Jugador</center></th>
                <th><center>Victorias</center></th>
                <th><center>Cambios</center></th>
                </tr>
                <tr class="success">
                    <td><center>1</center></td>
                <td><center><img class="img img-rounded" src="http://thesocialmediapro.co/wp-content/uploads/2011/11/facebook-profile-picture.jpg" height ="200" width="200"></center></td>
                <td><center>Andr&eacute;s Silberstein</center></td>
                <td><center>324</center></td>
                <td><center>1<i class="icon icon-arrow-up"></i></center></td>
                </tr>
                <tr class="error">
                    <td><center>2</center></td>
                <td><center><img class="img img-rounded" src="http://thesocialmediapro.co/wp-content/uploads/2011/11/facebook-profile-picture.jpg" height ="100" width="100"></center></td>
                <td><center>Le&oacute;n Steuermann</center></td>
                <td><center>123</center></td>
                <td><center>1<i class="icon icon-arrow-down"></center></td>
                </tr>
                <tr class="error">
                    <td><center>3</center></td>
                <td><center><img class="img img-rounded" src="http://thesocialmediapro.co/wp-content/uploads/2011/11/facebook-profile-picture.jpg" height ="150" width="150"></center></td>
                <td><center>Ricardo Segal</center></td>
                <td><center>100</center></td>
                <td><center>1<i class="icon icon-arrow-down"></center></td>
                </tr>
                <tr >
                    <td><center>4</center></td>
                <td><center><img class="img img-rounded" src="http://thesocialmediapro.co/wp-content/uploads/2011/11/facebook-profile-picture.jpg" height ="75" width="75"></center></td>
                <td><center>Jorge Urrea</center></td>
                <td><center>15</center></td>
                <td><center>-----</center></td>
                </tr>
            </table>
        </div>
    </div><!-- /.tab-content -->
</div><!-- /.tabbable -->