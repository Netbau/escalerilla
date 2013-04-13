<?php

/*
 * Clase usuarios con sus respectivas funciones 
 */
require_once(dirname(__FILE__) . '/../dbconfig/generadorStringQuery.php');

class Usuarios {

    static $nombreTabla = "usuarios";
    static $nombreIdTabla = "idUsuarios";

    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar($run, $nombre, $apellido, $correo, $telefono, $fechaNacimiento, $sexo, $segundoNombre = 'null', $segundoApellido = 'null', $telefono2 = 'null') {
        $password = $nombre[0] . $apellido[0] . $run[0] . $run[1] . $run[2] . $run[3];


        $datosCreacion = array(
            array('idUsuarios', $run),
            array('nombre', $nombre),
            array('segundoNombre', $segundoNombre),
            array('apellido', $apellido),
            array('segundoApellido', $segundoApellido),
            array('correo', $correo),
            array('telefono', $telefono),
            array('telefono2', $telefono2),
            array('sexo', $sexo),
            array('password', md5($password)),
            array('fechaNacimiento', $fechaNacimiento)
        );

        $queryString = QueryStringAgregar($datosCreacion, self::$nombreTabla);
        $query = CallQuery($queryString);
        return $query;
    }

    //verifica la clave del usuario con su rut y clave ingresada
    //devuelve verdadero o falso
    public static function VerificarClave($rut, $pass) {
        $pass = md5($pass);
        $queryString = "SELECT * FROM Personas WHERE RUN = '$rut' AND Clave = '$pass';";
        if (CallQuery($queryString)->num_rows != 1) {
            return false;
        }
        else
            return true;
    }
    
    //devuelve los datos personales (sin privados) de una persona
    
    public static function Datos($rut){
        $queryString = "SELECT 
                              nombre,
                              segundoNombre,
                              apellido,
                              segundoApellido,
                              correo,
                              telefono,
                              telefono2,
                              nivel,
                              foto,
                              fechaNacimiento,
                              sexo
                        FROM usuarios
                        WHERE idUsuarios = $rut";
       $result = CallQuery($queryString);
       $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }

}

?>