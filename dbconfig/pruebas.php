<?php
inclue('dbconfig.php');
 
$link = mysql_connect($servidor, $usuario, $contrasena); 
if (!$link) { 
    die('Could not connect: ' . mysql_error()); 
} 
echo 'Connected successfully'; 
mysql_select_db(netbau_escalerillas); 
?>