<?php
/*
 * Clase premios con sus respectivas funciones
 */
require_once(dirname(__FILE__) . '/../dbconfig/generadorStringQuery.php');

class Premio {

    static $nombreTabla = "premios";

    /**
     * Insertar
     *
     * Inserta una nueva entrada
     * En encuentro
     */
    public static function insertarPremio($titulo, $descripcion, $estado, $urlpdf) {
        $datosCreacion = array(
            array('titulo', $titulo),
            array('descripcion', $descripcion),
            array('estado', $estado),
            array('urlpdf', $urlpdf)
        );

        $queryString = QueryStringAgregar($datosCreacion, self::$nombreTabla);
        $query = CallQuery($queryString);
        return $query;
    }
    public static function Crud(){
        $queryString = 'SELECT *
                        FROM '.self::$nombreTabla;
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }
    public static function getActivos(){
        $queryString = 'SELECT *
                        FROM '.self::$nombreTabla.'
                        WHERE estado = 1';
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }
	
    public static function yaExiste($titulo, $descripcion){
        $queryString = "SELECT *
                        FROM ".self::$nombreTabla."
                        WHERE titulo = '".trim($titulo)."' AND
                        descripcion ='".trim($descripcion)."'";
        if (CallQuery($queryString)->num_rows > 0) {
            return true;
        }
        else
            return false;
    }

}
?>
