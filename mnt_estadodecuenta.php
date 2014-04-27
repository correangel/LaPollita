<?php
include("../fnc.php");
include("fnc_js.php");
conectado();
?>
<script language="javascript">
function check_correlativo(val){
	var corr = $('txtid_documento');
	
	//switch ($F('txtid_tipodoc')) { ANTES SE SELECCIONABA TIPO DE DOC A EMITIR
	switch (val)) {					// AHORA EL DOC A EMTIR SIEMPRE SERA 13 (NOTA DE ENVIO)
	case '10':
		corr.value	=	$F('corrfactura');
	break;
	case '11':
		corr.value	=	$F('corrrecibo');
	break;
	case '13':
		corr.value	=	$F('correnvio');	
	break;
	default:
		corr.value	=	'';
	}
}
</script>

<?
if(1==1){
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />

<?
}

$tipo_trn="Add";
if($pk){
  $qinfo=runsql("select * from ventas where id_venta = '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
// cargar correlativos
$arrCorr= CargarCorrelativos();
//echo "<pre>".print_r($arrCorr)."</pre>";
?><form id="form1" name="form1" method="post" action="mnt_ventas.php" autocomplete="off" onsubmit="return validar();">
	<? //$info2=registro(runsql("select correlativoini from tipodoc where id_tipodoc=10;")); //correlativo Factura?>
    <input type="hidden" name="corrfactura" id="corrfactura" 	value="<?=$arrCorr[factura10];?>">
    <? //$info2=registro(runsql("select correlativoini from tipodoc where id_tipodoc=11;")); //correlativo Recibo?>    
    <input type="hidden" name="corrrecibo" 	id="corrrecibo" 	value="<?=$arrCorr[recibocaja11];?>">
    <? //$info2=registro(runsql("select correlativoini from tipodoc where id_tipodoc=13;")); //correlativo Nota de Envio?>
    <input type="hidden" name="correnvio" 	id="correnvio" 		value="<?=$arrCorr[notadeenvio13];?>">
  <table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="6">
      	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Estado de Cuenta</td>
          </tr>
      </table></td>
    </tr>
    <?
    if($msg){
    ?>
    <tr>
      <td height="22" colspan="6" bgcolor="#FFFFCC" class="lbl">&nbsp;&nbsp;<img src="../images/ic_info.gif" width="14" height="13" /> <span class="lblroja"><?=$msg;?></span></td>
    </tr>
    <?
    }
    ?>
    <tr>
      <td width="111" class="lbl"><div align="left">Paciente:</div></td>
      <td width="304">
      <div align="left" class="lbl">
          <?php echo get_nombre_paciente($info[id_paciente]);?>
      </div>      </td>
      <td width="151"></td>
      <td width="106"></td>
      <td colspan="2"><div align="center"></div>
      <div align="center"></div></td>
    </tr>
    <tr>
      <td class="lbl">Fecha:</td>
      <td class="lbl"><? if(isset($info[fecha])) {echo fecha($info[fecha]);}else{echo $today; }?>
      <script language="JavaScript" type="text/javascript">new tcal ({'formname': 'form1','controlname': 'txtfecha'});</script></td>
      <td class="lbl"> <span class="lbl">Monto (QUE):</span></td>
      <td class="lbl"><?=$info[monto];?></td>
      <td width="214"><div align="center"></div></td>
      <td width="104" class="lblroja">&nbsp; </td>
    </tr>
    <tr>
      <td class="lbl">Nota de envio #:</td>
      <td class="lbl"><!--<select name="txtid_tipodoc" id="txtid_tipodoc" onchange="check_correlativo()" class="textbox">< llenar_combo("tipodoc",$where=" where id_tipodoc = 13 'Nota de Envio'",$orden='nombre',$campo_valor='id_tipodoc',$campo_descrip='nombre',$seleccionar=$info[id_tipodoc],$codificar=false) ?></select> -->
   
      <? if (isset($info[id_documento_emitido])) { echo $info[id_documento_emitido]; } else { echo $arrCorr[notadeenvio13];}?></td>
      <td><!--nodoc No documento:--></td>
      <td><!--<input name="txtid_documento" type="text" class="textbox" id="txtid_documento" value="< $info[id_documento_emitido];?>" size="5" maxlength="5" /> --></td>
      <td><span class="lbl">Saldo pendiente (QUE):</span></td>
      <td><div align="left"><span class="lblroja">Q.<?=$info[saldo];?></span></div></td>
    </tr>
    
    <tr>
      <td><span class="lbl">Observaciones:</span></td>
      <td colspan="2" class="lbl"><?=$info[observaciones];?></td>
      <td colspan="2" rowspan="2"><? if($pk){?>
        <br />
        <?
    }
    ?></td>
    </tr>
       
  </table>
</form>
<hr>
<table border="0" width="900" align="center" cellpadding="0" cellspacing="1" bgcolor="#D1DDE7">
  <tr>
    <td colspan="5" class="textbox"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm_det.gif"><div align="left"></div></td>
        <td width="96%" background="../images/bg_titulo_frm_det.gif" class="titulo_frm">Detalle de Servicios / Terapias en la Venta</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="290" class="textbox"><div align="center"><strong>Servicio / Terapia</strong></div></td>
    <td width="65" class="textbox"><div align="center"><strong>Cantidad</strong></div></td>
    <td width="128" class="textbox"><div align="center"><strong>Precio</strong></div></td>
    <td width="396" class="textbox"><div align="center"><strong>Observaciones</strong></div></td>
    <td width="15" class="textbox">&nbsp;</td>
  </tr>
  <?
  $cnt_lista=0;
  //echo("select vd.*, a.nombre as anombre from ventas_det vd, articulos a where (vd.id_articulo=a.id_articulo) and vd.id_venta= '$pk' order by anombre;");
  $sql_cobro="select vd.*, s.nombre as snombre, v.fecha from ventas_det vd  join servicios s on (vd.id_articulo=s.id_servicio) join ventas v	   on (vd.id_venta = v.id_venta) where vd.id_venta= '$pk';";
  $qlista=runsql($sql_cobro);
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
<table border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#D1DDE7" width=900>
  <tr>
    <td colspan="6" class="textbox"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm_det.gif"><div align="left"></div></td>
        <td width="96%" background="../images/bg_titulo_frm_det.gif" class="titulo_frm">Detalle de Cobros a la Venta</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="136" class="textbox"><div align="center"><strong>Tipo</strong></div></td>
    <td width="96" class="textbox"><div align="center"><strong>Fecha</strong></div></td>
    <td width="111" class="textbox"><div align="center"><strong>Monto</strong></div></td>
    <td width="147" class="textbox"><div align="center"><strong>Saldo a la fecha (Q)</strong></div></td>
    <td width="257" class="textbox"><div align="center"><strong>Documento Emitido</strong></div></td>
    <td class="textbox"><div align="center"><strong>Obs.</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  $sql="SELECT c.* , td.nombre as ntipodoc FROM cobros c Inner Join tipodoc td ON c.id_tipodoc = td.id_tipodoc where c.id_venta= '$pk' order by c.id_cobro desc;";
  $qlista=runsql($sql);
  $primerregistro="true";
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr bgcolor="<?=color_fila($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[ntipodoc];?></td>
    <td class="texto"><?=fecha($ilista[fecha]);?></td>
    <td class="texto">
      <div align="right"><?=$ilista[monto];?> (
        <?=$ilista[moneda];?>
        )
        <span id="toolTipBox" width="500"></span>
        <? $tc=ShowTipoCambio($ilista[fecha],$ilista[moneda]); ?>
        <? if($tc!=0){echo  number_format($ilista[monto]*$tc, 2, '.', ',') .'(QUE)';}?>
    </div></td>
    <td class="texto"><div align="right">Q. 
        <?=$ilista[saldo];?>
    </div></td>
    <!-- Documentos emitidos para este cobro -->
    <?
	$sqldocemitidos = "SELECT cobros_docemitido.id_cobro, cobros_docemitido.id_documento_emitido, cobros_docemitido.id_tipodoc_emitido, c.id_cobro,
tipodoc.id_tipodoc, tipodoc.nombre FROM cobros AS c Inner Join cobros_docemitido ON c.id_cobro = cobros_docemitido.id_cobro Inner Join tipodoc ON cobros_docemitido.id_tipodoc_emitido = tipodoc.id_tipodoc WHERE c.id_cobro =  '$ilista[id_cobro]' order by c.id_cobro desc";
//echo $sqldocemitidos;
  $qlista2=runsql($sqldocemitidos);
	?>
    <td class="texto"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
    <? while($ilista2=registro($qlista2)){ ?>
      <tr>
        <td width="75%" class="texto"><?=$ilista2[nombre];?>.</td>
        <td width="13%" align="center" class="texto">[<?=$ilista2[id_documento_emitido];?>]</td>
        <td width="12%" align="center"><a href="frm_anulardocumentos.php?accion=anular&idcobro=<?=$ilista[id_cobro];?>&idventa=<?=$pk;?>" 
        onclick="return  hs.htmlExpand(this, { objectType: 'iframe'} )" ><img src='../images/ic_anulardocumento.png' align='absmiddle'  border='0' title="Anular Documento Emitido ! " ></a></td>
      </tr>
     <? } ?>
    </table></td>
    <td class="texto"><?=$ilista[observacion];?></td>
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
