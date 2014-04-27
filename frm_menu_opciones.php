<?
include_once("fnc.php");
conectado();

$tipo="Add";

if($ido){
  $id_op=dec($ido);
  $q=mysql_query("select * from me_opciones where id = $id_op");
  if(mysql_num_rows($q)==0){
    alert("Parámetros incorrectos",$goback);
  }
  $info=mysql_fetch_array($q);
  $tipo="Upd";
}

$id_ca=dec($idc);
$qcat=mysql_query("select * from me_categorias where id = $id_ca");
$infoc=mysql_fetch_array($qcat);

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
    <td bgcolor="#FFFFFF"><form id="form3" name="form3" method="post" action="mnt_menu_opcion.php">
      <div align="center">
        <table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td background="../../images/tema/bg_contenido.png"><table width="750"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#333333">
                <tr>
                  <td bgcolor="#FFFFFF" class="parrafo"><table width="100%"  border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
                      <tr align="left" valign="middle" bgcolor="#6699CC">
                        <td height="15" colspan="3" class="titulo_formulario"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="6%" background="../images/bg_titulo_frm.gif"><img src="../images/ic_frm.gif" width="35" height="32" /></td>
                              <td width="94%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Informaci&oacute;n de la opci&oacute;n de la categor&iacute;a [
                                <?=$infoc[categoria];?>
                                ]</td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr align="left" valign="middle" >
                        <td   class="lbl">Descripci&oacute;n de la Opci&oacute;n:</td>
                        <td width="72%"  class="parrafo"><div align="left">
                          <input name="txtopcion" type="text" class="textbox" id="txtopcion" tabindex="1" size="60" maxlength="255" value="<?=$info[opcion];?>" />
                        </div></td>
                        <td width="16%"    class="parrafo"><div align="center"><a href="frm_menu_opciones.php?idc=<?=$idc;?>" class="link_texto"><strong>Agregar Nuevo</strong></a></div></td>
                      </tr>
                      <tr align="left" valign="middle" >
                        <td    class="lbl">Link:</td>
                        <td colspan="2"    class="parrafo"><input name="txtlink" type="text" class="textbox" id="txtlink" tabindex="1" size="75" maxlength="255" value="<?=$info[link];?>" /></td>
                      </tr>
                      <tr align="left" valign="middle" >
                        <td width="12%"    class="lbl">Orden:</td>
                        <td colspan="2"   class="parrafo" ><input name="txtorden" type="text" class="textbox" id="txtorden" tabindex="1" size="11" maxlength="11" value="<?=$info[orden];?>" /></td>
                      </tr>
                      <tr align="left" valign="middle" bgcolor="#E8E8E8">
                        <td   class="lbl">Destino:</td>
                        <td colspan="2"   class="parrafo"><select name="txttarget" class="textbox" id="txttarget">
                            <option value="_self">Misma P&aacute;gina</option>
                            <option value="_blank">P&aacute;gina Nueva</option>
                          </select>                        </td>
                      </tr>
                      <tr align="left" valign="middle" bgcolor="#E8E8E8">
                        <td colspan="3"   class="lbl_formulario"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                            <tr >
                              <td width="20%"><div align="left"></div></td>
                              <td width="30%" align="center" valign="middle"><div align="center">
                                  <input name="Submit" type="submit" class="boton1" tabindex="3" value="Guardar Opci&oacute;n" />
                              </div></td>
                              <td width="33%" align="center" valign="middle"><div align="center">
                                  <input name="Submit2" type="reset" tabindex="11" class="boton1" value="Deshacer los cambios" />
                              </div></td>
                              <td width="17%"><div align="center" class="texto"><a href="index1.php?op=frm_menu_categoria&amp;idc=<?=$idc;?>"><img src="../images/regresar.png" width="32" height="32" border="0" /></a>
                                      <input name="tipo_trn" type="hidden" id="tipo_trn" value="<?=$tipo;?>" />
                                      <input name="idc" type="hidden" id="idc" value="<?=$idc;?>" />
                                      <input name="ido" type="hidden" id="ido" value="<?=$ido;?>" />
                                      <br />
                                Regresar a Categor&iacute;as </div></td>
                            </tr>
                        </table></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                      <tr>
                        <td colspan="3"   ><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="6%" background="../images/bg_titulo_frm.gif"><img src="../images/ic_frm.gif" width="35" height="32" /></td>
                              <td width="94%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Opciones existentes para esta categor&iacute;a </td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td width="41%"    class="lbl"><div align="center"><strong>Descripci&oacute;n de la Opci&oacute;n </strong></div></td>
                        <td width="40%"    class="lbl"><div align="center" class="lbl_campo">Link</div></td>
                        <td width="19%"    class="lbl"><div align="center"><strong>Acciones</strong></div></td>
                      </tr>
                      <?
                            $qcategorias=mysql_query("select * from me_opciones where categoria = $id_ca order by orden");
							$cnt_lista=0;
                            while($icat=mysql_fetch_array($qcategorias)){
							$cnt_lista++;
                            $i++;
                            ?>
                      <tr class="<?=set_row_class($cnt_lista);?>" >
                        <td  class="texto"><img src="../../images/cuad_1.png" width="9" height="9" />
                            <?=$i.".";?>
                            <?=$icat[opcion];?></td>
                        <td  class="texto"><?=$icat[link];?></td>
                        <td> 
                        <div align="center"><a href="index1.php?op=frm_menu_opciones&ido=<?=enc($icat[id])."&idc=$idc";?>" class="link_texto">Modificar</a></div>
                        </td>
                      </tr>
                      <? } ?>
                  </table></td>
                </tr>
            </table></td>
          </tr>
        </table>
      </div>
    </form>    </td>
  </tr>
</table>
