<?php
include("fnc.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
					$campos[envio]=$txtenvio;
                    $campos[lote]=$id_lote;					
					$campos[fecha]=fechabd($txtfecha);
					$campos[hora]=$txthora;
					$campos[sector]=$txtsector;
					$campos[cantidad]=$txtcantidad;
					$campos[piloto]=$txtpiloto;
					$campos[destino]=$txtdestino;
					$campos[observacion]=$txtobserva;
																				
                    $ins=insertar("envios",$campos);
                    redireccionar("index1.php?op=$op&msg=Ingreso agregado!");
    break;
    
    
    case "Update":
                    $campos=Array();
                    $campos[envio]=$txtenvio;
                    $campos[lote]=$id_lote;					
					$campos[fecha]=fechabd($txtfecha);
					$campos[hora]=$txthora;
					$campos[sector]=$txtsector;
					$campos[cantidad]=$txtcantidad;
					$campos[piloto]=$txtpiloto;
					$campos[destino]=$txtdestino;
					$campos[observacion]=$txtobserva;
                    $ins=actualizar("envios",$campos,"id_envio = '$pk'");
                    redireccionar("index1.php?op=$op&msg=Ingreso actualizado!");
    
    break;

	case "Delete":
        if($confirm=="Ok"){
          $del=runsql("delete from envios where id_envio = '$idn'");
        }
        redireccionar("index1.php?op=$op&ac=$ac&msg2=Envio Eliminado!");
  break;
}
?>
