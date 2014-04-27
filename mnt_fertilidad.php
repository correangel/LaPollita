<?php
include("fnc.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[nacimiento]=$txtnacimiento;
					$campos[fecha_carga]=fechabd($txtfecha_carga);
					$campos[fecha_nacimiento]=fechabd($txtfecha_nacimiento);
					$campos[fecha_analisis]=fechabd($txtfecha_analisis);
					$campos[lote]=$id_lote;
					$campos[incubadora]=$id_incubadora;
					$campos[separadores]=$txtseparadores;
					$campos[cantidad_separador]=$txtcantidad_separador;
					$campos[muestra]=$txtmuestra;
					$campos[infertiles]=$txtinfertiles;
					$campos[infertiles_p]=$txtinfertiles_p;
					$campos[preincubados]=$txtpreincubados;
					$campos[preincubados_p]=$txtpreincubados_p;
					$campos[deshidratados]=$txtdeshidratados;
					$campos[deshidratados_p]=$txtdeshidratados_p;
					$campos[temprana]=$txttemprana;
					$campos[temprana_p]=$txttemprana_p;
					$campos[contaminados]=$txtcontaminados;
					$campos[contaminados_p]=$txtcontaminados_p;
					$campos[fertil]=$txtfertil;
					$campos[fertil_p]=$txtfertil_p;
					$campos[total_fertilidad]=$txttotal_fertilidad;
										
                    $ins=insertar("fertilidad",$campos);
                    redireccionar("index1.php?op=$op&msg=Ingreso agregado!");
    break;
    
    
    case "Update":
                    $campos=Array();
                    $campos[nacimiento]=$txtnacimiento;
					$campos[fecha_carga]=fechabd($txtfecha_carga);
					$campos[fecha_nacimiento]=fechabd($txtfecha_nacimiento);
					$campos[fecha_analisis]=fechabd($txtfecha_analisis);
					$campos[lote]=$id_lote;
					$campos[incubadora]=$id_incubadora;
					$campos[separadores]=$txtseparadores;
					$campos[cantidad_separador]=$txtcantidad_separador;
					$campos[muestra]=$txtmuestra;
					$campos[infertiles]=$txtinfertiles;
					$campos[infertiles_p]=$txtinfertiles_p;
					$campos[preincubados]=$txtpreincubados;
					$campos[preincubados_p]=$txtpreincubados_p;
					$campos[deshidratados]=$txtdeshidratados;
					$campos[deshidratados_p]=$txtdeshidratados_p;
					$campos[temprana]=$txttemprana;
					$campos[temprana_p]=$txttemprana_p;
					$campos[contaminados]=$txtcontaminados;
					$campos[contaminados_p]=$txtcontaminados_p;
					$campos[fertil]=$txtfertil;
					$campos[fertil_p]=$txtfertil_p;
					$campos[total_fertilidad]=$txttotal_fertilidad;
					
                    $ins=actualizar("fertilidad",$campos,"id_fertilidad = '$pk'");
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
