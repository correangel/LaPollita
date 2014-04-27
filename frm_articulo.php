<?
if(1==2){
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<?
}

$tipo_trn="Add";
if($pk){
  $qinfo=runsql("select * from articulos where id_articulo = '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="txtnombre";

?><form id="form1" name="form1" method="post" action="mnt_articulo.php" autocomplete="off" onsubmit="return validar();">
  <table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Administraci&oacute;n de <strong>Art&iacute;culos </strong>/ Servicios</td>
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
      <td width="160" class="lbl"><div align="left">Nombre <strong>Art&iacute;culo</strong>/Servicio :</div></td>
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
      <td class="lbl">Tipo de <strong>Art&iacute;culo</strong>/Servicio:</td>
      <td colspan="2">
      <select name="txttipoarticulo" id="txttipoarticulo">
          <?php llenar_combo("tipoarticulo",$where='',$orden='tipoarticulo',$campo_valor='tipoarticulo',$campo_descrip='tipoarticulo',$seleccionar=$info[tipoarticulo],$codificar=false,$separador='',$campo_descrip2='') ?>
        </select>
      </td>
    </tr>
    <tr>
      <td class="lbl">Descripci&oacute;n:</td>
      <td colspan="2"><input name="txtdescripcion" type="text" class="textbox" id="txtdescripcion" value="<?=$info[descripcion];?>" size="50" maxlength="100" /> </td>
    </tr>
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
    <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_recordatorio.png" width="35" height="32" /></div></td>
        <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Art&iacute;culos / Servicios existentes</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="313" class="lbl"><div align="center"><strong>Nombre del Art&iacute;culo</strong>/Servicio</div></td>
    <td width="184" class="lbl"><div align="center">Tipo de Art&iacute;culo o Servicio</div></td>
    <td width="418" class="lbl"><div align="center">Descripci&oacute;n</div></td>
    <td width="70" class="lbl"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  $qlista=runsql("select * from articulos order by tipoarticulo, nombre");
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr bgcolor="<?=color_fila($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[nombre];?></td>
    <td class="texto"><?=$ilista[tipoarticulo];?></td>
    <td height="22" class="texto"><div align="left">
      <?=$ilista[descripcion];?>
    </div></td>
    <td><div align="center"><a href="index1.php?<?="op=$op&pk={$ilista[id_articulo]}";?>"><img src="../images/ic_editar.gif" alt="Modificar" width="15" height="15" border="0" /></a> &nbsp;&nbsp;&nbsp;
    <a href="javascript:void(0);" onclick="cf_eliminar_articulo('<?=$ilista[id_articulo];?>');"><img src="../images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0"/></a></div></td>
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
