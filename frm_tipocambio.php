<?
if(1==2){
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<?
}

$tipo_trn="Add";
if($pk){
  $qinfo=runsql("select * from tipocambio where id_tipocambio = '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="txtcliente";

?><form id="form1" name="form1" method="post" action="mnt_tipocambio.php" autocomplete="off" onsubmit="return validar();">
  <table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Administraci&oacute;n de Tipo de Cambio</td>
          </tr>
      </table></td>
    </tr>
    <?
    if($msg){
    ?>
    <tr>
      <td height="22" colspan="3" bgcolor="#FFFFCC" class="lbl">&nbsp;&nbsp;<img src="../images/ic_info.gif" width="14" height="13" /> <span class="lblroja"><?=$msg;?></span></td>
    </tr>
    <?
    }
    ?>
    <tr>
      <td width="160" class="lbl"><div align="left">Moneda:</div></td>
      <td width="652"><div align="left">
        <select name="txtmoneda" id="txtmoneda">
          <?php llenar_combo("monedas",$where='',$orden='moneda',$campo_valor='moneda',$campo_descrip='moneda',$seleccionar=$info[moneda],$codificar=false,$separador='',$campo_descrip2='') ?>
        </select>
      </div> </td>
      <td width="178"><div align="center">
        <?if($tipo_trn=="Update"){?>
        <a href="index1.php?op=<?=$op;?>" class="link_texto">Agregar nuevo</a>
        <?}?>
      </div></td>
    </tr>
    <tr>
      <td class="lbl">Tipo Cambio:</td>
      <td colspan="2"><input name="txttipocambio" type="text" class="textbox" id="txttipocambio" value="<?=$info[tipocambio];?>" size="15" maxlength="15" /> 
        <span class="msg_error">(hasta 5 decimales) x 1 Quetzal</span></td>
    </tr>
    <tr>
      <td class="lbl">Fecha:</td>
      <td><input name="txtfecha" type="text" class="textbox" id="txtfecha" value="<?=fechacorta($info[fecha]);?>" size="10" maxlength="15" />
      <script language="JavaScript" type="text/javascript">new tcal ({'formname': 'form1','controlname': 'txtfecha'});</script></td>
    </tr>
    <tr>
      <td><input name="tipo_trn" type="hidden" id="tipo_trn" value="<?=$tipo_trn;?>" />
      <input name="op" type="hidden" id="op" value="<?=$op;?>" />
      <input name="pk" type="hidden" id="pk" value="<?=$pk;?>" /></td>
      <td colspan="2"><input name="button" type="submit" class="boton1" id="button" value="Guardar" /></td>
    </tr>            
  </table>
</form>
<br />
<table width="990" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#D1DDE7">
  <tr>
    <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_recordatorio.png" width="35" height="32" /></div></td>
        <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Tipos de Cambio para el Per&iacute;odo [ x -xx - x]</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="187" class="lbl"><div align="center"><strong>Moneda</strong></div></td>
    <td width="339" class="lbl"><div align="center"><strong>Fecha</strong></div></td>
    <td width="258" class="lbl"><div align="center">Tipo de Cambio x 1 Quetzal</div></td>
    <td width="201" class="lbl"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  $qlista=runsql("select * from tipocambio order by fecha desc");
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr bgcolor="<?=color_fila($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[moneda];?></td>
    <td class="texto"><?= fecha($ilista[fecha],"-");?></td>
    <td height="22" class="texto">
      <div align="left">
        <?=$ilista[tipocambio];?>
      </div></td>
    <td><div align="center"><a href="index1.php?<?="op=$op&pk=$ilista[id_tipocambio]";?>"><img src="../images/ic_editar.gif" alt="Modificar" width="15" height="15" border="0" /></a> 
    &nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick="cf_eliminar_tipocambio('<?=$ilista[id_tipocambio];?>');"><img src="../images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0"/></a></div></td>
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
