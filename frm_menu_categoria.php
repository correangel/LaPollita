<?
include_once("fnc.php");
conectado();
$tipo="Add";

if($idc){
  $id_ca=dec($idc);
  $q=mysql_query("select * from me_categorias where id = $id_ca");
  if(mysql_num_rows($q)==0){
    alert("Parámetros incorrectos",$goback);
  }
  $info=mysql_fetch_array($q);
  $tipo="Upd";
}
if(1==2){
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<?
}

$tipo_trn="Add";
if($idu){
  $id_u=dec($idu);
  $info=registro(runsql("select * from usuarios where usuario = '$id_u'"));
  $tipo_trn="Update";
}
?>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF"><form id="form3" name="form3" method="post" action="mnt_menu_categoria.php">
      <div align="center">
        <table width="99%"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#333333">
          <tr>
            <td bgcolor="#FFFFFF"><table width="750"  border="0" align="center" cellpadding="1" cellspacing="1" background="../images/tema/bg_frm_campos.png" bgcolor="#FFFFFF">
                <tr align="left" valign="middle" bgcolor="#6699CC">
                  <td height="15" colspan="3" class="titulo_formulario"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="6%" background="../images/bg_titulo_frm.gif"><img src="../images/ic_frm.gif" width="35" height="32" /></td>
                        <td width="94%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Informaci&oacute;n de la categor&iacute;a del MENU </td>
                      </tr>
                  </table></td>
                </tr>
                <tr align="left" valign="middle" >
                  <td bgcolor="#FFFFFF" class="lbl">Categor&iacute;a:</td>
                  <td width="53%" bgcolor="#FFFFFF" class="parrafo"><input name="txtcategoria" type="text" class="textbox" id="txtcategoria" tabindex="1" size="60" maxlength="75"  value="<?=$info[categoria];?>" /></td>
                  <td width="25%" bgcolor="#FFFFFF" class="parrafo"><div align="center"><a href="index1.php?op=frm_menu_categoria" class="link_texto"><strong>Agregar Nueva</strong></a> </div></td>
                </tr>
                <tr align="left" valign="middle" >
                  <td bgcolor="#FFFFFF" class="lbl">Orden:</td>
                  <td colspan="2" bgcolor="#FFFFFF"><input name="txtorden" type="text" class="textbox" id="txtorden" tabindex="1" size="11" maxlength="11" value="<?=$info[orden];?>" /></td>
                </tr>
                <tr align="left" valign="middle" >
                  <td width="22%" bgcolor="#FFFFFF" class="lbl">Tipo de Men&uacute;: </td>
                  <td colspan="2" bgcolor="#FFFFFF"><select name="txttipo_menu" class="textbox" id="txttipo_menu" tabindex="2">
                      <option value="SV">Seleccione una...</option>
                      <option value="ME" <?if($info[tipo_menu]=="ME"){echo "selected";}?>>Men&uacute; Principal</option>
                      <option value="MR" <?if($info[tipo_menu]=="MR"){echo "selected";}?>>Men&uacute; de Reportes</option>
                  </select></td>
                </tr>
                <tr align="left" valign="middle" bgcolor="#E8E8E8">
                  <td colspan="3" bgcolor="#FFFFFF" class="lbl_formulario"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                      <tr >
                        <td width="20%"   ><div align="left"></div></td>
                        <td width="30%" align="center" valign="middle"   ><div align="center">
                            <input name="Submit" type="submit" class="boton1" tabindex="3" value="Guardar Categor&iacute;a" />
                        </div></td>
                        <td width="33%" align="center" valign="middle"  ><div align="center">
                            <input name="Submit2" type="reset" tabindex="11" class="boton1" value="Deshacer los cambios" />
                        </div></td>
                        <td width="17%"  ><div align="center"><a href="index1.php?op=inicio"><img src="../images/regresar.png" width="32" height="32" border="0" /></a>
                              <input name="tipo_trn" type="hidden" id="tipo_trn" value="<?=$tipo;?>" />
                                <input name="idc" type="hidden" id="idc" value="<?=$idc;?>" />
                                <br />
                                <span class="texto">Salir</span> </div></td>
                      </tr>
                  </table></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><table width="750" border="0" align="center" cellpadding="1" cellspacing="1"  >
                <tr>
                  <td colspan="2"   ><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="6%" background="../images/bg_titulo_frm.gif"><img src="../images/ic_frm.gif" alt="" width="35" height="32" /></td>
                        <td width="94%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Opciones de Men&uacute; Existentes</td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td width="59%"    class="lbl"><div align="center"><strong>Descripci&oacute;n de la Opci&oacute;n </strong></div></td>
                  <td width="41%"    class="lbl"><div align="center"><strong>Acciones</strong></div></td>
                </tr>
                <?
                            $qcategorias=mysql_query("select * from me_categorias order by orden");
                            while($icat=mysql_fetch_array($qcategorias)){
                            $i++;
                            ?>
                <tr class="<?=set_row_class($i);?>">
                  <td class="texto"><img src="../images/cuad_1.png" width="9" height="9" />
                      <?=$i.".";?>
                      <?=$icat[tipo_menu];?>
                      <?=$icat[categoria]." ({$icat[orden]})";?></td>
                  <td ><div align="center"><a href="index1.php?op=frm_menu_categoria&idc=<?=enc($icat[id]);?>" class="link_texto">Modificar</a> | <span class="textbox">Eliminar</span> |                      <a href="index1.php?op=frm_menu_opciones&idc=<?=enc($icat[id]);?>" class="link_texto">Admin. Opciones</a> </div></td>
                </tr>
                <?}?>
            </table></td>
          </tr>
        </table>
      </div>
    </form>    </td>
  </tr>
</table>
