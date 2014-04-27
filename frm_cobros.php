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
if(isset ($pk) && $pk!='' && isset ($pk2) && $pk2!='' ){
  	$res=runsql("select * from cobros where id_cobro= '$pk' and id_venta='$pk2'");
	$qinfo=registro($res); 
	$tipo_trn	=	"Update";  
	$msjinput	=	"Actualizar";
}
$foco="txtid_tipodoc";
$today  = date("d")."-".date("m")."-".date("Y");
$info="";
// cargar correlativos
$arrCorr= CargarCorrelativos();


?><form id="form1" name="form1" method="post" action="mnt_cobros.php" autocomplete="off" onsubmit="return validar();">
    <input type="hidden" name="txtid_venta" id="txtid_venta" 	value="<?=$pk?>">
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
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Detalle de Cobros</td>
          </tr>
      </table></td>
    </tr>
    <?
    if($msg){
    ?>
    <tr>
      <td height="22" colspan="2" bgcolor="#FFFFCC" class="lbl">&nbsp;&nbsp;<img src="../images/ic_info.gif" width="14" height="13" /> <span class="lblroja"><?=$msg;?></span></td>
    </tr>
    <?
    }
    ?>
    <tr>
      <td width="110" class="lbl"><div align="left">Tipo de Cobro:</div></td>
      <td width="276" ><div align="left">
        <select name="txtid_tipodoc" id="txtid_tipodoc" onchange="check_tipodoc(this.value)" class="textbox">
        <?php llenar_combo("tipodoc",$where=" where upper(tipotransac)='COBRO' ",$orden='nombre',$campo_valor='id_tipodoc',$campo_descrip='nombre',$seleccionar=$qinfo[id_tipodoc],$codificar=false) ?>
        </select>
        <span class="texto"><br />
        Docto. que se le recibe al cliente en su pago</span>.</div></td>
    </tr>
    <tr id="cta_banco" style="display:none">
	<td bgcolor="#F0F0F0" class="lbl" ><span class="lbl">Cta.  de Banco:</span></td>
	  <td bgcolor="#F0F0F0"><input  type="text" name="txtid_cuenta" id="txtid_cuenta" class="textbox" value="<?=$qinfo[id_cuenta];?>">	  </td>
    </tr>

    <tr id="no_tarjeta" style="display:none">
      <td  bgcolor="#F0F0F0" class="lbl"><span class="lbl">No. tarjeta:</span></td>
      <td bgcolor="#F0F0F0"><input name="txtnotarjeta" type="text" class="textbox" id="txtnotarjeta" value="<?=$qinfo[notarjeta];?>" size="15" maxlength="100" /></td>
    </tr>
    <tr id="no_docto" style="display:none">
      <td bgcolor="#F0F0F0" class="lbl"><span class="lbl">No. Documento:</span></td>
      <td bgcolor="#F0F0F0"><input name="txtnodoc" type="text" class="textbox" id="txtnodoc" value="<?=$qinfo[nodoc];?>" size="15" maxlength="100" /> 
      (cheque / autorizacion)</td>
    </tr>
	<tr id="no_docto" style="display:none">
      <td bgcolor="#F0F0F0" class="lbl"><span class="lbl">No. Factura:</span></td>
      <td bgcolor="#F0F0F0"><input name="txtnodoc" type="text" class="textbox" id="txtnodoc" value="<?=$qinfo[nodoc];?>" size="15" maxlength="100" /> 
      (tarjeta credito)</td>
    </tr>    
    <tr>
      <td class="lbl">Fecha:</td>
      <td><input name="txtfecha" type="text" class="textbox" id="txtfecha" value="<? if (isset ($qinfo[fecha])){echo fecha($qinfo[fecha]);}else{echo $today;}?>" size="20" maxlength="100"/>
      <script language="JavaScript" type="text/javascript">new tcal ({'formname': 'form1','controlname': 'txtfecha'});</script></td>
    </tr>
    <tr>
      <td class="lbl">Monto:</td>
      <td><input name="txtmonto" type="text" class="textbox" id="txtmonto" value="<?=$qinfo[monto];?>" size="15" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Moneda:</td>
      <td ><span class="lbl"><?php
      if (isset($qinfo[moneda]) && $qinfo[moneda]!='' ){ $selmoneda =  $qinfo[moneda];} else {$selmoneda =  'QUE';}
	  ?>
      <select name="txtmoneda" id="txtmoneda"   >
        <?php llenar_combo("monedas",$where='',$orden='moneda',$campo_valor='moneda',$campo_descrip='moneda',$seleccionar=$selmoneda,$codificar=false,$separador='',$campo_descrip2='') ?>
      </select>
      </span></td>
    </tr>
<? if ($tipo_trn=="Update") {  
	$sql_docemitido = "select ce.*, td.nombre, td.descripcion from cobros_docemitido ce join tipodoc td on (ce.id_tipodoc_emitido=td.id_tipodoc) where ce.id_cobro=$pk" ;
	$res=runsql($sql_docemitido);
	$idocemitido=registro($res); 
	//echo "<pre>".print_r($idocemitido)."</pre>";
?>
    <tr>
        <td class="celdaresaltada"><span class="lbl">Doc. emitido:</span></td>
      <td class="celdaresaltada"><div align="right"></div></td>
    </tr>  
		<? if ($idocemitido[id_tipodoc_emitido]==10) { // SI SE EMITIO FACTURA SE DEBE DESPLEGAR NO FACTURA Y NO RECIBO DE CAJA ?>
        <tr id="emitir_factura">
            <td class="celdaresaltada">&nbsp;</td>
        <td class="celdaresaltada"><span class="lbl">Factura No: <?=$idocemitido[id_documento_emitido];?> 
            <? $idocemitido=registro($res); ?> 
                                / Recibo de Caja No: <?=$idocemitido[id_documento_emitido];?></span></td>
    </tr>  
        <? } else if ($idocemitido[id_tipodoc_emitido]==22) { // SI SE EMITIO RECIBO TEMPORAL, SOLO SE MUESTRA EL NUMERO DE ESE RECIBO TEMPORAL ?>
            <tr id="emitir_recibo">
            <td class="celdaresaltada">&nbsp;</td>
            <td class="celdaresaltada"><span class="lbl">Recibo No: <?=$arrCorr[reciboprovicional22];?></span></td>
    </tr>
        <? } // TIPO DE DOCUMENTO EMITIDO (FACTURA O RECIBO PROV)?>    
<? }else{?>    
    <tr>
        <td><span class="lbl">Doc. a emitir:</span></td>
        <td><span class="lbl">
          <select name="txtid_tipodoc_emitido" id="txtid_tipodoc_emitido" onchange="check_tipodoc_emitir(this.value)">
				<?php llenar_combo("tipodoc",$where=' where id_tipodoc in (10,22) ',$orden='nombre',$campo_valor='id_tipodoc',$campo_descrip='nombre',$seleccionar=$qinfo[id_tipodoc],$codificar=false,$separador='',$campo_descrip2='') ?>
          </select>
      </span></td>
    </tr>  
    <tr id="emitir_factura" style="display:none">
        <td>&nbsp;</td>
        <td><span class="lbl">Factura No: <?=$arrCorr[factura10];?> / Recibo de Caja No: <?=$arrCorr[recibocaja11];?></span></td>
    </tr>  
        <tr id="emitir_recibo" style="display:none">
        <td>&nbsp;</td>
        <td><span class="lbl">Recibo No: <?=$arrCorr[reciboprovicional22];?></span></td>
    </tr>
        <tr id="emitir_factura" style="display:none">
        <td>&nbsp;</td>
        <td><span class="lbl">Factura No: <?=$arrCorr[factura10];?> / Recibo de Caja No: <?=$arrCorr[recibocaja11];?></span></td>
    </tr>  
        <tr id="emitir_recibo" style="display:none">
        <td>&nbsp;</td>
        <td><span class="lbl">Recibo No: <?=$arrCorr[reciboprovicional22];?></span></td>
    </tr>      
<? }?>    
        <tr>
      <td class="lbl">Obs.:</td>
      <td><textarea name="txtobservacion" cols="50" class="textbox" id="txtobservacion" type="text" ><?=$qinfo[observacion];?></textarea></td>
    </tr>

    <tr>        
      <td><input name="tipo_trn" type="hidden" id="tipo_trn" value="<?=$tipo_trn;?>"/>
      <input name="op" type="hidden" id="op" value="<?=$op;?>" />
      <input name="pk" type="hidden" id="pk" value="<?=$pk;?>" />
      <input name="pk2" type="hidden" id="pk2" value="<?=$pk2;?>" /></td>
      <td><input name="button" type="submit" class="boton1" id="button" value="<? echo $msjinput;?>" /></td>
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
</script>