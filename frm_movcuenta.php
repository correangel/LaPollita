<?
if(1==2){
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<?
}

$tipo_trn="Add";
if($pk){
  $qinfo=runsql("select * from movcuenta where id_mov= '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="txtid_tipotran";
$today  = date("d")."-".date("m")."-".date("Y");
?>
<script language="javascript1.2">
function MostrarCuenta(){
	location.href="index1.php?op=frm_movcuenta&txtid_cuenta="+$F('txtid_cuenta');
}
</script>
<form id="form1" name="form1" method="post" action="mnt_movcuenta.php" autocomplete="off" onsubmit="return validar();">
  <input type="hidden" name="usd" id="usd" value="<?=$_SESSION["USD"];?>">
  <input type="hidden" name="eur" id="eur" value="<?=$_SESSION["EUR"];?>">
  <input type="hidden" name="txtexistencia" value="<?=$info[existencia];?>" />
   <table width="990" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td colspan="4">
      	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Administraci&oacute;n de Movimientos en Cuentas de Banco</td>
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
      <td width="127" class="lbl">No. Cuenta:</td>
      <td width="414">
      <div align="left">
        <select name="txtid_cuenta" class="textbox" id="txtid_cuenta" onchange="MostrarCuenta()">
          <?php 
		  if (isset($txtid_cuenta)){$selcuenta = $txtid_cuenta;}else{$selcuenta = $info[id_cuenta];}  // elejir cual cuenta queda seleccionada en el combo.
		  llenar_combo("cuenta",$where=" ",$orden='snocuenta',$campo_valor='id_cuenta',$campo_descrip='snocuenta',$seleccionar=$selcuenta,$codificar=false,$separador='  |  ',$campo_descrip2='smoneda') 
		  ?>
        </select>
      </div>      </td>
      <td width="126"></td>
      <td width="323"><div align="center">
      <? if($tipo_trn=="Update"){?>
      <img src="../images/ic_agregar.gif" alt="" width="15" height="15" align="absmiddle" />        <a href="index1.php?op=<?=$op;?>" class="link_texto">Agregar Nuevo Movimiento </a><? } ?></div></td>
    </tr>
    <tr>
      <td class="lbl">Tipo Transacci&oacute;n:</td>
      <td><select name="txtid_tipotran" class="textbox" id="txtid_tipotran">
        <option value="in"  <? if ($info[id_tipotran]=='in')  {echo ' selected ';} ?>>Deposito</option>
        <option value="out" <? if ($info[id_tipotran]=='out') {echo ' selected ';} ?>>Retiro (cheque)</option>
      </select></td>
      <td><span class="lbl">Fecha:</span></td>
      <td><input name="txtfecha" type="text" class="textbox" id="txtfecha" value="<? if (isset ($info[fecha])){echo fecha($info[fecha]);}else{echo $today;}?>" size="20" maxlength="100"/> 
      <script language="JavaScript" type="text/javascript">new tcal ({'formname': 'form1','controlname': 'txtfecha'});</script> </td>
    </tr>
    <tr>
      <td class="lbl">Monto:</td>
      <td ><input name="txtmonto" type="text" class="textbox" id="txtmonto" value="<?=$info[monto];?>" size="15" maxlength="15" /></td>
      <td><span class="lbl">Moneda:</span></td>
      <td><span class="lbl">
        <?php
      if (isset($info[moneda]) && $info[moneda]!='' ){ $selmoneda =  $info[moneda];} else {$selmoneda =  'QUE';}
	  ?>
        <select name="txtmoneda" id="txtmoneda">
          <?php llenar_combo("monedas",$where='',$orden='moneda',$campo_valor='moneda',$campo_descrip='moneda',$seleccionar=$selmoneda,$codificar=false,$separador='',$campo_descrip2='') ?>
        </select>
      </span></td>
    </tr>    

    <tr>
      <td><span class="lbl">Observaciones:</span></td>
      <td >
      <textarea name="txtobservaciones" id="txtobservaciones" cols="50" rows="2"><?=$info[observaciones];?></textarea></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input name="tipo_trn" type="hidden" id="tipo_trn" value="<?=$tipo_trn;?>" />
      <input name="op" type="hidden" id="op" value="<?=$op;?>" />
      <input name="pk" type="hidden" id="pk" value="<?=$pk;?>" /></td>
      <td ><input name="button" type="submit" class="boton1" id="button" value="Guardar" /></td>
      <td colspan="2">
	  <? if($pk){?>
      <table width="100%" border="0" cellspacing="2" cellpadding="2">
                <tr>
                  <td width="6%"><div align="right"><img src="../images/ic_agregar.gif" width="15" height="15" /></div></td>
                  <td width="94%"><a href="frm_movcuentadet.php?pk=<?=$pk;?>&tipotran=<?=$info[id_tipotran];?>" class="link_texto"  
            onclick="return  hs.htmlExpand(this, { objectType: 'iframe'} )">Agregar  detalle del Movimiento</a></td>
                </tr>
      </table>
	  <? } ?>      </td>
    </tr>
  </table>
</form>
<hr>
<table border="0" width="1112" align="center" cellpadding="0" cellspacing="1" bgcolor="#D1DDE7">
  <tr>
    <td colspan="8" class="textbox"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm_det.gif"><div align="left"></div></td>
        <td width="96%" background="../images/bg_titulo_frm_det.gif" class="titulo_frm">Detalle de Movimiento en la cuenta </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="35" class="textbox"><div align="center"><strong>id</strong></div></td>
    <td width="94" class="textbox"><div align="center"><strong>Tipo Doc.</strong></div></td>
    <td width="129" class="textbox"><strong>No. Doc</strong></td>
    <td width="337" class="textbox"><div align="center"><strong>Monto Ingreso (Moneda)</strong></div></td>
    <td width="210" class="textbox"><div align="center"><strong>Monto Salida (Moneda)</strong></div></td>
    <td width="139" class="textbox"><strong>Observaciones</strong></td>
    <td width="95" class="textbox"><div align="center"><strong>Status </strong></div></td>
    <td width="64" class="textbox"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  //echo("select vd.*, a.nombre as anombre from ventas_det vd, articulos a where (vd.id_articulo=a.id_articulo) and vd.id_venta= '$pk' order by anombre;");
  $qlista=runsql("select mcd.id_movdet, mcd.id_mov, mcd.id_tipodoc, mcd.no_doc, mcd.monto, mcd.moneda, mcd.status, mcd.observaciones, td.nombre as ntipodoc
from movcuentadet mcd join tipodoc td on (mcd.id_tipodoc = td.id_tipodoc)
where mcd.id_mov= '$pk';");
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr bgcolor="<?=color_fila($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[id_movdet];?></td>
    <td class="texto"><?=$ilista[ntipodoc];?></td>
    <td class="texto"><?=$ilista[no_doc];?></td>
    <td class="moneda"><div align="right">
        <?=$ilista[monto];?>(<?=$ilista[moneda];?>)
    <span id="toolTipBox" width="500"></span>
    <? ShowTipoCambio($info[fecha],$info[moneda]); ?>
    </div></td>
    <td class="moneda"><div align="right">
        <?=$ilista[monto];?>(<?=$ilista[moneda];?>) <span id="toolTipBox" width="500"></span>
      <? ShowTipoCambio($info[fecha],$info[moneda]); ?>
    </div></td>
    <td class="texto"><?=$ilista[observaciones];?></td>
    <td class="texto"><?=$ilista[status];?></td>
    <td><div align="center">
     <a href="frm_movcuentadet.php?pk=<?=$ilista[id_mov];?>&pk2=<?=$ilista[id_movdet];?>" 
        onclick="return  hs.htmlExpand(this, { objectType: 'iframe'} )" ><img src="../images/ic_editar.gif" width="15" height="15" border="0" /></a> 
        &nbsp;&nbsp;&nbsp;
    <a href="javascript:void(0);" onclick="cf_eliminar_movdet('<?=$ilista[id_mov];?>','<?=$ilista[id_movdet];?>');"><img src="../images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0"/></a></div></td>
  </tr>
  <?
  }
  ?>
</table>
<hr>
<form id="form1" name="form1" method="post" action="mnt_movcuenta.php" autocomplete="off" onsubmit="return validar();">
<table border="0" width="1210" align="center" cellpadding="0" cellspacing="1" bgcolor="#D1DDE7">
  <tr>
    <td colspan="8"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_recordatorio.png" width="35" height="32" /></div></td>
        <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Movimientos en Cuenta</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="28" class="lbl"><div align="center"><strong>id.</strong></div></td>
    <td width="76" class="lbl"><div align="center"><strong>Tipo Tran</strong></div></td>
    <td width="210" class="lbl"><div align="center"><strong>No. Cuenta</strong></div></td>
    <td width="126" class="lbl"><div align="center">Fecha</div></td>
    <td width="165" class="lbl"><div align="center">Ingreso Monto (Moneda)</div></td>
    <td width="190" class="lbl"><div align="center">Salida  Monto (Moneda)</div></td>
    <td width="219" class="lbl"><div align="center">Obs.</div></td>
    <td width="187" class="lbl"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  if (isset($txtid_cuenta) && $txtid_cuenta!= "" ){
  	$where=" where cuenta.id_cuenta=$txtid_cuenta ;";
  }else{
  	$where=" ;";
  }
  if ($txtid_cuenta== "SV")  {
  	$where=" ;";
  }
  $query="SELECT
movcuenta.id_mov,
movcuenta.id_cuenta,
movcuenta.id_tipotran,
movcuenta.fecha,
movcuenta.monto,
movcuenta.moneda,
movcuenta.observaciones,
cuenta.id_cuenta,
cuenta.snocuenta
FROM
movcuenta
Inner Join cuenta ON movcuenta.id_cuenta = cuenta.id_cuenta".$where;
//echo "<br>query listado gral <br>".$query;//exit();
  $qlista=runsql($query);
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr bgcolor="<?=color_fila($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[id_mov];?></td>
    <td class="texto"><? if($ilista[id_tipotran]=='in'){echo "Ingreso";} else {echo "Salida";}?></td>
    <td class="texto"><?=$ilista[snocuenta ];?></td>
    <td class="texto"><?= fecha($ilista[fecha]);?></td>
    <td class="texto"><?=$ilista[monto];?> (<?=$ilista[moneda];?>)</td>
    <td class="texto"><?=$ilista[monto];?>
(
  <?=$ilista[moneda];?>
  )</td>
    <td class="texto"><?=$ilista[observaciones];?></td>
    <td><div align="center"><a href="index1.php?<?="op=$op&pk={$ilista[id_mov]}";?>"><img src="../images/ic_editar.gif" alt="Modificar" width="15" height="15" border="0" /></a> &nbsp;&nbsp;&nbsp;
    <a href="javascript:void(0);" onclick="cf_eliminar_movcuenta('<?=$ilista[id_mov];?>');">
    <img src="../images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0"/></a>
    &nbsp;<span id="toolTipBox" width="500"></span>
    <img src="../img/fullpage.gif" border="0" onmouseover="toolTip('<?=$ilista[observaciones];?>',this)">    </td>
  </tr>
  <?
  }
  ?>
</table>
</form>    

<?
if($foco){
echo "<script language=\"javascript\">";
echo "$('{$foco}').focus();";
echo "</script>";
}
?>
