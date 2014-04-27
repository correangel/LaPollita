<?php
include("../fnc.php");
conectado();
//error_reporting(E_ALL);
switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[complemento]=$txtcomplemento;
                    $campos[cantidad_texto]=$txtcantidad_texto;
                    $campos[activo]=$txtactivo;
                    
                    $id=insertar("complementos",$campos);
                    
                    if($_FILES["txtilustracion"]){
                      $tmp_extension=explode(".", $_FILES["txtilustracion"]["name"]);
                      $pos_extension=count($tmp_extension)-1;
                      $extension=$tmp_extension[$pos_extension];
                      //echo "Extensión: $extension<br>";
                      
                      $nuevo_archivo="../contenido/complementos/{$id}.{$extension}";
                      
                      @copy($_FILES["txtilustracion"]["tmp_name"],$nuevo_archivo);
                      if(file_exists($nuevo_archivo)){
                        $upd=runsql("update complementos set ilustracion = '{$id}.{$extension}' where id = '$id'");
                      }
                      
                    }
                    
                    redireccionar("index1.php?op=$op&msg=Complemento agregado!");
    break;
    
    
    case "Update":
                    $campos=Array();
                    $campos[complemento]=$txtcomplemento;
                    $campos[cantidad_texto]=$txtcantidad_texto;
                    $campos[activo]=$txtactivo;
                    
                    $ins=actualizar("complementos",$campos,"id = '$pk'");
                    
                    if($_FILES["txtilustracion"]){
                      $qautor=runsql("select ilustracion from complementos where id = '$pk'");
                      $iautor=registro($qautor);
                      if(!empty($iautor[ilustracion])){
                        unlink("../contenido/complementos/{$iautor[ilustracion]}");
                      }
                      
                      
                      $tmp_extension=explode(".", $_FILES["txtilustracion"]["name"]);
                      $pos_extension=count($tmp_extension)-1;
                      $extension=$tmp_extension[$pos_extension];
                      //echo "Extensión: $extension<br>";
                      
                      $nuevo_archivo="../contenido/complementos/{$pk}.{$extension}";
                      
                      @copy($_FILES["txtilustracion"]["tmp_name"],$nuevo_archivo);
                      if(file_exists($nuevo_archivo)){
                        $upd=runsql("update complementos set ilustracion = '{$pk}.{$extension}' where id = '$pk'");
                      }
                    }
                    
                    redireccionar("index1.php?op=$op&msg=Complemento actualizado!");
    
    break;

}
?>
