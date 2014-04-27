<?php
include("../fnc.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
					$ultimaexistencia=get_existencia_articulo('inventario',$txtid_articulo,'actual');
                    $campos=Array();
                    $campos[id_tipotran]				=	$txtid_tipotran;
					$campos[id_documento_recibido]		=	$txtid_documento_recibido;
					$campos[id_articulo]				=	$txtid_articulo;
					$campos[observaciones]				=	$txtobservaciones;					
					$campos[fecha]						=	fechabd($txtfecha);
					$campos[cantidad]					=	$txtcantidad;					
					if ($txtid_tipotran == 'in' ){      // traer la existencia, actual del articulo
						$newExistencia = $ultimaexistencia + $txtcantidad;
					}else{ 								// out 
						$newExistencia = $ultimaexistencia - $txtcantidad;
					}
					$campos[existencia]					=	$newExistencia;
					$ins=insertar("inventario",$campos);
					redireccionar("index1.php?op=$op&msg=Movimiento de Inventario (Médico) Agregado!");
    break;
    
    
    case "Update":
                    $ultimaexistencia=get_existencia_articulo('inventario',$txtid_articulo,'anterior');
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
					$ins=actualizar("inventario",$campos,"id_tran = '$pk'");
                    redireccionar("index1.php?op=$op&msg=Movimiento de Inventario (Médico) Actualizado!");
    
    break;

	case "Delete":
        if($confirm=="Ok"){
          $del=runsql("delete from inventario where id_tran = '$idn'");
        }
        redireccionar("index1.php?op=$op&ac=$ac&msg2=Movimiento de Inventario (Médico) Eliminado!");
  break;
}
?>
