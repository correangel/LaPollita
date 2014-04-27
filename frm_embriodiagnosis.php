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
			$('#txtedad').val(data[4]);
			$('#txtfecha_analisis').focus();

		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});	
	
	$("#txtinfertiles").change(function(evento){	
		valinfertiles	=	$("#txtinfertiles").val();
		valexaminados  	=	$("#txtexaminados").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_cfertilidad", val: valinfertiles, mue: valexaminados},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txtinfertiles_p').val(data[0]);			
			$('#txtnosangre').focus();

		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#txtnosangre").change(function(evento){	
		valnosangre	=	$("#txtnosangre").val();
		valmuestra  	=	$("#txtexaminados").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_cfertilidad", val: valnosangre, mue: valmuestra},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txtnosangre_p').val(data[0]);			
			$('#txtsangre').focus();

		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#txtsangre").change(function(evento){	
		valsangre   	=	$("#txtsangre").val();
		valnosangre     =   $("#txtnosangre").val();
		valnosangre_p   =   $("#txtnosangre_p").val();		
		valmuestra  	=	$("#txtexaminados").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_cfertilidad", val: valsangre, val2: valnosangre, val3: valnosangre_p, mue: valmuestra},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txtsangre_p').val(data[0]);			
			$('#txttemprana').val(data[2]);			
			$('#txttemprana_p').val(data[3]);			
			$('#txtdias').focus();

		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#txtdias").change(function(evento){	
		valdias	=	$("#txtdias").val();
		valmuestra  	=	$("#txtexaminados").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_cfertilidad", val: valdias, mue: valmuestra},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txtdias_p').val(data[0]);			
			$('#txtplumas').focus();

		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#txtplumas").change(function(evento){	
		valplumas   	=	$("#txtplumas").val();
		valdias     =   $("#txtdias").val();
		valdias_p   =   $("#txtdias_p").val();		
		valmuestra  	=	$("#txtexaminados").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_cfertilidad", val: valplumas, val2: valdias, val3: valdias_p, mue: valmuestra},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txtplumas_p').val(data[0]);			
			$('#txtmedia').val(data[2]);			
			$('#txtmedia_p').val(data[3]);			
			$('#txtyema').focus();

		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#txtyema").change(function(evento){	
		valyema	=	$("#txtyema").val();
		valmuestra  	=	$("#txtexaminados").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_cfertilidad", val: valyema, mue: valmuestra},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txtyema_p').val(data[0]);			
			$('#txtpicot').focus();

		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#txtpicot").change(function(evento){	
		valpicot   	=	$("#txtpicot").val();
		valyema     =   $("#txtyema").val();
		valyema_p   =   $("#txtyema_p").val();		
		valmuestra  	=	$("#txtexaminados").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_cfertilidad", val: valpicot, val2: valyema, val3: valyema_p, mue: valmuestra},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txtpicot_p').val(data[0]);			
			$('#txttardia').val(data[2]);			
			$('#txttardia_p').val(data[3]);			
			$('#txteclosionados').focus();
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#txteclosionados").change(function(evento){	
		valeclosionados	=	$("#txteclosionados").val();
		valmuestra  	=	$("#txtexaminados").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_cfertilidad", val: valeclosionados, mue: valmuestra},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txteclosionados_p').val(data[0]);			
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
		valmuestra  	=	$("#txtexaminados").val();
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
			$('#txtmalforma').focus();
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#txtmalforma").change(function(evento){	
		valmalforma	=	$("#txtmalforma").val();
		valmuestra  	=	$("#txtexaminados").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_cfertilidad", val: valmalforma, mue: valmuestra},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txtmalforma_p').val(data[0]);			
			$('#txtposesionados').focus();
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#txtposesionados").change(function(evento){	
		valposesionados	=	$("#txtposesionados").val();
		valmuestra  	=	$("#txtexaminados").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_cfertilidad", val: valposesionados, mue: valmuestra},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txtposesionados_p').val(data[0]);			
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
		valmuestra  	=	$("#txtexaminados").val();
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
			$('#txtbacterias').focus();
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#txtbacterias").change(function(evento){	
		valbacterias	=	$("#txtbacterias").val();
		valmuestra  	=	$("#txtexaminados").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_cfertilidad", val: valbacterias, mue: valmuestra},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txtbacterias_p').val(data[0]);			
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
		valmuestra  	=	$("#txtexaminados").val();
		valinfertiles	=	$("#txtinfertiles").val();
		valinfertiles_p	=	$("#txtinfertiles_p").val();
		valtemprana	=	$("#txttemprana").val();
		valtemprana_p	=	$("#txttemprana_p").val();
		valmedia	=	$("#txtmedia").val();
		valmedia_p	=	$("#txtmedia_p").val();
		valtardia	=	$("#txttardia").val();
		valtardia_p	=	$("#txttardia_p").val();
		valeclosionados	=	$("#txteclosionados").val();
		valeclosionados_p	=	$("#txteclosionados_p").val();
		valcontaminados	=	$("#txtcontaminados").val();
		valcontaminados_p	=	$("#txtcontaminados_p").val();
		valmalforma	=	$("#txtmalforma").val();
		valmalforma_p	=	$("#txtmalforma_p").val();
		valposesionados	=	$("#txtposesionados").val();
		valposesionados_p	=	$("#txtposesionados_p").val();
		valdeshidratados	=	$("#txtdeshidratados").val();
		valdeshidratados_p	=	$("#txtdeshidratados_p").val();
		valbacterias	=	$("#txtbacterias").val();
		valbacterias_p	=	$("#txtbacterias_p").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_cfertilidad", val:  valpreincubados,  mue: valmuestra,
		  											val1: valinfertiles,    val2: valinfertiles_p,
													val3: valtemprana,      val4: valtemprana_p,	
													val5: valmedia, 		val6: valmedia_p,
													val7: valtardia,		val8: valtardia_p,
													val9: valeclosionados,	val10: valeclosionados_p,
													val11: valcontaminados,	val12: valcontaminados_p,
													val13: valmalforma,		val14: valmalforma_p,
													val15: valposesionados,	val16: valposesionados_p,
													val17: valdeshidratados,val18: valdeshidratados_p,
													val19: valbacterias,	val20: valbacterias_p  },
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txtpreincubados_p').val(data[0]);
			$('#txttotal').val(data[4]);
			$('#txtaproximacion_p').val(data[5]);
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#txtbacterias").change(function(evento){	
		valfertil	=	$("#txtfertil").val();
		
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
		$('#txtincubados').focus();
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
  $qinfo=runsql("select * from cargas where usuario = '$pk'");
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
            <td width="96%" background="images/bg_titulo_frm.gif" class="titulo_frm">Control de Embriodiagnosis</td>
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
      <td width="25%" class="lbl">Fecha de Carga:</td>
      <td width="25%"><input name="txtfecha_carga" type="text" class="textbox" id="txtfecha_carga" value="<? if(isset($info[fecha_carga])) {echo fecha($info[fecha_carga]);} ?>" size="50" maxlength="100" readonly="readonly" /></td> 
      <td width="25%" class="lbl">Fecha de Análisis:</td>
      <td width="25%"><input name="txtfecha_analisis" type="text" class="textbox" id="txtfecha_analisis" value="<? if(isset($info[fecha_analisis])) {echo fecha($info[fecha_analisis]);} ?>" size="50" maxlength="100" /></td> 
    </tr>
    <tr>
      <td class="lbl">Fecha de Nacimiento:</td>
      <td width="25%"><input name="txtfecha_nacimiento" type="text" class="textbox" id="txtfecha_nacimiento" value="<? if(isset($info[fecha_nacimiento])) {echo fecha($info[fecha_nacimiento]);} ?>" size="50" maxlength="100" readonly="readonly" /></td>     
      <td width="25%" class="lbl">Edad:</td>
      <td width="25%"><input name="txtedad" type="text" class="textbox" id="txtedad" value="<?=$info[edad];?>" size="50" maxlength="100" readonly="readonly" /></td>
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
      <td width="25%" class="lbl">Cantidad de Huevos Incubados:</td>
      <td width="25%"><input name="txtincubados" type="text" class="textbox" id="txtincubados" value="<?=$info[incubados];?>" size="50" maxlength="100" /></td>   
      <td width="25%" class="lbl">Cantidad de Huevos Examinados:</td>
      <td width="25%"><input name="txtexaminados" type="text" class="textbox" id="txtexaminados" value="<?=$info[examinados];?>" size="50" maxlength="100" /></td>      
    </tr>        
        
    <tr> <td colspan="4" align="center"><p class="lblverde">ANALISIS</p></td></tr>
    <tr>
      <td width="25%" class="lbl">Infertiles:</td>
      <td width="25%"><input name="txtinfertiles" type="text" class="textbox" id="txtinfertiles" value="<?=$info[infertiles];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Infertiles %:</td>
      <td width="25%"><input name="txtinfertiles_p" type="text" class="textbox" id="txtinfertiles_p" value="<?=$info[infertiles_p];?>" size="40" maxlength="100" readonly="readonly" /></td>
      
    </tr>    
    <tr>
      <td width="25%" class="lbl">0 - 5 Días (No Sangre):</td>
      <td width="25%"><input name="txtnosangre" type="text" class="textbox" id="txtnosangre" value="<?=$info[nosangre];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">0 - 5 Días (No Sangre) %:</td>
      <td width="25%"><input name="txtnosangre_p" type="text" class="textbox" id="txtnosangre_p" value="<?=$info[nosangre_p];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td width="25%" class="lbl">1 - 5 Días (Sangre):</td>
      <td width="25%"><input name="txtsangre" type="text" class="textbox" id="txtsangre" value="<?=$info[sangre];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">1 - 5 Días (Sangre) %:</td>
      <td width="25%"><input name="txtsangre_p" type="text" class="textbox" id="txtsangre_p" value="<?=$info[sangre_p];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td width="25%" class="lbl">Mortalidad Temprana:</td>
      <td width="25%"><input name="txttemprana" type="text" class="textbox" id="txttemprana" value="<?=$info[temprana];?>" size="50" maxlength="100" readonly="readonly" /></td>
      <td width="25%" class="lbl">Mortalidad Temprana %:</td>
      <td width="25%"><input name="txttemprana_p" type="text" class="textbox" id="txttemprana_p" value="<?=$info[temprana_p];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td width="25%" class="lbl">5 - 10 Días:</td>
      <td width="25%"><input name="txtdias" type="text" class="textbox" id="txtdias" value="<?=$info[dias];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">5 - 10 Días: %:</td>
      <td width="25%"><input name="txtdias_p" type="text" class="textbox" id="txtdias_p" value="<?=$info[dias_p];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td width="25%" class="lbl">11 - 17 Días (Con Plumas):</td>
      <td width="25%"><input name="txtplumas" type="text" class="textbox" id="txtplumas" value="<?=$info[plumas];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">11 - 17 Días (Con Plumas): %:</td>
      <td width="25%"><input name="txtplumas_p" type="text" class="textbox" id="txtplumas_p" value="<?=$info[plumas_p];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td width="25%" class="lbl">Mortalidad Media:</td>
      <td width="25%"><input name="txtmedia" type="text" class="textbox" id="txtmedia" value="<?=$info[media];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Mortalidad Media %:</td>
      <td width="25%"><input name="txtmedia_p" type="text" class="textbox" id="txtmedia_p" value="<?=$info[media_p];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td width="25%" class="lbl">18 - 19 Días (Con Yema):</td>
      <td width="25%"><input name="txtyema" type="text" class="textbox" id="txtyema" value="<?=$info[yema];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">18 - 19 Días (Con Yema): %:</td>
      <td width="25%"><input name="txtyema_p" type="text" class="textbox" id="txtyema_p" value="<?=$info[yema_p];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td width="25%" class="lbl">20 - 21 Días (H Picot):</td>
      <td width="25%"><input name="txtpicot" type="text" class="textbox" id="txtpicot" value="<?=$info[picot];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">20 - 21 Días (H Picot): %:</td>
      <td width="25%"><input name="txtpicot_p" type="text" class="textbox" id="txtpicot_p" value="<?=$info[picot_p];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td width="25%" class="lbl">Mortalidad Tardía:</td>
      <td width="25%"><input name="txttardia" type="text" class="textbox" id="txttardia" value="<?=$info[tardia];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Mortalidad Tardía %:</td>
      <td width="25%"><input name="txttardia_p" type="text" class="textbox" id="txttardia_p" value="<?=$info[tardia_p];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td width="25%" class="lbl">No Eclosionados:</td>
      <td width="25%"><input name="txteclosionados" type="text" class="textbox" id="txteclosionados" value="<?=$info[eclosionados];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">No Eclosionados %:</td>
      <td width="25%"><input name="eclosionados_p" type="text" class="textbox" id="txteclosionados_p" value="<?=$info[eclosionados_p];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td width="25%" class="lbl">Contaminados:</td>
      <td width="25%"><input name="txtcontaminados" type="text" class="textbox" id="txtcontaminados" value="<?=$info[contaminados];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Contaminados %:</td>
      <td width="25%"><input name="contaminados_p" type="text" class="textbox" id="txtcontaminados_p" value="<?=$info[contaminados_p];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td width="25%" class="lbl">Mal Formados:</td>
      <td width="25%"><input name="txtmalforma" type="text" class="textbox" id="txtmalforma" value="<?=$info[malforma];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Mal Formados %:</td>
      <td width="25%" ><input name="txtmalforma_p" type="text" class="textbox" id="txtmalforma_p" value="<?=$info[malforma_p];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td width="25%" class="lbl">Mal Posecionados:</td>
      <td width="25%"><input name="txtposesionados" type="text" class="textbox" id="txtposesionados" value="<?=$info[posesionados];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Mal Posecionados %:</td>
      <td width="25%"><input name="posesionados_p" type="text" class="textbox" id="txtposesionados_p" value="<?=$info[posesionados_p];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td width="25%" class="lbl">Deshidratados:</td>
      <td width="25%"><input name="txtdeshidratados" type="text" class="textbox" id="txtdeshidratados" value="<?=$info[deshidratados];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Deshidratados %:</td>
      <td width="25%"><input name="deshidratados_p" type="text" class="textbox" id="txtdeshidratados_p" value="<?=$info[deshidratados_p];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td width="25%" class="lbl">Bacterias u Hongos:</td>
      <td width="25%"><input name="txtbacterias" type="text" class="textbox" id="txtbacterias" value="<?=$info[bacterias];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Bacterias u Hongos %:</td>
      <td width="25%"><input name="bacterias_p" type="text" class="textbox" id="txtbacterias_p" value="<?=$info[bacterias_p];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td width="25%" class="lbl">Preincubación:</td>
      <td width="25%"><input name="txtpreincubados" type="text" class="textbox" id="txtpreincubados" value="<?=$info[preincubados];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Preincubación %:</td>
      <td width="25%"><input name="preincubados_p" type="text" class="textbox" id="txtpreincubados_p" value="<?=$info[preincubados_p];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td width="25%" class="lbl">Total:</td>
      <td width="25%"><input name="txttotal" type="text" class="textbox" id="txttotal" value="<?=$info[total];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Aproximación Nacimiento Total:</td>
      <td width="25%"><input name="aproximacion_p" type="text" class="textbox" id="txtaproximacion_p" value="<?=$info[aproximacion_p];?>" size="50" maxlength="100" readonly="readonly" /></td>
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
    <td><div align="center"><a href="index1.php?<?="op=$op&pk={$ilista[usuario]}";?>"><img src="images/ic_editar.gif" alt="Modificar" width="15" height="15" border="0" /></a> &nbsp;&nbsp;&nbsp;
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
