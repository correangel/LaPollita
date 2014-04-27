<?
include("../fnc.php");
conectado();
if(!$cn){$cn=1;}
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<script src="../jsincludes/prototype.js" type="text/javascript"></script>
<?
$tipo_trn="Add";
if($pk && $pk2){
  $qinfo=runsql("select * from movcuentadet where id_mov= '$pk' and id_movdet='$pk2'");
  //echo "select * from ventas_det where id_venta= '$pk' and id_articulo='$pk2'";
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="txtid_tipodoc";
?>
<script language="javascript1.2">
function CalcTotal(){
document.getElementById('txttotal').value=document.getElementById('txtcantidad').value*document.getElementById('txtprecio').value;
}
</script>
<form id="form1" name="form1" method="post" action="mnt_movcuentadet.php" autocomplete="off" onsubmit="return validar();">
  <input type="hidden" name="txtid_mov" id="txtid_mov" value="<?=$pk?>">
  <table width="600" border="0" align="center" cellpadding="2" cellspacing="2">
    <tr>
      <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Detalle de <? if ($tipotran=='in')  {echo ' Deposito ';}else{echo ' Retiro ';} ?> de Cuenta Bancaria</td>
          </tr>
      </table></td>
    </tr>
    <?
    if($msg){
    ?>
    <tr>
      <td height="22" colspan="4" bgcolor="#FFFFCC" class="lbl">&nbsp;&nbsp;<img src="../images/ic_info.gif" width="14" height="13" /> <span class="lblroja"><?=$msg;?></span></td>
    </tr>
    <?
    }
    ?>
    <tr>
      <td width="89" class="lbl">Tipo Doc:</td>
      <td width="97" ><span class="lbl">
        <select name="txtid_tipodoc" id="txtid_tipodoc" onchange="check_tipodoc(this.value)" class="textbox">
        <?php llenar_combo("tipodoc",$where=" where upper(tipotransac)='MOVDEPOSITO' ",$orden='nombre',$campo_valor='id_tipodoc',$campo_descrip='nombre',$seleccionar=$info[id_tipodoc],$codificar=false) ?>
        </select>
      </span></td>
      <td width="62" class="lbl"><span class="lbl">No. Doc:</span></td>
      <td width="126"><input name="txtno_doc" type="text" class="textbox" id="txtno_doc" value="<?=$info[no_doc];?>" size="30" maxlength="30" /></td>
    </tr>
    <tr>
      <td class="lbl">Monto:</td>
      <td ><input name="txtmonto" type="text" class="textbox" id="txtmonto" value="<?=$info[monto];?>" size="10" maxlength="100" /></td>
      <td><span class="lbl">Moneda:</span></td>
      <td>
	  <?php
      if (isset($info[moneda]) && $info[moneda]!='' ){ $selmoneda =  $info[moneda];} else {$selmoneda =  'QUE';}
	  ?>
      <select name="txtmoneda" id="txtmoneda">
          <?php llenar_combo("monedas",$where='',$orden='moneda',$campo_valor='moneda',$campo_descrip='moneda',$seleccionar=$selmoneda,$codificar=false,$separador='',$campo_descrip2='') ?>
        </select></td>
    </tr>
    <tr>
      <td class="lbl">Estado:</td>
      <td colspan="3" ><span class="lbl">
        <select name="txtstatus" id="txtstatus">
          <?php llenar_combo("estadodoc",$where=" where tipomov='cheque'",$orden='id_estadodoc',$campo_valor='id_estadodoc',$campo_descrip='descripcion',$seleccionar=$info[status],$codificar=false,$separador='',$campo_descrip2='') ?>
        </select>
      </span></td>
    </tr>
    <tr>
      <td class="lbl">Observaciones:</td>
      <td colspan="3" ><textarea name="txtobservaciones" cols="50" class="textbox" id="txtobservaciones" type="text" ><?=$info[observaciones];?></textarea></td>
    </tr>        
      <td><input name="tipo_trn" type="hidden" id="tipo_trn" value="<?=$tipo_trn;?>"/>
      <input name="op" type="hidden" id="op" value="<?=$op;?>" />
      <input name="pk" type="hidden" id="pk" value="<?=$pk;?>" />
      <input name="pk2" type="hidden" id="pk2" value="<?=$pk2;?>" /></td>
      <td colspan="2"><input name="button" type="submit" class="boton1" id="button" value="Guardar" /></td>
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
