<?php
include("../fnc.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[id_empresa]=$id_empresa;
					$campos[id_subcategoria]=$id_subcategoria;
					$campos[status]=$status;
                    $ins=insertar("rel_empresaxsubcategoria",$campos);
                    redireccionar("index1.php?op=$op&msg=Relación agregada!");
    break;
    
    
    case "Update":
                    $campos=Array();
                    $campos[id_empresa]=$id_empresa;
					$campos[id_subcategoria]=$id_subcategoria;
					$campos[status]=$status;					
					$ins=actualizar("rel_empresaxsubcategoria",$campos,"id_rel_empresaxsubcategoria = '$pk'");
                    redireccionar("index1.php?op=$op&msg=Relación actualizada!");
    
    break;

	case "Delete":
        if($confirm=="Ok"){
          $del=runsql("delete from rel_empresaxsubcategoria where id_rel_empresaxsubcategoria = '$id'");
        }
        redireccionar("index1.php?op=$op&ac=$ac&msg2=Relación eliminada!");
  break;
}
?>
