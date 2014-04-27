<?php
include("fnc.php");
conectado();

//print_r($_POST);exit();
switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[snombre]=$snombre;
                    $campos[sdescripcion]=$sdescripcion;					
                    $campos[status]=$status;
                    
                    $ins=insertar("categoria",$campos);
                    
                    redireccionar("index1.php?op=$op&msg=Categoría agregada!");
    break;
    
    
    case "Update":
                    $campos=Array();
                    $campos[snombre]=$snombre;
                    $campos[sdescripcion]=$sdescripcion;					
                    $campos[status]=$status;
                    
                    $ins=actualizar("categoria",$campos,"id_categoria = '$pk'");
                    
                    redireccionar("index1.php?op=$op&msg=Categoría actualizada!");
    
    break;

	case "Delete":
        if($confirm=="Ok"){
          $del=runsql("delete from categoria where id_categoria = '$id'");
        }
        redireccionar("index1.php?op=$op&msg=Categoría eliminada!");
  break;

}
?>
