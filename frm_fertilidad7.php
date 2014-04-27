<script>

$(document).ready(function () {
	$("#txtnacimiento").change(function(evento){	
		valcarga	=	$("#txtnacimiento").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_fertil",id: valcarga},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txtfecha_carga').val(data[0]);
			$('#txtfecha_nacimiento').val(data[1]);
			$('#id_lote').val(data[2]);
			$('#id_incubadora').val(data[3]);
			$('#txtfecha_analisis').focus();

		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#txtcantidad_separador").change(function(evento){	
		valseparadores	=	$("#txtseparadores").val();
		valcantidad 	=	$("#txtcantidad_separador").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_muestra",sep: valseparadores, cant: valcantidad},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txtmuestra').val(data[0]);			
			$('#txtinfertiles').focus();

		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#txtinfertiles").change(function(evento){	
		valinfertiles	=	$("#txtinfertiles").val();
		valmuestra  	=	$("#txtmuestra").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_cfertilidad", val: valinfertiles, mue: valmuestra},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txtinfertiles_p').val(data[0]);			
			$('#txtpreincubados').focus();

		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#txtpreincubados").change(function(evento){	
		valpreincubados	=	$("#txtpreincubados").val();
		valmuestra  	=	$("#txtmuestra").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_cfertilidad", val: valpreincubados, mue: valmuestra},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txtpreincubados_p').val(data[0]);			
			$('#txtdeshidratados').focus();

		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#txtdeshidratados").change(function(evento){	
		valdeshidratados	=	$("#txtdeshidratados").val();
		valmuestra  	=	$("#txtmuestra").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_cfertilidad", val: valdeshidratados, mue: valmuestra},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txtdeshidratados_p').val(data[0]);			
			$('#txttemprana').focus();

		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#txttemprana").change(function(evento){	
		valtemprana	=	$("#txttemprana").val();
		valmuestra  	=	$("#txtmuestra").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_cfertilidad", val: valtemprana, mue: valmuestra},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txttemprana_p').val(data[0]);			
			$('#txtcontaminados').focus();

		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#txtcontaminados").change(function(evento){	
		valcontaminados	=	$("#txtcontaminados").val();
		valmuestra  	=	$("#txtmuestra").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_cfertilidad", val: valcontaminados, mue: valmuestra},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txtcontaminados_p').val(data[0]);			
			$('#txtfertil').focus();

		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#txtfertil").change(function(evento){	
		valfertil	=	$("#txtfertil").val();
		valinfertiles	=	$("#txtinfertiles_p").val();
		valdeshidratados	=	$("#txtdeshidratados_p").val();
		valtemprana	=	$("#txttemprana_p").val();
		valcontaminados	=	$("#txtcontaminados_p").val();
		valmuestra  	=	$("#txtmuestra").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_cfertilidad", val: valfertil, inf: valinfertiles, des: valdeshidratados, tem: valtemprana, con: valcontaminados, mue: valmuestra},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txtfertil_p').val(data[0]);						
			$('#txttotal_fertilidad').val(data[1]);						
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});	
	
	$("#txtfecha_analisis").datepicker();
	
	$("#txtfecha_analisis").change(function(evento){	
		$('#txtseparadores').focus();
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

		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
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
  $qinfo=runsql("select * from fertilidad where id_fertilidad = '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="txtid_lote";

?><form id="form1" name="form1" method="post" action="mnt_fertilidad.php" autocomplete="off" onsubmit="return validar();">
  <table width="990" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="images/bg_titulo_frm.gif"><div align="left"><img src="images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="images/bg_titulo_frm.gif" class="titulo_frm">Control de Fertilidad 7 D&iacute;as</td>
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
      <td class="lbl"> Correlativo Nacimiento:</td>
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
      <td class="lbl">Fecha de Nacimiento:</td>
      <td colspan="2"><input name="txtfecha_nacimiento" type="text" class="textbox" id="txtfecha_nacimiento" value="<? if(isset($info[fecha_nacimiento])) {echo fecha($info[fecha_nacimiento]);} ?>" size="50" maxlength="100" readonly="readonly" /></td> 
    </tr>
    <tr>
      <td class="lbl">Fecha de Análisis:</td>
      <td colspan="2"><input name="txtfecha_analisis" type="text" class="textbox" id="txtfecha_analisis" value="<? if(isset($info[fecha_analisis])) {echo fecha($info[fecha_analisis]);} ?>" size="50" maxlength="100" /></td> 
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
      <td class="lbl">Cantidad de Separadores:</td>
      <td colspan="2"><input name="txtseparadores" type="text" class="textbox" id="txtseparadores" value="<?=$info[separadores];?>" size="50" maxlength="100" /></td>
    </tr>   
    <tr>
      <td width="25%" class="lbl">Huevos por Separador:</td>
      <td width="25%"><input name="txtcantidad_separador" type="text" class="textbox" id="txtcantidad_separador" value="<?=$info[cantidad_separador];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Muestra:</td>
      <td width="25%" colspan="2"><input name="txtmuestra" type="text" class="textbox" id="txtmuestra" value="<?=$info[muestra];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>        
        
    <tr> <td colspan="4" align="center"><p class="lblverde">ANALISIS</p></td></tr>
    <tr>
      <td width="25%" class="lbl">Infertiles:</td>
      <td width="25%"><input name="txtinfertiles" type="text" class="textbox" id="txtinfertiles" value="<?=$info[infertiles];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Infertiles %:</td>
      <td width="25%"><input name="txtinfertiles_p" type="text" class="textbox" id="txtinfertiles_p" value="<?=$info[infertiles_p];?>" size="40" maxlength="100" readonly="readonly" /></td>
      
    </tr>    
    <tr>
      <td width="25%" class="lbl">Preincubados:</td>
      <td width="25%"><input name="txtpreincubados" type="text" class="textbox" id="txtpreincubados" value="<?=$info[preincubados];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Preincubados %:</td>
      <td width="25%"><input name="txtpreincubados_p" type="text" class="textbox" id="txtpreincubados_p" value="<?=$info[preincubados_p];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td width="25%" class="lbl">Deshidatados:</td>
      <td width="25%"><input name="txtdeshidratados" type="text" class="textbox" id="txtdeshidratados" value="<?=$info[deshidratados];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Deshidratados %:</td>
      <td width="25%"><input name="txtdeshidratados_p" type="text" class="textbox" id="txtdeshidratados_p" value="<?=$info[deshidratados_p];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td width="25%" class="lbl">Temprana:</td>
      <td width="25%"><input name="txttemprana" type="text" class="textbox" id="txttemprana" value="<?=$info[temprana];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Temprana %:</td>
      <td width="25%"><input name="txttemprana_p" type="text" class="textbox" id="txttemprana_p" value="<?=$info[temprana_p];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    
    <tr>
      <td width="25%" class="lbl">Contaminados:</td>
      <td width="25%"><input name="txtcontaminados" type="text" class="textbox" id="txtcontaminados" value="<?=$info[contaminados];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Contaminados %:</td>
      <td width="25%"><input name="txtcontaminados_p" type="text" class="textbox" id="txtcontaminados_p" value="<?=$info[contaminados_p];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td width="25%" class="lbl">Fertil:</td>
      <td width="25%"><input name="txtfertil" type="text" class="textbox" id="txtfertil" value="<?=$info[fertil];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Fertil %:</td>
      <td width="25%" ><input name="txtfertil_p" type="text" class="textbox" id="txtfertil_p" value="<?=$info[fertil_p];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td width="25%"></td>
      <td width="25%">&nbsp;</td>
      <td width="25%" class="lbl">Total Fertilidad %:</td>
      <td width="25%" colspan="2"><input name="txttotal_fertilidad" type="text" class="textbox" id="txttotal_fertilidad" value="<?=$info[total_fertilidad];?>" size="50" maxlength="100" readonly="readonly" /></td>
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
  $qlista=runsql("select * from fertilidad order by id_fertilidad");
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr class="<?=set_row_class($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[nacimiento];?></td>
    <td height="22" class="texto"><div align="center"><img src="images/ic_<?if($ilista[activo]==0){echo "no";}?>ok.gif" width="16" height="16" /></div></td>
    <td><div align="center"><a href="index1.php?<?="op=$op&pk={$ilista[id_fertilidad]}";?>"><img src="images/ic_editar.gif" alt="Modificar" width="15" height="15" border="0" /></a> &nbsp;&nbsp;&nbsp;
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
