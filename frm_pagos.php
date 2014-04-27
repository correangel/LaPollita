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
		case '20': //cheque
			document.getElementById('cta_banco').style.display	=	"table-row";
			document.getElementById('no_docto').style.display	=	"table-row";
			document.getElementById('no_tarjeta').style.display	=	"none";
		break;
		case '21': //Efectivo
			document.getElementById('cta_banco').style.display	=	"none";
			document.getElementById('no_docto').style.display	=	"none";
			document.getElementById('no_tarjeta').style.display	=	"none";
		break;
		case '17': //Tarjeta de credito
			document.getElementById('cta_banco').style.display	=	"none";
			document.getElementById('no_docto').style.display	=	"table-row";
			document.getElementById('no_tarjeta').style.display	=	"table-row";
		break;
		}
  }
  </script>
<?
$tipo_trn="Add";
if($pk){
  $qinfo=runsql("select * from pagos where id_pago= '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="txtid_tipodoc";

?><form id="form1" name="form1" method="post" action="mnt_pagos.php" autocomplete="off" onsubmit="return validar();">
  <input type="hidden" name="txtid_compra" id="txtid_compra" value="<?=$pk?>">
  <table width="400" border="0" align="center" cellpadding="2" cellspacing="2">
    <tr>
      <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Detalle de Pagos</td>
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
      <td width="76" class="lbl"><div align="left">Tipo de Pago:</div></td>
      <td width="310" ><div align="left">
        <select name="txtid_tipodoc" id="txtid_tipodoc" onchange="check_tipodoc(this.value)" class="textbox">
        <?php llenar_combo("tipodoc",$where=" where upper(tipotransac)='PAGO' ",$orden='nombre',$campo_valor='id_tipodoc',$campo_descrip='nombre',$seleccionar=$info[id_tipodoc],$codificar=false) ?>
        </select>
      </div></td>
    </tr>
    <tr id="cta_banco" style="display:none">
	<td class="lbl" >&nbsp;</td>
    <td><span class="lbl">Cuenta de Banco:</span>
      <select name="txtid_cuenta" id="txtid_cuenta" class="textbox">
        <?php llenar_combo("cuenta",$where=" where upper(stipo)='MONETARIO' ",$orden='snocuenta',$campo_valor='id_cuenta',$campo_descrip='snocuenta',$seleccionar=$info[id_cuenta],$codificar=false) ?>
      </select></td></tr>

    <tr id="no_tarjeta" style="display:none">
      <td class="lbl">&nbsp;</td>
      <td><span class="lbl">No. tarjeta:</span>
      <input name="txtnotarjeta" type="text" class="textbox" id="txtnotarjeta" value="<?=$info[notarjeta];?>" size="15" maxlength="100" /></td>
    </tr>
    <tr id="no_docto" style="display:none">
      <td class="lbl">&nbsp;</td>
      <td><span class="lbl">No. Documento:</span>
      <input name="txtnodoc" type="text" class="textbox" id="txtnodoc" value="<?=$info[nodoc];?>" size="15" maxlength="100" /></td>    
	</tr>
    <tr>
      <td class="lbl">Fecha:</td>
      <td><input name="txtfecha" type="text" class="textbox" id="txtfecha" value="<?=fechacorta($info[fecha]);?>" size="10" maxlength="15" />
      <script language="JavaScript" type="text/javascript">new tcal ({'formname': 'form1','controlname': 'txtfecha'});</script></td>
    </tr>
    <tr>
      <td class="lbl">Monto:</td>
      <td><span class="lbl">Q</span>.
      <input name="txtmonto" type="text" class="textbox" id="txtmonto" value="<?=$info[monto];?>" size="15" maxlength="100" /></td>
    </tr>
    <tr>    </tr>
    <tr>
      <td class="lbl">Obs.:</td>
      <td><textarea name="txtobservacion" cols="50" class="textbox" id="txtobservacion" type="text" ><?=$info[observacion];?></textarea></td>
    </tr>        
      <td><input name="tipo_trn" type="hidden" id="tipo_trn" value="<?=$tipo_trn;?>"/>
      <input name="op" type="hidden" id="op" value="<?=$op;?>" />
      <input name="pk" type="hidden" id="pk" value="<?=$pk;?>" />
      <input name="pk2" type="hidden" id="pk2" value="<?=$pk2;?>" /></td>
      <td><input name="button" type="submit" class="boton1" id="button" value="Guardar" /></td>
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
	check_tipodoc('<?=$info[id_tipodoc];?>');
</script>