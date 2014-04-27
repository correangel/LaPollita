<?php
include("../fnc.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[id_proveedor]			=	$txtid_proveedor;
                    $campos[fecha]					=	fechabd($txtfecha);
                    $campos[monto]					=	$txtmonto;
                    $campos[id_documento_recibido]	=	$txtid_documento;
					$campos[id_tipodoc]				=	$txtid_tipodoc;
                    $campos[observaciones]			=	$txtobservaciones;
                    $ins=insertar("compras",$campos);
                    //redireccionar("index1.php?op=$op&msg=Registro de compra agregado!");
					//echo "index1.php?op=frm_compras&pk=$ins&msg=Registro De Compra agregado2!";
                    redireccionar("index1.php?op=frm_compras&pk=$ins&msg=Registro de Compra Agregado!");					
    break;
    
    
    case "Update":
                    $campos=Array();
                    $campos[id_proveedor]			=	$txtid_proveedor;
                    $campos[fecha]					=	fechabd($txtfecha);
                    $campos[monto]					=	$txtmonto;
                    $campos[id_documento_recibido]	=	$txtid_documento;
					$campos[id_tipodoc]				=	$txtid_tipodoc;
                    $campos[observaciones]			=	$txtobservaciones;
					$ins=actualizar("compras",$campos,"id_compra = '$pk'");
                    redireccionar("index1.php?op=$op&msg=Registro de Compra Actualizado!");
    
    break;

	case "Delete":
        if($confirm=="Ok"){
          $del=runsql("delete from compras where id_compra = '$idn'");
        }
        redireccionar("index1.php?op=$op&ac=$ac&msg2=Registro de Compra Eliminado!");
	
	case "DeleteDet":
        if($confirm=="Ok"){
		  $del=runsql("delete from compras_det where id_compra = '$pk' and id_articulo = '$pk2'");
        }
		Recalcular_Monto_Compra($pk);
	    redireccionar("index1.php?op=$op&pk=$pk&msg2=Detalle de Artículo de compra eliminado!");	

	case "DeletePago":
        if($confirm=="Ok"){
			//echo "delete from pagos where id_pago = '$pk'";
		  $del=runsql("delete from pagos where id_pago = '$pk'");
		  Recalcular_Monto_Compra($pk);
        }
	    redireccionar("index1.php?op=frm_compras&pk=$pk2&msg2=Pago asociado a la compra eliminado!");
  break;
}
?>
