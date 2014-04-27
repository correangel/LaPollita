<?
if(1==2){
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<?
}

$tipo_trn="Add";
if($pk){
  $qinfo=runsql("select * from inventariolib where id_tran= '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="txtid_tipotran";
$today  = date("d")."-".date("m")."-".date("Y");
?>
<form id="form1" name="form1" method="post" action="mnt_inventariolib.php" autocomplete="off" onsubmit="return validar();">
  <input type="hidden" name="usd" id="usd" value="<?=$_SESSION["USD"];?>">
  <input type="hidden" name="eur" id="eur" value="<?=$_SESSION["EUR"];?>">
  <input type="hidden" name="txtexistencia" value="<?=$info[existencia];?>" />
   <table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="4">
      	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Administraci&oacute;n de Inventario de Librer&iacute;a</td>
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
      <td width="128" class="lbl"><div align="left">Tipo Transacci&oacute;n:</div></td>
      <td width="386">
      <div align="left">
        <select name="txtid_tipotran" class="textbox" id="txtid_tipotran">
          <option value="in"  <? if ($info[id_tipotran]=='in')  {echo ' selected ';} ?>>Ingreso</option>
          <option value="out" <? if ($info[id_tipotran]=='out') {echo ' selected ';} ?>>Salida</option>
        </select>
      </div>      </td>
      <td width="152"></td>
      <td width="324"><div align="center"><?if($tipo_trn=="Update"){?>
        <a href="index1.php?op=<?=$op;?>" class="link_texto">Agregar nuevo</a>
      <?}?></div></td>
    </tr>
    <tr>
      <td class="lbl">Art&iacute;culo:</td>
      <td>
      <select name="txtid_articulo" class="textbox" id="txtid_articulo">
        <?php llenar_combo("articulos",$where=" where tipoarticulo = 'Librería' ",$orden='nombre',$campo_valor='id_articulo',$campo_descrip='nombre',$seleccionar=$info[id_articulo],$codificar=false) ?>
      </select>      </td>
      <td><div align="right"><span class="lbl">Fecha:</span></div></td>
      <td><input name="txtfecha" type="text" class="textbox" id="txtfecha" value="<? if (isset ($info[fecha])){echo fecha($info[fecha]);}else{echo $today;}?>" size="20" maxlength="100"/> 
      <script language="JavaScript" type="text/javascript">new tcal ({'formname': 'form1','controlname': 'txtfecha'});</script> </td>
    </tr>
    <tr>
      <td class="lbl">Cantidad:</td>
      <td ><input name="txtcantidad" type="text" class="textbox" id="txtcantidad" value="<?=$info[cantidad];?>" size="15" maxlength="15" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="lbl">Observaciones:</td>
      <td colspan="2" >
      <textarea name="txtobservaciones" id="txtobservaciones" cols="75" rows="2"><?=$info[observaciones];?></textarea></td>
      <td rowspan="2">.</td>
    </tr>
    <tr>
      <td><input name="tipo_trn" type="hidden" id="tipo_trn" value="<?=$tipo_trn;?>" />
      <input name="op" type="hidden" id="op" value="<?=$op;?>" />
      <input name="pk" type="hidden" id="pk" value="<?=$pk;?>" /></td>
      <td ><input name="button" type="submit" class="boton1" id="button" value="Guardar" /></td>
      <td></td>
    </tr>            
  </table>
</form>
<table border="0" width="990" align="center" cellpadding="0" cellspacing="1" bgcolor="#D1DDE7">
  <tr>
    <td colspan="7"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_recordatorio.png" width="35" height="32" /></div></td>
        <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Movimientos en Inventario de Librer&iacute;a del  per&iacute;odo [x - x]</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="28" class="lbl"><div align="center"><strong>id.</strong></div></td>
    <td width="76" class="lbl"><div align="center"><strong>Tipo Tran</strong></div></td>
    <td width="375" class="lbl"><div align="center"><strong>Art&iacute;culo</strong></div></td>
    <td width="117" class="lbl"><div align="center">Fecha</div></td>
    <td width="97" class="lbl"><div align="center">Cantidad</div></td>
    <td width="102" class="lbl"><div align="center">Existencia</div></td>
    <td width="187" class="lbl"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  $qlista=runsql("select i.*, a.nombre as snombre from inventariolib i, articulos a where (i.id_articulo=a.id_articulo) order by i.id_tran desc;");
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr bgcolor="<?=color_fila($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[id_tran];?></td>
    <td class="texto"><? if($ilista[id_tipotran]=='in'){echo "Ingreso";} else {echo "Salida";}?></td>
    <td class="texto"><?=$ilista[snombre];?></td>
    <td class="texto"><?= fecha($ilista[fecha],"-");?></td>
    <td class="texto"><?=$ilista[cantidad];?></td>
    <td class="texto"><?=$ilista[existencia];?></td>
    <td><div align="center"><a href="index1.php?<?="op=$op&pk={$ilista[id_tran]}";?>"><img src="../images/ic_editar.gif" alt="Modificar" width="15" height="15" border="0" /></a> &nbsp;&nbsp;&nbsp;
    <a href="javascript:void(0);" onclick="cf_eliminar_traninvlib('<?=$ilista[id_tran];?>');"><img src="../images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0"/></a>
    &nbsp;<span id="toolTipBox" width="500"></span>
    <img src="../img/fullpage.gif" border="0" onmouseover="toolTip('<?=$ilista[observaciones];?>',this)">
    </td>
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
