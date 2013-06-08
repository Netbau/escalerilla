<?php

/*
 * Clase noticia con sus respectivas funciones
 */
require_once(dirname(__FILE__) . '/../dbconfig/generadorStringQuery.php');

class Noticia {

    static $nombreTabla = "noticias";

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
                        FROM noticias as n";
        $result = CallQuery($queryString);

        $resultArray = array();

        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }

        return $resultArray;
    }

    public static function getReg($id) {
        $queryString = "SELECT * 
						FROM noticias 
						WHERE noticias.idNoticias = ".$id;
        $result = CallQuery($queryString);

        $resultArray = array();

        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }

        return $resultArray;
    }


    //ACCION PARA UPDATE NOTICIA
    public static function updateNoticia($fecha,$titulo,$contenido,$estado,$id){
        $updateString = "UPDATE ".self::$nombreTabla." 
						 SET ".self::$nombreTabla.".fecha='".$fecha."', ".self::$nombreTabla.".titulo='".$titulo."', ".self::$nombreTabla.".contenido='".$contenido."',
						 ".self::$nombreTabla.".estado=".$estado." WHERE ".self::$nombreTabla.".idNoticias=".$id;
        $result = CallQuery($updateString);
        return $result;
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
	
	public static function ultimasNoticias(){
		$queryString = 'SELECT *
						FROM '.self::$nombreTabla.'
						ORDER BY fecha DESC
						LIMIT 2';
						
		$result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
	}
}
?>
