<?
if(1==2){
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<?
}

$tipo_trn="Add";
if($pk){
  $qinfo=runsql("select * from banco where id_banco = '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="txtcliente";

?><form id="form1" name="form1" method="post" action="mnt_bancos.php" autocomplete="off" onsubmit="return validar();">
  <table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Administraci&oacute;n de Bancos</td>
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
      <td width="160" class="lbl"><div align="left">Nombres:</div></td>
      <td width="652"><div align="left">
        <input name="txtsnombre" type="text" class="textbox" id="txtsnombre" value="<?=$info[snombre];?>" size="50" maxlength="100" />
      </div></td>
      <td width="178"><div align="center">
        <?if($tipo_trn=="Update"){?>
        <a href="index1.php?op=<?=$op;?>" class="link_texto">Agregar nuevo</a>
        <?}?>
      </div></td>
    </tr>
    <tr>
      <td class="lbl">Direccion:</td>
      <td colspan="2"><input name="txtsdireccion" type="text" class="textbox" id="txtsdireccion" value="<?=$info[sdireccion];?>" size="50" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Telefonos:</td>
      <td colspan="2"><input name="txtstelefono" type="text" class="textbox" id="txtstelefono" value="<?=$info[stelefono];?>" size="70" maxlength="100" /></td>
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
    <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_recordatorio.png" width="35" height="32" /></div></td>
        <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Bancos existentes</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="403" class="lbl"><div align="center"><strong>Nombre del Banco</strong></div></td>
    <td width="318" class="lbl"><div align="center"><strong>Direcci&oacute;n</strong></div></td>
    <td width="318" class="lbl"><div align="center">Tel&eacute;fonos</div></td>
    <td width="255" class="lbl"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  $qlista=runsql("select * from banco order by snombre");
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr bgcolor="<?=color_fila($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[snombre];?></td>
    <td class="texto"><?=$ilista[sdireccion];?></td>
    <td height="22" class="texto">
      <div align="left">
        <?=$ilista[stelefono];?>
      </div></td>
    <td><div align="center"><a href="index1.php?<?="op=$op&pk=$ilista[id_banco]";?>"><img src="../images/ic_editar.gif" alt="Modificar" width="15" height="15" border="0" /></a> &nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick="cf_eliminar_banco('<?=$ilista[id_banco];?>');"><img src="../images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0"/></a></div></td>
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
