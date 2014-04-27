<?php
include("../fnc.php");
conectado();

//error_reporting(E_ALL);

switch($tipo_trn){
  
    case "Add":      
                    if($_FILES["txtimagen"]["tmp_name"]){
                      $extension=get_extension_file($_FILES["txtimagen"]["name"]);
                      
                      //$iconteo=registro(runsql("select count(*) as cantidad from noticias_imagenes where noticia = '$idn'"));
                      //$siguiente=$iconteo[cantidad]+1;
                      
                      $campos=Array();
                      $campos[noticia]=$idn;
                      $campos[tipo]=$extension;
                      $campos[pie]=$txtpie;
                      
                      $id=insertar("noticias_imagenes",$campos);
                      
                      if($id){
                        unset($campos);
                        $campos[path]="{$idn}-{$id}.{$extension}";
                        if(copy($_FILES["txtimagen"]["tmp_name"] , "../contenido/img_noticias/".$campos[path])){
                          $upd=actualizar("noticias_imagenes",$campos,"id = '$id'");
                        }                       
                      }
                      
                    }
                    
                    
                    //echo "<h1>Complemento agregado!</h1>";
    break;
    
    
    case "Update":
                    $campos=Array();
                    $campos[pie]=$txtpie;
                                        
                    $upd=actualizar("noticias_imagenes",$campos,"id='$idi'");
    break; 

}

?>
<script language="javascript">
parent.location.href = parent.location.href; 
</script>
