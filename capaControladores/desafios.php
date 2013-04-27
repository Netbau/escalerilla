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
    
    public static function getDesafiosPorEstado($estado){
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
    
    public static function getDesafiosPorFecha($fecha){
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
} 