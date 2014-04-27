<?php
include("../fnc.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[snombre]=$txtsnombre;
                    $campos[sdireccion]=$txtsdireccion;
                    $campos[stelefono]=$txtstelefono;
					//echo "<pre>";	print_r($campos);	echo "</pre>";exit();
                    $ins=insertar("banco",$campos);
                    redireccionar("index1.php?op=$op&msg=Banco Agregado!");
    break;
    
    
    case "Update":
                    $campos=Array();
                    $campos[snombre]=$txtsnombre;
                    $campos[sdireccion]=$txtsdireccion;
                    $campos[stelefono]=$txtstelefono;
                    $ins=actualizar("banco",$campos,"id_banco = '$pk'");
                    redireccionar("index1.php?op=$op&msg=Banco actualizado!");
    
    break;

	case "Delete":
        if($confirm=="Ok"){
          $del=runsql("delete from banco where id_banco = '$idn'");
        }
        redireccionar("index1.php?op=$op&ac=$ac&msg2=Banco eliminado!");
  break;
}
?>
