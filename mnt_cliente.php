<?php
include("../fnc.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[nombres]=$txtnombres;
                    $campos[apellidos]=$txtapellidos;
                    $campos[direccion]=$txtdireccion;
                    $campos[email]=$txtemail;
					$campos[fnac]=fechabd($txtfnac);
                    $campos[activo]=$txtactivo;
					$campos[telmobil]=$txttelmobil;
					$campos[telcasa]=$txttelcasa;
					$campos[nit]=$txtnit;					
                    $ins=insertar("cliente",$campos);
                    redireccionar("index1.php?op=$op&msg=Cliente agregado!");
    break;
    
    
    case "Update":
                    $campos=Array();
					$campos[nombres]=$txtnombres;
                    $campos[apellidos]=$txtapellidos;
                    $campos[direccion]=$txtdireccion;
                    $campos[email]=$txtemail;
					$campos[fnac]=fechabd($txtfnac);
                    $campos[activo]=$txtactivo;
					$campos[telmobil]=$txttelmobil;
					$campos[telcasa]=$txttelcasa;
					$campos[nit]=$txtnit;											
                    $ins=actualizar("cliente",$campos,"id = '$pk'");
                    redireccionar("index1.php?op=$op&msg=Cliente actualizado!");
    
    break;

	case "Delete":
        if($confirm=="Ok"){
          $del=runsql("delete from cliente where id = '$idn'");
        }
        redireccionar("index1.php?op=$op&ac=$ac&msg2=Cliente eliminado!");
  break;
}
?>
