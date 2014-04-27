<?php
include("../fnc.php");
include("fnc_js.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[id_venta]		=	$txtid_venta;
					$campos[id_articulo]	=	$txtid_articulo;
					$campos[cantidad]		=	$txtcantidad;
					$campos[precio]			=	$txtprecio;
					$campos[total]			=	$txttotal;
					$campos[moneda]			=	$txtmoneda;
					$campos[observacion]	=	$txtobservacion;
                    $ins=insertar("ventas_det",$campos);
					Recalcular_Monto_Venta($txtid_venta);
    break;
    
    case "Update":
                    $campos=Array();
                    $campos[id_venta]		=	$txtid_venta;
					$campos[id_articulo]	=	$txtid_articulo;
					$campos[cantidad]		=	$txtcantidad;
					$campos[precio]			=	$txtprecio;
					$campos[total]			=	$txttotal;
					$campos[moneda]			=	$txtmoneda;									
					$campos[observacion]	=	$txtobservacion;
					$ins=actualizar("ventas_det",$campos,"id_venta = '$pk' and id_articulo = '$pk2'");
					Recalcular_Monto_Venta($txtid_venta);
    
    break;

}
?>
<script language="javascript">
parent.location.href = parent.location.href; 
</script>