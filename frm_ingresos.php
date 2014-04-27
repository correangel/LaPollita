<script>

$(document).ready(function(){
						   
   // Campo Lote
   $("#id_lote").change(function(evento){	
		$('#txtfecha').focus();
	});
	
   // Campo Fecha
   $("#txtfecha").datepicker();
   $("#txtfecha").change(function(evento){	
		$('#txtrecibido').focus();
	});				   
   
   // Campo Saldo Inicial
   $("#txtrecibido").change(function(evento){					
		vallote 	=   $("#id_lote").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_saldo_inicial",lot: vallote},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txtsaldoi').val(data[0]);
			$('#txtingreso').focus();
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});

   // Campo Cantidad Ingresada
   $("#txtingreso").change(function(evento){	
		$('#txt49grs').focus();
	});
   
   // Campo Rechazo Granja
   $("#txtgranja").change(function(evento){	
		val49grs	=	$("#txt49grs").val();
		val69grs  	=	$("#txt69grs").val();
		valroto 	=	$("#txtroto").val();
		valfisurado	=	$("#txtfisurado").val();
		valyema 	=	$("#txtyema").val();
		valfragil	=	$("#txtfragil").val();
		valporoso	=	$("#txtporoso").val();
		valdesecho	=	$("#txtdesecho").val();
		valsucio	=	$("#txtsucio").val();
		valdefo 	=	$("#txtdefo").val();
		valgranja   =	$("#txtgranja").val();
		valsaldoi   =   $("#txtsaldoi").val();
		valingreso  =   $("#txtingreso").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_crechazada", val:  val49grs,          val2: val69grs,		  											
													val3: valroto,      	val4: valfisurado,	
													val5: valyema, 			val6: valfragil,
													val7: valporoso,		val8: valdesecho,
													val9: valsucio,     	val10: valdefo,
													val11: valgranja,       val12: valsaldoi,       val13: valingreso },													
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txtrechazo').val(data[0]);
			$('#txtrechazo2').val(data[0]);
			$('#txtsaldof').val(data[1]);
			$('#txtpollita').focus();
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
  $qinfo=runsql("select * from ingresos where correlativo = '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="txtusuario";

?><form id="form1" name="form1" method="post" action="mnt_ingresos.php" autocomplete="off" onsubmit="return validar();">
  <table width="990" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td colspan="3"><table width="990" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="40" background="images/bg_titulo_frm.gif"><div align="left"><img src="images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="950" background="images/bg_titulo_frm.gif" class="titulo_frm">Administraci&oacute;n de Ingresos</td>
          </tr>
      </table></td>
    </tr>
     </tr>            

  </table>
   <table width="990" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
    <?
    if($msg){
    ?></tr>
    <tr>
      <td height="22" colspan="3" bgcolor="#FFFFCC" class="lbl">&nbsp;&nbsp;<img src="images/ic_info.gif" width="14" height="13" /> <span class="lblroja"><?=$msg;?></span></td>
    </tr>
    <?
    }
    ?>
    <tr>
      <td width="82" class="lbl"><div align="left">Lote:</div></td>
      <td width="700"><?=$info[id_lote];?><select name="id_lote" id="id_lote" class="textbox" >
        <?php llenar_combo("lote",$where="",$orden='id_lote',$campo_valor='id_lote',$campo_descrip='lote',$seleccionar=$info[lote],$codificar=false) ?>
        </select></td>
      <td width="82" class="lbl" ><div align="left">Fecha:</div></td>
      <td width="83"><div align="left">
        <input name="txtfecha" type="text" class="textbox" id="txtfecha" value="<? if(isset($info[fecha])) {echo fecha($info[fecha]);}?>" size="15" maxlength="100" />
      </div></td>
      <td class="lbl">Recibido Por</td>
      <td ><input name="txtrecibido" type="text" class="textbox" id="txtrecibido" value="<?=$info[recibido];?>" size="15" maxlength="40" /></td>
      <td width="178"><div align="center">
        <?if($tipo_trn=="Update"){?>
        <a href="index1.php?op=<?=$op;?>" class="link_texto">Agregar nuevo</a>
        <?}?>
      </div></td>
    </tr>
    
    <tr> <td colspan="12" align="center"><p class="lblverde"><strong>DETALLE DE INGRESO</strong></p></td> 
    </tr>  
    <tr>
      <td class="lbl">Saldo Inicial</td>
      <td ><input name="txtsaldoi" type="text" class="textbox" id="txtsaldoi" value="<?=$info[saldo_inicial];?>" size="15" maxlength="15" readonly="readonly" /></td>
      <td class="lbl">Cantidad Ingresada:</td>
      <td ><input name="txtingreso" type="text" class="textbox" id="txtingreso" value="<?=$info[cantidad_ingresada];?>" size="15" maxlength="15" /></td>
      <td class="lbl">Cantidad Rechazada:</td>
      <td ><input name="txtrechazo" type="text" class="textbox" id="txtrechazo" value="<?=$info[cantidad_rechazada];?>" size="15" maxlength="15" readonly="readonly" /></td>
      <td class="lbl">Saldo Final</td>
      <td ><input name="txtsaldof" type="text" class="textbox" id="txtsaldof" value="<?=$info[saldo_final];?>" size="15" maxlength="15" readonly="readonly" /></td>
      
  </tr>
      <tr> <td colspan="12" align="center"><p class="lblverde"><strong>DETALLE RECHAZOS</strong></p></td> 
    <tr>
      <td class="lbl">- 49 grs.:</td>
      <td ><input name="txt49grs" type="text" class="textbox" id="txt49grs" value="<?=$info[peso_inf49];?>" size="15" maxlength="15" /></td>
      <td class="lbl">+ 69 grs.:</td>
      <td ><input name="txt69grs" type="text" class="textbox" id="txt69grs" value="<?=$info[peso_sup69];?>" size="15" maxlength="15" /></td>
      <td class="lbl">Roto:</td>
      <td ><input name="txtroto" type="text" class="textbox" id="txtroto" value="<?=$info[roto];?>" size="15" maxlength="15" /></td>
      <td class="lbl">Fisurado:</td>
      <td ><input name="txtfisurado" type="text" class="textbox" id="txtfisurado" value="<?=$info[fisurado];?>" size="15" maxlength="15" /></td>
      <td class="lbl">Yema:</td>
      <td ><input name="txtyema" type="text" class="textbox" id="txtyema" value="<?=$info[yema];?>" size="15" maxlength="15" /></td>
      <td class="lbl">Fragil:</td>
      <td ><input name="txtfragil" type="text" class="textbox" id="txtfragil" value="<?=$info[fragil];?>" size="15" maxlength="15" /></td>
      
      
    </tr>
    <tr>
      <td class="lbl">Poroso:</td>
      <td ><input name="txtporoso" type="text" class="textbox" id="txtporoso" value="<?=$info[poroso];?>" size="15" maxlength="15" /></td>
      <td class="lbl">Desecho:</td>
      <td ><input name="txtdesecho" type="text" class="textbox" id="txtdesecho" value="<?=$info[desecho];?>" size="15" maxlength="15" /></td>
      <td class="lbl">Sucio:</td>
      <td ><input name="txtsucio" type="text" class="textbox" id="txtsucio" value="<?=$info[sucio];?>" size="15" maxlength="15" /></td>
      <td class="lbl">Defo:</td>
      <td ><input name="txtdefo" type="text" class="textbox" id="txtdefo" value="<?=$info[defo];?>" size="15" maxlength="15" /></td>
      <td class="lbl">Rechazo Granja:</td>
      <td ><input name="txtgranja" type="text" class="textbox" id="txtgranja" value="<?=$info[granja];?>" size="15" maxlength="15" /></td>
      <td class="lbl">Total Rechazo:</td>
      <td ><input name="txtrechazo2" type="text" class="textbox" id="txtrechazo2" value="<?=$info[rechazo];?>" size="15" maxlength="15" /></td>
      </tr>
      <tr> <td colspan="12" align="center"><p class="lblverde"><strong>DETALLE ENVIO A INCUBADORAS</strong></p></td> 
    <tr>
      <td class="lbl">La Pollita</td>
      <td ><input name="txtpollita" type="text" class="textbox" id="txtpollita" value="<?=$info[c_pollita];?>" size="15" maxlength="15" /></td>
      <td class="lbl">CORPASA:</td>
      <td ><input name="txtcorpasa" type="text" class="textbox" id="txtcorpasa" value="<?=$info[c_corpasa];?>" size="15" maxlength="15" /></td>
      <td class="lbl">GUASA:</td>
      <td ><input name="txtemmasa" type="text" class="textbox" id="txtemmasa" value="<?=$info[c_emmasa];?>" size="15" maxlength="15" /></td>
    </tr>
        
    <tr>
      <td><input name="tipo_trn" type="hidden" id="tipo_trn" value="<?=$tipo_trn;?>" />
      <input name="op" type="hidden" id="op" value="<?=$op;?>" />
      <input name="pk" type="hidden" id="pk" value="<?=$pk;?>" /></td>
      <td ><input name="button" type="submit" class="boton1" id="button" value="Guardar" /></td>
   </tr>
</form>
<br />
<table width="980" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#D1DDE7">
  <tr>
    <td colspan="3"><table width="980" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="38" background="images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_recordatorio.png" width="35" height="32" /></div></td>
        <td width="938" background="images/bg_titulo_frm.gif" class="titulo_frm">Listado de Ingresos</td>
      </tr>
    </table></td>
  </tr>
  </table>
  <table width="980" border="0" align="center" cellspacing="0" cellpadding="1">
  <tr>
    <td width="240" class="lbl"><div align="center"><strong>Correlativo</strong></div></td>
    <td width="280" class="lbl"><div align="center">Lote</div></td>
    <td width="240" class="lbl"><div align="center">Fecha</div></td>
    <td width="240" class="lbl"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  $qlista=runsql("select * from ingresos order by correlativo");
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr class="<?=set_row_class($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[correlativo];?></td>
    <td height="22" class="texto"><div align="center"><?=$ilista[lote];?></div></td>
    <td height="22" class="texto"><div align="center"><?=$ilista[fecha];?></div></td>
    <td><div align="center"><a href="index1.php?<?="op=$op&pk={$ilista[correlativo]}";?>"><img src="images/ic_editar.gif" alt="Modificar" width="15" height="15" border="0" /></a> &nbsp;&nbsp;&nbsp;
    <a href="javascript:void(0);" onclick="cf_eliminar_ingreso('<?=$ilista[correlativo];?>');"><img src="images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0"/></a></div></td>
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
