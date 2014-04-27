<?
if(1==2){
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<?
}
//echo "<pre>".print_r($_POST)."</pre>";
if (isset ($_POST['tipo_trn']) && $_POST['tipo_trn'] == 'search' ) {
		$qry_where			=	" where ";
		$first_condition	=	true;
		foreach ($_POST as $key => $value) {
//		    echo "Clave: $key; Valor: $value<br />\n";
			if ($value!=''){
				switch ($key){
					case 'txtnombres':
							if(!$first_condition){$qry_where.=' or ';}
							$qry_where.=" nombres like '%".$value."%' ";
							$first_condition	=	false;
					break;
					case 'txtapellidos':
							if(!$first_condition){$qry_where.=' or ';}
							$qry_where.=" apellidos like '%".$value."%' ";
							$first_condition	=	false;
					break;
					case 'txtemail':
							if(!$first_condition){$qry_where.=' or ';}
							$qry_where.=" email like '%".$value."%' ";
							$first_condition	=	false;
					break;					
					case 'txtemail':
							if(!$first_condition){$qry_where.=' or ';}
							$qry_where.=" email like '%".$value."%' ";
							$first_condition	=	false;
					break;					
					case 'txttelmobil':
							if(!$first_condition){$qry_where.=' or ';}
							$qry_where.=" telmobil like '%".$value."%' ";
							$first_condition	=	false;
					break;					
				}
//				echo "<br>".$qry_where;
			}
		}
		$query_pacientes="select * from paciente ". $qry_where ."order by apellidos ";
	}else{
		$tipo_trn="Add";	
		$query_pacientes="select * from paciente order by apellidos";
	}
	
if($pk){
  $qinfo=runsql("select * from paciente where id = '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="txtnombres";

?><form id="form1" name="form1" method="post" action="mnt_paciente.php" autocomplete="off" onsubmit="return validar();">
  <table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="4">
      	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Administraci&oacute;n de Clientes</td>
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
      <td class="lbl"><div align="left">Nombres:</div></td>
      <td><div align="left"><input name="txtnombres" type="text" class="textbox_req" id="txtnombres" value="<?=$info[nombres];?>" size="50" maxlength="100" alt="Nombres"/></div></td>
      <td></td>
      <td><div align="center"><?if($tipo_trn=="Update"){?>
        <a href="index1.php?op=<?=$op;?>" class="link_texto">Agregar nuevo</a>
      <?}?></div></td>
    </tr>
    <tr>
      <td class="lbl">Apellidos:</td>
      <td><input name="txtapellidos" type="text" class="textbox_req" id="txtapellidos" value="<?=$info[apellidos];?>" size="50" maxlength="100" alt="Apellidos" /></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td class="lbl">Direcci&oacute;n:</td>
      <td ><input name="txtdireccion" type="text" class="textbox" id="txtdireccion" value="<?=$info[direccion];?>" size="70" maxlength="100" /></td>
      <td><span class="lbl">Correo electr&oacute;nico:</span></td>
      <td><input name="txtemail" type="text" class="textbox_req" id="txtemail" value="<?=$info[email];?>" size="50" maxlength="100" alt="Correo Electrónico"/></td>
    </tr>
        <tr>
      <td class="lbl">Tel. Móvil:</td>
      <td><input name="txttelmobil" type="text" class="textbox_req" id="txttelmobil" value="<?=$info[telmobil];?>" size="20" maxlength="100" Alt="Teléfono Móvil"/></td>
      <td><span class="lbl">Tel. Casa:</span></td>
      <td><input name="txttelcasa" type="text" class="textbox" id="txttelcasa" value="<?=$info[telcasa];?>" size="20" maxlength="100" /></td>
    </tr>
        <tr>
      <td class="lbl">Nit:</td>
      <td ><input name="txtnit" type="text" class="textbox" id="txtnit" value="<?=$info[nit];?>" size="40" maxlength="100" /></td>
	<td class="lbl">Fecha Nacimiento:</td>
	<td><input name="txtfnac" type="text" class="textbox_req" id="txtfnac" value="<?=fechacorta($info[fnac]);?>" size="15" maxlength="100" alt="Fecha de Nacimiento"/>
    <script language="JavaScript" type="text/javascript">new tcal ({'formname': 'form1','controlname': 'txtfnac'});</script>
    </td>      
    </tr>
    <tr>
      <td class="lbl">Activo:</td>
      <td ><input name="txtactivo" type="checkbox" id="txtactivo" value="1" <?if($info[activo]==1){echo "checked";}?>/></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td><input name="tipo_trn" type="hidden" id="tipo_trn" value="<?=$tipo_trn;?>" />
      <input name="op" type="hidden" id="op" value="<?=$op;?>" />
      <input name="pk" type="hidden" id="pk" value="<?=$pk;?>" /></td>
      <td ><input name="button" type="button" class="boton1" id="button" value="Guardar" onclick="val_paciente()"/>
        <strong>
        <input name="buscar" type="button" class="boton1" id="buscar" value="Buscar" onclick="buscar_paciente()"/>
      </strong></td>
      <td class="msg_error"></td>
      <td><span class="msg_error"><img src="img/ico_required.png" alt="" width="29" height="30" align="absmiddle" /></span><span class="lblroja">campos obligatorios</span></td>
    </tr>            
  </table>
</form>
<br />
<table width="990" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#D1DDE7">
  <tr>
    <td colspan="7"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_recordatorio.png" width="35" height="32" /></div></td>
        <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Pacientes  existentes</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="535" class="lbl"><div align="center"><strong>Nombre del Paciente</strong></div></td>
    <td width="186" class="lbl"> <div align="center">Tel. Mobil</div></td>
    <td width="186" class="lbl"><div align="center">Tel. Casa</div></td>
    <td width="186" class="lbl"><div align="center">Email</div></td>
    <td width="186" class="lbl"><div align="center">Nit</div></td>
    <td width="186" class="lbl"><div align="center">Activo</div></td>
    <td width="255" class="lbl"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  $qlista=runsql($query_pacientes);
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr bgcolor="<?=color_fila($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[apellidos];?>,<?=$ilista[nombres];?></td>
    <td class="texto"><?=$ilista[telmobil];?></td>
    <td class="texto"><?=$ilista[telcasa];?></td>
    <td class="texto"><?=$ilista[email];?></td>
    <td class="texto"><?=$ilista[nit];?></td>
    <td height="22" class="texto"><div align="center"><img src="../images/ic_<?if($ilista[activo]==0){echo "no";}?>ok.gif" width="16" height="16" /></div></td>
    <td><div align="center">&nbsp;&nbsp;&nbsp;
    <a href="index1.php?<?="op=$op&pk={$ilista[id]}";?>"><img src="../images/ic_editar.gif" title="Modificar" alt="Modificar" width="15" height="15" border="0" /></a> &nbsp;&nbsp;&nbsp;
    <a href="javascript:void(0);" onclick="cf_eliminar_paciente('<?=$ilista[id];?>');"><img src="../images/ic_delete.gif" alt="Eliminar" title="Eliminar" width="15" height="15" border="0"/></a></div></td>
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
