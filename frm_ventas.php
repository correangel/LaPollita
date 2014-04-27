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
if(1==2){
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
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Administraci&oacute;n de Ingresos (Ventas)</td>
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
      <div align="left">
        <select name="txtid_paciente" id="txtid_paciente">
          <?php llenar_combo("paciente",$where='',$orden='apellidos',$campo_valor='id',$campo_descrip='apellidos',$seleccionar=$info[id_paciente],$codificar=false,$separador=', ',$campo_descrip2='nombres') ?>
        </select>
      </div>      </td>
      <td width="151"></td>
      <td width="106"></td>
      <td colspan="2"><div align="center">
        <?if($tipo_trn=="Update"){?>
        <a href="index1.php?op=<?=$op;?>" class="link_texto">Agregar nuevo Ingreso</a>        
        <?}?>        
      </div>
      <div align="center"></div></td>
    </tr>
    <tr>
      <td class="lbl">Fecha:</td>
      <td><input name="txtfecha" type="text" class="textbox" id="txtfecha" value="<? if(isset($info[fecha])) {echo fecha($info[fecha]);}else{echo $today; }?>" size="15" maxlength="100" />
      <script language="JavaScript" type="text/javascript">new tcal ({'formname': 'form1','controlname': 'txtfecha'});</script></td>
      <td><span class="lbl">Monto (QUE):</span></td>
      <td><input name="txtmonto" type="text" class="textbox" id="txtmonto" value="<?=$info[monto];?>" size="20" maxlength="100" /></td>
      <td width="214"><div align="center"></div></td>
      <td width="104" class="lblroja">&nbsp; </td>
    </tr>
    <tr>
      <td class="lbl">Nota de envio #:</td>
      <td ><!--<select name="txtid_tipodoc" id="txtid_tipodoc" onchange="check_correlativo()" class="textbox">< llenar_combo("tipodoc",$where=" where id_tipodoc = 13 'Nota de Envio'",$orden='nombre',$campo_valor='id_tipodoc',$campo_descrip='nombre',$seleccionar=$info[id_tipodoc],$codificar=false) ?></select> -->
      <input type="hidden" name="txtid_tipodoc" id="txtid_tipodoc" value="13" />
      <input name="txtid_documento" type="text" class="textbox" id="txtid_documento" value="<? if (isset($info[id_documento_emitido])) { echo $info[id_documento_emitido]; } else { echo $arrCorr[notadeenvio13];}?>" size="5" maxlength="5" /></td>
      <td><!--nodoc No documento:--></td>
      <td><!--<input name="txtid_documento" type="text" class="textbox" id="txtid_documento" value="< $info[id_documento_emitido];?>" size="5" maxlength="5" /> --></td>
      <td><span class="lbl">Saldo pendiente (QUE):</span></td>
      <td><div align="left"><span class="lblroja">Q.<?=$info[saldo];?></span></div></td>
    </tr>
    
    <tr>
      <td><span class="lbl">Observaciones:</span></td>
      <td colspan="2" ><textarea name="txtobservaciones" id="txtobservaciones" cols="60" rows="2"><?=$info[observaciones];?></textarea></td>
      <td colspan="2" rowspan="2"><? if($pk){?>
        <table width="98%" border="0" align="left" cellpadding="0" cellspacing="0">
          <tr>
            <td width="19%" background="../images/bg_titulo_frm_det.gif">&nbsp;</td>
            <td width="81%" background="../images/bg_titulo_frm_det.gif" class="titulo_frm"><div align="left">Acciones sobre la Venta:</div></td>
          </tr>
          <tr>
            <td colspan="2" bgcolor="#ECE9D8"><table width="100%" border="0" cellspacing="2" cellpadding="2">
                <tr>
                  <td width="6%"><img src="../images/ic_agregar.gif" width="15" height="15" /></td>
                  <td width="94%"><a href="frm_ventasdet.php?pk=<?=$pk;?>" class="link_texto"  
            onclick="return  hs.htmlExpand(this, { objectType: 'iframe'} )">Agregar servicios  al detalle</a></td>
                </tr>
                <tr>
                  <td><img src="../images/ic_agregar.gif" alt="" width="15" height="15" /></td>
                  <td><a href="frm_cobros.php?pk=<?=$pk;?>" class="link_texto"  
            onclick="return  hs.htmlExpand(this, { objectType: 'iframe'} )">Aplicar Cobros a la Venta</a></td>
                </tr>
            </table></td>
          </tr>
        </table>
        <br />
        <?
    }
    ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td >&nbsp;</td>
      <td></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input name="tipo_trn" type="hidden" id="tipo_trn" value="<?=$tipo_trn;?>" />
        <input name="op" type="hidden" id="op" value="<?=$op;?>" />
        <input name="pk" type="hidden" id="pk" value="<?=$pk;?>" /></td>
      <td ><input name="button" type="submit" class="boton1" id="button" value="Guardar" /></td>
      <td></td>
      <td></td>
      <td></td>
      <td>&nbsp;</td>
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
    <td width="274" class="textbox"><div align="center"><strong>Servicio / Terapia</strong></div></td>
    <td width="62" class="textbox"><div align="center"><strong>Cantidad</strong></div></td>
    <td width="121" class="textbox"><div align="center"><strong>Precio</strong></div></td>
    <td width="321" class="textbox"><div align="center"><strong>Observaciones</strong></div></td>
    <td width="66" class="textbox"><div align="center"><strong>Acciones</strong></div></td>
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
    <td><div align="center">
     <a href="frm_ventasdet.php?pk=<?=$ilista[id_venta];?>&pk2=<?=$ilista[id_articulo];?>" 
        onclick="return  hs.htmlExpand(this, { objectType: 'iframe'} )" ><img src="../images/ic_editar.gif" width="15" height="15" border="0" /></a> 
        &nbsp;&nbsp;&nbsp;
    <a href="javascript:void(0);" onclick="cf_eliminar_ventadet('<?=$ilista[id_venta];?>','<?=$ilista[id_articulo];?>');"><img src="../images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0"/></a></div></td>
  </tr>
  <?
  }
  ?>
</table>
<hr>
<table border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#D1DDE7" width=900>
  <tr>
    <td colspan="7" class="textbox"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
    <td width="48" class="textbox"><div align="center"><strong>Obs.</strong></div></td>
    <td width="97" class="textbox"><div align="center"><strong>Acciones</strong></div></td>
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
      <div align="right"><?=$ilista[monto];?>(
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
        <td width="75%"><?=$ilista2[nombre];?></td>
        <td width="13%" align="center">[<?=$ilista2[id_documento_emitido];?>]</td>
        <td width="12%" align="center"><a href="frm_anulardocumentos.php?accion=anular&idcobro=<?=$ilista[id_cobro];?>&idventa=<?=$pk;?>" 
        onclick="return  hs.htmlExpand(this, { objectType: 'iframe'} )" ><img src='../images/ic_anulardocumento.png' align='absmiddle'  border='0' title="Anular Documento Emitido ! " ></a></td>
      </tr>
     <? } ?>
    </table></td>
    <td class="texto">&nbsp;<span id="toolTipBox" width="500"></span>
    <img src="../img/fullpage.gif" border="0" onmouseover="toolTip('<?=$ilista[observacion];?>',this)"></td>
    <td><? //if ($primerregistro=="true") { ?>
      <div align="center">
     <a href="frm_cobros.php?accion=edit&pk=<?=$ilista[id_cobro];?>&pk2=<?=$pk;?>" 
        onclick="return  hs.htmlExpand(this, { objectType: 'iframe'} )" ><img src="../images/ic_editar.gif" width="15" height="15" border="0" title="Editar datos del Cobro" /></a>
        
    <!--<a href="javascript:void(0);" onclick="cf_eliminar_cobro('<?=$ilista[id_cobro];?>','<?=$pk;?>');">
    <img src="../images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0"/></a>     --></div>
    <? //$primerregistro="false"; // para que solo pueda editarse el ultimo cobro ingresado
	//} ?>    </td>
  </tr>
  <?
  }
  ?>
</table>
<br />
<table border="0" width="990" align="center" cellpadding="0" cellspacing="1" bgcolor="#D1DDE7">
  <tr>
    <td colspan="7"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_recordatorio.png" width="35" height="32" /></div></td>
        <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Ventas   existentes per&iacute;odo [x - x ]</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="22" class="lbl"><div align="center">id</div></td>
    <td width="315" class="lbl"><div align="center"><strong>Paciente</strong></div></td>
    <td width="126" class="lbl"><div align="center"><strong>Fecha</strong></div></td>
    <td width="133" class="lbl"><div align="center"><strong>Documento</strong></div></td>
    <td width="115" class="lbl"><div align="center"><strong>No. Doc.</strong></div></td>
    <td width="127" class="lbl"><div align="center"><strong>Monto</strong></div></td>
    <td width="144" class="lbl"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  $qlista=runsql("select v.*, p.nombres, p.apellidos, td.nombre as tdnombre 
from ventas v, paciente p, tipodoc td 
where (v.id_paciente=p.id) 
and (v.id_tipodoc=td.id_tipodoc) 
order by v.fecha desc;");
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr bgcolor="<?=color_fila($cnt_lista);?>">
    <td class="texto"><?=$ilista[id_venta];?></td>
    <td height="22" class="texto"><?=$ilista[apellidos];?>,<?=$ilista[nombres];?></td>
    <td class="texto"><?= fecha($ilista[fecha],"-");?></td>
    <td class="texto">(
      <?=$ilista[tdnombre];?>
    )</td>
    <td class="texto"> <?=$ilista[id_documento_emitido];?></td>
    <td class="texto"><?=$ilista[monto];?></td>
    <td><div align="center"><a href="index1.php?<?="op=$op&pk={$ilista[id_venta]}";?>"><img src="../images/ic_editar.gif" alt="Modificar" width="15" height="15" border="0" /></a> &nbsp;&nbsp;&nbsp;
    <a href="javascript:void(0);" onclick="cf_eliminar_venta('<?=$ilista[id_venta];?>');"><img src="../images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0"/></a></div></td>
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
