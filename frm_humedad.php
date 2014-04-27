<script>

$(document).ready(function () {
	$("#id_incubadora").change(function(evento){	
		incubval	=	$("#id_incubadora").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_capacidad",id: incubval},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txtesp_ocupado').val(data[0]);
			$('#txtesp_disponible').val(data[2]);
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
})

$(document).ready(function(){
   $("#txtfecha_carga").datepicker();
})	
</script>
<?
if(1==2){
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<?
}

$tipo_trn="Add";
if($pk){
  $qinfo=runsql("select * from cargas where id_cargas = '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="txtid_lote";

?><form id="form1" name="form1" method="post" action="mnt_cargas.php" autocomplete="off" onsubmit="return validar();">
  <table width="990" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="images/bg_titulo_frm.gif"><div align="left"><img src="images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="images/bg_titulo_frm.gif" class="titulo_frm">Control de Cargas a Incubadora</td>
          </tr>
      </table></td>
    </tr>
    <?
    if($msg){
    ?>
    <tr>
      <td height="22" colspan="3" bgcolor="#FFFFCC" class="lbl">&nbsp;&nbsp;<img src="images/ic_info.gif" width="14" height="13" /> <span class="lblroja"><?=$msg;?></span></td>
    </tr>
    <?
    }
    ?>
    <tr>
      <td width="160" class="lbl"><div align="left">Lote:</div></td>
      <td width="700"><?=$info[id_lote];?><select name="id_lote" id="id_lote" class="textbox" >
        <?php llenar_combo("lote",$where="",$orden='id_lote',$campo_valor='id_lote',$campo_descrip='lote',$seleccionar=$info[lote],$codificar=false) ?>
        </select></td>
      <td width="178"><div align="center">
        <?if($tipo_trn=="Update"){?>
        <a href="index1.php?op=<?=$op;?>" class="link_texto">Agregar nuevo</a>
        <?}?>
      </div></td>
    </tr>
    <tr>
      <td class="lbl">Incubadora:</td>
      <td width="700"><?=$info[id_incubadora];?><select name="id_incubadora" id="id_incubadora" class="textbox" >
        <?php llenar_combo("incubadoras",$where="",$orden='id_incubadora',$campo_valor='id_incubadora',$campo_descrip='nombre',$seleccionar=$info[incubadora],$codificar=false, " -> ", "capacidad") ?>
        </select></td>
    </tr>
    <div id="div-capacidad">
            <tr>
              <td class="lbl">Espacio Ocupado:</td>
              <td colspan="2"><input name="txtesp_ocupado" type="text" class="textbox" id="txtesp_ocupado" value="<?=$info[esp_ocupado];?>" size="20" maxlength="100" /></td>
            </tr>
            <tr>
              <td class="lbl">Espacio Disponible:</td>
              <td colspan="2"><input name="txtesp_disponible" type="text" class="textbox" id="txtesp_disponible" value="<?=$info[esp_disponible];?>" size="20" maxlength="100" /></td>
            </tr>
    </div>
    <tr>
      <td class="lbl">Fecha de Carga:</td>
      <td colspan="2"><input name="txtfecha_carga" type="text" class="textbox" id="txtfecha_carga" value="<?=$info[fecha_carga];?>" size="20" maxlength="100" /></td>
      </tr>
      <tr>
      <td class="lbl">Hora Carga:</td>
      <td colspan="2"><input name="txthora_carga" type="text" class="textbox" id="txthora_carga" value="<?=$info[hora_carga];?>" size="20" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Cantidad Cargada:</td>
      <td colspan="2"><input name="txthuevo_cargado" type="text" class="textbox" id="txthuevo_cargado" value="<?=$info[huevo_cargado];?>" size="20" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Correlativo de Nacimiento:</td>
      <td colspan="2"><input name="txtnacimiento" type="text" class="textbox" id="txtnacimiento" value="<?=$info[nacimiento];?>" size="20" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Cliente:</td>
      <td colspan="2"><input name="txtcliente" type="text" class="textbox" id="txtcliente" value="<?=$info[cliente];?>" size="50" maxlength="100" /></td>
    </tr>    
    <tr> <td colspan="12" align="center"><p class="lblverde"><strong>CONTROL DE PESO</strong></p></td>
    <tr>
      <td class="lbl">Huevos Pesados:</td>
      <td colspan="2"><input name="txthuevo_pesado" type="text" class="textbox" id="txthuevo_pesado" value="<?=$info[huevo_pesado];?>" size="20" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Peso Entrada grs.:</td>
      <td colspan="2"><input name="txtpeso_entrada" type="text" class="textbox" id="txtpeso_entrada" value="<?=$info[peso_entrada];?>" size="20" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Peso Promedio Entrada gr:</td>
      <td colspan="2"><input name="txtpeso_prome" type="text" class="textbox" id="txtpeso_prome" value="<?=$info[peso_prome];?>" size="20" maxlength="100" /></td>
    </tr>
          
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

<table width="980" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#D1DDE7">
  <tr>
    <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="images/bg_titulo_frm.gif"><div align="left"><img src="images/ic_recordatorio.png" width="35" height="32" /></div></td>
        <td width="96%" background="images/bg_titulo_frm.gif" class="titulo_frm">Cargas Existentes</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="535" class="lbl"><div align="center"><strong>No. Carga</strong></div></td>
    <td width="186" class="lbl"><div align="center">Lote</div></td>
    <td width="255" class="lbl"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  $qlista=runsql("select * from cargas order by id_cargas");
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr class="<?=set_row_class($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[id_cargas];?></td>
    <td height="22" class="texto"><?=$ilista[id_lote];?></td>
    <td><div align="center"><a href="index1.php?<?="op=$op&pk={$ilista[id_cargas]}";?>"><img src="images/ic_editar.gif" alt="Modificar" width="15" height="15" border="0" /></a> &nbsp;&nbsp;&nbsp;
    <a href="javascript:void(0);" onclick="cf_eliminar_usuario('<?=$ilista[usuario];?>');"><img src="images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0"/></a></div></td>
  </tr>
  <?
  }
  ?>
</table>

