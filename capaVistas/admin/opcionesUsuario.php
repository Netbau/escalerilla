<a class="btn btn-small btn-info"><strong>Nuevo Usuario</strong></a>
<a class="btn btn-small btn-inverse"><i class="icon-refresh icon-white"></i></a><br><br>
<div class="row-fluid">
<table class="table-condensed table-striped table-hover table-bordered" width="100%">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Segundo Nombre</th>
            <th>Apellido</th>
            <th>Segundo Apellido</th>
            <th>E-mail</th>
            <th>Telefono</th>
            <th>Foto</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        include_once('capaAjax/getUsuarios.php');
        foreach($usuarios as $usuario){
            echo '<tr>
                ';

            echo "<td>".$usuario['nombre']."</td>
                  <td>".$usuario['segundoNombre']."</td>
                  <td>".$usuario['apellido']."</td>
                  <td>".$usuario['segundoApellido']."</td>
                  <td>".$usuario['correo']."</td>
                  <td>".$usuario['telefono']."</td>
                  <td>".$usuario['foto']."</td>
                  <td><a class='btn btn-small btn-block'><i class='icon-remove-sign'></i></a></td>
               ";

            echo '</tr>
                ';
        }
        ?>
    </tbody>
</table>
</div>