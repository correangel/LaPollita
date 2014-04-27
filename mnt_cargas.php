<?php
include("fnc.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[lote]=$id_lote;
					$campos[incubadora]=$id_incubadora;
					$campos[esp_ocupado]=$txtesp_ocupado;
					$campos[esp_disponible]=$txtesp_disponible;
					$campos[fecha_carga]=fechabd($txtfecha_carga);
					$campos[hora_carga]=$txthora_carga;
					$campos[huevo_cargado]=$txthuevo_cargado;
					$qinfo=runsql("select * from incubadoras where id_incubadora = '$id_incubadora'");
  					if(registros($qinfo)>0){
    										$info=registro($qinfo);
					}
					$existencia = $info[existencia] + $txthuevo_cargado;
					$res=mysql_query("update incubadoras set existencia = $existencia where id_incubadora = '$id_incubadora'");
					if(!$res){
					  echo "ERROR: ".mysql_error();
					  echo "<br>$sql";
					  exit();
					}
					$campos[nacimiento]=$txtnacimiento;
					$campos[cliente]=$txtcliente;
					$campos[peso_entrada]=$txtpeso_entrada;
					$campos[peso_prome]=$txtpeso_prome;
																							
                    $ins=insertar("cargas",$campos);
                    redireccionar("index1.php?op=$op&msg=Ingreso agregado!");
    break;
    
    
    case "Update":
                    $campos=Array();
                    $campos[lote]=$id_lote;
					$campos[incubadora]=$id_incubadora;
					$campos[esp_ocupado]=$txtesp_ocupado;
					$campos[esp_disponible]=$txtesp_disponible;
					$campos[fecha_carga]=fechabd($txtfecha_carga);
					$campos[hora_carga]=$txthora_carga;
					$campos[huevo_cargado]=$txthuevo_cargado;
					$qinfo=runsql("select * from incubadoras where id_incubadora = '$id_incubadora'");
  					if(registros($qinfo)>0){
    										$info=registro($qinfo);
					}
					$existencia = $info[existencia] -$exis + $txthuevo_cargado;
					$res=mysql_query("update incubadoras set existencia = $existencia where id_incubadora = '$id_incubadora'");
					if(!$res){
					  echo "ERROR: ".mysql_error();
					  echo "<br>$sql";
					  exit();
					}
					$campos[nacimiento]=$txtnacimiento;
					$campos[cliente]=$txtcliente;
					$campos[peso_entrada]=$txtpeso_entrada;
					$campos[peso_prome]=$txtpeso_prome;
					
					
                    $ins=actualizar("cargas",$campos,"id_cargas = '$pk'");
                    redireccionar("index1.php?op=$op&msg=Ingreso actualizado!");
    
    break;

	case "Delete":
        if($confirm=="Ok"){
          $del=runsql("delete from cargas where id_cargas = '$idn'");
        }
        redireccionar("index1.php?op=$op&ac=$ac&msg2=Usuario eliminado!");
  break;
}
?>
