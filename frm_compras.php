<script language="javascript1.2">
function Check_currency(val){
	if (val.indexOf("$")!=-1)	{
	document.getElementById('moneda').innerHTML ='<a href="javascript:void(0);" onclick="ConvertirMoneda()">Convertir USD a Quetzales</a>';
	document.getElementById('moneda').style.display='block';}
	if (val.indexOf("e")!=-1) 	{
	document.getElementById('moneda').innerHTML ='<a href="javascript:void(0);" onclick="ConvertirMoneda()">Convertir EUR a Quetzales</a>';
	document.getElementById('moneda').style.display='block';}
}
function ConvertirMoneda(){
	val=document.getElementById('txtmonto').value;
	if (val.indexOf("$")!=-1)	{val= val.substring(1, val.length);quetzales = val * document.getElementById('usd').value;}
	if (val.indexOf("e")!=-1)	{val= val.substring(1, val.length);quetzales = val * document.getElementById('eur').value;}
	
	document.getElementById('txtmonto').value = quetzales;
	document.getElementById('moneda').style.display	=	'none';
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
  $qinfo=runsql("select * from compras where id_compra = '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="txtid_proveedor";

?><form id="form1" name="form1" method="post" action="mnt_compras.php" autocomplete="off" onsubmit="return validar();">
  <input type="hidden" name="usd" id="usd" value="<?=$_SESSION["USD"];?>">
  <input type="hidden" name="eur" id="eur" value="<?=$_SESSION["EUR"];?>">
  <table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="4">
      	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Administraci&oacute;n de Compras</td>
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
      <td width="98" class="lbl"><div align="left">Proveedor:</div></td>
      <td width="416">
      <div align="left">
        <select name="txtid_proveedor" id="txtid_proveedor">
                <?php llenar_combo("proveedor",$where='',$orden='nombres',$campo_valor='id',$campo_descrip='empresa',$seleccionar=$info[id_proveedor],$codificar=false) ?>
        </select>
        </div>      </td>
      <td width="152"></td>
      <td width="324"><div align="center"><?if($tipo_trn=="Update"){?>
        <a href="index1.php?op=<?=$op;?>" class="link_texto">Agregar nuevo</a>
      <?}?></div></td>
    </tr>
    <tr>
      <td class="lbl">Fecha:</td>
      <td><input name="txtfecha" type="text" class="textbox" id="txtfecha" value="<? if(isset($info[fecha])) {echo fechacorta($info[fecha]);}else{echo $today; }?>"size="15" maxlength="100" />
      <script language="JavaScript" type="text/javascript">new tcal ({'formname': 'form1','controlname': 'txtfecha'});</script></td>
      <td><span class="lbl">Monto:</span></td>
      <td><span class="textbox">Q.</span>
        <input name="txtmonto" type="text" class="textbox" id="txtmonto" value="<?=$info[monto];?>" size="20" maxlength="100"  onchange="Check_currency(this.value);"/> 
      <div class="textbox" id="moneda" style="display:none">
      <a href="javascript:void(0);" onclick="ConvertirMoneda('txtmonto')">Convertir Moneda</a>
      </div> </td>
    </tr>
    <tr>
      <td class="lbl">No documento:</td>
      <td ><input name="txtid_documento" type="text" class="textbox" id="txtid_documento" value="<?=$info[id_documento_recibido];?>" size="70" maxlength="100" /></td>
      <td><span class="lbl">Documento a Recibir:</span></td>
      <td><div align="left">
        &nbsp;&nbsp;<select name="txtid_tipodoc"  class="lbl" id="txtid_tipodoc">
          <?php llenar_combo("tipodoc",$where=" where upper(tipotransac)='RECIBIR'",$orden='nombre',$campo_valor='id_tipodoc',$campo_descrip='nombre',$seleccionar=$info[id_tipodoc],$codificar=false) ?>
        </select>
      </div></td>
    </tr>
    <tr>
      <td class="lbl">Observaciones:</td>
      <td colspan="2" ><textarea name="txtobservaciones" id="txtobservaciones" cols="75" rows="2"><?=$info[observaciones];?></textarea></td>
      <td rowspan="2">
      
      <?
    if($pk){
    ?>
      <table width="98%" border="0" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <td width="19%" background="../images/bg_titulo_frm_det.gif">&nbsp;</td>
        <td width="81%" background="../images/bg_titulo_frm_det.gif" class="titulo_frm"><div align="left">Acciones sobre la compra:</div></td>
      </tr>
      <tr>
        <td colspan="2" bgcolor="#ECE9D8">
          <table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td width="6%"><img src="../images/ic_agregar.gif" width="15" height="15" /></td>
            <td width="94%">
            <a href="frm_comprasdet.php?pk=<?=$pk;?>" class="link_texto"  
            OnClick="return  hs.htmlExpand(this, { objectType: 'iframe'} )">Agregar art&iacute;culos  al detalle</a></td>
          </tr>
          <tr>
            <td><img src="../images/ic_agregar.gif" alt="" width="15" height="15" /></td>
            <td><a href="frm_pagos.php?pk=<?=$pk;?>" class="link_texto"  
            onclick="return  hs.htmlExpand(this, { objectType: 'iframe'} )">Aplicar pagos a la compra</a></td>
          </tr>
        </table></td>
      </tr>
    </table>

      <br />
    <?
    }
    ?>      </td>
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
<hr>
<table border="0" width="850" align="center" cellpadding="0" cellspacing="1" bgcolor="#D1DDE7">
  <tr>
    <td colspan="5" class="textbox"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm_det.gif"><div align="left"></div></td>
        <td width="96%" background="../images/bg_titulo_frm_det.gif" class="titulo_frm">Detalle de Articulos en la compra</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="278" class="textbox"><div align="center"><strong>Art&iacute;culo</strong></div></td>
    <td width="80" class="textbox"><div align="center"><strong>Cantidad</strong></div></td>
    <td width="103" class="textbox"><div align="center"><strong>Precio</strong></div></td>
    <td width="317" class="textbox"><div align="center"><strong>Observaciones</strong></div></td>
    <td width="66" class="textbox"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  //echo("select cd.*, a.nombre as anombre from compras_det cd, articulos a where (cd.id_articulo=a.id_articulo) and cd.id_compra= '$pk'");
  $qlista=runsql("select cd.*, a.nombre as anombre, c.fecha 
from compras_det cd join compras c on ( cd.id_compra=c.id_compra)
				 join articulos a on ( cd.id_articulo=a.id_articulo )
where cd.id_compra= '$pk';");
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr bgcolor="<?=color_fila($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[anombre];?></td>
    <td class="texto"><?=$ilista[cantidad];?></td>
    <td class="texto"><?=$ilista[precio];?>(<?=$ilista[moneda];?>)<span id="toolTipBox" width="500"></span><? ShowTipoCambio($ilista[fecha],$ilista[moneda]); ?></td>
    <td class="texto"><?=$ilista[observacion];?></td>
    <td><div align="center">
     <a href="frm_comprasdet.php?pk=<?=$ilista[id_compra];?>&pk2=<?=$ilista[id_articulo];?>" 
        onclick="return  hs.htmlExpand(this, { objectType: 'iframe'} )" ><img src="../images/ic_editar.gif" width="15" height="15" border="0" /></a> 
        &nbsp;&nbsp;&nbsp;
    <a href="javascript:void(0);" onclick="cf_eliminar_compradet('<?=$ilista[id_compra];?>','<?=$ilista[id_articulo];?>');"><img src="../images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0"/></a></div></td>
  </tr>
  <?
  }
  ?>
</table>
<hr>
<table border="0" width="850" align="center" cellpadding="0" cellspacing="1" bgcolor="#D1DDE7">
  <tr>
    <td colspan="5" class="textbox"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm_det.gif"><div align="left"></div></td>
        <td width="96%" background="../images/bg_titulo_frm_det.gif" class="titulo_frm">Detalle de Pagos en la compra</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="58" class="textbox"><div align="center"><strong>Tipo</strong></div></td>
    <td width="86" class="textbox"><div align="center"><strong>Fecha</strong></div></td>
    <td width="78" class="textbox"><div align="center"><strong>Monto</strong></div></td>
    <td width="556" class="textbox"><div align="center"><strong>Observaciones</strong></div></td>
    <td width="66" class="textbox"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  $qlista=runsql(  "SELECT p.* , td.nombre as ntipodoc FROM pagos p Inner Join tipodoc td ON p.id_tipodoc = td.id_tipodoc where p.id_compra= '$pk';");
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr bgcolor="<?=color_fila($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[ntipodoc];?></td>
    <td class="texto"><?=fecha($ilista[fecha]);?></td>
    <td class="texto"><?=$ilista[monto];?></td>
    <td class="texto"><?=$ilista[observacion];?></td>
    <td><div align="center">
     <a href="frm_pagos.php?pk=<?=$ilista[id_pago];?>&pk2=<?=$pk;?>" 
        onclick="return  hs.htmlExpand(this, { objectType: 'iframe'} )" ><img src="../images/ic_editar.gif" width="15" height="15" border="0" /></a> 
        &nbsp;&nbsp;&nbsp;
    <a href="javascript:void(0);" onclick="cf_eliminar_pago('<?=$ilista[id_pago];?>','<?=$pk;?>');"><img src="../images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0"/></a></div></td>
  </tr>
  <?
  }
  ?>
</table>
<br />
<table border="0" width="990" align="center" cellpadding="0" cellspacing="1" bgcolor="#D1DDE7">
  <tr>
    <td colspan="5"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_recordatorio.png" width="35" height="32" /></div></td>
        <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Compras  existentes periodo [x - x ]</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="300" class="lbl"><div align="center"><strong>Proveedor</strong></div></td>
    <td width="91" class="lbl"><div align="center"><strong>Fecha</strong></div></td>
    <td width="270" class="lbl"><div align="center"><strong>Documento</strong></div></td>
    <td width="103" class="lbl"><div align="center"><strong>Monto</strong></div></td>
    <td width="220" class="lbl"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  $qlista=runsql("select c.*, p.empresa as pempresa, td.nombre as tdnombre from compras c, proveedor p, tipodoc td where (c.id_proveedor=p.id) and (c.id_tipodoc=td.id_tipodoc) order by fecha desc;");
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr bgcolor="<?=color_fila($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[pempresa];?></td>
    <td class="texto"><?= fecha($ilista[fecha],"-");?></td>
    <td class="texto"><?=$ilista[id_documento_recibido];?> (<?=$ilista[tdnombre];?>)</td>
    <td class="texto"><?=$ilista[monto];?></td>
    <td><div align="center"><a href="index1.php?<?="op=$op&pk={$ilista[id_compra]}";?>"><img src="../images/ic_editar.gif" alt="Modificar" width="15" height="15" border="0" /></a> &nbsp;&nbsp;&nbsp;
    <a href="javascript:void(0);" onclick="cf_eliminar_compra('<?=$ilista[id_compra];?>');"><img src="../images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0"/></a></div></td>
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
