<?php
include("../fnc.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
			$campos=Array();
			$campos[id_mov]			=		$txtid_mov;
          	$campos[id_tipodoc]		=		$txtid_tipodoc;
			$campos[no_doc]			=		$txtno_doc;
			$campos[monto]			= 		$txtmonto;
			$campos[moneda]			=		$txtmoneda;
          	$campos[status]			=		$txtstatus;															
			$campos[observaciones]	=		$txtobservaciones;															
			//echo "<pre>";print_r($_POST);echo"</pre>";exit();
          	$ins=insertar("movcuentadet",$campos);
            //redireccionar("index1.php?op=$op&msg=Movimiento Bancario agregado!");
    break;
    
    
    case "Update":
 			$campos=Array();
          	$campos[id_tipodoc]		=		$txtid_tipodoc;
			$campos[no_doc]			=		$txtno_doc;
			$campos[monto]			= 		$txtmonto;
			$campos[moneda]			=		$txtmoneda;
          	$campos[status]			=		$txtstatus;															
			$campos[observaciones]	=		$txtobservaciones;			
			//echo "<pre>";print_r($campos);echo"</pre> $pk";exit();										
			$ins=actualizar("movcuentadet",$campos,"id_movdet = '$pk2'");
			//redireccionar("index1.php?op=$op&msg=Movimiento Bancario actualizado!");
    
    break;

	case "Delete":
		//echo "delete from movcuenta where id_mov = '$idn'";exit();
        if($confirm=="Ok"){
          $del=runsql("delete from movcuentadet where id_movdet = '$pk2'");
        }
        //redireccionar("index1.php?op=$op&ac=$ac&msg2=Movimiento Bancario eliminado!");
  break;
}
?>
<script language="javascript">
parent.location.href = parent.location.href; 
</script>