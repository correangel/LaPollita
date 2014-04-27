<?php
include("../fnc.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[nombre]=$txtnombre;
                    $campos[descripcion]=$txtdescripcion;
                    $campos[costo]=$txtcosto;
					$campos[activo]=$txtactivo;
					//echo "<pre>";	print_r($campos);	echo "</pre>";exit();
                    $ins=insertar("servicios",$campos);
                    redireccionar("index1.php?op=$op&msg=Servicio Agregado!");
    break;
    
    
    case "Update":
                    $campos=Array();
                    $campos[nombre]=$txtnombre;
                    $campos[descripcion]=$txtdescripcion;
                    $campos[costo]=$txtcosto;
					$campos[activo]=$txtactivo;
					$ins=actualizar("servicios",$campos,"id_servicio = '$pk'");
                    redireccionar("index1.php?op=$op&msg=Servicio actualizado!");
    
    break;

	case "Delete":
        if($confirm=="Ok"){
          $del=runsql("delete from servicios where id_servicio = '$idn'");
        }
        redireccionar("index1.php?op=$op&ac=$ac&msg2=Banco eliminado!");
  break;
}
?>
