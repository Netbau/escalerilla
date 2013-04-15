<?php

require('dbconfig.php');
if ($extensionMYSQL == 'mysqli') {

    /*
     * Descripcion: Funcion para llamar query
     * Input
     * 	string $queryString
     * Output: objeto result de MySQLi
     */

    function CallQuery($queryString) {
        $mysqlCon = new mysqli($servidor, $nombre_usuario, $contrasena, $base_de_datos);
        $mysqlCon->set_charset("utf8");

        if ($mysqlCon->errno) {
            printf("Conexion fallida: %s\n", $mysqli->connect_error);
            exit();
        }

        if ($result = $mysqlCon->query($queryString)) {
            $mysqlCon->close();
            return $result;
        } else {
            $mysqlCon->close();
            return false;
        }
    }

    /*
     * Descripcion: Funcion para llamar query y obtener el ultimo autoinsertado
     * de la conexion.
     * Input
     *      string $queryString
     * Output: id de autoinsertado
     */

    function CallQueryReturnID($queryString) {
        $mysqlCon = new mysqli($servidor, $nombre_usuario, $contrasena, $base_de_datos);
        $mysqlCon->set_charset("utf8");

        if ($mysqlCon->errno) {
            printf("Conexion fallida: %s\n", $mysqli->connect_error);
            exit();
        }

        if ($result = $mysqlCon->query($queryString)) {
            $id = $mysqlCon->insert_id;
            $mysqlCon->close();
            return $id;
        } else {
            $mysqlCon->close();
            return false;
        }
    }

//function
}//para mysqli PHPOO
elseif ($extensionMYSQL == 'mysql') {
    /*
     * Descripcion: Funcion para llamar query
     * Input
     * 	string $queryString
     * Output: elemento mysql
     */

    function CallQueryReturnID($queryString) {
        $mysqlCon = mysql_connect($servidor, $nombre_usuario, $contrasena, $base_de_datos);
        mysql_set_charset('utf-8');

        if (!$mysqlCon) {
            printf("Conexion fallida: %s\n", mysql_error($mysqlCon));
            exit();
        }

        if ($result = mysql_query($queryString,$mysqlCon)) {
            mysql_close($mysqlCon);
            return $result;
        } else {
            mysql_close($mysqlCon);
            return false;
        }
    }
    
    /*
     * Descripcion: Funcion para llamar query y obtener el ultimo autoinsertado
     * de la conexion.
     * Input
     *      string $queryString
     * Output: id de autoinsertado
     */
    function CallQuery($queryString) {
        $mysqlCon = mysql_connect($servidor, $nombre_usuario, $contrasena, $base_de_datos);
        mysql_set_charset('utf-8');

        if (!$mysqlCon) {
            printf("Conexion fallida: %s\n", mysql_error($mysqlCon));
            exit();
        }

        if ($result = mysql_query($queryString,$mysqlCon)) {
            $id = mysql_insert_id($mysqlCon);
            mysql_close($mysqlCon);
            return $id;
        } else {
            mysql_close($mysqlCon);
            return false;
        }
    }
    
    
}
?>
