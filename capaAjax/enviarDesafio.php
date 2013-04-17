<?php

if (isset($_POST)) {
    include_once '../capaControladores/desafios.php';
    $desafiado = $_POST['desafiado'];
    $desafiante = $_POST['desafiante'];

    $desafio = Desafios::Insertar($desafiante['idJugadores'], $desafiado['idJugadores']);
    if ($desafio) {
        $enviados = 0;

        $to = $desafiado['correo'];
        $from = 'EIM';
        $subject = "Nuevo Desafio Escalerilla " . $from;
        $message = "Estimados,
        Se ha creado un nuevo desafio con la siguiente informacion:
            - Desafiado: " . $desafiado['nombre'] . ' ' . $desafiado['apellido'] . '
                ->E-mail: ' . $desafiado['correo'] . '
                ->Telefono: ' . $desafiado['telefono'] . '
            - Desafiante: ' . $desafiante['nombre'] . ' ' . $desafiante['apellido'] . '
                ->E-mail: ' . $desafiante['correo'] . '
                ->Telefono: ' . $desafiante['telefono'] . '
        El desafio se encuentra actualmente en caracter de pendiente.            
        La hora y fecha del encuentro estan sujetas a disponibilidad de las canchas y acuerdo de las partes con el administrador.';
        $headers = "Nuevo Desafio Escalerilla " . $from . ":";
        $envio = mail($to, $subject, $message, $headers);
        if ($envio) {
            $enviados++;
        }

        $to = $desafiante['correo'];
        $envio = mail($to, $subject, $message, $headers);
        if ($envio) {
            $enviados++;
        }

        $to = 'cgonzb@gmail.com';
        $envio = mail($to, $subject, $message, $headers);
        if ($envio) {
            $enviados++;
        }
        if ($enviados == 3) {
            echo 1;
        } else {
            echo 0;
        }
    }//if
    else {
        echo 0;
    }
} else {
    echo 0;
}
?>
