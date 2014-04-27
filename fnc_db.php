<?php
$host="localhost"; $usuario="root"; $clave=""; $db="lapollita";
//$host="localhost"; $usuario="root"; $clave=""; $db="buskateka";
//$host="ozonobo.db.6271666.hostedresource.com"; $usuario="ozonobo"; $clave="swOzono09"; $db="ozonobo";
//define ('direccion','ONSEC-WEBAPPLIC\FM');
//define ('usuario','sa');
//define ('clave','master.911');
//define ('baseDeDatos','iut');

$cx=mysql_pconnect($host,$usuario,$clave) or die("No se pudo conectar al servidor");
//@ $db = mssql_connect(direccion,usuario,clave) or die("No se pudo conectar al servidor");
@mysql_select_db($db,$cx) or die("No se puede abrir la BD");
//@ $sel = mssql_select_db(baseDeDatos,$db) or die("No se puede abrir la BD");
?>
