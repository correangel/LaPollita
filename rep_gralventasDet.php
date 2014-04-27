<? include("../fnc.php");?>
<script language="javascript1.2">
function do_report($val){
	//alert($val);
	document.getElementById('id_servicio').value = $val;
//cument.getElementById('id_servicio').value);
	document.getElementById('form1').submit();
}
</script>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<script src="../jsincludes/prototype.js" type="text/javascript"></script>
<script src="../jsincludes/tooltip.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script language="JavaScript" src="../jsincludes/calendar/calendar_eu.js"></script>
<link rel="stylesheet" href="../jsincludes/calendar/calendar.css">
<?
if(1==2){
}
?>
<br />
<?
$nombre=runsql("select p.nombres, p.apellidos
	from ventas v	   join paciente p on (v.id_paciente=p.id)
	where v.id_venta= '$pk';");
$rnombre=registro($nombre);
  ?>
<table width="800" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#D1DDE7">
  <tr>
    <td ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_recordatorio.png" width="35" height="32" /></div></td>
        <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Estado de Cuenta &gt; Paciente: 
          <?=$rnombre[apellidos];?>,<?=$rnombre[nombres];?></td>
      </tr>
    </table></td>
  </tr>
  </table>
<hr>
<table border="0" width="880" align="center" cellpadding="0" cellspacing="1" bgcolor="#D1DDE7">
  <tr>
    <td colspan="5" class="textbox"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm_det.gif"><div align="left"></div></td>
        <td width="96%" background="../images/bg_titulo_frm_det.gif" class="titulo_frm">Detalle de Servicios / Terapaias en la Venta</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="274" class="textbox"><div align="center"><strong>Servicio / Terapia</strong></div></td>
    <td width="62" class="textbox"><div align="center"><strong>Cantidad</strong></div></td>
    <td width="121" class="textbox"><div align="center"><strong>Precio</strong></div></td>
    <td width="364" class="textbox"><div align="center"><strong>Observaciones</strong></div></td>
    <td width="23" class="textbox">&nbsp;</td>
  </tr>
  <?
  $cnt_lista=0;
  //echo("select vd.*, a.nombre as anombre from ventas_det vd, articulos a where (vd.id_articulo=a.id_articulo) and vd.id_venta= '$pk' order by anombre;");
  $qlista=runsql("select vd.*, s.nombre as snombre, v.fecha, p.nombres, p.apellidos
from ventas_det vd  join servicios s on (vd.id_articulo=s.id_servicio) 
			     join ventas v	   on (vd.id_venta = v.id_venta)
			     join paciente p on (v.id_paciente=p.id)
where vd.id_venta='$pk';");
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr bgcolor="<?=color_fila($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[snombre];?></td>
    <td class="texto"><?=$ilista[cantidad];?></td>
    <td class="texto"><?=$ilista[precio];?>
    (<?=$ilista[moneda];?>)
    <span id="toolTipBox" width="500"></span><? ShowTipoCambio($ilista[fecha],$ilista[moneda]); ?></td>
    <td class="texto"><?=$ilista[observacion];?></td>
    <td>&nbsp;</td>
  </tr>
  <?
  }
  ?>
</table>
<hr>
<table border="0" width="880" align="center" cellpadding="0" cellspacing="1" bgcolor="#D1DDE7">
  <tr>
    <td colspan="6" class="textbox"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm_det.gif"><div align="left"></div></td>
        <td width="96%" background="../images/bg_titulo_frm_det.gif" class="titulo_frm">Detalle de Cobros a la Venta</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="134" class="textbox"><div align="center"><strong>Tipo</strong></div></td>
    <td width="111" class="textbox"><div align="center"><strong>Fecha</strong></div></td>
    <td width="151" class="textbox"><div align="center"><strong>Monto</strong></div></td>
    <td width="116" class="textbox"><div align="center"><strong>Saldo a la fecha (Q)</strong></div></td>
    <td width="310" class="textbox"><div align="center"><strong>Observaciones</strong></div></td>
    <td width="21" class="textbox">&nbsp;</td>
  </tr>
  <?
  $cnt_lista=0;
  $qlista=runsql("SELECT c.* , td.nombre as ntipodoc FROM cobros c Inner Join tipodoc td ON c.id_tipodoc = td.id_tipodoc where c.id_venta= '$pk' order by c.id_cobro desc;");
  $primerregistro="true";
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr bgcolor="<?=color_fila($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[ntipodoc];?></td>
    <td class="texto"><?=fecha($ilista[fecha]);?></td>
    <td class="texto"><?=$ilista[monto];?>(<?=$ilista[moneda];?>)
    <span id="toolTipBox" width="500"></span><? ShowTipoCambio($ilista[fecha],$ilista[moneda]); ?></td>
    <td class="texto">Q. <?=$ilista[saldo];?></td>
    <td class="texto"><?=$ilista[observacion];?></td>
    <td>&nbsp;</td>
  </tr>
  <?
  }
  ?>
</table>
<br />
<?
if($foco){
echo "<script language=\"javascript\">";
echo "$('{$foco}').focus();";
echo "</script>";
}
?>
