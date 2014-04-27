<?
if(1==2){
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<?
}

$tipo_trn="Add";
if($pk){
  $qinfo=runsql("select * from servicios where id_servicio = '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="txtnombre";

?><form id="form1" name="form1" method="post" action="mnt_servicios.php" autocomplete="off" onsubmit="return validar();">
  <table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Administraci&oacute;n de Servicios</td>
          </tr>
      </table></td>
    </tr>
    <?
    if($msg){
    ?>
    <tr>
      <td height="22" colspan="3" bgcolor="#FFFFCC" class="lbl">&nbsp;&nbsp;<img src="../images/ic_info.gif" width="14" height="13" /> <span class="lblroja"><?=$msg;?></span></td>
    </tr>
    <?
    }
    ?>
    <tr>
      <td width="160" class="lbl"><div align="left">Nombre:</div></td>
      <td width="652"><div align="left">
        <input name="txtnombre" type="text" class="textbox" id="txtnombre" value="<?=$info[nombre];?>" size="50" maxlength="100" />
      </div></td>
      <td width="178"><div align="center">
        <?if($tipo_trn=="Update"){?>
        <a href="index1.php?op=<?=$op;?>" class="link_texto">Agregar nuevo</a>
        <?}?>
      </div></td>
    </tr>
    <tr>
      <td class="lbl">Descripci&oacute;n:</td>
      <td colspan="2"><input name="txtdescripcion" type="text" class="textbox" id="txtdescripcion" value="<?=$info[descripcion];?>" size="50" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Costo:</td>
      <td colspan="2"><input name="txtcosto" type="text" class="textbox" id="txtcosto" value="<?=$info[costo];?>" size="20" maxlength="20" /></td>
    </tr>
	<tr>
      <td class="lbl">Activo:</td>
      <td colspan="2"><input name="txtactivo" type="checkbox" id="txtactivo" value="1" checked="checked" <? if($info[activo]==1){echo "checked";}?>/></td>
    </tr>
    <tr>
      <td><input name="tipo_trn" type="hidden" id="tipo_trn" value="<?=$tipo_trn;?>" />
      <input name="op" type="hidden" id="op" value="<?=$op;?>" />
      <input name="pk" type="hidden" id="pk" value="<?=$pk;?>" /></td>
      <td colspan="2"><input name="button" type="submit" class="boton1" id="button" value="Guardar" /></td>
    </tr>            
  </table>
</form>
<br />
<table width="990" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#D1DDE7">
  <tr>
    <td colspan="5"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_recordatorio.png" width="35" height="32" /></div></td>
        <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Servicios existentes</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="240" class="lbl"><div align="center"><strong> Nombre del Servicio</strong></div></td>
    <td width="501" class="lbl"><div align="center"><strong>Descripci&oacute;n</strong></div></td>
    <td width="52" class="lbl"><div align="center">Costo</div></td>
    <td width="94" class="lbl"><div align="center">Activo</div></td>
    <td width="97" class="lbl"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  $qlista=runsql("select * from servicios order by nombre");
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr bgcolor="<?=color_fila($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[nombre];?></td>
    <td class="texto"><?=$ilista[descripcion];?></td>
    <td class="texto"><div align="left"><?=$ilista[costo];?></div></td>
    <td height="22" class="texto"><div align="center"><img src="../images/ic_<? if($ilista[activo]==0){echo "no";}?>ok.gif" width="16" height="16" /></div> </td>
    <td><div align="center"><a href="index1.php?<?="op=$op&pk=$ilista[id_servicio]";?>"><img src="../images/ic_editar.gif" alt="Modificar" width="15" height="15" border="0" /></a> &nbsp;&nbsp;&nbsp;
    <a href="javascript:void(0);" onclick="cf_eliminar_servicio('<?=$ilista[id_servicio];?>');"><img src="../images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0"/></a></div></td>
  </tr>
  <?
  }
  ?>
</table>
<?
if($foco){
echo "<script language=\"javascript\">";
echo "$('{$foco}').focus();";
echo "</script>";
}
?>
