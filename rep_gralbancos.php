<script language="javascript1.2">
<script language="javascript1.2">
function MostrarCuenta(){
	location.href="index1.php?op=frm_movcuenta&txtid_cuenta="+$F('txtid_cuenta');
}

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
if (!isset($txtid_cuenta)){
	$condicion = "";
}else{
	$condicion = " where id_cuenta = $txtid_cuenta ";
}
	$sql	=	"select * from movcuenta  $condicion order by id_cuenta,fecha";

$qlista=runsql($sql);
$foco="txtid_cuenta";?><form id="form1" name="form1" method="post" action="index1.php?op=rep_gralbancos.php"   onchange="javascript:do_report(this.value);" autocomplete="off" >
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
      <td width="187" class="lbl"><div align="right">Seleccione Cuenta de Banco:</div></td>
      <td width="398"><select name="txtid_cuenta" class="textbox" id="txtid_cuenta" onchange="MostrarCuenta()">
        <?php 
		  if (isset($txtid_cuenta)){$selcuenta = $txtid_cuenta;}else{$selcuenta = $info[id_cuenta];}  // elejir cual cuenta queda seleccionada en el combo.
		  llenar_combo("cuenta",$where=" ",$orden='snocuenta',$campo_valor='id_cuenta',$campo_descrip='snocuenta',$seleccionar=$txtid_cuenta,$codificar=false,$separador='  |  ',$campo_descrip2='smoneda') 
		  ?>
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
<? if (isset($txtid_cuenta)){ ?>
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
<? $qry="SELECT cuenta.id_cuenta, cuenta.id_banco, cuenta.stipo, cuenta.smoneda, cuenta.saldo, cuenta.snocuenta, banco.id_banco, banco.stelefono,banco.snombre FROM
cuenta Inner Join banco ON cuenta.id_banco = banco.id_banco  WHERE cuenta.id_cuenta =  $txtid_cuenta";
$rs=runsql($qry);
$row=registro($rs);
?>
  <table border="0" align="center" cellpadding="3" cellspacing="3" bgcolor="#D1DDE7" width="990">
    <tr class="fondo1">
    <td colspan="2" class="lbl"><div align="center"><strong><span class="texto"><strong>Banco:</strong></span></strong> <?=$row[snombre];?> (Tel:<?=$row[stelefono];?>)</div>      
      <div align="center"></div></td>
    <td colspan="2" class="lbl"> <div align="center">Cuenta No. 
      <?=$row[snocuenta];?>
    </div> </td>
    <td width="341" class="lbl"><div align="center">Moneda: (<?= $row[smoneda];?>)</div></td>
    </tr>
  <tr>
    <td width="160" class="lbl"><div align="center"><strong><span class="texto"><strong>&nbsp;&nbsp;Tipo Transaccion</strong></span></strong></div></td>
    <td width="146" class="lbl" <?=$classNombrePaciente;?>><div align="center">fecha</div></td>
    <td width="169" class="lbl"> <div align="center">monto ingreso</div></td>
    <td width="158" class="lbl"> <div align="center">monto salida </div></td>

    <td width="341" class="lbl"><div align="center">observaciones</div></td>
    </tr>
  <?
  $cnt_lista=0;
  $totalingreso	=	0;
  $totalsalida	=	0;
  while($ilista=registro($qlista)){
  $cnt_lista++;
  $montoingreso	=	'';
  $montosalida	=	'';
  ?>

  <tr bgcolor="<?=color_fila($cnt_lista);?>">
    <td class="texto"><div align="center"><span class="lbl"> 
      <? if($ilista[id_tipotran]=='in'){
		  echo "Ingreso";
		  $montoingreso=$ilista[monto];
		  $totalingreso	+=$montoingreso;
	  } else {
		  echo "Salida";
		  $montosalida=$ilista[monto];
 		  $totalsalida	+=$montosalida;
	  }?>
    </span></div></td>
    <td height="22"  class="texto"> <div align="right">
      <?= $ilista[fecha]?>
    </div></td>
        <td height="22"  class="texto"><div align="right"><? echo number_format($montoingreso, 2, '.', ',');?></div></td>
    <td class="texto"><div align="right"><? echo number_format($montosalida, 2, '.', ',');?></div></td>

    <td height="22"  class="texto"><?= $ilista[observaciones]?></td>
    </tr>
  <?
  }
  ?>
         <td height="22"  COLSPAN=2 class="texto"> SUB-TOTAL:</td>
    <td class="texto"><div align="right"><? echo number_format($totalingreso, 2, '.', ',');?></div></td>
    <td height="22"  class="lbl"><div align="right"><? echo number_format($totalsalida, 2, '.', ',');?>    </div></td>
    <td height="22"  class="lbl"></td>
    </tr>
    <? $totalencuenta= $totalingreso-$totalsalida;?>
       <tr class="fondo1">
         <td height="22"  COLSPAN=2 class="titulo_estacion_alerta"><div align="right"><strong>TOTAL EN LA CUENTA: </strong></div></td>
         <td height="22" colspan="3" class="titulo_estacion_alerta"><div align="left"><strong> &nbsp; <? echo number_format($totalencuenta, 2, '.', ',');?></strong></div></td>
       </tr>
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
