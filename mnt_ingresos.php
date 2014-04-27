<?php
include("fnc.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[lote]=$id_lote;
					$campos[fecha]=fechabd($txtfecha);
					$campos[recibido]=$txtrecibido;
					$campos[saldo_inicial]=$txtsaldoi;
					$campos[cantidad_ingresada]=$txtingreso;
					$campos[cantidad_rechazada]=$txtrechazo;
					$campos[saldo_final]=$txtsaldof;
					$campos[peso_inf49]=$txt49grs;
					$campos[peso_sup69]=$txt69grs;
					$campos[roto]=$txtroto;
					$campos[fisurado]=$txtfisurado;
					$campos[yema]=$txtyema;
					$campos[fragil]=$txtfragil;
					$campos[poroso]=$txtporoso;
					$campos[fragil]=$txtfragil;
					$campos[desecho]=$txtdesecho;
					$campos[sucio]=$txtsucio;
					$campos[defo]=$txtdefo;
					$campos[granja]=$txtgranja;
					$campos[rechazo]=$txtrechazo;
					$campos[c_pollita]=$txtpollita;
					$campos[c_corpasa]=$txtcorpasa;
					$campos[c_emmasa]=$txtemmasa;
					
                    $ins=insertar("ingresos",$campos);
                    redireccionar("index1.php?op=$op&msg=Ingreso agregado!");
    break;
    
    
    case "Update":
                    $campos=Array();
                    $campos[lote]=$id_lote;
					$campos[fecha]=fechabd($txtfecha);
					$campos[recibido]=$txtrecibido;
					$campos[saldo_inicial]=$txtsaldoi;
					$campos[cantidad_ingresada]=$txtingreso;
					$campos[cantidad_rechazada]=$txtrechazo;
					$campos[saldo_final]=$txtsaldof;
					$campos[peso_inf49]=$txt49grs;
					$campos[peso_sup69]=$txt69grs;
					$campos[roto]=$txtroto;
					$campos[fisurado]=$txtfisurado;
					$campos[yema]=$txtyema;
					$campos[fragil]=$txtfragil;
					$campos[poroso]=$txtporoso;
					$campos[fragil]=$txtfragil;
					$campos[desecho]=$txtdesecho;
					$campos[sucio]=$txtsucio;
					$campos[defo]=$txtdefo;
					$campos[granja]=$txtgranja;
					$campos[rechazo]=$txtrechazo;
					$campos[c_pollita]=$txtpollita;
					$campos[c_corpasa]=$txtcorpasa;
					$campos[c_emmasa]=$txtemmasa;
					
                    $ins=actualizar("ingresos",$campos,"correlativo = '$pk'");
                    redireccionar("index1.php?op=$op&msg=Ingreso actualizado!");
    
    break;

	case "Delete":
        if($confirm=="Ok"){
          $del=runsql("delete from ingresos where correlativo = '$idn'");
        }
        redireccionar("index1.php?op=$op&ac=$ac&msg2=Ingreso eliminado!");
  break;
}
?>
