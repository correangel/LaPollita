<?php
include("../fnc.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[seccion]=$txtseccion;
                    $campos[activa]=$txtactiva;
                    
                    $ins=insertar("secciones",$campos);
                    
                    redireccionar("index1.php?op=$op&msg=Secci�n agregada!");
    break;
    
    
    case "Update":
                    $campos=Array();
                    $campos[seccion]=$txtseccion;
                    $campos[activa]=$txtactiva;
                    
                    $ins=actualizar("secciones",$campos,"id = '$pk'");
                    
                    redireccionar("index1.php?op=$op&msg=Secci�n actualizada!");
    
    break;

}
?>
