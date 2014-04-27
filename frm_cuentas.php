<?
if(1==2){
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<?
}

$tipo_trn="Add";
if($pk){
  $qinfo=runsql("select * from cuenta where id_cuenta = '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="txtstipo";

?><form id="form1" name="form1" method="post" action="mnt_cuentas.php" autocomplete="off" onsubmit="return validar();">
  <table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Administraci&oacute;n de Cuentas</td>
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
      <td width="160" class="lbl"><div align="left">Banco:</div></td>
      <td width="652"><div align="left">
        <select name="id_banco" id="id_banco">
                <?php llenar_combo("banco",$where='',$orden='snombre',$campo_valor='id_banco',$campo_descrip='snombre',$seleccionar=$info[id_banco],$codificar=false) ?>
        </select>
        </div></td>
      <td width="178"><div align="center">
        <?if($tipo_trn=="Update"){?>
        <a href="index1.php?op=<?=$op;?>" class="link_texto">Agregar nuevo</a>
        <?}?>
      </div></td>
    </tr>
    <tr>
      <td class="lbl">Tipo Cuenta:</td>
      <td colspan="2"><input name="txtstipo" type="text" class="textbox" id="txtstipo" value="<?=$info[stipo];?>" size="50" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">N&uacute;mero de Cuenta:</td>
      <td colspan="2"><input name="txtsnocuenta" type="text" class="textbox" id="txtsnocuenta" value="<?=$info[snocuenta];?>" size="70" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Moneda:</td>
      <td colspan="2"><input name="txtsmoneda" type="text" class="textbox" id="txtsmoneda" value="<?=$info[smoneda];?>" size="70" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Saldo Inicial:</td>
      <td colspan="2"><input name="txtsaldo" type="text" class="textbox" id="txtsaldo" value="<?=$info[saldo];?>" size="70" maxlength="100" /></td>
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
    <td colspan="5"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_recordatorio.png" width="35" height="32" /></div></td>
        <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Cuentas existentes</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="301" class="lbl"><div align="center"><strong>Banco</strong></div></td>
    <td width="196" class="lbl"><div align="center"><strong> N&uacute;mero de Cuenta</strong> </div></td>
    <td width="288" class="lbl"><div align="center"> Tipo de Cuenta  </div></td>
    <td width="288" class="lbl"><div align="center"> Saldo</div></td>
    <td width="200" class="lbl"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  $qlista=runsql("select c.*, b.snombre as nbanco from cuenta c, banco b where (c.id_banco=b.id_banco)  order by snombre");
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr bgcolor="<?=color_fila($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[nbanco];?></td>
    <td class="texto"><?=$ilista[snocuenta];?></td>
    <td height="22" class="texto">
      <div align="left">
        <?=$ilista[stipo];?></div></td>
   <td height="22" class="texto"><div align="left"><?=$ilista[saldo];?> (<?=$ilista[smoneda];?>)</div></td>
    <td><div align="center">
    <a href="index1.php?<?="op=$op&pk=$ilista[id_cuenta]";?>"><img src="../images/ic_editar.gif" alt="Modificar" width="15" height="15" border="0" /></a>     &nbsp;&nbsp;&nbsp;
    <a href="javascript:void(0);" onclick="cf_eliminar_cuenta('<?=$ilista[id_cuenta];?>');"><img src="../images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0"/></a></div></td>
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
