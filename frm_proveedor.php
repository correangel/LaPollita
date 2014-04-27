<?
if(1==2){
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<?
}

$tipo_trn="Add";
if($pk){
  $qinfo=runsql("select * from proveedor where id = '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="txtcliente";

?><form id="form1" name="form1" method="post" action="mnt_proveedor.php" autocomplete="off" onsubmit="return validar();">
  <table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="4">
      	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Administraci&oacute;n de Proveedores</td>
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
      <td class="lbl"><div align="left">Empresa:</div></td>
      <td><div align="left">
        <input name="txtempresa" type="text" class="textbox" id="txtempresa" value="<?=$info[empresa];?>" size="50" maxlength="100" />
      </div></td>
      <td></td>
      <td><div align="center"><?if($tipo_trn=="Update"){?>
        <a href="index1.php?op=<?=$op;?>" class="link_texto">Agregar nuevo</a>
      <?}?></div></td>
    </tr>
    <tr>
      <td class="lbl">Nombres:</td>
      <td><input name="txtnombres" type="text" class="textbox" id="txtnombres" value="<?=$info[nombres];?>" size="50" maxlength="100" /></td>
      <td><span class="lbl">Apellidos:</span></td>
      <td><input name="txtapellidos" type="text" class="textbox" id="txtapellidos" value="<?=$info[apellidos];?>" size="50" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Direcci&oacute;n:</td>
      <td ><input name="txtdireccion" type="text" class="textbox" id="txtdireccion" value="<?=$info[direccion];?>" size="70" maxlength="100" /></td>
      <td><span class="lbl">Correo electr&oacute;nico:</span></td>
      <td><input name="txtemail" type="text" class="textbox" id="txtemail" value="<?=$info[email];?>" size="50" maxlength="100" /></td>
    </tr>
        <tr>
      <td class="lbl">Tel. Mobil:</td>
      <td><input name="txttelmobil" type="text" class="textbox" id="txttelmobil" value="<?=$info[telmobil];?>" size="20" maxlength="100" /></td>
      <td><span class="lbl">Tel. Casa:</span></td>
      <td><input name="txttelcasa" type="text" class="textbox" id="txttelcasa" value="<?=$info[telcasa];?>" size="20" maxlength="100" /></td>
    </tr>
        <tr>
      <td class="lbl">Nit:</td>
      <td ><input name="txtnit" type="text" class="textbox" id="txtnit" value="<?=$info[nit];?>" size="40" maxlength="100" /></td>
	<td class="lbl">Fecha Nacimiento:</td>
	<td><input name="txtfnac" type="text" class="textbox" id="txtfnac" value="<?=fechacorta($info[fnac]);?>" size="15" maxlength="100" />
        <script language="JavaScript" type="text/javascript">new tcal ({'formname': 'form1','controlname': 'txtfnac'});</script>    </td>      
    </tr>
    <tr>
      <td class="lbl">Activo:</td>
      <td ><input name="txtactivo" type="checkbox" id="txtactivo" value="1" <?if($info[activo]==1){echo "checked";}?>/></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td><input name="tipo_trn" type="hidden" id="tipo_trn" value="<?=$tipo_trn;?>" />
      <input name="op" type="hidden" id="op" value="<?=$op;?>" />
      <input name="pk" type="hidden" id="pk" value="<?=$pk;?>" /></td>
      <td ><input name="button" type="submit" class="boton1" id="button" value="Guardar" /></td>
      <td></td>
      <td></td>
    </tr>            
  </table>
</form>
<br />
<table width="990" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#D1DDE7">
  <tr>
    <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_recordatorio.png" width="35" height="32" /></div></td>
        <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Proveedores  existentes</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="535" class="lbl">Nombre de la empresa</td>
    <td width="535" class="lbl"><div align="center"><strong>Nombre del Proveedor</strong></div></td>
    <td width="186" class="lbl"><div align="center">Activo</div></td>
    <td width="255" class="lbl"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  $qlista=runsql("select * from proveedor order by apellidos");
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr bgcolor="<?=color_fila($cnt_lista);?>">
    <td class="texto"><?=$ilista[empresa];?></td>
    <td height="22" class="texto"><?=$ilista[apellidos];?>,<?=$ilista[nombres];?></td>
    <td height="22" class="texto"><div align="center"><img src="../images/ic_<?if($ilista[activo]==0){echo "no";}?>ok.gif" width="16" height="16" /></div></td>
    <td><div align="center"><a href="index1.php?<?="op=$op&pk={$ilista[id]}";?>"><img src="../images/ic_editar.gif" alt="Modificar" width="15" height="15" border="0" /></a> &nbsp;&nbsp;&nbsp;
    <a href="javascript:void(0);" onclick="cf_eliminar_proveedor('<?=$ilista[id];?>');"><img src="../images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0"/></a></div></td>
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
