<?
include("../fnc.php");
include("fnc_js.php");
conectado();
if(!$cn){$cn=1;}
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<script src="../jsincludes/prototype.js" type="text/javascript"></script>
  <script language="JavaScript" src="../jsincludes/calendar/calendar_eu.js"></script>
<link rel="stylesheet" href="../jsincludes/calendar/calendar.css">  
   <script type="text/javascript">
    function calendario(str){
        window.open('./calendario.php?'+str,'calendario','width=250, height=200, location=no,menubar=no,resaizable=no,status=no,scrollbars=yes');
  }
  	  	function check_tipodoc(val){
		switch(val){
		case '14': //dep bancario
			document.getElementById('cta_banco').style.display	=	"table-row";
			document.getElementById('no_docto').style.display	=	"table-row";
			document.getElementById('no_tarjeta').style.display	=	"none";
		break;
		case '19': //cheque
			document.getElementById('cta_banco').style.display	=	"table-row";
			document.getElementById('no_docto').style.display	=	"table-row";
			document.getElementById('no_tarjeta').style.display	=	"none";
		break;
		case '15': //Efectivo
			document.getElementById('cta_banco').style.display	=	"none";
			document.getElementById('no_docto').style.display	=	"none";
			document.getElementById('no_tarjeta').style.display	=	"none";
		break;
		case '18': //Tarjeta de credito
			document.getElementById('cta_banco').style.display	=	"none";
			document.getElementById('no_docto').style.display	=	"table-row";
			document.getElementById('no_tarjeta').style.display	=	"table-row";
		break;
		}
  }
  
  function check_tipodoc_emitir(val){
		switch(val){
		case '10': //factura contable
			document.getElementById('emitir_factura').style.display	=	"table-row";
			document.getElementById('emitir_recibo').style.display	=	"none";
		break;
		case '22': //recibo provicional
			document.getElementById('emitir_factura').style.display	=	"none";
			document.getElementById('emitir_recibo').style.display	=	"table-row";
		break;
		}
  }
  </script>
<?
$tipo_trn	=	"Add";
$msjinput	=	"Agregar";
if(isset ($idcobro) && $idcobro!='' && isset ($idventa) && $idventa!='' ){
  	$res=runsql("select * from cobros where id_cobro= '$idcobro' and id_venta='$idventa'");
	$qinfo=registro($res); 
	$tipo_trn	=	"Update";  
	$msjinput	=	"Actualizar";
	$msg		=	"Datos del Cobro Afectado..."	;
}
$foco="txtid_tipodoc";
$today  = date("d")."-".date("m")."-".date("Y");
$info="";
// cargar correlativos
$arrCorr= CargarCorrelativos();


?><form id="form1" name="form1" method="post" action="mnt_anulardocumentos.php" autocomplete="off" >
    <input type="hidden" name="id_venta" id="id_venta" 	value="<?=$idventa?>">
    <input type="hidden" name="id_cobro" id="id_cobro" 	value="<?=$idcobro?>">    
    	<? //$info2=registro(runsql("select correlativoini from tipodoc where id_tipodoc=10;")); //correlativo Factura?>
    <input type="hidden" name="corrfactura" id="corrfactura" 	value="<?=$arrCorr[factura10];?>">
    <? //$info2=registro(runsql("select correlativoini from tipodoc where id_tipodoc=11;")); //correlativo Recibo?>    
    <input type="hidden" name="corrrecibo" 	id="corrrecibo" 	value="<?=$arrCorr[recibocaja11];?>">
    <? //$info2=registro(runsql("select correlativoini from tipodoc where id_tipodoc=13;")); //correlativo Nota de Envio?>
    <input type="hidden" name="corrreciboprov" 	id="corrreciboprov" 		value="<?=$arrCorr[reciboprovicional22];?>">
    <input type="hidden" name="txtid_documento_emitido" id="txtid_documento_emitido" value="" />
  <table width="400" border="0" align="center" cellpadding="2" cellspacing="2">
    <tr>
      <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr height="32">
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><span class="titulo_frm"><img src="../images/ic_anulardocumento.png" alt="" width="18" height="18" align="absmiddle" /></span></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm"> Anular Documento de Detalle de Cobros </td>
          </tr>
      </table></td>
    </tr>
    <?
    if($msg){
    ?>
    <tr>
      <td height="22" colspan="2" bgcolor="#FFFFCC" class="lbl">&nbsp;&nbsp;<img src="../images/ic_info.gif" width="14" height="13" /> 
      <span class="lblroja"><?=$msg;?></span></td>
    </tr>
    <?
    }
    ?>
    <tr>
      <td width="110" class="textbox"><div align="left">Tipo de Cobro:</div></td>
      <td width="276" class="textbox" ><div align="left">
        <select name="txtid_tipodoc" id="txtid_tipodoc" onchange="check_tipodoc(this.value)" class="textbox" disabled="disabled">
        <?php llenar_combo("tipodoc",$where=" where upper(tipotransac)='COBRO' ",$orden='nombre',$campo_valor='id_tipodoc',$campo_descrip='nombre',$seleccionar=$qinfo[id_tipodoc],$codificar=false) ?>
        </select>
        <span class="texto"><br />
        </span></div></td>
    </tr>
    <tr id="cta_banco" style="display:none">
	<td bgcolor="#F0F0F0" class="textbox" ><span class="lbl">Cta.  de Banco:</span></td>
	  <td bgcolor="#F0F0F0" class="textbox"><?=$qinfo[id_cuenta];?></td>
    </tr>

    <tr id="no_tarjeta" style="display:none">
      <td  bgcolor="#F0F0F0" class="textbox"><span class="lbl">No. tarjeta:</span></td>
      <td bgcolor="#F0F0F0" class="textbox"><?=$qinfo[notarjeta];?></td>
    </tr>
    <tr id="no_docto" style="display:none">
      <td bgcolor="#F0F0F0" class="textbox"><span class="lbl">No. Documento:</span></td>
      <td bgcolor="#F0F0F0" class="textbox"><?=$qinfo[nodoc];?> (cheque / autorizacion)</td>
    </tr>
	<tr id="no_docto" style="display:none">
      <td bgcolor="#F0F0F0" class="textbox"><span class="lbl">No. Factura:</span></td>
      <td bgcolor="#F0F0F0" class="textbox"><?=$qinfo[nodoc];?> (tarjeta credito)</td>
    </tr>    
    <tr>
      <td class="textbox">Fecha:</td>
      <td class="textbox"><? echo fecha($qinfo[fecha]);?></td>
    </tr>
    <tr>
      <td class="textbox">Monto:</td>
      <td class="textbox"><?=$qinfo[monto];?></td>
    </tr>
    <tr>
      <td class="textbox">Moneda:</td>
      <td class="textbox" ><span class="lbl"><?php
      if (isset($qinfo[moneda]) && $qinfo[moneda]!='' ){ $selmoneda =  $qinfo[moneda];} else {$selmoneda =  'QUE';}
	  ?>
      <select name="txtmoneda" id="txtmoneda"   disabled="disabled" >
        <?php llenar_combo("monedas",$where='',$orden='moneda',$campo_valor='moneda',$campo_descrip='moneda',$seleccionar=$selmoneda,$codificar=false,$separador='',$campo_descrip2='') ?>
      </select>
      </span></td>
    </tr>
    <tr>
      <td class="textbox">Obs.:</td>
      <td class="textbox"><?=$qinfo[observacion];?></td>
    </tr>
    <tr>
      <td colspan="2" class="lbl"><hr /></td>
    </tr>
<? 	$sql_docemitido = "select ce.*, td.nombre, td.descripcion from cobros_docemitido ce join tipodoc td on (ce.id_tipodoc_emitido=td.id_tipodoc) where ce.id_cobro=$idcobro" ;
	$res=runsql($sql_docemitido);
	$idocemitido=registro($res); 
	//echo "<pre>".print_r($idocemitido)."</pre>";
?>
    <tr>
        <td colspan="2" class="celdaresaltada"><span class="lbl">Documento a Anular:</span>          <div align="right"></div></td>
    </tr>  
		<? if ($idocemitido[id_tipodoc_emitido]==10) { 			// SI SE EMITIO FACTURA SE DEBE DESPLEGAR NO FACTURA Y NO RECIBO DE CAJA 
        	$cambiarpor	=	'factura' ; ?>
        <tr id="emitir_factura">
            <td class="celdaresaltada">&nbsp;</td>
        <td class="celdaresaltada"><span class="lbl">Factura No: <?=$idocemitido[id_documento_emitido];?> 
            <? $idocemitido=registro($res); ?></span></td>
    </tr>  
    <tr id="emitir_factura">
            <td class="celdaresaltada">&nbsp;</td>
        <td class="celdaresaltada"><span class="lbl">Recibo de Caja No: 
          <?=$idocemitido[id_documento_emitido];?></span></td>
    </tr>
        <? } else if ($idocemitido[id_tipodoc_emitido]==22) { // SI SE EMITIO RECIBO TEMPORAL, SOLO SE MUESTRA EL NUMERO DE ESE RECIBO TEMPORAL 
				$cambiarpor	=	'reciboprov' ;?>
            <tr id="emitir_recibo">
            <td class="celdaresaltada">&nbsp;</td>
            <td class="celdaresaltada"><span class="lbl">Recibo Prov. No: <?=$idocemitido[id_documento_emitido];?></span></td>
    </tr>
        <? } // TIPO DE DOCUMENTO EMITIDO (FACTURA O RECIBO PROV)?>    
<tr>
      <td colspan="2" class="lbl"><hr /></td>
    </tr>
    <tr>
        <td colspan="2"><span class="lbl">Cambiar por:</span></td>
    </tr>  
    <? if ($cambiarpor == 'factura') { // SI SE EMITIO FACTURA SE DEBE DESPLEGAR NO FACTURA Y NO RECIBO DE CAJA ?>
	<tr id="emitir_factura">
        <td>&nbsp;</td>
        <td><span class="lbl">Factura No: <?=$arrCorr[factura10];?></span></td>
    </tr>    
    <tr id="emitir_factura">
        <td>&nbsp;</td>
        <td><span class="lbl"> Recibo de Caja No: 
        <?=$arrCorr[recibocaja11];?></span></td>
    </tr>  
<? } else if ($cambiarpor == 'reciboprov') { // SI SE EMITIO RECIBO TEMPORAL, SOLO SE MUESTRA EL NUMERO DE ESE RECIBO TEMPORAL ?>    
        <tr id="emitir_recibo">
        <td>&nbsp;</td>
        <td><span class="lbl">Recibo Prov No: <?=$arrCorr[reciboprovicional22];?></span></td>
    </tr>
<? } // TIPO DE DOCUMENTO EMITIDO (FACTURA O RECIBO PROV)?>        
<tr>
      <td colspan="2" class="lbl"><hr /></td>
    </tr>
            <tr>
      <td class="celdaresaltada"><div align="center" class="msg_error">Justificaci&oacute;n de la Anulaci&oacute;n ...</div></td>
      <td class="celdaresaltada"><textarea name="txtjustificacion"  cols="40" rows="3" class="textbox" id="txtjustificacion" type="text" ></textarea></td>
    </tr>

    <tr>        
      <td><input name="tipo_docemitido" type="hidden" id="tipo_docemitido" value="<?=$idocemitido[id_tipodoc_emitido];?>"/>
      <input name="op" type="hidden" id="op" value="<?=$op;?>" />
      <input name="pk" type="hidden" id="pk" value="<?=$idcobro;?>" />
      <input name="pk2" type="hidden" id="pk2" value="<?=$idventa;?>" /></td>
      <td><input name="button" type="submit" class="boton1" id="button" value="Anular Documento" /></td>
    </tr>            
  </table>
</form>
<?
if($foco){
echo "<script language=\"javascript\">";
echo "$('{$foco}').focus();";
echo "</script>";
}
?>
<script language="javascript1.2">
	check_tipodoc('<?=$qinfo[id_tipodoc];?>');
	txtmoneda
	txtid_tipodoc
	txtobservacion
</script>