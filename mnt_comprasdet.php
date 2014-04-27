<?php
include("../fnc.php");
include("fnc_js.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
					if ($txtid_articulo == 'otro...'){
						$campos2=Array();
                   		$campos2[nombre]=$txtnewarticulo;
						$campos2[tipoarticulo]='compras';						
						$campos2[descripcion]=$txtnewarticulo;
						$ins=insertar("articulos",$campos2);
						$txtid_articulo=$ins;
					}
					
					
                    $campos=Array();
                    $campos[id_compra]		=	$txtid_compra;
					$campos[id_articulo]	=	$txtid_articulo;
					$campos[cantidad]		=	$txtcantidad;
					$campos[precio]			=	$txtprecio;
					$campos[total]			=	$txttotal;
					$campos[moneda]			=	$txtmoneda;					
					$campos[observacion]	=	$txtobservacion;
                    $ins=insertar("compras_det",$campos);
					Recalcular_Monto_Compra($txtid_compra);
                   //redireccionar("index1.php?op=$op&msg=Detalle de Artículo agregado!");
    break;
    
    case "Update":
                    $campos=Array();
                    $campos[id_compra]		=	$txtid_compra;
					$campos[id_articulo]	=	$txtid_articulo;
					$campos[cantidad]		=	$txtcantidad;
					$campos[precio]			=	$txtprecio;
					$campos[total]			=	$txttotal;
					$campos[moneda]			=	$txtmoneda;					
					$campos[observacion]	=	$txtobservacion;
					//echo "compras_det",$campos,"id_compra = '$pk' and id_articulo = '$pk2'"; exit();
					$ins=actualizar("compras_det",$campos,"id_compra = '$pk' and id_articulo = '$pk2'");
                    //redireccionar("index1.php?op=$op&msg=Artículo actualizado!");
    
    break;

	/*case "Delete":
		alert('delte dentro de mnt_comprasdet');
        if($confirm=="Ok"){
          $del=runsql("delete from compras_det where id_compra = '$pk' and id_articulo = '$pk2'");
        }
        //redireccionar("index1.php?op=$op&ac=$ac&msg2=Artículo eliminado!");
  break;*/
}
?>
<script language="javascript">
parent.location.href = parent.location.href; 
</script>