<?php
include("../fnc.php");
conectado();
//error_reporting(E_ALL);
switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[nombre]=$txtnombre;
                    $campos[email]=$txtemail;
                    $campos[seccion]=$txtseccion;
                    $campos[activo]=$txtactivo;
                    
                    $id=insertar("autores",$campos);
                    
                    if($_FILES["txtfoto"]){
                      $tmp_extension=explode(".", $_FILES["txtfoto"]["name"]);
                      $pos_extension=count($tmp_extension)-1;
                      $extension=$tmp_extension[$pos_extension];
                      //echo "Extensión: $extension<br>";
                      
                      $nuevo_archivo="../contenido/autores/{$id}.{$extension}";
                      
                      @copy($_FILES["txtfoto"]["tmp_name"],$nuevo_archivo);
                      if(file_exists($nuevo_archivo)){
                        $upd=runsql("update autores set foto = '{$id}.{$extension}' where id = '$id'");
                      }
                      
                    }
                    
                    redireccionar("index1.php?op=$op&msg=Autor agregado!");
    break;
    
    
    case "Update":
                    $campos=Array();
                    $campos[nombre]=$txtnombre;
                    $campos[email]=$txtemail;
                    $campos[seccion]=$txtseccion;
                    $campos[activo]=$txtactivo;
                    
                    $ins=actualizar("autores",$campos,"id = '$pk'");
                    
                    if($_FILES["txtfoto"]){
                      $qautor=runsql("select foto from autores where id = '$pk'");
                      $iautor=registro($qautor);
                      if(!empty($iautor[foto])){
                        unlink("../contenido/autores/{$iautor[foto]}");
                      }
                      
                      
                      $tmp_extension=explode(".", $_FILES["txtfoto"]["name"]);
                      $pos_extension=count($tmp_extension)-1;
                      $extension=$tmp_extension[$pos_extension];
                      //echo "Extensión: $extension<br>";
                      
                      $nuevo_archivo="../contenido/autores/{$pk}.{$extension}";
                      
                      @copy($_FILES["txtfoto"]["tmp_name"],$nuevo_archivo);
                      if(file_exists($nuevo_archivo)){
                        $upd=runsql("update autores set foto = '{$pk}.{$extension}' where id = '$pk'");
                      }
                    }
                    
                    redireccionar("index1.php?op=$op&msg=Autor actualizado!");
    
    break;

}
?>
