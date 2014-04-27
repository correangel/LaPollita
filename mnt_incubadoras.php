<?php
include("fnc.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[nombre]=$txtincubadora;					
					$campos[descripcion]=$txtdescripcion;  
					$campos[existencia]=$txtexistencia;   	            
					$campos[capacidad]=$txtcapacidad;			
										
                    $ins=insertar("incubadoras",$campos);
                    redireccionar("index1.php?op=$op&msg=Ingreso agregado!");
    break;
    
    
    case "Update":
                    $campos=Array();                    
					$campos[nombre]=$txtincubadora;					
					$campos[descripcion]=$txtdescripcion;  
					$campos[existencia]=$txtexistencia;   	            
					$campos[capacidad]=$txtcapacidad;				
					
                    $ins=actualizar("incubadoras",$campos,"id_incubadora = '$pk'");
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
