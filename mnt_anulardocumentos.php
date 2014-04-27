<?php
include("../fnc.php");
include("fnc_js.php");
conectado();
//$sql_docemitido = "select ce.*, td.nombre, td.descripcion from cobros_docemitido ce join tipodoc td on (ce.id_tipodoc_emitido=td.id_tipodoc) where ce.id_cobro=$id_cobro" ;
$sql_docemitido = "select * from cobros_docemitido where id_cobro=$id_cobro";
//echo $sql_docemitido; exit();
$res=runsql($sql_docemitido);
$idocemitido=registro($res); 
switch($tipo_docemitido){
    case "10":      
				$campos[id_cobro]				=	$idocemitido[id_cobro];
				$campos[id_tipodoc_emitido]		=	$idocemitido[id_tipodoc_emitido];
				$campos[id_documento_emitido]	=	$corrfactura;
				$campos[status]					=	"emitido";
				$ins=insertar("cobros_docemitido",$campos);
				$campos[status]					=	"anulado";
				$campos[justificacion]			=	$justificacion;
				$ins=actualizar("cobros_emitidos",$campos,"id=".$idocemitido[id_cobro] );
				

				$campos2[correlativoini]		=	$corrfactura+1;						// actualizar numero correlativo
				$ins=actualizar("tipodoc",$campos2,"id_tipodoc = 10");

				$campos[id_tipodoc_emitido]		=	11;		
				$campos[id_documento_emitido]	=	$corrrecibo;
				$campos[status]					=	"emitido";							
				//$ins=insertar("cobros_docemitido",$campos);								// ingresa numero de recibo de caja

				$campos2[correlativoini]		=	$corrrecibo+1;						// actualizar numero correlativo
				$ins=actualizar("tipodoc",$campos2,"id_tipodoc = 11");							
	break;
	case "22": //recibo provicional
				$campos[id_cobro]				=	$idocemitido[id_cobro];
				$campos[id_tipodoc_emitido]		=	$idocemitido[id_tipodoc_emitido];
				$campos[id_documento_emitido]	=	$corrreciboprov;
				$campos[status]					=	"emitido";
				$ins=insertar("cobros_docemitido",$campos); 							// ingresa numero de recibo provicional

				$campos[status]					=	"anulado";
				$campos[justificacion]			=	$justificacion;
				$ins=actualizar("cobros_emitidos",$campos,"id=".$idocemitido[id_cobro] );				
				$campos2[correlativoini]		=	$corrreciboprov+1;					// actualizar numero correlativo
				//$ins=actualizar("tipodoc",$campos2,"id_tipodoc = 22");							
				
	break;
}
?>
<script language="javascript">
parent.location.href = parent.location.href; 
</script>