<?php

/*
 * Clase usuarios con sus respectivas funciones 
 */
require_once(dirname(__FILE__) . '/../dbconfig/generadorStringQuery.php');

class Jugadores {

    static $nombreTabla = "jugadores";
    static $nombreIdTabla = "idJugadores";

    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar($ranking, $categoria, $idUsuarios) {
        $datosCreacion = array(
            array('idUsuarios', $idUsuarios),
            array('ranking', $ranking),
            array('categoria', $categoria),
            array('alDia', 1)
            );

        $queryString = QueryStringAgregar($datosCreacion, self::$nombreTabla);
        $query = CallQuery($queryString);
        return $query;
    }
    
    //devuelve los datos personales (sin privados) de una persona
    public static function Datos($rut) {
        $queryString = "SELECT 
                              idJugadores,
                              idUsuarios,
                              categoria,
                              ranking,
                              alDia
                        FROM jugadores
                        WHERE idUsuarios = $rut";
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }
    
    // cambia el valor de si esta al dia
    public static function setAlDia($rut, $alDia){
        $queryString = "UPDATE jugadores
                        SET alDia = '$alDia'
                        WHERE idUsuarios = '$rut'";
        $result = CallQuery($queryString);
        return $result;
    }
    
    //cambia la categoria del jugador
    public static function setCategoria($rut, $categoria){
        $queryString = "UPDATE jugadores
                        SET categoria = '$categoria'
                        WHERE idUsuarios = '$rut'";
        $result = CallQuery($queryString);
        return $result ;
    }
    
    public static function setRanking($rut, $ranking){
        $queryString = "UPDATE jugadores
                        SET ranking = '$ranking'
                        WHERE idUsuarios = '$rut'";
        $result = CallQuery($queryString);
        return $result;
    }
}