<?php

/*
 * Clase desafios con sus respectivas funciones
 */
require_once(dirname(__FILE__) . '/../dbconfig/generadorStringQuery.php');

class Desafios {

    static $nombreTabla = "desafio";
    static $nombreIdTabla = "idJugadores";
    static $nombreIdTabla2 = "idJugadores1";

    /**
     * Insertar
     *
     * Inserta una nueva entrada
     *
     */
    public static function Insertar($idJugadores, $idJugadores1) {
        $datosCreacion = array(
            array('idJugadores', $idJugadores),
            array('idJugadores1', $idJugadores1),
        );

        $queryString = QueryStringAgregar($datosCreacion, self::$nombreTabla);
        $query = CallQuery($queryString);
        return $query;
    }

    public static function getDesafiosPorEstado($estado) {
        $queryString = "SELECT *
                        FROM desafio d
                        WHERE estado = '$estado'";
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }

    public static function esDesafiable($idJugadores) {
        $queryString = "SELECT *
                        FROM desafio d
                        WHERE idJugadores1 ='$idJugadores'
                        AND estado ='Pendiente'";
        if(CallQuery($queryString)->num_rows > 0){
            return false;
        }
        else{
            return true;
        }
    }

    public static function esDesafiador($idJugadores){
        $queryString = "SELECT *
                        FROM desafio d
                        WHERE idJugadores ='$idJugadores'
                        AND estado ='Pendiente'";
        if(CallQuery($queryString)->num_rows == 0){
            return false;
        }
        else{
            return true;
        }
    }

    public static function getDesafiosPorFecha($fecha) {
        $queryString = "SELECT *
                        FROM desafio d
                        WHERE fecha = '$fecha'";
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }

    public static function Crud() {
        $queryString = "SELECT *
                        FROM desafio d";
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }
	
	public static function actualizarEstadoDesafio($idJugador, $idJugador1, $estado, $fecha) {
		$queryString = "UPDATE desafio
						SET estado = Concretado
						WHERE idJugadores = '$idJugador'
						AND idJugadores1 = '$idJugadores1'
						AND fecha = '$fecha'";
		$result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;	
	}

}

