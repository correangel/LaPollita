<script>

$(document).ready(function () {
	$("#txtnacimiento").change(function(evento){	
		valnacimiento	=	$("#txtnacimiento").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_hpesado",id: valnacimiento},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txthuevo_pesado').val(data[0]);
			$('#id_lote').val(data[3]);
			$('#id_incubadora').val(data[4]);
			$('#txtfecha_descarga').focus();
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
})

$(document).ready(function () {
	$("#txtpeso_salida").change(function(evento){	
		valcarga	=	$("#txtnacimiento").val();
		valsalida	=	$("#txtpeso_salida").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_ppeso",id: valcarga, out: valsalida},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txtpeso_perdida').val(data[0]);
			
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
})

$(document).ready(function () {
	$("#txtpeso_promesa").change(function(evento){	
		valcarga	=	$("#txtnacimiento").val();
		valsalida	=	$("#txtpeso_salida").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_porcentaje",id: valcarga, out: valsalida},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txtporcentaje').val(data[0]);
            $('#txttransfer').focus();  
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
})

$(document).ready(function(){
   $("#txtfecha_descarga").datepicker();
})

$(document).ready(function () {
	$("#txtfecha_descarga").change(function(evento){	
		$('#txthora_descarga').focus();
	});
})

$(document).ready(function () {
	$("#txthora_descarga").change(function(evento){	
		$('#txtpeso_salida').focus();
	});
})

//Para Deshabilitar Enter 
 $(document).ready(function() {
   /* Aquí podría filtrar que controles necesitará manejar,
    * en el caso de incluir un dropbox $('input, select');
    */
   tb = $('input');
    
   if ($.browser.mozilla) {
       $(tb).keypress(enter2tab);
   } else {
       $(tb).keydown(enter2tab);
   }
   });
 
function enter2tab(e) {
       if (e.keyCode == 13) {
           cb = parseInt($(this).attr('tabindex'));
    
           if ($(':input[tabindex=\'' + (cb + 1) + '\']') != null) {
               $(':input[tabindex=\'' + (cb + 1) + '\']').focus();
               $(':input[tabindex=\'' + (cb + 1) + '\']').select();
               e.preventDefault();
    
               return false;
           }
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
  $qinfo=runsql("select * from descargas where id_descarga = '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="txtid_lote";

?><form id="form1" name="form1" method="post" action="mnt_descargas.php" autocomplete="off" onsubmit="return validar();">
  <table width="990" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="images/bg_titulo_frm.gif"><div align="left"><img src="images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="images/bg_titulo_frm.gif" class="titulo_frm">Control de Transferencias</td>
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
      <td width="160" class="lbl">Correlativo Nacimiento:</td>
      <td width="700"><input name="txtnacimiento" type="text" class="textbox" id="txtnacimiento" value="<?=$info[nacimiento];?>" size="40" maxlength="100" /></td>
      <td width="178"><div align="center">
        <?if($tipo_trn=="Update"){?>
        <a href="index1.php?op=<?=$op;?>" class="link_texto">Agregar nuevo</a>
        <?}?>
      </div></td>
    </tr>
    <tr>
      <td width="160" class="lbl"><div align="left">Lote:</div></td>
      <td width="700"><?=$info[id_lote];?><select name="id_lote" id="id_lote" class="textbox" >
        <?php llenar_combo("lote",$where="",$orden='id_lote',$campo_valor='id_lote',$campo_descrip='lote',$seleccionar=$info[lote],$codificar=false) ?>
        </select></td>
      
    </tr>
    <tr>
      <td class="lbl">Incubadora:</td>
      <td width="700"><?=$info[id_incubadora];?><select name="id_incubadora" id="id_incubadora" class="textbox" >
        <?php llenar_combo("incubadoras",$where="",$orden='id_incubadora',$campo_valor='id_incubadora',$campo_descrip='nombre',$seleccionar=$info[incubadora],$codificar=false) ?>
        </select></td>
       
      <tr>
      <td class="lbl">Fecha de Transferencia:</td>
      <td colspan="2"><input name="txtfecha_descarga" type="text" class="textbox" id="txtfecha_descarga" value="<?=$info[fecha_descarga];?>" size="70" maxlength="100" /></td>
      </tr>
      <tr>
      <td class="lbl">Hora Transferencia:</td>
      <td colspan="2"><input name="txthora_descarga" type="text" class="textbox" id="txthora_descarga" value="<?=$info[hora_descarga];?>" size="40" maxlength="100" /></td>
    </tr>

    </tr>
    <tr> <td colspan="12" align="center"><p class="lblverde"><strong>CONTROL DE PESO</strong></p></td>
    <tr>
      <td class="lbl">Huevos Pesados:</td>
      <td colspan="2"><input name="txthuevo_pesado" type="text" class="textbox" id="txthuevo_pesado" value="<?=$info[huevo_pesado];?>" size="40" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td class="lbl">Peso Salida grs.:</td>
      <td colspan="2"><input name="txtpeso_salida" type="text" class="textbox" id="txtpeso_salida" value="<?=$info[peso_salida];?>" size="40" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Peso Promedio Salida grs:</td>
      <td colspan="2"><input name="txtpeso_promesa" type="text" class="textbox" id="txtpeso_promesa" value="<?=$info[peso_promesa];?>" size="50" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Perdida de Peso grs.:</td>
      <td colspan="2"><input name="txtpeso_perdida" type="text" class="textbox" id="txtpeso_perdida" value="<?=$info[peso_perdida];?>" size="40" maxlength="100" /></td>
    </tr><tr>
      <td class="lbl">% de Perdida:</td>
      <td colspan="2"><input name="txtporcentaje" type="text" class="textbox" id="txtporcentaje" value="<?=$info[porcentaje];?>" size="40" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr> <td colspan="12" align="center"><p class="lblverde">TRANSFERENCIA</p></td>
    <tr>
      <td class="lbl">Cantidad Transferida:</td>
      <td colspan="2"><input name="txttransfer" type="text" class="textbox" id="txttransfer" value="<?=$info[transfer];?>" size="50" maxlength="100" /></td>
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
        <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Descargas Existentes</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="535" class="lbl"><div align="center"><strong>No. Descarga</strong></div></td>
    <td width="186" class="lbl"><div align="center">Lote</div></td>
    <td width="255" class="lbl"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  $qlista=runsql("select * from descargas order by id_descarga");
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr class="<?=set_row_class($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[id_descarga];?></td>
    <td height="22" class="texto"><?=$ilista[lote];?></td>
    <td><div align="center"><a href="index1.php?<?="op=$op&pk={$ilista[id_descarga]}";?>"><img src="images/ic_editar.gif" alt="Modificar" width="15" height="15" border="0" /></a> &nbsp;&nbsp;&nbsp;
    <a href="javascript:void(0);" onclick="cf_eliminar_usuario('<?=$ilista[id_descarga];?>');"><img src="images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0"/></a></div></td>
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
