<?
$title='Productos y Servicios';
if(1==2){
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<?
}
//echo "<pre>".print_r($_POST)."</pre>";
$tipo_trn="Add";	
$query_prodserv="select * from prodserv order by nombre";
	
if($pk && $pk!=''){
  $qry="select * from prodserv where id_prodserv = '$pk'";
  $qinfo=runsql($qry);
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="id_categoria";
?>
<form id="form1" name="form1" method="post" action="mnt_prodserv.php" autocomplete="off" >
<input type="hidden" name="pk" id="pk" value="<?=$pk?>" />
  <table width="990" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td colspan="4">
      	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Administraci&oacute;n de [ <?=$title;?> ]</td>
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
      <td width="141" class="lbl"><div align="left">Empresa:</div></td>
      <td width="378" class="parrafo">
      <select name="id_empresa" id="id_empresa">
      <? llenar_combo('empresa',$where=' where status=1 ',$orden='nombre_comercial',$campo_valor='id_empresa',$campo_descrip='nombre_comercial',$seleccionar=$info[id_empresa],$codificar=false,$separador='',$campo_descrip2=''); ?>
      </select>
      </td>
      <td width="139" class="lbl"></td>
      <td width="319" class="parrafo"><div align="center"><?if($tipo_trn=="Update"){?>
        <a href="index1.php?op=<?=$op;?>" class="link_texto">Agregar nuevo</a>
      <?}?></div></td>
    </tr>
    <tr>
      <td width="141" class="lbl"><div align="left">Producto / Servicio:</div></td>
      <td width="378" class="parrafo"><div align="left"><input name="nombre" type="text" class="textbox_req" id="nombre" value="<?=$info[nombre];?>" size="50" maxlength="100" alt="Nombres"/></div></td>
      <td width="139" class="lbl"></td>
      <td width="319" class="parrafo"><div align="center"></div></td>
    </tr>
    <tr>
      <td class="lbl">Descripci&oacute;n:</td>
      <td class="parrafo">
      <input name="descripcion" type="text" class="textbox_req" id="descripcion" value="<?=$info[descripcion];?>" size="50" maxlength="100" alt="Nombre de Producto - Servicio" /></td>
      <td class="lbl">Imagen:</td>
      <td class="parrafo">
      <input name="imagen" type="text" class="textbox_req" id="imagen" value="<?=$info[imagen];?>" size="50" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Tags:</td>
      <td colspan="3" class="parrafo" ><textarea name="tags" cols="140" rows="5" class="textbox" id="tags"><?=$info[tags];?></textarea></td>
    </tr>
    <tr>
      <td class="lbl">Activo:</td>
      <td class="parrafo" ><input name="status" type="checkbox" id="status" value="1" <? if($info[status]==1){echo "checked";}?>/></td>
      <td class="lbl"></td>
      <td class="parrafo"></td>
    </tr>
    <tr>
      <td class="lbl"><input name="tipo_trn" type="hidden" id="tipo_trn" value="<?=$tipo_trn;?>" />
      <input name="op" type="hidden" id="op" value="<?=$op;?>" /></td>
      <td class="parrafo" ><input name="button"  type="submit" class="boton1" id="button" value="Guardar">
        <strong>
        <input name="buscar" type="button" class="boton1" id="buscar" value="Buscar" onclick="buscar_cliente()"/>
      </strong></td>
      <td class="lbl"></td>
      <td class="parrafo"><span class="msg_error"><img src="img/ico_required.png" alt="" width="29" height="30" align="absmiddle" /></span><span class="lblroja">campos obligatorios</span></td>
    </tr>            
  </table>
</form>
<br />
<table width="990" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#D1DDE7">
  <tr>
    <td colspan="5"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_recordatorio.png" width="35" height="32" /></div></td>
        <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Listado de [ <?=$title;?> ]</td> 
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="240" class="lbl"><div align="center"><strong>Nombre del Producto/Servicio</strong></div></td>
    <td width="213" class="lbl"> <div align="center">Descripci&oacute;on</div></td>
    <td width="267" class="lbl"><div align="center">Tags</div></td>
    <td width="39" class="lbl"><div align="center">Activo</div></td>
    <td width="225" class="lbl"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  $qlista=runsql($query_prodserv);
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr class="<?=set_row_class($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[nombre];?></td>
    <td class="texto"><?=$ilista[descripcion];?></td>
    <td class="texto"><?=$ilista[tags];?></td>
    <td height="22" class="texto"><div align="center"><img src="../images/ic_<? if($ilista[status]==0){ echo "no"; } ?>ok.gif" width="16" height="16" /></div></td>
    <td><div align="center">&nbsp;&nbsp;&nbsp;
    <a href="index1.php?<?="op=$op&pk={$ilista[id_prodserv]}";?>">
    	<img src="../images/ic_editar.gif" title="Modificar" alt="Modificar" width="15" height="15" border="0" />
    </a> &nbsp;&nbsp;&nbsp;
    <a href="javascript:void(0);" onclick="cf_eliminar_proserv('<?=$ilista[id_prodserv];?>');">
    	<img src="../images/ic_delete.gif" alt="Eliminar" title="Eliminar" width="15" height="15" border="0"/>
    </a></div></td>
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
