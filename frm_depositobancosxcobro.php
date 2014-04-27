<?
if(1==2){
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<?
}

$tipo_trn="Add";
if($pk){
  $qinfo=runsql("select * from inventario where id_tran= '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="txtid_tipotran";
$today  = date("d")."-".date("m")."-".date("Y");
?>
<form id="form1" name="form1" method="post" action="mnt_inventario.php" autocomplete="off" onsubmit="return validar();">
  <input type="hidden" name="usd" id="usd" value="<?=$_SESSION["USD"];?>">
  <input type="hidden" name="eur" id="eur" value="<?=$_SESSION["EUR"];?>">
  <input type="hidden" name="txtexistencia" value="<?=$info[existencia];?>" />
   <table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="4">
      	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Administraci&oacute;n de Inventario M&eacute;dico</td>
          </tr>
      </table></td>
    </tr>
    <?
    if($msg){
    ?>
    <tr>
      <td height="22" colspan="4" bgcolor="#FFFFCC" class="lbl">&nbsp;&nbsp;<img src="../images/ic_info.gif" width="14" height="13" /> <span class="lblroja"><?=$msg;?>
      </span></td>
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
      </div>      <span class="lblroja">PENDIENTE !!!      </span> </td>
      <td width="152"></td>
      <td width="324"><div align="center"><?if($tipo_trn=="Update"){?>
        <a href="index1.php?op=<?=$op;?>" class="link_texto">Agregar nuevo</a>
      <?}?></div></td>
    </tr>
    <tr>
      <td class="lbl">Art&iacute;culo:</td>
      <td>
      <select name="txtid_articulo" class="textbox" id="txtid_articulo">
        <?php llenar_combo("articulos",$where=" where tipoarticulo = 'Médico' ",$orden='nombre',$campo_valor='id_articulo',$campo_descrip='nombre',$seleccionar=$info[id_articulo],$codificar=false) ?>
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
      <td colspan="2" ><textarea name="txtobservaciones" id="txtobservaciones" cols="75" rows="2"><?=$info[observaciones];?></textarea></td>
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
        <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Movimientos en Inventario M&eacute;dico  del  per&iacute;odo [x - x]</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="33" class="lbl"><div align="center"><strong>Id cobro</strong></div></td>
    <td width="75" class="lbl"><div align="center"><strong>Fecha</strong><br />
    Cobro</div></td>
    <td width="419" class="lbl"><div align="center">Detalle del Servicio (venta)</div></td>
    <td width="169" class="lbl"><div align="center">Documento</div></td>
    <td width="69" class="lbl"><div align="center">Cantidad</div></td>
    <td width="127" class="lbl"><div align="center">Saldo<br /> 
    (QUE)</div></td>
    <td width="90" class="lbl"><div align="center">Ingresar<br />
    DEPOSITO</div></td>
  </tr>
  <?
  $cnt_lista=0;
  $qlista=runsql("SELECT 
  cob.id_cobro,cob.id_venta,cob.id_tipodoc,cob.id_cuenta,cob.notarjeta,cob.nodoc,cob.fecha fcobro,cob.monto cmonto,
cob.saldo csaldo,cob.moneda cmoneda,cob.observacion,
ven.id_venta,ven.id_paciente,ven.fecha fventa,ven.monto mventa,ven.id_documento_emitido,ven.id_tipodoc,ven.saldo,
pac.id,pac.nombres pnombres,pac.apellidos papellidos,pac.email,pac.telmobil,pac.telcasa,
tipodocventa.id_tipodoc,tipodocventa.nombre ntdventa,
tipodoccobro.id_tipodoc,tipodoccobro.nombre ntdcobro
FROM cobros AS cob
Inner Join ventas AS ven ON ven.id_venta = cob.id_venta
Inner Join paciente AS pac ON pac.id = ven.id_paciente
Inner Join tipodoc AS tipodocventa ON tipodocventa.id_tipodoc = ven.id_tipodoc
Inner Join tipodoc AS tipodoccobro ON tipodoccobro.id_tipodoc = cob.id_tipodoc
WHERE cob.fecha BETWEEN  '2010-01-01' AND '2010-01-31'
ORDER BY ven.id_venta DESC, cob.fecha ASC;");
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr bgcolor="<?=color_fila($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[id_cobro];?></td>
    <td class="texto"><?=fecha($ilista[fcobro]);?></td>
    <td>
    <table width="95%" align="center" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC" bgcolor="#E3F4FF" class="textbox">
    <tr><td bgcolor="#F5F5F5" class="texto">Paciente:</td>
    <td bgcolor="#F5F5F5">
	<span id="toolTipBox" width="500"></span><a href="javascript:void(0):" 
    onmouseover="toolTip('Email:<?=$ilista[email]?>|Tel Celular:<?=$ilista[telmobil]?>|Tel Casa:<?=$ilista[telcasa]?>',this)">
    <?=$ilista[papellidos];?>, <?=$ilista[pnombres];?></a> 
	</td>
    <td bgcolor="#F5F5F5" class="texto">Monto:</td>
    <td bgcolor="#F5F5F5">Q.<?=$ilista[mventa];?></td>
    </tr>
    <tr><td bgcolor="#F5F5F5" class="texto">Fecha:</td>
    <td bgcolor="#F5F5F5"><?=fecha($ilista[fventa]);?></td><td bgcolor="#F5F5F5" class="texto">Doc:</td>
    <td bgcolor="#F5F5F5">[<?=$ilista[ntdventa];?>]-<?=$ilista[id_documento_emitido];?></td></tr>
    </table>
    </td>
    <td class="texto">
    <span id="toolTipBox" width="500"></span><a href="javascript:void(0):" 
    onmouseover="toolTip('Detalle tipo de Cobro: No. Cheque / No. Deposito / etc.',this)">
    <?= $ilista[ntdcobro];?></a> 
    </td>
    <td class="texto">(<?=$ilista[cmoneda];?>) <?=$ilista[cmonto];?></td>
    <td class="texto">Q. <?=$ilista[csaldo];?></td>
    <td bgcolor="<?=color_fila($cnt_lista);?>"><div align="center">
    <div align="center"><a href="index1.php?<?="op=$op&pk={$ilista[id_tran]}";?>"><img src="../images/ic_editar.gif" alt="Ingresar Depósito" width="15" height="15" border="0" /></a></div></td>
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
