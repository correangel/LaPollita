<?php
include("../fnc.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[id_paciente]			=	$txtid_paciente;
                    $campos[fecha]					=	fechabd($txtfecha);
                    $campos[monto]					=	$txtmonto;
                    $campos[id_documento_emitido]	=	$txtid_documento;
					$campos[id_tipodoc]				=	$txtid_tipodoc;
					$campos[saldo]					=	$txtmonto;
                    $campos[observaciones]			=	$txtobservaciones;
                    $ins=insertar("ventas",$campos);
                    //redireccionar("index1.php?op=$op&msg=Registro de compra agregado!");
					//echo "index1.php?op=frm_compras&pk=$ins&msg=Registro De Compra agregado2!";
					$NewCorrelativo					=	$txtid_documento+1;
					$campos2[correlativoini]		=	$NewCorrelativo;
					$ins=actualizar("tipodoc",$campos2,"id_tipodoc = '$txtid_tipodoc'");
					redireccionar("index1.php?op=frm_ventas&pk=$ins&msg=Registro de Venta Agregado!");					
    break;
    
    
    case "Update":
                    $campos=Array();
                    $campos[id_paciente]			=	$txtid_paciente;
                    $campos[fecha]					=	fechabd($txtfecha);
                    $campos[monto]					=	$txtmonto;
                    $campos[id_documento_emitido]	=	$txtid_documento;
					$campos[id_tipodoc]				=	$txtid_tipodoc;
                    $campos[observaciones]			=	$txtobservaciones;
					$ins=actualizar("ventas",$campos,"id_venta = '$pk'");
                    redireccionar("index1.php?op=$op&msg=Registro de Venta Actualizado!");
    
    break;

	case "Delete":
        if($confirm=="Ok"){
          $del=runsql("delete from ventas where id_venta = '$idn'");
        }
        redireccionar("index1.php?op=$op&ac=$ac&msg2=Registro de Venta Eliminado!");
	
	case "DeleteDet":
        if($confirm=="Ok"){
		  $del=runsql("delete from ventas_det where id_venta = '$pk' and id_articulo = '$pk2'");
        }
		Recalcular_Monto_Venta($pk);
	    redireccionar("index1.php?op=$op&pk=$pk&msg2=Detalle de Artículo de Venta Eliminado!");	

	case "DeleteCobro":
        if($confirm=="Ok"){
			//echo "delete from pagos where id_pago = '$pk'";
		  $del=runsql("delete from cobros where id_cobro = '$pk'");
		  recalcular_saldo_venta($pk2);
        }
	    redireccionar("index1.php?op=frm_ventas&pk=$pk2&msg2=Pago Asociado a la Venta Eliminado!");
  break;
}
?>
