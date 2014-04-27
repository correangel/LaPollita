<script language="javascript1.2">
<script language="javascript1.2">
function MostrarCuenta(){
	location.href="index1.php?op=frm_movcuenta&txtid_cuenta="+$F('txtid_condicion');
}

function do_report($val){
	//alert($val);
	document.getElementById('txtid_condicion').value = $val;
//cument.getElementById('id_servicio').value);
	document.getElementById('form1').submit();
}
</script>
<? if(1==2){ ?><link href="estilo.css" rel="stylesheet" type="text/css" /> <? } 
//echo "tipobusqueda = $tipobusqueda <br>";
$condicion				=	"";
$classsaldo				=	"";
$classNombrePaciente	=	"";
if (isset($txtid_condicion)){
	switch ($txtid_condicion){
		case 'cheques':
			$sql="SELECT cobros.id_cobro,cobros.id_venta,cobros.id_tipodoc,cobros.fecha AS fecha_cobro,cobros.monto as cobro_monto,cobros.saldo,cobros.moneda,cobros.id_tipodoc_emitido, cobros.id_documento_emitido, cobros.observacion,cobros.id_cuenta,cobros.notarjeta,cobros.noautorizacion, cobros.id_mov, cobros.status_deposito, cobros.nodoc,ventas.id_venta,ventas.id_paciente,ventas.fecha,ventas.monto, ventas.saldo, ventas.observaciones,tipodoc.id_tipodoc,tipodoc.nombre as tipodoc_nombre,cobros.status FROM cobros Inner Join ventas ON cobros.id_venta = ventas.id_venta Inner Join tipodoc 
ON cobros.id_tipodoc = tipodoc.id_tipodoc WHERE tipodoc.id_tipodoc =   19";
echo "cheques";
		break;
		case 'depositos':
			$sql="SELECT cobros.id_cobro,cobros.id_venta,cobros.id_tipodoc,cobros.fecha AS fecha_cobro,cobros.monto as cobro_monto,cobros.saldo,cobros.moneda,cobros.id_tipodoc_emitido, cobros.id_documento_emitido, cobros.observacion,cobros.id_cuenta,cobros.notarjeta,cobros.noautorizacion,  cobros.id_mov, cobros.status_deposito, cobros.nodoc,ventas.id_venta,ventas.id_paciente,ventas.fecha,ventas.monto, ventas.saldo, ventas.observaciones,tipodoc.id_tipodoc,tipodoc.nombre as tipodoc_nombre,cobros.status FROM cobros Inner Join ventas ON cobros.id_venta = ventas.id_venta Inner Join tipodoc 
ON cobros.id_tipodoc = tipodoc.id_tipodoc";
echo "depositos";
		break;
	
	}
$qlista=runsql($sql);
}

$foco="txtid_condicion";?>
<form id="form1" name="form1" method="post" action="index1.php?op=rep_cobros_depositos.php"   onchange="javascript:do_report(this.value);" autocomplete="off" >
  <table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Opciones del reporte de Cobros y Depositos</td>
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
      <td width="187" class="lbl"><div align="right">Seleccione Cuenta de Banco:</div></td>
      <td width="398"><select name="txtid_condicion" class="textbox" id="txtid_condicion" onchange="MostrarCuenta()">
      <option value="SV">Seleccione</option>
        <option value="cheques" <? if (isset ($txtid_condicion) && $txtid_condicion=="cheques") { echo " selected";} ?>>Cheques</option>
        <option value="depositos" <? if (isset ($txtid_condicion) && $txtid_condicion=="depositos") { echo " selected";} ?>>Depositos</option>
            </select></td>
      <td width="112"></td>
	  <td width="293" rowspan="3"><div align="center">      <a href="rep_toexcel.php?sql=<?=$sql;?>&nombre=Reporte_MovBancos" class="link_texto"  onclick="return  hs.htmlExpand(this, { objectType: 'iframe', width: 800, width: 400} )">
      <img src="../images/icono-excel.jpg" alt="" border="0" width="53" height="53" align="absmiddle" /><span class="derechos"><strong>Exportar</strong></span></a></div></td>      
    </tr>
    <tr>
      <td class="lbl">&nbsp;</td>
      <td><? //echo $sql;?></td>
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
<? if (isset($txtid_condicion)){ ?>
<table width="990" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#D1DDE7">
  <tr>
    <td colspan="8"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_recordatorio.png" width="35" height="32" /></div></td>
        <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Reporte de Transacciones de Banco </td>
      </tr>
    </table></td>
  </tr>
</table>  
<? //$qry="queryencabezado";
//$rs=runsql($qry);
//$row=registro($rs);
?>
  <table border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#D1DDE7" width="1212">

  <tr>
    <td width="154" class="lbl"><div align="center"><strong><span class="texto"><strong>Fecha Cobro</strong></span></strong></div></td>
    <td width="186" class="lbl" <?=$classNombrePaciente;?>><div align="center">Monto</div></td>
    <td width="315" class="lbl"> <div align="center">Forma de pago</div></td>
    <td width="117" class="lbl"><div align="center">Confirmar Cheque</div></td>
    <td width="253" class="lbl"> <div align="center">Deposito en Banco</div></td>

    <td width="130" class="lbl"><div align="center"> Editar Deposito</div></td>
    </tr>
  <?
  $cnt_lista=0;
  $totalingreso	=	0;
  $totalsalida	=	0;
  while($ilista=registro($qlista)){
  $cnt_lista++;
  if($ilista[id_mov]=='-1'){
  	$depositobanco='--';
  }else{
	$depositobanco=$ilista[id_mov];
  }
  ?>

  <tr bgcolor="<?=color_fila($cnt_lista);?>">
    <td class="texto"><div align="center">
      <?=fecha($ilista[fecha_cobro]);?>
    </div></td>
    <td height="22"  class="texto"> <div align="right">
      <? echo number_format($ilista[cobro_monto],2,'.',',');?>
    </div></td>
        <td height="22"  class="texto"><div align="right"><? echo $ilista[tipodoc_nombre];?> &nbsp;&nbsp;<span class="status<?=$ilista[status_deposito]?>">[ 
        <?=$ilista[status_deposito]?> 
        ]</span></div></td>
        <td class="texto"><div align="center"><img src="../images/ic_autorizado.gif" width="16" height="16" /> <img src="../images/ic_delete.gif" width="15" height="15" /></div></td>
    <td class="texto"><div align="right"><? echo $depositobanco;?> &nbsp;&nbsp;<span class="status<?=$ilista[status_deposito]?>">[ 
        <?=$ilista[status_deposito]?> 
        ]</span></div></td>

    <td height="22"  class="texto"> <div align="center"><img src="../images/ico_edit_deposito.png" width="30" height="25" /></div></td>
    </tr>
  <?
  }
  ?>
   </table>
<? 
} // if if (isset($txtid_cuenta)){

if($foco){
echo "<script language=\"javascript\">";
echo "$('{$foco}').focus();";
echo "</script>";
}
?>
</script>
    <!--  encabezado <tr class="fondo1">
    <td colspan="2" class="lbl"><div align="center"><strong><span class="texto"><strong>Banco:</strong></span></strong> <?//=$row[snombre];?> (Tel:<?//=$row[stelefono];?>)</div>      
      <div align="center"></div></td>
    <td colspan="2" class="lbl"> <div align="center">Cuenta No. 
      <?//=$row[snocuenta];?>
    </div> </td>
    <td width="341" class="lbl"><div align="center">Moneda: (<?//= $row[smoneda];?>)</div></td>
    </tr> -->
             <!--<td height="22"  COLSPAN=2 class="texto"> SUB-TOTAL:</td>
    <td class="texto"><div align="right"><?// echo number_format($totalingreso, 2, '.', ',');?></div></td>
    <td height="22"  class="lbl"><div align="right"><?// echo number_format($totalsalida, 2, '.', ',');?>    </div></td>
    <td height="22"  class="lbl"></td>
    </tr>

       <tr class="fondo1">
         <td height="22"  COLSPAN=2 class="titulo_estacion_alerta"><div align="right"><strong>TOTAL EN LA CUENTA: </strong></div></td>
         <td height="22" colspan="3" class="titulo_estacion_alerta"><div align="left"><strong> &nbsp; <?// echo number_format($totalencuenta, 2, '.', ',');?></strong></div></td>
       </tr>
   -->