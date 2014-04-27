<?
if(1==2){
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<?
}

$tipo_trn="Add";

if($pk){
  $qry="SELECT rel_empresaxsubcategoria.id_rel_empresaxsubcategoria,
rel_empresaxsubcategoria.id_empresa,
rel_empresaxsubcategoria.status,
rel_empresaxsubcategoria.id_subcategoria,
subcategoria.id_categoria,
subcategoria.id_subcategoria
FROM rel_empresaxsubcategoria
Inner Join subcategoria ON rel_empresaxsubcategoria.id_subcategoria = subcategoria.id_subcategoria
where id_rel_empresaxsubcategoria = '$pk'";
  $qinfo=runsql($qry);
  if(registros($qinfo)>0){
    $info=registro($qinfo);
	//echo "<pre>";	print_r($info);		echo "</pre>";
    $tipo_trn="Update";
  }
}else{
	$info[id_empresa]	=	$id_empresa;
	$info[id_categoria]	=	$id_categoria;
 }

$foco="nombre";
//echo "<pre>";print_r($_POST);echo "</pre>";
?>
<script language="javascript">
function refresh_subcat(){
	$('form1').writeAttribute('action', 'index1.php?op=frm_rel_empresaxsubcategoria.php');
	//alert($('form1').action.value);
	$('form1').submit();
}
</script>
<form id="form1" name="form1" method="post" action="mnt_rel_empresaxsubcategoria.php" >
  <table width="990" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Administraci&oacute;n de Relaci&oacute;n Empresa x SubCategor&iacute;a</td>
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
      <td width="160" class="lbl"><div align="left">Empresa:</div></td>
      <td width="700"><select name="id_empresa" id="id_empresa" class="textbox" >
        <?php llenar_combo("empresa",$where="",$orden='nombre_comercial',$campo_valor='id_empresa',$campo_descrip='nombre_comercial',$seleccionar=$info[id_empresa],$codificar=false) ?>
      </select></td>
      <td width="130"><div align="center">
        <?if($tipo_trn=="Update"){?>
        <a href="index1.php?op=<?=$op;?>" class="link_texto">Agregar nueva</a>
        <?}?>
      </div></td>
    </tr>
    <tr>
      <td class="lbl">Categor&iacute;a:</td>
      <td colspan="2"><select name="id_categoria" id="id_categoria" class="textbox" onchange="refresh_subcat()">
        <?php llenar_combo("categoria",$where="",$orden='snombre',$campo_valor='id_categoria',$campo_descrip='snombre',$seleccionar=$info[id_categoria],$codificar=false) ?>
      </select></td>
    </tr>
    <tr>
      <td class="lbl">SubCategor&iacute;a:</td>
      <td colspan="2"><select name="id_subcategoria" id="id_subcategoria" class="textbox" >
        <?php 
		if ( isset ($info[id_categoria]) && $info[id_categoria] != ""){
			llenar_combo("subcategoria",$where=" where id_categoria= $info[id_categoria] ",$orden='snombre',$campo_valor='id_subcategoria',$campo_descrip='snombre',$seleccionar=$info[id_subcategoria],$codificar=false); 
		}else{?>
			<option value="xx">Seleccione Categoría</option>
		<? }
		?>
      </select></td>
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
        <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Listado de Relaci&oacute;nes Empresa x SubCategor&iacute;a</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="124" class="lbl"><div align="center">Id</div></td>
    <td width="410" class="lbl">Empresa</td>
    <td width="410" class="lbl"><strong>Categor&iacute;a</strong></td>
    <td width="267" class="lbl"><div align="center">SubCategor&iacute;a</div></td>
    <td width="186" class="lbl"><div align="center">Status</div></td>
    <td width="255" class="lbl"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  $qlista=runsql("SELECT
empresa.id_empresa,
empresa.nombre_comercial,
rel_empresaxsubcategoria.status,
rel_empresaxsubcategoria.id_empresa,
rel_empresaxsubcategoria.id_subcategoria,
subcategoria.snombre AS snombresubcat,
categoria.snombre AS snombrecat,
rel_empresaxsubcategoria.id_rel_empresaxsubcategoria
FROM empresa
Inner Join rel_empresaxsubcategoria ON empresa.id_empresa = rel_empresaxsubcategoria.id_empresa
Inner Join subcategoria ON rel_empresaxsubcategoria.id_subcategoria = subcategoria.id_subcategoria
Inner Join categoria ON subcategoria.id_categoria = categoria.id_categoria");
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr class="<?=set_row_class($cnt_lista);?>">
    <td height="22" align="center" class="texto"><?=$ilista[id_rel_empresaxsubcategoria];?></td>
    <td class="texto"><?=$ilista[nombre_comercial];?></td>
    <td class="texto"><?=$ilista[snombrecat];?></td>
    <td height="22" class="texto"><?=$ilista[snombresubcat];?></td>
    <td height="22" class="texto"><div align="center"><img src="../images/ic_<? if($ilista[status]==0){echo "no";}?>ok.gif" width="16" height="16" /></div></td>
    <td><div align="center">
    <a href="index1.php?<?="op=$op&pk={$ilista[id_rel_empresaxsubcategoria]}";?>">
    	<img src="../images/ic_editar.gif" alt="Modificar" width="15" height="15" border="0" /></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:void(0);" onclick="cf_eliminar_rel_empresaxsubcategoria('<?=$ilista[id_rel_empresaxsubcategoria];?>');">
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
