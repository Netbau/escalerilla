<?php
/*
 * Clase usuarios con sus respectivas funciones
 */
require_once(dirname(__FILE__) . '/../dbconfig/generadorStringQuery.php');

class Encuentro {

    static $nombreTabla = "encuentro";

    /**
     * Insertar
     *
     * Inserta una nueva entrada
     * En encuentro
     */
    public static function insertarEncuentro($idJugadores, $idJugadores1, $fecha, $idCanchas, $idGanador) {
         $id = CallQuery("SELECT * FROM ".self::$nombreTabla." WHERE ".self::$nombreTabla.".idJugadores=".$idJugadores." AND ".self::$nombreTabla.".idJugadores1=".$idJugadores1." AND ".self::$nombreTabla.".fecha='".$fecha."'");
         $retorno = new stdClass();
         if($id->num_rows == 0)
         {
            $datosCreacion = array(
                array('idJugadores', $idJugadores),
                array('idJugadores1', $idJugadores1),
                array('fecha', $fecha),
                array('idCanchas', $idCanchas),
                array('idGanador', $idGanador)
            );

            $queryString = QueryStringAgregar($datosCreacion, self::$nombreTabla);
            $query = CallQuery($queryString);
            if($query)
            {
                $retorno->status = 1;
                $id = CallQuery("SELECT * FROM ".self::$nombreTabla." WHERE ".self::$nombreTabla.".idJugadores=".$idJugadores." AND ".self::$nombreTabla.".idJugadores1=".$idJugadores1." AND ".self::$nombreTabla.".fecha='".$fecha."'");
                $retorno->value = $id->fetch_assoc();
                return $retorno;
            }
            else
            {
                $retorno->status = 0;
                return $retorno;
            }
        }
        else
        {
            $retorno->status = 2;
            return $retorno;
        }
        
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
            array('idEncuentro', $idEncuentro),
            array('puntuacion', $puntuacion)
        );
        $queryString = QueryStringAgregar($datosCreacion, 'resultadoEncuentro');
        $query = CallQuery($queryString);
        return $query;
    }

    /**
     *
     *
     * Últimos Ganadores
     *
     */
    public static function ultimosGanadores() {
        $queryString = "SELECT DISTINCT u.idUsuarios, u.nombre, u.segundoNombre, u.apellido, u.segundoApellido,
                               u.correo, u.telefono, u.telefono2, u.foto, j.idJugadores, j.ranking, j.categoria
                        FROM usuarios as u, jugadores as j, encuentro as e
                        WHERE e.idGanador = j.idJugadores AND
                              j.idUsuarios = u.idUsuarios
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
    public static function getEncuentroPorIdJugadores($idJugadores, $limite = 1) {
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
    public static function getEncuentroPorFecha($fecha, $limite = 1) {
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
     * Últimos Encuetros
     * Por
     * Fecha
     */
    public static function getUltimosEncuentros($limite = 1) {
        $queryString = "SELECT *
                        FROM encuentro as e
                        ORDER BY e.fecha DESC LIMIT $limite";
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }

    /**
     * Get
     * Próximos Encuetros
     * Por
     * Fecha
     */
    public static function getPróximosEncuentros($limite = 3) {
        $queryString = "SELECT *
                        FROM desafio as d
                        ORDER BY d.fecha ASC LIMIT $limite";
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
    public static function getEncuentroPorIdCancha($idCanchas, $limite = 1) {
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

    /**
     * Get
     * ResultadoEnceuntro
     * Por ID
     * Encuentro
     */
    public static function getResultadoEncuentroPorIdEncuentro($idEncuentro) {
        $queryString = "SELECT *
                        FROM resultadoEncuentro as re
                        WHERE re.idEncuentro = $idEncuentro";
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }

	public static function Crud() {
		$queryString = "SELECT *
                        FROM encuentro as e, canchas as c
						WHERE e.idCanchas = c.idCanchas";
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;

	}
}
?>