<?php
include("../fnc.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[video]=htmlentities($txtvideo);
                    $campos[activo]=$txtactivo;
                    
                    $ins=insertar("videos",$campos);
                    
                    redireccionar("index1.php?op=$op&msg=Video agregado!");
    break;
    
    
    case "Update":
                    $campos=Array();
                    $campos[video]=htmlentities($txtvideo);
                    $campos[activo]=$txtactivo;
                    
                    $ins=actualizar("videos",$campos,"id = '$pk'");
                    
                    redireccionar("index1.php?op=$op&msg=Video actualizado!");
    
    break;
    
    case "Delete":  $res=runsql("delete from videos where id = '$idv'");
                    redireccionar("index1.php?op=$op&msg=Video eliminado!"); 
    break;

}
?>
