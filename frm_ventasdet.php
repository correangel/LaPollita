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
  $qinfo=runsql("select * from ventas_det where id_venta= '$pk' and id_articulo='$pk2'");
  //echo "select * from ventas_det where id_venta= '$pk' and id_articulo='$pk2'";
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="id_articulo";
?>
<script language="javascript1.2">
function CalcTotal(){
document.getElementById('txttotal').value=document.getElementById('txtcantidad').value*document.getElementById('txtprecio').value;
}
</script>
<form id="form1" name="form1" method="post" action="mnt_ventasdet.php" autocomplete="off" onsubmit="return validar();">
  <input type="hidden" name="txtid_venta" id="txtid_venta" value="<?=$pk?>">
  <table width="400" border="0" align="center" cellpadding="2" cellspacing="2">
    <tr>
      <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Detalle de Servicios (Terapias) en la Venta</td>
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
      <td width="89"  class="lbl"><div align="left">Terapia:</div></td>
      <td colspan="3" ><div align="left">
        <select name="txtid_articulo" id="txtid_articulo">
          <?php llenar_combo("servicios",$where='',$orden='nombre',$campo_valor='id_servicio',$campo_descrip='nombre',$seleccionar=$info[id_articulo],$codificar=false) ?>
        </select>
      </div></td>
    </tr>
    <tr>
      <td class="lbl">Cantidad:</td>
      <td width="97" ><input name="txtcantidad" type="text" class="textbox" id="txtcantidad" value="<?=$info[cantidad];?>" size="10" maxlength="100"  onchange="CalcTotal();"/></td>
      <td width="62"><span class="lbl">Precio:</span></td>
      <td width="126"><input name="txtprecio" type="text" class="textbox" id="txtprecio" value="<?=$info[precio];?>" size="15" maxlength="100" onchange="CalcTotal();"/></td>
    </tr>
    <tr>
      <td class="lbl">Total:</td>
      <td ><input onclick="javascript:alert('Modifique Cantidad y Precio.');getElementById('txtcantidad').focus;" name="txttotal" type="text" class="textbox" id="txttotal" value="<?=$info[total];?>" size="10" maxlength="100" /></td>
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
      <td class="lbl">Observaciones:</td>
      <td colspan="3" ><textarea name="txtobservacion" cols="50" class="textbox" id="txtobservacion" type="text" ><?=$info[observacion];?></textarea></td>
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
