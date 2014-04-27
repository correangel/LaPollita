<?php
include("fnc.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[raza]=$id_raza;										
					$campos[variedad]=$id_variedad;					
					$campos[correlativo]=$txtcorrelativo;     	            
					$campos[lote]=$txtlote;
					$campos[fecha_nacimiento]=fechabd($txtfecha_nacimiento);
					$campos[fecha_ingreso]=fechabd($txtfecha_ingreso);
					$campos[finca]=$id_finca;
					$campos[fecha_postura]=fechabd($txtfecha_postura);
					$campos[sector]=$txtsector;
					$campos[galera]=$txtgalera;
					$campos[hembras]=$txthembras;
					$campos[machos]=$txtmachos;
					$campos[sel_hembras]=$txtsel_hembras;
					$campos[sel_machos]=$txtsel_machos;
										
                    $ins=insertar("lote",$campos);
                    redireccionar("index1.php?op=$op&msg=Ingreso agregado!");
    break;
    
    
    case "Update":
                    $campos=Array();
                    $campos[raza]=$id_raza;										
					$campos[variedad]=$id_variedad;					
					$campos[correlativo]=$txtcorrelativo;     	            
					$campos[lote]=$txtlote;
					$campos[fecha_nacimiento]=fechabd($txtfecha_nacimiento);
					$campos[fecha_ingreso]=fechabd($txtfecha_ingreso);
					$campos[finca]=$id_finca;
					$campos[fecha_postura]=fechabd($txtfecha_postura);
					$campos[sector]=$txtsector;
					$campos[galera]=$txtgalera;
					$campos[hembras]=$txthembras;
					$campos[machos]=$txtmachos;
					$campos[sel_hembras]=$txtsel_hembras;
					$campos[sel_machos]=$txtsel_machos;					
					
                    $ins=actualizar("lote",$campos,"id_lote = '$pk'");
                    redireccionar("index1.php?op=$op&msg=Ingreso actualizado!");
    
    break;

	case "Delete":
        if($confirm=="Ok"){
          $del=runsql("delete from lote where id_lote = '$idn'");
        }
        redireccionar("index1.php?op=$op&ac=$ac&msg2=Lote Eliminado!");
  break;
}
?>
