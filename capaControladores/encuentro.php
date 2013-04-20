<?php

/*
 * Clase usuarios con sus respectivas funciones 
 */
require_once(dirname(__FILE__) . '/../dbconfig/generadorStringQuery.php');

class Encuentro 
	{

    static $nombreTabla = "encuentro";

    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * En encuentro
     */
    public static function insertarEncuentro($idJugadores, $idJugadores1, $fecha, $idCanchas, $idGanador) {
      
		$datosCreacion = array(
            array('idJugadores', $idJugadores),
            array('idJugadores1', $idJugadores1),
            array('fecha', $fecha),
            array('idCanchas', $idCanchas)
			array('idGanador', $idGanador)
        );

        $queryString = QueryStringAgregar($datosCreacion, self::$nombreTabla);
        $query = CallQuery($queryString);
        return $query;
    }
	
	/**
     * Insertar
     * 
     * Inserta una nueva entrada
     * En resultadoEncuentro
     */
	
	public static function insertarResultadoEncuentro($idSet, $idEncuentro, $puntuacion) {
	 
		$datosCreacion = array(
            array('idSet', $idSet),
            array('idEncuentro', $idEcuentro),
            array('puntuacion', $puntuacion),

		};
	
	/**
     * 
     * 
     * Últimos Ganadores
     *  
     */
	
	public static function ultimosGanadores() {
        $queryString = "SELECT *
                        FROM usuarios as u, jugadores as j, encuentro as e
                        WHERE e.idGanador = e.idJugadores AND 
						e.idJugadores = j.idJugadores AND 
						j.idJugadores = u.idUsuarios 
						ORDER BY e.fecha DESC LIMIT 4";
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }
	
	/**
     * Get
     * Encuetro
     * Por ID
     * Jugadores
     */
	
	public static function getEncuentroPorIdJugadores($idJugadores, $limite=1) {
        $queryString = "SELECT *
                        FROM encuentro as e
                        WHERE e.idJugadores = $idJugadores OR
						idJugadores1 = $idJugadores
                        LIMIT $limite";
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }
	
	/**
     * Get
     * Encuetro
     * Por ID
     * Enceuntro
     */
	
	public static function getEncuentroPorIdEncuentro($idEncuentro) {
        $queryString = "SELECT *
                        FROM encuentro as e
                        WHERE e.idEncuentro = $idEncuentro";
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }
	
	/**
     * Get
     * Encuetro
     * Por
     * Fecha
     */
	
	public static function getEncuentroPorFecha($fecha, $limite=1) {
        $queryString = "SELECT *
                        FROM encuentro as e
                        WHERE e.fecha = $fecha
                        LIMIT $limite";
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }
	
	/**
     * Get
     * Encuetro
     * Por ID
     * Cancha
     */
	
	public static function getEncuentroPorIdCancha($idCanchas, $limite=1) {
        $queryString = "SELECT *
                        FROM encuentro as e
                        WHERE e.idCanchas = $idCanchas
                        LIMIT $limite";
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }
	
	}
	?>