<script language="javascript1.2">
function do_report($val){
	//alert($val);
	document.getElementById('tipobusqueda').value = $val;
//cument.getElementById('id_servicio').value);
	document.getElementById('form1').submit();
}
</script>
<? if(1==2){ ?><link href="estilo.css" rel="stylesheet" type="text/css" /> <? } 
//echo "tipobusqueda = $tipobusqueda <br>";
$condicion				=	"";
$classsaldo				=	"";
$classNombrePaciente	=	"";
switch($tipobusqueda){
    case "consaldopendiente":
			$condicion 	= 	" WHERE ventas.saldo >  '0' ";
			$classsaldo	=	" bgcolor=#FFCC33 ";
        break;
    case "sinsaldopendiente":
        	$condicion 	= 	" WHERE ventas.saldo <=  '0' ";		
			$classsaldo	=	" bgcolor=#FFCC33 ";
        break;
    default:
	        $condicion 				= 	"";
			$classNombrePaciente	=	" bgcolor=#FFCC33 ";
        break;
}

$sql	=	"SELECT paciente.id AS Id,
paciente.nombres AS Nombres,
paciente.apellidos AS Apellidos,
paciente.direccion AS Direccion,
paciente.email AS Email,
paciente.fnac AS Fecha_Nacimiento,
paciente.telmobil AS Tel_Movil,
paciente.telcasa AS Tel_Casa,
paciente.nit AS Nit,
ventas.fecha AS Fecha_Venta,
ventas.monto AS Monto_Venta,
ventas.id_documento_emitido AS No_Documento_Emitido,
ventas.id_tipodoc AS Documento_Emitido,
ventas.saldo AS Saldo_Venta,
ventas.observaciones AS Observaciones,
tipodoc.nombre AS Documento_Emitido   
FROM paciente Inner Join ventas ON paciente.id = ventas.id_paciente
		      Inner Join tipodoc ON ventas.id_tipodoc = tipodoc.id_tipodoc 
 $condicion  ORDER BY Apellidos ASC";

$qlista=runsql($sql);
$foco="tipobusqueda";?>

<form id="form1" name="form1" method="post" action="index1.php?op=rep_gralventasxpaciente.php" autocomplete="off" >
  <table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Opciones del reporte de Pacientes</td>
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
      <td width="187" class="lbl"><div align="right">Tipo de busquedas:</div></td>
      <td width="398">
      <select name="tipobusqueda" id="tipobusqueda" onchange="javascript:do_report(this.value);">
      	  <option value="todos" >Pacientes (todos)</option> 
          <option value="consaldopendiente" <? if ($tipobusqueda=='consaldopendiente') echo ' selected ';?>>Pacientes con Saldo pendiente</option>
          <option value="sinsaldopendiente" <? if ($tipobusqueda=='sinsaldopendiente') echo ' selected ';?>>Pacientes sin Saldo pendiente</option>          
        </select> 
      <span class="lblazul"> <a href="index1.php?op=rep_gralventasxpaciente">Ver Todos</a></span> </td>
      <td width="112"></td>
	  <td width="293" rowspan="3"><div align="center">      <a href="rep_toexcel.php?sql=<?=$sql;?>&nombre=Reporte_VentasxPaciente" class="link_texto"  onclick="return  hs.htmlExpand(this, { objectType: 'iframe', width: 800, width: 400} )">
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
        <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Reporte de Pacientes Per&iacute;odo </td>
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
    <td width="191" class="lbl"><strong><span class="texto"><strong>
      <?=$cnt_lista;?>&nbsp;&nbsp;
    </strong></span>Nombre del Paciente:</strong></td>
    <td width="222" <?=$classNombrePaciente;?> class="lbl"><div align="left"><span class="texto">
    <?=$ilista[Apellidos];?>
    ,
    <?=$ilista[Nombres];?>
    </span></div></td>
    <td width="106" class="lbl"><div align="right">Email: </div></td>
    <td width="152" class="lbl"><div align="left"><span class="texto">
      <?=fecha($ilista[Email]);?>
    </span></div></td>
    <td width="133" class="lbl"><div align="right">Fecha Nacimiento:</div></td>
    <td width="132" class="lbl"><span class="texto">
      <?=fecha($ilista[Fecha_Nacimiento]);?>
    </span></td>
    <td width="32" class="lbl">&nbsp;</td>
  </tr>
  <tr bgcolor="<?=color_fila($cnt_lista);?>">
    <td class="texto"><div align="right"><span class="lbl"> Tels:</span></div></td>
    <td height="22" colspan="2" class="texto"><span class="lbl"><img src="../images/icon_home.png" alt="" name="icon_home" width="22" height="20" border="0" align="absmiddle">
      <?=$ilista[Tel_Casa];?> /   
 <img src="../images/icon_mobile2.png" width="20" height="24" align="absmiddle" />
 <?=$ilista[Tel_Movil];?>
    </span></td>
    <td class="texto">&nbsp;</td>
    <td height="22" colspan="3" class="lbl">    </td>
  </tr>
  <tr bgcolor="<?=color_fila($cnt_lista);?>">
    <td class="texto"><div align="right"><strong><span class="lbl">Documento / No.:</span></strong></div></td>
    <td height="22" class="texto"><span class="lbl">
      <?=$ilista[Documento_Emitido];?> / <?=$ilista[No_Documento_Emitido];?>
    </span></td>
    <td class="lbl"><div align="right">Monto (QUE):</div></td>
    <td class="texto"><div align="left">Q. <?=$ilista[Monto_Venta];?>
    </div></td>
    <td class="lbl"><div align="right">Saldo (QUE):</div></td>
    <td class="texto" <?=$classsaldo;?>><div align="left">Q. <?=$ilista[Saldo_Venta];?>
        
    </div></td>
    <td height="22" class="texto"><a href="rep_gralventasDet.php?pk=<?=$ilista[id_venta];?>" class="link_texto"  
            onclick="return  hs.htmlExpand(this, { objectType: 'iframe', width: 800, width: 400} )"><img src="../images/ic_verdetalles.png" alt="Ver Detalles" border="0" /></a></td>
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
</script>
