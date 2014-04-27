<?php
include("../fnc.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[nombre]=$txtnombre;
					$campos[tipoarticulo]=$txttipoarticulo;
					$campos[descripcion]=$txtdescripcion;
                    $ins=insertar("articulos",$campos);
                    redireccionar("index1.php?op=$op&msg=Artículo agregado!");
    break;
    
    
    case "Update":
                    $campos=Array();
                    $campos[nombre]=$txtnombre;
					$campos[tipoarticulo]=$txttipoarticulo;					
					$campos[descripcion]=$txtdescripcion;
					$ins=actualizar("articulos",$campos,"id_articulo = '$pk'");
                    redireccionar("index1.php?op=$op&msg=Artículo actualizado!");
    
    break;

	case "Delete":
        if($confirm=="Ok"){
          $del=runsql("delete from articulos where id_articulo = '$idn'");
        }
        redireccionar("index1.php?op=$op&ac=$ac&msg2=Artículo eliminado!");
  break;
}
?>
