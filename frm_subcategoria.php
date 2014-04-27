<?
if(1==2){
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<?
}

$tipo_trn="Add";

if($pk){
  $qinfo=runsql("select * from subcategoria where id_subcategoria = '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
	//echo "<pre>";	print_r($info);		echo "</pre>";
    $tipo_trn="Update";
  }
}

$foco="nombre";

?>
<form id="form1" name="form1" method="post" action="mnt_subcategoria.php" autocomplete="off" onsubmit="return validar();">
  <table width="990" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Administraci&oacute;n de Sub-Categorias para el buscador</td>
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
      <td width="160" class="lbl"><div align="left">Categor&iacute;a:</div></td>
      <td width="700"><?=$info[id_categoria];?><select name="id_categoria" id="id_categoria" class="textbox" >
        <?php llenar_combo("subcategoria",$where="",$orden='snombre',$campo_valor='id_subcategoria',$campo_descrip='snombre',$seleccionar=$info[id_categoria],$codificar=false) ?>
        </select></td>
      <td width="130"><div align="center">
        <?if($tipo_trn=="Update"){?>
        <a href="index1.php?op=<?=$op;?>" class="link_texto">Agregar nueva</a>
        <?}?>
      </div></td>
    </tr>
    <tr>
      <td class="lbl">Nombre:</td>
      <td colspan="2"><input name="snombre" type="text" class="textbox" id="snombre" value="<?=$info[snombre];?>" size="50" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Descripci&oacute;n:</td>
      <td colspan="2"><input name="sdescripcion" type="text" class="textbox" id="sdescripcion" value="<?=$info[sdescripcion];?>" size="50" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl"><div align="left">Status:</div></td>
      <td colspan="2"><div align="left">
        <input name="status" type="checkbox" id="status" value="1" <? if($info[status]==1){echo "checked";}?>/>
      </div></td>
    </tr>
    <tr>
      <td><input name="tipo_trn" type="hidden" id="tipo_trn" value="<?=$tipo_trn;?>" />
      <input name="op" type="hidden" id="op" value="<?=$op;?>" />
      <input name="pk" type="hidden" id="pk" value="<?=$pk;?>" /></td>
      <td colspan="2"><input name="button" type="submit" class="boton1" id="button" value="Guardar" /></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
  </table>
</form>
<br />
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#D1DDE7">
  <tr>
    <td colspan="6"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_recordatorio.png" width="35" height="32" /></div></td>
        <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Listado de Sub-Categor&iacute;as agregadas</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="124" class="lbl"><div align="center">Id</div></td>
    <td width="410" class="lbl">Categor&iacute;a</td>
    <td width="410" class="lbl"><strong>Nombre</strong></td>
    <td width="267" class="lbl"><div align="center">Descripci&oacute;n</div></td>
    <td width="186" class="lbl"><div align="center">Status</div></td>
    <td width="255" class="lbl"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  $qlista=runsql("SELECT
categoria.id_categoria,
categoria.snombre,
categoria.sdescripcion,
categoria.status,
subcategoria.id_categoria,
subcategoria.id_subcategoria,
subcategoria.snombre AS snombresubcategoria
FROM
subcategoria
Inner Join categoria ON categoria.id_categoria = subcategoria.id_categoria");
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr class="<?=set_row_class($cnt_lista);?>">
    <td height="22" align="center" class="texto"><?=$ilista[id_categoria];?></td>
    <td class="texto"><?=$ilista[snombresubcategoria];?></td>
    <td class="texto"><?=$ilista[snombre];?></td>
    <td height="22" class="texto"><div align="center">
      <?=$ilista[sdescripcion];?>
    </div></td>
    <td height="22" class="texto"><div align="center"><img src="../images/ic_<? if($ilista[status]==0){echo "no";}?>ok.gif" width="16" height="16" /></div></td>
    <td><div align="center">
    <a href="index1.php?<?="op=$op&pk={$ilista[id_subcategoria]}";?>">
    	<img src="../images/ic_editar.gif" alt="Modificar" width="15" height="15" border="0" /></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:void(0);" onclick="cf_eliminar_subcategoria('<?=$ilista[id_subcategoria];?>');">
	    <img src="../images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0" /></a>
    </div></td>
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
