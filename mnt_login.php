<?php
include("fnc.php");
echo "llego....".$_POST['txtusr']." ".$_POST['txtclave'];exit();
if(!$txtusr || !$txtclave){
  redireccionar("./index.php?msg=Ingrese un usuario y/o contraseña!");
}

//$eclave=enc(strtolower($txtclave));
//$qusr=runsql("select * from usuarios where usuario = '$txtusr' and clave = '$eclave' and activo = 1",1);
$qusr=runsql("select * from usuarios where usuario = '$txtusr' and clave = '$txtclave' and activo = 1");
//echo registros ($qusr);
if(registros($qusr)>0){
  $info=registro($qusr);
  
  $valores=Array();
  $valores["ip_uacceso"]=$remote_ip;
  $valores["u_acceso"]=$fechahora;

  $up=actualizar("usuarios",$valores,"usuario = '$txtusr'");
  
  $q2=runsql("SELECT * FROM tipocambio where moneda = 'USD' ORDER BY fecha DESC ;");
  $moneda=registro($q2);
  $_SESSION["USD"]=$moneda[tipocambio];
  $q2=runsql("SELECT * FROM tipocambio where moneda = 'EUR' ORDER BY fecha DESC ;");
  $moneda=registro($q2);
  $_SESSION["EUR"]=$moneda[tipocambio];
  
  session_start();
  $_SESSION["usr_usuario"]=$txtusr;
  $_SESSION["usr_nombre"]=$info[nombre];
  $_SESSION["usr_mail"]=$info[mail];
  $_SESSION["usr_valertas"]=$info[v_alertas];
  $_SESSION["usr_online001"]="YesS";
  $_SESSION["usr_exec_acciones"]=$info[ejecutar_acciones];
  $_SESSION["usr_level"]="Admin";
  $_SESSION["usr_tipo"]=$info[tipo];
  redireccionar("index1.php?op=inicio");
}

alert("Usuario o contraseña inválida","login.php");
?>
