<?php

/*
 * Clase noticia con sus respectivas funciones
 */
require_once(dirname(__FILE__) . '/../dbconfig/generadorStringQuery.php');

class Noticia {

    static $nombreTabla = "Noticia";

    /**
     * Insertar
     *
     * Inserta una nueva entrada
     * En noticia
     */
    public static function insertarNoticia($fecha, $titulo, $contenido, $estado) {
        $datosCreacion = array(
            array('fecha', $fecha),
            array('titulo', $titulo),
            array('contenido', $contenido),
            array('estado', $estado)
        );

        $queryString = QueryStringAgregar($datosCreacion, self::$nombreTabla);
        $query = CallQuery($queryString);
        return $query;
    }
	
	public static function Crude() {
        $queryString = "SELECT *
                        FROM noticia as n";
        $result = CallQuery($queryString);
        $resultArray = array();

        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }

        return $resultArray;
    }

}
?>
