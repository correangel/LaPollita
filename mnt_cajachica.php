<?php
include("../fnc.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[id_tipotran]				=	$txtid_tipotran;
					$campos[descripcion]				=	$txtdescripcion;
					$campos[fecha]						=	fechabd($txtfecha);					
					$campos[total]						=	$txttotal;
					$campos[id_documento_recibido]		=	$txtid_documento_recibido;					
					$campos[no_documento]				=	$txtno_documento;
					$campos[observaciones]				=	$txtobservaciones;
                    $ins=insertar("cajachica",$campos);
                    redireccionar("index1.php?op=$op&msg=Movimiento de Caja Chica Agregado!");
    break;
    
    
    case "Update":
                    $campos=Array();
					$campos[id_tipotran]				=	$txtid_tipotran;
					$campos[descripcion]				=	$txtdescripcion;
					$campos[fecha]						=	fechabd($txtfecha);					
					$campos[total]						=	$txttotal;
					$campos[id_documento_recibido]		=	$txtid_documento_recibido;					
					$campos[no_documento]				=	$txtno_documento;
					$campos[observaciones]				=	$txtobservaciones;									
					$ins=actualizar("cajachica",$campos,"id_tran = '$pk'");
                    redireccionar("index1.php?op=$op&msg=Movimiento de Caja Chica Actualizado!");
    
    break;

	case "Delete":
        if($confirm=="Ok"){
          $del=runsql("delete from cajachica where id_tran = '$idn'");
        }
        redireccionar("index1.php?op=$op&ac=$ac&msg2=Movimiento de Caja Chica Eliminado!");
  break;
}
?>
