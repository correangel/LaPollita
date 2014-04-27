<?php
include("../fnc.php");
conectado();

//print_r($_POST);exit();
switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[id_categoria]=$id_categoria;
                    $campos[snombre]=$snombre;
                    $campos[sdescripcion]=$sdescripcion;					
                    $campos[status]=$status;
                    
                    $ins=insertar("subcategoria",$campos);
                    
                    redireccionar("index1.php?op=$op&msg=Sub-Categoría agregada!");
    break;
    
    
    case "Update":
                    $campos=Array();
                    $campos[id_categoria]=$id_categoria;
                    $campos[snombre]=$snombre;
                    $campos[sdescripcion]=$sdescripcion;					
                    $campos[status]=$status;
                    
                    $ins=actualizar("subcategoria",$campos,"id_subcategoria = '$pk'");
                    
                    redireccionar("index1.php?op=$op&msg=Sub-Categoría actualizada!");
    
    break;

	case "Delete":
        if($confirm=="Ok"){
			$sql="delete from subcategoria where id_subcategoria = '$id'";
			//echo $sql;exit();
          $del=runsql();
        }
        redireccionar("index1.php?op=$op&msg=Sub-Categoría eliminada!");
  break;

}
?>
