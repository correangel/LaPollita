<script>

$(document).ready(function () {
	$("#txtnacimiento").change(function(evento){	
		valcarga	=	$("#txtnacimiento").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_hpesado",id: valcarga},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txthuevo_cargado').val(data[0]);
			$('#txtfecha_carga').val(data[1]);
			$('#txtnacimiento').val(data[2]);
			$('#id_lote').val(data[3]);
			$('#id_incubadora').val(data[4]);
			$('#txtfecha_nacimiento').focus();

		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
})

$(document).ready(function () {
	$("#txthuevos_claros").change(function(evento){	
		valclaros	=	$("#txthuevos_claros").val();
		valcargados	=	$("#txthuevo_cargado").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_huevos_claros",claro: valclaros, cargado: valcargados},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txthuevos_clarosp').val(data[0]);
			$('#txthembras_primera').focus();
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
		valcarga	=	$("#txtcarga").val();
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

		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	$("#txtfecha_nacimiento").datepicker();
})

$(document).ready(function () {
	$("#txthembras_primera").change(function(evento){	
		valprimera	=	$("#txthembras_primera").val();
		valcargados	=	$("#txthuevo_cargado").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_hembras_primera",primera: valprimera, cargado: valcargados},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txthembras_primerap').val(data[0]);
			$('#txthembras_mixtas').focus();
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
})
$(document).ready(function () {
	$("#txthembras_mixtas").change(function(evento){	
		valmixtas	=	$("#txthembras_mixtas").val();
		valcargados	=	$("#txthuevo_cargado").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_hembras_mixtas",mixtas: valmixtas, cargado: valcargados},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txthembras_mixtasp').val(data[0]);
			$('#txtmachos_primera').focus();
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
})

$(document).ready(function () {
	$("#txthembras_mixtas").change(function(evento){	
		valprimera	=	$("#txthembras_primera").val();
		valmixtas	=	$("#txthembras_mixtas").val();
		valcargados	=	$("#txthuevo_cargado").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_hembras_total",primera: valprimera, mixtas: valmixtas, cargado: valcargados},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txthembras_total').val(data[0]);
            $('#txthembras_totalp').val(data[1]);
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
})

$(document).ready(function () {
	$("#txtmachos_primera").change(function(evento){	
		valprimera	=	$("#txtmachos_primera").val();
		valcargados	=	$("#txthuevo_cargado").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_machos_primera",primera: valprimera, cargado: valcargados},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txtmachos_primerap').val(data[0]);
			$('#txtmachos_mixtos').focus();
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
})

$(document).ready(function () {
	$("#txtmachos_mixtos").change(function(evento){	
		valprimera	=	$("#txtmachos_primera").val();
		valmixtos	=	$("#txtmachos_mixtos").val();
		valcargados	=	$("#txthuevo_cargado").val();
		valtotalh   =   $("#txthembras_total").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_machos_mixtos",primera: valprimera, mixtas: valmixtos, cargado: valcargados, totalh: valtotalh},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txtmachos_mixtosp').val(data[0]);  
			$('#txttotal_machos').val(data[1]);
            $('#txttotal_machosp').val(data[2]);
			$('#txtnacimiento_total').val(data[3]);
			$('#txtnacimiento_totalp').val(data[4]);
			$('#txthuevos_nonacidos').focus();
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
})

$(document).ready(function () {
	$("#txthuevos_nonacidos").change(function(evento){	
		valnonacidos	=	$("#txthuevos_nonacidos").val();
		valcargados	=	$("#txthuevo_cargado").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_nonacidos",nonacidos: valnonacidos, cargado: valcargados},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txthuevos_nonacidosp').val(data[0]);

		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
})

$(document).ready(function () {
	$("#txtfecha_nacimiento").change(function(evento){	
		valfecha1	=	$("#txtfecha_nacimiento").val();
		valfecha2	=	$("#txtfecha_carga").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_calcula_edad",fecha1: valfecha1, fecha2: valfecha2},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txtedad').val(data[0]);
			$('#txthora_nacimiento').focus();

		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
})

$(document).ready(function () {
	$("#txthora_nacimiento").change(function(evento){	
		$('#txthuevos_claros').focus();
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
  $qinfo=runsql("select * from nacimiento where id_nacimiento = '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="txtid_lote";

?><form id="form1" name="form1" method="post" action="mnt_nacimiento.php" autocomplete="off" onsubmit="return validar();">
  <table width="990" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="images/bg_titulo_frm.gif"><div align="left"><img src="images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="images/bg_titulo_frm.gif" class="titulo_frm">Control de Nacimientos</td>
          </tr>
      </table></td>
    </tr>
    <?
    if($msg){
    ?>
    <tr>
      <td height="22" colspan="4" bgcolor="#FFFFCC" class="lbl">&nbsp;&nbsp;<img src="images/ic_info.gif" width="14" height="13" /> <span class="lblroja"><?=$msg;?></span></td>
    </tr>
    <?
    }
    ?>    
    <tr>
      <td class="lbl">Correlativo Nacimiento. :</td>
      <td colspan="2"><input name="txtnacimiento" type="text" class="textbox" id="txtnacimiento" value="<?=$info[nacimiento];?>" size="40" maxlength="100" /></td>
      <td width="25%" ><div align="center">
        <?if($tipo_trn=="Update"){?>
        <a href="index1.php?op=<?=$op;?>" class="link_texto">Agregar nuevo</a>
        <?}?>
      </div></td>
    </tr>
    <tr>
      <td class="lbl">Fecha de Carga:</td>
      <td colspan="2"><input name="txtfecha_carga" type="text" class="textbox" id="txtfecha_carga" value="<? if(isset($info[fecha_carga])) {echo fecha($info[fecha_carga]);} ?>" size="50" maxlength="100" readonly="readonly" /></td> 
    </tr>
    <tr>
      <td width="25%" class="lbl"><div align="left">Lote:</div></td>
      <td width="25%" colspan="2"><?=$info[id_lote];?><select name="id_lote" id="id_lote" class="textbox" >
        <?php llenar_combo("lote",$where="",$orden='id_lote',$campo_valor='id_lote',$campo_descrip='lote',$seleccionar=$info[lote],$codificar=false) ?>
        </select></td>
      
    </tr> 
     <tr>
     <td class="lbl">Incubadora:</td>
      <td colspan="3"><?=$info[id_incubadora];?><select name="id_incubadora" id="id_incubadora" class="textbox" >
        <?php llenar_combo("incubadoras",$where="",$orden='id_incubadora',$campo_valor='id_incubadora',$campo_descrip='nombre',$seleccionar=$info[incubadora],$codificar=false) ?>
        </select></td>
      
    </tr>
    <tr>
      <td class="lbl">Huevo Cargado:</td>
      <td colspan="2"><input name="txthuevo_cargado" type="text" class="textbox" id="txthuevo_cargado" value="<?=$info[huevo_cargado];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>   
    
    <tr>
      <td class="lbl">Fecha de Nacimiento:</td>
      <td colspan="2"><input name="txtfecha_nacimiento" type="text" class="textbox" id="txtfecha_nacimiento" value="<? if(isset($info[fecha_nacimiento])) {echo fecha($info[fecha_nacimiento]);} ?>" size="70" maxlength="100" /></td>
        
    <tr>
      <td class="lbl">Hora Inicio  Nacimiento:</td>
      <td colspan="2"><input name="txthora_nacimiento" type="text" class="textbox" id="txthora_nacimiento" value="<?=$info[hora_nacimiento];?>" size="50" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Edad:</td>
      <td colspan="2"><input name="txtedad" type="text" class="textbox" id="txtedad" value="<?=$info[edad];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
        
    <tr> <td colspan="4" align="center"><p class="lblverde">CANTIDAD DE AVES NACIDAS POR INCUBADORA</p></td></tr>
    <tr>
      <td width="25%" class="lbl">Huevos Claros:</td>
      <td width="25%"><input name="txthuevos_claros" type="text" class="textbox" id="txthuevos_claros" value="<?=$info[huevos_claros];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Huevos Claros %:</td>
      <td width="25%"><input name="txthuevos_clarosp" type="text" class="textbox" id="txthuevos_clarosp" value="<?=$info[huevos_clarosp];?>" size="40" maxlength="100" readonly="readonly" /></td>
      
    </tr>    
    <tr>
      <td width="25%" class="lbl">Hembras de Primera:</td>
      <td width="25%"><input name="txthembras_primera" type="text" class="textbox" id="txthembras_primera" value="<?=$info[hembras_primera];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Hembras de Primera%:</td>
      <td width="25%"><input name="txthembras_primerap" type="text" class="textbox" id="txthembras_primerap" value="<?=$info[hembras_primerap];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td width="25%" class="lbl">Hembras Mixtas:</td>
      <td width="25%"><input name="txthembras_mixtas" type="text" class="textbox" id="txthembras_mixtas" value="<?=$info[hembras_mixtas];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Hembras Mixtas %:</td>
      <td width="25%"><input name="txthembras_mixtasp" type="text" class="textbox" id="txthembras_mixtasp" value="<?=$info[hembras_mixtasp];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td width="25%" class="lbl">Total de Hembras:</td>
      <td width="25%"><input name="txthembras_total" type="text" class="textbox" id="txthembras_total" value="<?=$info[hembras_total];?>" size="50" maxlength="100" readonly="readonly" /></td>
      <td width="25%" class="lbl">Total de Hembras %:</td>
      <td width="25%"><input name="txthembras_totalp" type="text" class="textbox" id="txthembras_totalp" value="<?=$info[hembras_totalp];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    
    <tr>
      <td width="25%" class="lbl">Machos de Primera:</td>
      <td width="25%"><input name="txtmachos_primera" type="text" class="textbox" id="txtmachos_primera" value="<?=$info[machos_primera];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Machos de Primera %:</td>
      <td width="25%"><input name="txtmachos_primerap" type="text" class="textbox" id="txtmachos_primerap" value="<?=$info[machos_primerap];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td width="25%" class="lbl">Machos Mixtos:</td>
      <td width="25%"><input name="txtmachos_mixtos" type="text" class="textbox" id="txtmachos_mixtos" value="<?=$info[machos_mixtos];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Machos Mixtos %:</td>
      <td width="25%" ><input name="txtmachos_mixtosp" type="text" class="textbox" id="txtmachos_mixtosp" value="<?=$info[machos_mixtosp];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td width="25%" class="lbl">Total de Machos:</td>
      <td width="25%"><input name="txttotal_machos" type="text" class="textbox" id="txttotal_machos" value="<?=$info[machos_total];?>" size="50" maxlength="100" readonly="readonly" /></td>
      <td width="25%" class="lbl">Total de Machos %:</td>
      <td width="25%" colspan="2"><input name="txttotal_machosp" type="text" class="textbox" id="txttotal_machosp" value="<?=$info[machos_totalp];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td width="25%" class="lbl">Nacimiento Total:</td>
      <td width="25%"><input name="txtnacimiento_total" type="text" class="textbox" id="txtnacimiento_total" value="<?=$info[nacimiento_total];?>" size="50" maxlength="100" readonly="readonly" /></td>
      <td width="25%" class="lbl">Nacimiento Total %:</td>
      <td width="25%" ><input name="txtnacimiento_totalp" type="text" class="textbox" id="txtnacimiento_totalp" value="<?=$info[nacimiento_totalp];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td width="25%" class="lbl">Huevos No Nacidos:</td>
      <td width="25%"><input name="txthuevos_nonacidos" type="text" class="textbox" id="txthuevos_nonacidos" value="<?=$info[huevos_nonacidos];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Huevos No Nacidos %:</td>
      <td width="25%" ><input name="txthuevos_nonacidosp" type="text" class="textbox" id="txthuevos_nonacidosp" value="<?=$info[huevos_nonacidosp];?>" size="50" maxlength="100" readonly="readonly" /></td>
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
        <td width="96%" background="images/bg_titulo_frm.gif" class="titulo_frm">Controles Existentes</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="535" class="lbl"><div align="center"><strong>Control de Nacimientos</strong></div></td>
    <td width="186" class="lbl"><div align="center">Lote</div></td>
    <td width="255" class="lbl"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  $qlista=runsql("select * from nacimiento order by id_nacimiento");
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr class="<?=set_row_class($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[apellido];?>,<?=$ilista[nombre];?></td>
    <td height="22" class="texto"><div align="center"><img src="../images/ic_<?if($ilista[activo]==0){echo "no";}?>ok.gif" width="16" height="16" /></div></td>
    <td><div align="center"><a href="index1.php?<?="op=$op&pk={$ilista[id_nacimiento]}";?>"><img src="images/ic_editar.gif" alt="Modificar" width="15" height="15" border="0" /></a> &nbsp;&nbsp;&nbsp;
    <a href="javascript:void(0);" onclick="cf_eliminar_usuario('<?=$ilista[usuario];?>');"><img src="images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0"/></a></div></td>
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
