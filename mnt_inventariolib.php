<?php
include("../fnc.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
					$ultimaexistencia=get_existencia_articulo('inventariolib',$txtid_articulo,'actual');
                    $campos=Array();
                    $campos[id_tipotran]				=	$txtid_tipotran;
					$campos[id_documento_recibido]		=	$txtid_documento_recibido;
					$campos[id_articulo]				=	$txtid_articulo;
					$campos[observaciones]				=	$txtobservaciones;					
					$campos[fecha]						=	fechabd($txtfecha);
					$campos[cantidad]					=	$txtcantidad;					
					if ($txtid_tipotran == 'in' ){		// traer la existencia, actual del articulo
						$newExistencia = $ultimaexistencia + $txtcantidad;
					}else{ 								// out 
						$newExistencia = $ultimaexistencia - $txtcantidad;
					}
					$campos[existencia]					=	$newExistencia;
					$ins=insertar("inventariolib",$campos);
					redireccionar("index1.php?op=$op&msg=Movimiento de Inventario (Librería) Agregado!");
    break;
    
    
    case "Update":
					$ultimaexistencia=get_existencia_articulo('inventariolib',$txtid_articulo,'anterior');
                    $campos=Array();
					$campos[id_tipotran]				=	$txtid_tipotran;
					$campos[id_documento_recibido]		=	$txtid_documento_recibido;
					$campos[id_articulo]				=	$txtid_articulo;
					$campos[observaciones]				=	$txtobservaciones;					
					$campos[fecha]						=	fechabd($txtfecha);
					$campos[cantidad]					=	$txtcantidad;					
					if ($txtid_tipotran == 'in' ){		// traer la existencia, actual del articulo
						$newExistencia = $ultimaexistencia + $txtcantidad;
					}else{ 								// out 
						$newExistencia = $ultimaexistencia - $txtcantidad;
					}
					$campos[existencia]					=	$newExistencia;
					$ins=actualizar("inventariolib",$campos,"id_tran = '$pk'");
                    redireccionar("index1.php?op=$op&msg=Movimiento de Inventario (Librería) Actualizado!");
    
    break;

	case "Delete":
        if($confirm=="Ok"){
          $del=runsql("delete from inventariolib where id_tran = '$idn'");
        }
        redireccionar("index1.php?op=$op&ac=$ac&msg2=Movimiento de Inventario (Librería) Eliminado!");
  break;
}
?>
