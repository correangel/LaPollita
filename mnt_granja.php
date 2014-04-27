<?php
include("fnc.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[lote]=$id_lote;					
					$campos[fecha]=fechabd($txtfecha);
					$campos[m_hembras]=$txtm_hembras;
					$campos[m_machos]=$txtm_machos;
					$campos[fertilidad]=$txtfertilidad;
					$campos[produccion]=$txtproduccion;
					$campos[rechazo]=$txtrechazo;
					$campos[sel_machos]=$txtsel_machos;
					$campos[sel_hembras]=$txtsel_hembras;
															
                    $ins=insertar("granja",$campos);
                    redireccionar("index1.php?op=$op&msg=Ingreso agregado!");
    break;
    
    
    case "Update":
                    $campos=Array();
                     $campos[lote]=$id_lote;					
					$campos[fecha]=fechabd($txtfecha);
					$campos[m_hembras]=$txtm_hembras;
					$campos[m_machos]=$txtm_machos;
					$campos[fertilidad]=$txtfertilidad;
					$campos[produccion]=$txtproduccion;
					$campos[rechazo]=$txtrechazo;
					$campos[sel_machos]=$txtsel_machos;
					$campos[sel_hembras]=$txtsel_hembras;
					
                    $ins=actualizar("granja",$campos,"id_granja = '$pk'");
                    redireccionar("index1.php?op=$op&msg=Ingreso actualizado!");
    
    break;

	case "Delete":
        if($confirm=="Ok"){
          $del=runsql("delete from granja where id_granja = '$idn'");
        }
        redireccionar("index1.php?op=$op&ac=$ac&msg2=Control Diario Eliminado!");
  break;
}
?>
