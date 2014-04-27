<?php
include("fnc.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[usuario]=$txtusuario;
					$campos[clave]=$txtclave;
					$campos[nombre]=$txtnombres;
                    $campos[apellido]=$txtapellidos;
                    $campos[email]=$txtemail;
					$campos[telefono]=$txttelefono;
					$campos[activo]=$txtactivo;
					$campos[u_acceso]=fechabd($txtfuacc);
                    $campos[ip_uacceso]=$txtipacceso;
                    $ins=insertar("usuarios",$campos);
                    redireccionar("index1.php?op=$op&msg=Usuario agregado!");
    break;
    
    
    case "Update":
                    $campos=Array();
					$campos[usuario]=$txtusuario;
					$campos[clave]=$txtclave;
					$campos[nombre]=$txtnombres;
                    $campos[apellido]=$txtapellidos;
                    $campos[email]=$txtemail;
					$campos[telefono]=$txttelefono;
					$campos[activo]=$txtactivo;
					$campos[u_acceso]=fechabd($txtfuacc);
                    $campos[ip_uacceso]=$txtipacceso;
                    $ins=actualizar("usuarios",$campos,"usuario = '$pk'");
                    redireccionar("index1.php?op=$op&msg=Usuario actualizado!");
    
    break;

	case "Delete":
        if($confirm=="Ok"){
          $del=runsql("delete from usuarios where usuario = '$idn'");
        }
        redireccionar("index1.php?op=$op&ac=$ac&msg2=Usuario eliminado!");
  break;
}
?>
