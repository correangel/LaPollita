<?
if(1==2){
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<?
}

$tipo_trn="Add";
if($pk){
  $qinfo=runsql("select * from usuarios where usuario = '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="txtusuario";

?><form id="form1" name="form1" method="post" action="mnt_usuario.php" autocomplete="off" onsubmit="return validar();">
  <table width="990" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Administraci&oacute;n de Usuarios</td>
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
      <td width="160" class="lbl"><div align="left">Usuario:</div></td>
      <td width="652"><div align="left">
        <input name="txtusuario" type="text" class="textbox" id="txtusuario" value="<?=$info[usuario];?>" size="50" maxlength="100" />
      </div></td>
      <td width="178"><div align="center">
        <?if($tipo_trn=="Update"){?>
        <a href="index1.php?op=<?=$op;?>" class="link_texto">Agregar nuevo</a>
        <?}?>
      </div></td>
    </tr>
    <tr>
      <td class="lbl">Clave:</td>
      <td colspan="2"><input name="txtclave" type="text" class="textbox" id="txtclave" value="<?=$info[clave];?>" size="50" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Nombres:</td>
      <td colspan="2"><input name="txtnombres" type="text" class="textbox" id="txtnombres" value="<?=$info[nombre];?>" size="70" maxlength="100" /></td>
    <tr>
      <td class="lbl">Apellidos:</td>
      <td colspan="2"><input name="txtapellidos" type="text" class="textbox" id="txtapellidos" value="<?=$info[apellido];?>" size="50" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Email:</td>
      <td colspan="2"><input name="txtemail" type="text" class="textbox" id="txtemail" value="<?=$info[email];?>" size="40" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Télefono:</td>
      <td colspan="2"><input name="txttelefono" type="text" class="textbox" id="txttelefono" value="<?=$info[telefono];?>" size="50" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Activo:</td>
      <td colspan="2"><input name="txtactivo" type="checkbox" id="txtactivo" value="1" <?if($info[activo]==1){echo "checked";}?>/></td>
    </tr>
    <tr>
      <td class="lbl"><div align="left">Ultimo Acceso:</div></td>
      <td colspan="2"><div align="left">
        <input name="txtfuacc" type="text" class="textbox" id="txtfuacc" value="<?=fechacorta($info[u_acceso]);?>" size="15" maxlength="100" />
               <script language="JavaScript" type="text/javascript">
          	new tcal ({
          		// form name
          		'formname': 'form1',
          		// input name
          		'controlname': 'txtfuacc'
          	});
	          </script></div></td>
    </tr>
    <tr>
      <td class="lbl">IP Ultimo Acceso:</td>
      <td colspan="2"><input name="txtipacceso" type="text" class="textbox" id="txtipacceso" value="<?=$info[ip_uacceso];?>" size="70" maxlength="100" /></td>
    <tr>
    <tr>
      <td><input name="tipo_trn" type="hidden" id="tipo_trn" value="<?=$tipo_trn;?>" />
      <input name="op" type="hidden" id="op" value="<?=$op;?>" />
      <input name="pk" type="hidden" id="pk" value="<?=$pk;?>" /></td>
      <td colspan="2"><input name="button" type="submit" class="boton1" id="button" value="Guardar" /></td>
    </tr>            

  </table>
</form>
<br />
<table width="980" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#D1DDE7">
  <tr>
    <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_recordatorio.png" width="35" height="32" /></div></td>
        <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Usuarios  existentes</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="535" class="lbl"><div align="center"><strong>Nombre del Usuario</strong></div></td>
    <td width="186" class="lbl"><div align="center">Activo</div></td>
    <td width="255" class="lbl"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  $qlista=runsql("select * from usuarios order by apellido");
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr class="<?=set_row_class($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[apellido];?>,<?=$ilista[nombre];?></td>
    <td height="22" class="texto"><div align="center"><img src="../images/ic_<?if($ilista[activo]==0){echo "no";}?>ok.gif" width="16" height="16" /></div></td>
    <td><div align="center"><a href="index1.php?<?="op=$op&pk={$ilista[usuario]}";?>"><img src="../images/ic_editar.gif" alt="Modificar" width="15" height="15" border="0" /></a> &nbsp;&nbsp;&nbsp;
    <a href="javascript:void(0);" onclick="cf_eliminar_usuario('<?=$ilista[usuario];?>');"><img src="../images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0"/></a></div></td>
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
