<?php
include("fnc.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[lote]=$id_lote;
					$campos[incubadora]=$id_incubadora;
					$campos[fecha_descarga]=fechabd($txtfecha_descarga);
					$campos[hora_descarga]=$txthora_descarga;
					$campos[huevo_pesado]=$txthuevo_pesado;
					$campos[peso_salida]=$txtpeso_salida;
					$campos[peso_promesa]=$txtpeso_promesa;
					$campos[peso_perdida]=$txtpeso_perdida;
					$campos[porcentaje]=$txtporcentaje;
					$campos[transfer]=$txttransfer;
					
                    $ins=insertar("descargas",$campos);
                    redireccionar("index1.php?op=$op&msg=Ingreso agregado!");
    break;
    
    
    case "Update":
                    $campos=Array();
                    $campos[lote]=$id_lote;
					$campos[incubadora]=$id_incubadora;
					$campos[fecha_descarga]=fechabd($txtfecha_descarga);
					$campos[hora_descarga]=$txthora_descarga;
					$campos[huevo_pesado]=$txthuevo_pesado;
					$campos[peso_salida]=$txtpeso_salida;
					$campos[peso_promesa]=$txtpeso_promesa;
					$campos[peso_perdida]=$txtpeso_perdida;
					$campos[porcentaje]=$txtporcentaje;
					$campos[transfer]=$txttransfer;
										
                    $ins=actualizar("descargas",$campos,"id_descarga = '$pk'");
                    redireccionar("index1.php?op=$op&msg=Ingreso actualizado!");
    
    break;

	case "Delete":
        if($confirm=="Ok"){
          $del=runsql("delete from usuarios where usuario = '$idn'");
        }
        redireccionar("index1.php?op=$op&ac=$ac&msg2=Usuario eliminado!");
  break;
}
?>
