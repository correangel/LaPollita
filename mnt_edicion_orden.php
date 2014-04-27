<?php
include("../fnc.php");
conectado();

for($i=1;$i<=$max;$i++){
  $tmp_seccion="txtseccion{$i}";
  $tmp_orden="txtorden{$i}";
  
  $seccion=$$tmp_seccion;
  $orden=$$tmp_orden;
  
  $qverifica=runsql("select * from orden_ediciones where fecha='".$_SESSION["edicion_fecha"]."' and seccion = '{$seccion}'");
  if(registros($qverifica)==0){
    unset($campos);
    $campos=Array();
    $campos[fecha]=$_SESSION["edicion_fecha"];
    $campos[seccion]=$seccion;
    $campos[orden]=$orden;
    
    $id=insertar("orden_ediciones",$campos);
  }else{
    $info=registro($qverifica);
    $campos[orden]=$orden;
    $upd=actualizar("orden_ediciones",$campos,"id={$info[id]}");
  }
}
?>
<script language="javascript">
parent.location.href = parent.location.href; 
</script>

