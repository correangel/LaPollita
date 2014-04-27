<?
if(1==2){
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<?
}

$tipo_trn="Add";
if($pk){
  $qinfo=runsql("select * from cajachica where id_tran= '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="txtid_tipotran";
$today  = date("d")."-".date("m")."-".date("Y");?>
<form id="form1" name="form1" method="post" action="mnt_cajachica.php" autocomplete="off" onsubmit="return validar();">
  <input type="hidden" name="usd" id="usd" value="<?=$_SESSION["USD"];?>">
  <input type="hidden" name="eur" id="eur" value="<?=$_SESSION["EUR"];?>">
  <table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="4">
      	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Control de Caja Chica</td>
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
      <td width="126" class="lbl">Tipo Transacci&oacute;n:</td>
      <td width="433">
      <div align="left">
        <select name="txtid_tipotran" class="textbox" id="txtid_tipotran">
          <option value="in"  <? if ($info[id_tipotran]=='in')  {echo ' selected ';} ?>>Ingreso</option>
          <option value="out" <? if ($info[id_tipotran]=='out') {echo ' selected ';} ?>>Salida</option>
        </select>
      </div>      </td>
      <td width="118"></td>
      <td width="313"><div align="center"><?if($tipo_trn=="Update"){?>
        <a href="index1.php?op=<?=$op;?>" class="link_texto">Agregar nuevo</a>
      <?}?></div></td>
    </tr>
    <tr>
      <td class="lbl">Descripcion:</td>
      <td><input name="txtdescripcion" type="text" class="textbox" id="txtdescripcion" value="<?=$info[descripcion];?>" size="50" maxlength="50" />
      <span class="textbox">      descripci&oacute;n de la compra</span>. </td>
      <td class="lbl">Fecha:</td>
      <td><input name="txtfecha" type="text" class="textbox" id="txtfecha" value="<? if (isset ($info[fecha])){echo $info[fecha];}else{echo $today;}?>" size="20" maxlength="100"/> 
      <script language="JavaScript" type="text/javascript">new tcal ({'formname': 'form1','controlname': 'txtfecha'});</script> </td>
    </tr>
    <tr>
      <td class="lbl"> Doc. Recibido:</td>
      <td ><select name="txtid_documento_recibido"  class="lbl" id="txtid_documento_recibido">
        <?php llenar_combo("tipodoc",$where=" where upper(tipotransac)='RECIBIR'",$orden='nombre',$campo_valor='id_tipodoc',$campo_descrip='nombre',$seleccionar=$info[id_documento_recibido],$codificar=false) ?>
      </select></td>
      <td class="lbl">No.  Documento:</td>
      <td><input name="txtno_documento" type="text" class="textbox" id="txtno_documento" value="<?=$info[no_documento];?>" size="15" maxlength="15" /></td>
    </tr>
    <tr>
      <td class="lbl">Total:</td>
      <td ><input name="txttotal" type="text" class="textbox" id="txttotal" value="<?=$info[total];?>" size="15" maxlength="15" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="lbl">Observaciones:</td>
      <td colspan="2" ><textarea name="txtobservaciones" id="txtobservaciones" cols="75" rows="2"><?=$info[observaciones];?>
      </textarea></td>
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
<table border="0" width="1068" align="center" cellpadding="0" cellspacing="1" bgcolor="#D1DDE7">
  <tr>
    <td colspan="9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_recordatorio.png" width="35" height="32" /></div></td>
        <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Movimientos en Caja Chica para periodo [x - x]</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="23" class="lbl"><div align="center"><strong>id.</strong></div></td>
    <td width="58" class="lbl"><div align="center"><strong>Tipo Tran</strong></div></td>
    <td width="186" class="lbl"><strong>Doc. Recibido</strong></td>
    <td width="231" class="lbl"><div align="center">Descripcion</div></td>
    <td width="186" class="lbl"><div align="center">Observaciones</div></td>
    <td width="79" class="lbl"><div align="center">Fecha</div></td>
    <td width="77" class="lbl"><div align="center">Ingresos</div></td>
    <td width="77" class="lbl"><div align="center">Salidas</div></td>
    <td width="141" class="lbl"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  $qlista=runsql("select cc.*, td.nombre as ndocrecibido from cajachica cc, tipodoc td where cc.id_documento_recibido=td.id_tipodoc;");
  while($ilista=registro($qlista)){
  $cnt_lista++;

  ?>
  <tr bgcolor="<?=color_fila($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[id_tran];?></td>
    <td class="texto"><? if($ilista[id_tipotran]=='in'){echo "Ingreso";} else {echo "Salida";}?></td>
    <td class="texto"><?=$ilista[ndocrecibido];?>[<?=$ilista[id_documento_recibido];?>]</td>
    <td class="texto"><?=$ilista[descripcion];?></td>
    <td class="texto"><?=$ilista[observaciones];?></td>
    <td class="texto"><?= fecha($ilista[fecha],"-");?></td>
    <td class="texto"><? if($ilista[id_tipotran]=='in') {echo $ilista[total];}?></td>
    <td class="texto"><? if($ilista[id_tipotran]=='out') {echo $ilista[total];}?></td>
    <td><div align="center"><a href="index1.php?<?="op=$op&pk={$ilista[id_tran]}";?>"><img src="../images/ic_editar.gif" alt="Modificar" width="15" height="15" border="0" /></a> &nbsp;&nbsp;&nbsp;
    <a href="javascript:void(0);" onclick="cf_eliminar_tranCajaChica('<?=$ilista[id_tran];?>');"><img src="../images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0"/></a>
    &nbsp;&nbsp;</div></td>
  </tr>
  <?
  if($ilista[id_tipotran]=='in'){
  	$ingresos=$ingresos+$ilista[total];
	}else{
	$egresos=$egresos+$ilista[total];	
    }
	$totalCC = $ingresos-$egresos;	
  }
  ?>
  <tr >
    <td  class="texto">&nbsp;</td>
    <td class="texto">&nbsp;</td>
    <td class="texto">&nbsp;</td>
    <td class="texto">&nbsp;</td>
    <td colspan="2" class="texto"><div align="right">
      <blockquote>
        <strong>Sub-totales acumulados</strong>
      </blockquote>
    </div></td>
    <td class="texto"><? printf("%01.2f",$ingresos); ?></td>
    <td class="texto"><? printf("%01.2f",$egresos); ?></td>
    <td><div align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></td>
  </tr>
  <tr >
    <td  class="texto">&nbsp;</td>
    <td class="texto">&nbsp;</td>
    <td class="texto">&nbsp;</td>
    <td class="texto">&nbsp;</td>
    <td colspan="2" class="texto"><div align="right">
      <blockquote>
        <strong>Total</strong>
      </blockquote>
    </div></td>
    <td colspan="2" class="texto"><? printf("%01.2f",$totalCC); ?></td>
    <td>&nbsp;</td>
  </tr>
</table>

<?
if($foco){
echo "<script language=\"javascript\">";
echo "$('{$foco}').focus();";
echo "</script>";
}
?>
