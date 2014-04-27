<script language="javascript1.2">
function do_report($val){
	//alert($val);
	document.getElementById('id_servicio').value = $val;
//cument.getElementById('id_servicio').value);
	document.getElementById('form1').submit();
}
</script>
<?
if(1==2){
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<?
}
$cnt_lista	=	0;
  $condicion	=	'';
  if (${id_servicio} != '') { $condicion = " where ventas_det.id_articulo = $id_servicio";}
  $sql	=	"SELECT servicios.nombre AS nombre_terapia,
paciente.apellidos AS Apellidos,
paciente.nombres AS Nombres,
ventas.fecha AS fecha_compra,
ventas.monto AS monto_compra,
ventas.saldo AS saldo_compra,
tipodoc.nombre AS documento_emitido,
ventas.id_documento_emitido AS no_documento_emitido,
ventas.observaciones AS observaciones FROM ventas_det join ventas on (ventas.id_venta = ventas_det.id_venta) join paciente on (ventas.id_paciente = paciente.id ) join servicios on (ventas_det.id_articulo = servicios.id_servicio ) join tipodoc on (ventas.id_tipodoc = tipodoc.id_tipodoc )
$condicion ORDER BY nombre_terapia ASC, fecha_compra DESC";
//echo $sql;
$qlista=runsql($sql);
$foco="comboservicio";

?><form id="form1" name="form1" method="post" action="index1.php?op=rep_gralventas" autocomplete="off" >
  <table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Opciones del Reporte General de Ventas</td>
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
      <td width="89" class="lbl">Servicio:</td>
      <td width="406">
      <select name="comboservicio" id="comboservicio" onchange="javascript:do_report(this.value);">
          <?php llenar_combo("servicios",$where='',$orden='nombre',$campo_valor='id_servicio',$campo_descrip='nombre',$seleccionar=${id_servicio},$codificar=false) ?>
        </select> 
      <span class="lblazul"> <a href="index1.php?op=rep_gralventas">Ver Todos</a></span> </td>
      <td width="202"></td>
      <td width="293" rowspan="3"><div align="center">      <a href="rep_toexcel.php?sql=<?=$sql;?>&nombre=Reporte_General_Ventas" class="link_texto"  onclick="return  hs.htmlExpand(this, { objectType: 'iframe', width: 800, width: 400} )">
      <img src="../images/icono-excel.jpg" alt="" border="0" width="53" height="53" align="absmiddle" /><span class="derechos"><strong>Exportar</strong></span></a></div></td>
    </tr>
    <tr>
      <td class="lbl">&nbsp;</td>
      <td>&nbsp;</td>
      <td></td>
    </tr>
      <td><input name="tipo_trn" type="hidden" id="tipo_trn" value="<?=$tipo_trn;?>" />
      <input name="op" type="hidden" id="op" value="<?=$op;?>" />
      <input name="pk" type="hidden" id="pk" value="<?=$pk;?>" />
      <input name="id_servicio" type="hidden" id="id_servicio" value='' /></td>
      <td><input name="button" type="submit" class="boton1" id="button" value="Generar Reporte" /></td>
      <td></td>
      </tr>            
  </table>
</form>
<br />
<table width="990" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#D1DDE7">
  <tr>
    <td colspan="8"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_recordatorio.png" width="35" height="32" /></div></td>
        <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Reporte General de Ventas Servicio <span class="texto">
          <?=$ilista[nombres];?>
        </span></td>
      </tr>
    </table></td>
  </tr>
</table>  
  <?
  $cnt_lista=0;
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <table width="990" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#D1DDE7">
  <tr>
    <td width="191" class="lbl"><?=$cnt_lista;?>&nbsp;&nbsp;Terapia</td>
    <td width="222" bgcolor="#FFCC33" class="lbl"><div align="left"><span class="texto">
      <?=$ilista[nombre_terapia];?>
    </span></div></td>
    <td width="106" class="lbl"><div align="center">Fecha</div></td>
    <td width="152" class="lbl"><div align="center"><span class="texto">
      <?=fecha($ilista[fecha_compra]);?>
    </span></div></td>
    <td width="133" class="lbl">Doc. Emitido</td>
    <td width="132" class="lbl"><span class="texto">
      <?=$ilista[documento_emitido];?>
    (<?=$ilista[no_documento_emitido];?>)</span></td>
    <td width="32" class="lbl">&nbsp;</td>
  </tr>
  <tr bgcolor="<?=color_fila($cnt_lista);?>">
    <td class="texto"><strong>Nombre del Paciente</strong></td>
    <td height="22" class="texto"><?=$ilista[Apellidos];?>, <?=$ilista[Nombres];?></td>
    <td class="lbl">Monto (QUE)</td>
    <td class="texto"><div align="left">Q.      
        <?=$ilista[monto_compra];?>
    </div></td>
    <td class="lbl">Saldo (QUE)</td>
    <td class="texto"><div align="left">Q.
        <?=$ilista[saldo_compra];?>
    </div></td>
    <td height="22" class="texto"><a href="rep_gralventasDet.php?pk=<?=$ilista[id_venta];?>" class="link_texto"  
            onclick="return  hs.htmlExpand(this, { objectType: 'iframe', width: 800, width: 400} )"><img src="../images/ic_verdetalles.png" alt="Ver Detalles" border="0" /></a></td>
  </tr>
  <tr bgcolor="<?=color_fila($cnt_lista);?>">
    <td class="texto"><span class="lbl"> Observaciones</span></td>
    <td height="22" colspan="2" class="texto"><?=$ilista[observaciones];?></td>
    <td class="texto">&nbsp;</td>
    <td height="22" colspan="3" class="lbl">    </td>
  </tr>
</table>  
  <hr>
  <?
  }
  ?>

<?
if($foco){
echo "<script language=\"javascript\">";
echo "$('{$foco}').focus();";
echo "</script>";
}
?>
