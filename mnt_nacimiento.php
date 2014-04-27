<?php
include("fnc.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[lote]=$id_lote;
					$campos[incubadora]=$id_incubadora;
					$campos[fecha_carga]=fechabd($txtfecha_carga);
					$campos[huevo_cargado]=$txthuevo_cargado;
					$campos[nacimiento]=$txtnacimiento;
					$campos[fecha_nacimiento]=fechabd($txtfecha_nacimiento);
					$campos[hora_nacimiento]=$txthora_nacimiento;
					$campos[edad]=$txtedad;
					$campos[huevos_claros]=$txthuevos_claros;
					$campos[huevos_clarosp]=$txthuevos_clarosp;
					$campos[hembras_primera]=$txthembras_primera;
					$campos[hembras_primerap]=$txthembras_primerap;
					$campos[hembras_mixtas]=$txthembras_mixtas;
					$campos[hembras_mixtasp]=$txthembras_mixtasp;
					$campos[hembras_total]=$txthembras_total;
					$campos[hembras_totalp]=$txthembras_totalp;
					$campos[machos_primera]=$txtmachos_primera;
					$campos[machos_primerap]=$txtmachos_primerap;
					$campos[machos_mixtos]=$txtmachos_mixtos;
					$campos[machos_mixtosp]=$txtmachos_mixtosp;
					$campos[machos_total]=$txttotal_machos;
					$campos[machos_totalp]=$txttotal_machosp;
					$campos[nacimiento_total]=$txtnacimiento_total;
					$campos[nacimiento_totalp]=$txtnacimiento_totalp;
					$campos[huevos_nonacidos]=$txthuevos_nonacidos;
					$campos[huevos_nonacidosp]=$txthuevos_nonacidosp;
					
                    $ins=insertar("nacimiento",$campos);
                    redireccionar("index1.php?op=$op&msg=Ingreso agregado!");
    break;
    
    
    case "Update":
                    $campos=Array();
                    $campos[lote]=$id_lote;
					$campos[incubadora]=$id_incubadora;
					$campos[fecha_carga]=fechabd($txtfecha_carga);
					$campos[huevo_cargado]=$txthuevo_cargado;
					$campos[nacimiento]=$txtnacimiento;
					$campos[fecha_nacimiento]=fechabd($txtfecha_nacimiento);
					$campos[hora_nacimiento]=$txthora_nacimiento;
					$campos[edad]=$txtedad;
					$campos[huevos_claros]=$txthuevos_claros;
					$campos[huevos_clarosp]=$txthuevos_clarosp;
					$campos[hembras_primera]=$txthembras_primera;
					$campos[hembras_primerap]=$txthembras_primerap;
					$campos[hembras_mixtas]=$txthembras_mixtas;
					$campos[hembras_mixtasp]=$txthembras_mixtasp;
					$campos[hembras_total]=$txthembras_total;
					$campos[hembras_totalp]=$txthembras_totalp;
					$campos[machos_primera]=$txtmachos_primera;
					$campos[machos_primerap]=$txtmachos_primerap;
					$campos[machos_mixtos]=$txtmachos_mixtos;
					$campos[machos_mixtosp]=$txtmachos_mixtosp;
					$campos[machos_total]=$txttotal_machos;
					$campos[machos_totalp]=$txttotal_machosp;
					$campos[nacimiento_total]=$txtnacimiento_total;
					$campos[nacimiento_totalp]=$txtnacimiento_totalp;
					$campos[huevos_nonacidos]=$txthuevos_nonacidos;
					$campos[huevos_nonacidosp]=$txthuevos_nonacidosp;
					
                    $ins=actualizar("nacimiento",$campos,"id_nacimiento = '$pk'");
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
