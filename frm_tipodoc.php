<?
if(1==2){
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<?
}

$tipo_trn="Add";
if($pk){
  $qinfo=runsql("select * from tipodoc where id_tipodoc = '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="txtnombre";

?><form id="form1" name="form1" method="post" action="mnt_tipodoc.php" autocomplete="off" onsubmit="return validar();">
  <table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Administraci&oacute;n de Tipos de Documentos</td>
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
      <td width="160" class="lbl"><div align="left">Nombre Tipo Documento:</div></td>
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
      <td colspan="2"><input name="txtdescripcion" type="text" class="textbox" id="txtdescripcion" value="<?=$info[descripcion];?>" size="75" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Tipo de Transacci&oacute;n:</td>
      <td colspan="2"><select name="txttipotransac" id="txttipotransac" class="textbox">
        <option value="cobro" <? if ($info[tipotransac]=='cobro') {echo 'selected';}?>>Cobro</option>
        <option value="pago" <? if ($info[tipotransac]=='pago') {echo 'selected';}?>>Pago</option>
        <option value="emitir" <? if ($info[tipotransac]=='emitir') {echo 'selected';}?>>Doc. a emitir</option>
        <option value="recibir" <? if ($info[tipotransac]=='recibir') {echo 'selected';}?>>Doc. a recibir</option>
        <option value="documento" <? if ($info[tipotransac]=='documento') {echo 'selected';}?>>Doc. interno</option>
        </select>
      </td>
    </tr>
    <tr>
      <td class="lbl">Correlativo inicio:</td>
      <td colspan="2"><input name="txtcorrelativoini" type="text" class="textbox" id="txtcorrelativoini" value="<?=$info[correlativoini];?>" size="15" maxlength="15" /></td>
    </tr>
    <tr>
      <td class="lbl">Correlativo final:</td>
      <td colspan="2"><input name="txtcorrelativofin" type="text" class="textbox" id="txtcorrelativofin" value="<?=$info[correlativofin];?>" size="15" maxlength="15" /></td>
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
    <td colspan="6"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_recordatorio.png" width="35" height="32" /></div></td>
        <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Tipos de Documentos   existentes</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="184" class="lbl"><div align="center"><strong>Nombre del Tipo Documento</strong></div></td>
    <td width="285" class="lbl"><div align="center">Descripci&oacute;n</div></td>
    <td width="194" class="lbl"><div align="center">Tipo de Transacci&oacute;n</div></td>
    <td width="86" class="lbl"><div align="center">Correlativo Inicial</div></td>
    <td width="88" class="lbl"><div align="center">Correlativo Final</div></td>
    <td width="146" class="lbl"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  $qlista=runsql("select * from tipodoc order by tipotransac, nombre");
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr bgcolor="<?=color_fila($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[nombre];?></td>
    <td class="texto"><?=$ilista[descripcion];?></td>
    <td height="22" class="texto"><div align="left">
      <?=$ilista[tipotransac];?>
    </div></td>
    <td><?=$ilista[correlativoini];?></td>
    <td><?=$ilista[correlativofin];?></td>
    <td><div align="center"><a href="index1.php?<?="op=$op&pk={$ilista[id_tipodoc]}";?>"><img src="../images/ic_editar.gif" alt="Modificar" width="15" height="15" border="0" /></a> &nbsp;&nbsp;&nbsp;
    <a href="javascript:void(0);" onclick="cf_eliminar_tipodoc('<?=$ilista[id_tipodoc];?>');"><img src="../images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0"/></a></div></td>
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
