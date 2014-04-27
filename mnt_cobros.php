<?php
include("../fnc.php");
include("fnc_js.php");
conectado();
//echo "<pre>".print_r($_POST)."</pre>";exit();
switch($tipo_trn){
  
    case "Add":      
					$saldo	=	get_saldo_cobro('cobros',$txtid_venta,'actual');
					if ($saldo==-1) {
						$saldo	=	registro( runsql("select saldo from ventas where id_venta='$txtid_venta'") ); 
					}
					
					//echo "select saldo from ventas where id_venta='$txtid_venta'   ".$saldo."-".$txtmonto;  exit();
                    $campos=Array();
                    $campos[id_venta]				=	$txtid_venta;
					$campos[id_tipodoc]				=	$txtid_tipodoc;
					if ($txtid_tipodoc==19){	// si es cheque
						$campos[status]='pendiente';
					}else{
						$campos[status]='confirmado';
					}
					
					$campos[id_cuenta]				=	$txtid_cuenta;
					$campos[nodoc]					=	$txtnodoc;
					$campos[fecha]					=	fechabd($txtfecha);
					$campos[monto]					=	$txtmonto;
					$campos[moneda]					=	$txtmoneda;
					$campos[observacion]			=	$txtobservacion;
					$campos[id_mov]					=	-1;
					$campos[status_deposito]		=   "pendiente";
                    $inscobro=insertar("cobros",$campos);
					$saldo_actual					=	Recalcular_Saldo_Venta_AddCobro($txtid_venta);
					//echo "saldo actual = ". $saldo_actual;exit();
					$campos=Array();
                    $campos[saldo]			=	$saldo_actual;
					$ins=actualizar("cobros",$campos,"id_cobro = $inscobro");
					//insertar documentos emitidos por cobro
					$campos=Array(); $campos2=Array();
					$campos[id_cobro]				=	$inscobro;
					switch($txtid_tipodoc_emitido){
						case "10": //factura
							$campos[id_tipodoc_emitido]		=	$txtid_tipodoc_emitido;
							$campos[id_documento_emitido]	=	$corrfactura;
							$campos[status]					=	"emitido";
							$ins=insertar("cobros_docemitido",$campos); 							// ingresa numero de factura

							$campos2[correlativoini]		=	$corrfactura+1;						// actualizar numero correlativo
							$ins=actualizar("tipodoc",$campos2,"id_tipodoc = 10");

							$campos[id_tipodoc_emitido]		=	11;		
							$campos[id_documento_emitido]	=	$corrrecibo;
							$campos[status]					=	"emitido";							
							$ins=insertar("cobros_docemitido",$campos);								// ingresa numero de recibo de caja

							$campos2[correlativoini]		=	$corrrecibo+1;						// actualizar numero correlativo
							$ins=actualizar("tipodoc",$campos2,"id_tipodoc = 11");							
						break;
						case "22": //recibo provicional
							$campos[id_tipodoc_emitido]		=	$txtid_tipodoc_emitido;
							$campos[id_documento_emitido]	=	$corrreciboprov;
							$campos[status]					=	"emitido";							
							$ins=insertar("cobros_docemitido",$campos); 							// ingresa numero de recibo provicional
							
							$campos2[correlativoini]		=	$corrreciboprov+1;					// actualizar numero correlativo
							$ins=actualizar("tipodoc",$campos2,"id_tipodoc = 22");							
							
						break;
										
					}

					// acutalizar correlativos de documentos emitidos

    break;
    
    case "Update":
					$saldo	=	get_saldo_cobro('cobros',$txtid_venta,'anterior');
					if ($saldo==-1) {
						$saldo	=	registro( runsql("select monto from ventas where id_venta='$txtid_venta'") ); 
						//echo "monto de la venta...".$saldo[monto];exit();
					}
                    $campos=Array();
					$campos[id_tipodoc]		=	$txtid_tipodoc;
					$campos[id_cuenta]		=	$txtid_cuenta;
					$campos[nodoc]			=	$txtnodoc;
					$campos[fecha]			=	fechabd($txtfecha);
					$campos[monto]			=	$txtmonto;
					$campos[moneda]			=	$txtmoneda;					
					$campos[observacion]	=	$txtobservacion;
					//echo "pagos ",$campos,"id_pago = '$pk'"; exit();
					$ins=actualizar("cobros",$campos,"id_cobro = '$pk'");
					Recalcular_Saldo_Venta($txtid_venta);					
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