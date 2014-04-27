<?php
include("../fnc.php");
conectado();

//echo $tipo_trn;

switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[noticia]=$idn;
                    $campos[complemento]=$idc;
                    
                    for($i=1;$i<=$max;$i++){
                      $tmp="txttexto{$i}";
                      $campos["texto{$i}"]=$$tmp;
                    }
                    
                    
                    $ins=insertar("noticias_complementos",$campos);
                    
                    //echo "<h1>Complemento agregado!</h1>";
    break;
    
    
    case "Update":
                    $campos=Array();
                    $campos[noticia]=$idn;
                    $campos[complemento]=$idc;
                    
                    for($i=1;$i<=$max;$i++){
                      $tmp="txttexto{$i}";
                      $campos["texto{$i}"]=$$tmp;
                    }
                    
                    $ins=actualizar("noticias_complementos",$campos,"id='$idnc'");
                    
    break; 

}
//exit();
?>
<script language="javascript">
parent.location.href = parent.location.href; 
</script>
