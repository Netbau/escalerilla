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
    public static function setAlDia($rut, $alDia) {
        $queryString = "UPDATE jugadores
                        SET alDia = '$alDia'
                        WHERE idUsuarios = '$rut'";
        $result = CallQuery($queryString);
        return $result;
    }

    //cambia la categoria del jugador
    public static function setCategoria($rut, $categoria) {
        $queryString = "UPDATE jugadores
                        SET categoria = '$categoria'
                        WHERE idUsuarios = '$rut'";
        $result = CallQuery($queryString);
        return $result;
    }

    public static function setRanking($rut, $ranking) {
        $queryString = "UPDATE jugadores
                        SET ranking = '$ranking'
                        WHERE idUsuarios = '$rut'";
        $result = CallQuery($queryString);
        return $result;
    }

    public static function getCategorias() {
        $queryString = "SELECT distinct(categoria) FROM jugadores ORDER BY categoria ASC";
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }

    public static function getUltimoRanking($categoria) {
        $queryString = "SELECT ranking FROM jugadores WHERE categoria = '$categoria' ORDER BY ranking DESC LIMIT 1";
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }

    public static function getRankingPorCategoria($categoria) {
        $queryString = "SELECT j.idUsuarios,
                               idJugadores,
                               nombre,
                               segundoNombre,
                               apellido,
                               segundoApellido,
                               foto,
                               ranking,
                               categoria
                        FROM usuarios u, jugadores j
                        WHERE j.idUsuarios = u.idUsuarios AND
                              categoria = '$categoria'
                        ORDER BY ranking ASC";
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }

    public static function getNombrePorID($idJugadores) {
        $queryString = "SELECT nombre, apellido
                        FROM jugadores j, usuarios u
                        WHERE j.idUsuarios = u.idUsuarios
                        AND idJugadores = '$idJugadores'";
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }

    public static function getDesafiosDisponibles($ranking, $categoria) {
        $queryString = "SELECT *
                        FROM usuarios u, jugadores j
                        WHERE j.idUsuarios = u.idUsuarios
                        AND categoria = '$categoria' AND
                        ranking < $ranking
                        LIMIT 4";
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }

    public static function getUsuarioPorJugador($idJugadores) {
        $queryString = "SELECT *
                        FROM usuarios u, jugadores j
                        WHERE j.idUsuarios = u.idUsuarios
                        AND idJugadores = '$idJugadores'";
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }

    //devuelve los datos crudos de todos los usuarios
    public static function Crude() {
        $queryString = "SELECT idJugadores,
                               nombre,
                               segundoNombre,
                               apellido,
                               segundoApellido,
                               ranking,
                               categoria
                        FROM usuarios u, jugadores j
                        WHERE u.idUsuarios = j.idUsuarios
                        ORDER BY categoria, ranking";
        $result = CallQuery($queryString);
        $resultArray = array();

        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }

        return $resultArray;
    }

}