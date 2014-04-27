<?php
include("../fnc.php");
include("fnc_js.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[id_compra]		=	$txtid_compra;
					$campos[id_tipodoc]		=	$txtid_tipodoc;
					$campos[id_cuenta]		=	$txtid_cuenta;
					$campos[nodoc]			=	$txtnodoc;
					$campos[fecha]			=	fechabd($txtfecha);
					$campos[monto]			=	$txtmonto;
					$campos[observacion]	=	$txtobservacion;
                    $ins=insertar("pagos",$campos);
                    //redireccionar("index1.php?op=$op&msg=Detalle de Artículo agregado!");
    break;
    
    case "Update":
                    $campos=Array();
					$campos[id_tipodoc]		=	$txtid_tipodoc;
					$campos[id_cuenta]		=	$txtid_cuenta;
					$campos[nodoc]			=	$txtnodoc;
					$campos[fecha]			=	fechabd($txtfecha);
					$campos[monto]			=	$txtmonto;
					$campos[observacion]	=	$txtobservacion;
					//echo "pagos ",$campos,"id_pago = '$pk'"; exit();
					$ins=actualizar("pagos",$campos,"id_pago = '$pk'");
                    //redireccionar("index1.php?op=$op&msg=Artículo actualizado!");
    
    break;

	case "Delete": 
		// verl la funcion en el archivo mnt_compras.php
		// verl la funcion en el archivo mnt_compras.php
		// verl la funcion en el archivo mnt_compras.php
		// verl la funcion en el archivo mnt_compras.php
        //redireccionar("index1.php?op=$op&ac=$ac&msg2=Artículo eliminado!");
  break;
}
?>
<script language="javascript">
parent.location.href = parent.location.href; 
</script>