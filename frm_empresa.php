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
					case 'nombre_comercial':
							if(!$first_condition){$qry_where.=' or ';}
							$qry_where.=" nombre_comercial like '%".$value."%' ";
							$first_condition	=	false;
					break;
					case 'razon_social':
							if(!$first_condition){$qry_where.=' or ';}
							$qry_where.=" razon_social like '%".$value."%' ";
							$first_condition	=	false;
					break;
					case 'email':
							if(!$first_condition){$qry_where.=' or ';}
							$qry_where.=" email like '%".$value."%' ";
							$first_condition	=	false;
					break;					
					case 'telefono':
							if(!$first_condition){$qry_where.=' or ';}
							$qry_where.=" telefono like '%".$value."%' ";
							$first_condition	=	false;
					break;					
				}
//				echo "<br>".$qry_where;
			}
		}
		$query_clientes="select * from empresa ". $qry_where ."order by nombre_comercial ";
	}else{
		$tipo_trn="Add";	
		$query_clientes="select * from empresa order by nombre_comercial";
	}
	
if($pk){
  $qinfo=runsql("select * from empresa where id_empresa = '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="nombre_comercial";

?><form id="form1" name="form1" method="post" action="mnt_empresa.php" autocomplete="off" onsubmit="return validar();">
  <table width="990" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td colspan="4">
      	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Administraci&oacute;n de Empresas</td>
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
      <td width="119" class="lbl"><div align="left">Nombre Comercial:</div></td>
      <td width="400" class="parrafo"><div align="left"><input name="nombre_comercial" type="text" class="textbox_req" id="nombre_comercial" value="<?=$info[nombre_comercial];?>" size="50" maxlength="100" alt="Nombres"/></div></td>
      <td width="139" class="lbl"></td>
      <td width="319" class="parrafo"><div align="center">
        <?if($tipo_trn=="Update"){?>
        <a href="index1.php?op=<?=$op;?>" class="link_texto">Agregar nuevo</a>
        <?}?>
      </div></td>
    </tr>
    <tr>
      <td class="lbl">Raz&oacute;n Social:</td>
      <td class="parrafo"><input name="razon_social" type="text" class="textbox_req" id="razon_social" value="<?=$info[razon_social];?>" size="50" maxlength="100" alt="Apellidos" /></td>
      <td class="lbl">Cliente:</td>
      <td width="700"><select name="id_cliente" id="id_cliente" class="textbox" >
        <?php llenar_combo("cliente",$where="",$orden='apellidos',$campo_valor='id',$campo_descrip='apellidos',$seleccionar=$info[id_cliente],$codificar=false) ?>
      </select></td>
    </tr>
    <tr>
      <td class="lbl">Direcci&oacute;n:</td>
      <td class="parrafo" ><input name="direccion" type="text" class="textbox" id="direccion" value="<?=$info[direccion];?>" size="70" maxlength="100" /></td>
      <td class="lbl"><span class="lbl">Correo electr&oacute;nico:</span></td>
      <td class="parrafo"><input name="email" type="text" class="textbox_req" id="email" value="<?=$info[email];?>" size="50" maxlength="100" alt="Correo Electrónico"/></td>
    </tr>
        <tr>
      <td class="lbl">Tel&eacute;fono 1:</td>
      <td class="parrafo"><input name="telefono" type="text" class="textbox_req" id="telefono" value="<?=$info[telefono];?>" size="20" maxlength="100" Alt="Teléfono Móvil"/></td>
      <td class="lbl">Tel&eacute;fono 2</td>
      <td class="parrafo"><input name="telefono2" type="text" class="textbox" id="telefono2" value="<?=$info[telefono2];?>" size="20" maxlength="100" /></td>
    </tr>
        <tr>
      <td class="lbl">Nit:</td>
      <td class="parrafo" ><input name="nit" type="text" class="textbox" id="nit" value="<?=$info[nit];?>" size="40" maxlength="100" /></td>
	<td class="lbl">Fecha Ingreso:</td>
	<td class="parrafo"><input name="fecha_ingreso" type="text" class="textbox_req" id="fecha_ingreso" value="<?=fechacorta($info[fecha_ingreso]);?>" size="15" maxlength="100" alt="Fecha de Nacimiento"/>
    <script language="JavaScript" type="text/javascript">new tcal ({'formname': 'form1','controlname': 'fecha_ingreso'});</script>
    </td>      
    </tr>
    <tr>
      <td class="lbl">Activo:</td>
      <td class="parrafo" ><input name="status" type="checkbox" id="status" value="1" <? if($info[status]==1){echo "checked";}?>/></td>
      <td class="lbl">Tags:</td>
      <td class="parrafo" ><input name="tags" type="text" class="textbox" id="tags" value="<?=$info[tags];?>" size="70" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl"><input name="tipo_trn" type="hidden" id="tipo_trn" value="<?=$tipo_trn;?>" />
      <input name="op" type="hidden" id="op" value="<?=$op;?>" />
      <input name="pk" type="hidden" id="pk" value="<?=$pk;?>" /></td>
      <td class="parrafo" ><input name="button" type="button" class="boton1" id="button" value="Guardar" onclick="val_empresa()"/>
        <strong>
        <input name="buscar" type="button" class="boton1" id="buscar" value="Buscar" onclick="buscar_empresa()"/>
      </strong></td>
      <td class="lbl"></td>
      <td class="parrafo"><span class="msg_error"><img src="img/ico_required.png" alt="" width="29" height="30" align="absmiddle" /></span><span class="lblroja">campos obligatorios</span></td>
    </tr>            
  </table>
</form>
<br />
<table width="990" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#D1DDE7">
  <tr>
    <td colspan="7"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_recordatorio.png" width="35" height="32" /></div></td>
        <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Empresas  existentes</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="535" class="lbl"><div align="center"><strong>Nombre Comercial</strong></div></td>
    <td width="186" class="lbl"> <div align="center">Telefono1</div></td>
    <td width="186" class="lbl"><div align="center">Telefono2</div></td>
    <td width="186" class="lbl"><div align="center">Email</div></td>
    <td width="186" class="lbl"><div align="center">Nit</div></td>
    <td width="186" class="lbl"><div align="center">Activo</div></td>
    <td width="255" class="lbl"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  $qlista=runsql($query_clientes);
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr class="<?=set_row_class($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[nombre_comercial];?></td>
    <td class="texto"><?=$ilista[telefono];?></td>
    <td class="texto"><?=$ilista[telefono2];?></td>
    <td class="texto"><?=$ilista[email];?></td>
    <td class="texto"><?=$ilista[nit];?></td>
    <td height="22" class="texto"><div align="center"><img src="../images/ic_<? if($ilista[status]==0){echo "no";}?>ok.gif" width="16" height="16" /></div></td>
    <td><div align="center">&nbsp;&nbsp;&nbsp;
    <a href="index1.php?<? echo "op=$op&pk={$ilista[id_empresa]}";?>"><img src="../images/ic_editar.gif" title="Modificar" alt="Modificar" width="15" height="15" border="0" /></a> &nbsp;&nbsp;&nbsp;
    <a href="javascript:void(0);" onclick="cf_eliminar_empresa('<?=$ilista[id_empresa];?>');"><img src="../images/ic_delete.gif" alt="Eliminar" title="Eliminar" width="15" height="15" border="0"/></a></div></td>
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
