<?
if(1==2){
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<?
}

$tipo_trn="Add";
if($pk){
  $qinfo=runsql("select * from articulos where id_articulo = '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="txtnombre";

?><form id="form1" name="form1" method="post" action="mnt_articulo.php" autocomplete="off" onsubmit="return validar();">
  <table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Administraci&oacute;n de <strong>Art&iacute;culos </strong>/ Servicios</td>
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
      <td width="160" class="lbl">Servicio:</td>
      <td width="830" colspan="2">
      <select name="txttipoarticulo" id="txttipoarticulo">
          <?php llenar_combo("tipoarticulo",$where='',$orden='tipoarticulo',$campo_valor='tipoarticulo',$campo_descrip='tipoarticulo',$seleccionar=$info[tipoarticulo],$codificar=false,$separador='',$campo_descrip2='') ?>
        </select>      </td>
    </tr>
    <tr>
      <td class="lbl">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
      <td><input name="tipo_trn" type="hidden" id="tipo_trn" value="<?=$tipo_trn;?>" />
      <input name="op" type="hidden" id="op" value="<?=$op;?>" />
      <input name="pk" type="hidden" id="pk" value="<?=$pk;?>" /></td>
      <td colspan="2"><input name="button" type="submit" class="boton1" id="button" value="Generar Reporte" /></td>
    </tr>            
  </table>
</form>
<br />
<table width="990" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#D1DDE7">
  <tr>
    <td colspan="5"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_recordatorio.png" width="35" height="32" /></div></td>
        <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Reporte de Ventas per&iacute;odo [x-x] Servicio <span class="texto">
          <?=$ilista[nombres];?>
        </span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="214" class="lbl"><div align="center"><strong>Nombre del Paciente</strong></div></td>
    <td width="98" class="lbl"><div align="center">Fecha</div></td>
    <td width="313" class="lbl">Monto/Doc</td>
    <td width="293" class="lbl"><div align="center">
    Observaciones</td>
    <td width="66" class="lbl"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  $qlista=runsql("Select * From ventas v;
Select v.id_venta,v.id_paciente,v.fecha,v.monto,v.id_documento_emitido,v.id_tipodoc,v.observaciones,p.id idpaciente, p.nombres,p.apellidos, td.nombre ntipodoc 
From ventas v, paciente p, tipodoc td
Where p.id = v.id_venta AND v.id_tipodoc = td.id_tipodoc
Order By
v.fecha Desc;");
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr bgcolor="<?=color_fila($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[apellidos];?>, <?=$ilista[nombres];?></td>
    <td class="texto"><?=fecha($ilista[tipoarticulo]);?></td>
    <td class="texto"><?=$ilista[ntipodoc];?>
      <?=$ilista[descripcion];?></td>
    <td height="22" class="texto"><div align="left">
      <?=$ilista[observaciones];?>
    </div></td>
    <td><div align="center"><a href="index1.php?<?="op=$op&pk={$ilista[id_articulo]}";?>"><img src="../images/ic_editar.gif" alt="Modificar" width="15" height="15" border="0" /></a> &nbsp;&nbsp;&nbsp;
    <a href="javascript:void(0);" onclick="cf_eliminar_articulo('<?=$ilista[id_articulo];?>');"><img src="../images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0"/></a></div></td>
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
