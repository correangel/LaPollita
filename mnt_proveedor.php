<?php
include("../fnc.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
					$campos[empresa]=$txtempresa;
                    $campos[nombres]=$txtnombres;
                    $campos[apellidos]=$txtapellidos;
                    $campos[direccion]=$txtdireccion;
                    $campos[email]=$txtemail;
					$campos[fnac]=fechabd($txtfnac);
                    $campos[activo]=$txtactivo;
					$campos[telmobil]=$txttelmobil;
					$campos[telcasa]=$txttelcasa;
					$campos[nit]=$txtnit;					
                    $ins=insertar("proveedor",$campos);
                    redireccionar("index1.php?op=$op&msg=Proveedor agregado!");
    break;
    
    
    case "Update":
                    $campos=Array();
					$campos[empresa]=$txtempresa;
					$campos[nombres]=$txtnombres;
                    $campos[apellidos]=$txtapellidos;
                    $campos[direccion]=$txtdireccion;
                    $campos[email]=$txtemail;
					$campos[fnac]=fechabd($txtfnac);
                    $campos[activo]=$txtactivo;
					$campos[telmobil]=$txttelmobil;
					$campos[telcasa]=$txttelcasa;
					$campos[nit]=$txtnit;										
                    $ins=actualizar("proveedor",$campos,"id = '$pk'");
                    redireccionar("index1.php?op=$op&msg=Proveedor actualizado!");
    
    break;

	case "Delete":
        if($confirm=="Ok"){
          $del=runsql("delete from proveedor where id = '$idn'");
        }
        redireccionar("index1.php?op=$op&ac=$ac&msg2=Proveedor eliminado!");
  break;
}
?>
