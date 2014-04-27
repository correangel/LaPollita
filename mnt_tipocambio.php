<?php
include("../fnc.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[moneda]			=$txtmoneda;
                    $campos[fecha]			=fechabd($txtfecha);
                    $campos[tipocambio]		=$txttipocambio;
					//echo "<pre>";	print_r($campos);	echo "</pre>";exit();
                    $ins=insertar("tipocambio",$campos);
                    redireccionar("index1.php?op=$op&msg= Tipo de Cambio Agregado!");
    break;
    
    
    case "Update":
                    $campos=Array();
                    $campos[moneda]			=$txtmoneda;
                    $campos[fecha]			=fechabd($txtfecha);
                    $campos[tipocambio]		=$txttipocambio;
                    $ins=actualizar("tipocambio",$campos,"id_tipocambio = '$pk'");
                    redireccionar("index1.php?op=$op&msg= Tipo de Cambio actualizado!");
    
    break;

	case "Delete":
        if($confirm=="Ok"){
          $del=runsql("delete from tipocambio where id_tipocamcio = '$idn'");
        }
        redireccionar("index1.php?op=$op&ac=$ac&msg2= Tipo de Cambio  eliminado!");
  break;
}
?>
