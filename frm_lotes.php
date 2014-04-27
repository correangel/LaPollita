<script>

$(document).ready(function () {
	
	//Campo Variedad					
	$("#id_variedad").change(function(evento){	
		$('#txtcorrelativo').focus();
	});	
	
	//Campo Correlativo
	$("#txtcorrelativo").change(function(evento){	
		valraza		=	$("#id_raza option:selected").text();
		valvariedad	=	$("#id_variedad option:selected").text();
		valcorre	=   $("#txtcorrelativo").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_lote",raz: valraza, var: valvariedad, cor: valcorre},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txtlote').val(data[0]);
			$('#txtfecha_nacimiento').focus();
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	//Campo Fecha Nacimiento
	$("#txtfecha_nacimiento").datepicker();	
	
	//Campo Fecha Ingreso
	$("#txtfecha_ingreso").datepicker();
	
	$("#txtfecha_ingreso").change(function(evento){	
		$('#id_finca').focus();
	});
	
	//Campo Fecha Postura
	$("#txtfecha_postura").datepicker();
	
	$("#txtfecha_postura").change(function(evento){	
		$('#txtsector').focus();
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
  $qinfo=runsql("select * from lote where id_lote = '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="txtraza";

?><form id="form1" name="form1" method="post" action="mnt_lotes.php" autocomplete="off" onsubmit="return validar();">
  <table width="990" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="images/bg_titulo_frm.gif"><div align="left"><img src="images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="images/bg_titulo_frm.gif" class="titulo_frm">Control de Lotes</td>
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
      <td width="160" class="lbl"><div align="left">Raza:</div></td>
      <td colspan="2"><?=$info[id_raza];?><select name="id_raza" id="id_raza" class="textbox" >
        <?php llenar_combo("razas",$where="",$orden='id_raza',$campo_valor='id_raza',$campo_descrip='nombre',$seleccionar=$info[raza],$codificar=false) ?>
        </select></td>
      <td width="178"><div align="center">
        <?if($tipo_trn=="Update"){?>
        <a href="index1.php?op=<?=$op;?>" class="link_texto">Agregar nuevo</a>
        <?}?>
      </div></td>
    </tr>
    <tr>
      <td class="lbl">Variedad:</td>
      <td colspan="2"><?=$info[id_variedad];?><select name="id_variedad" id="id_variedad" class="textbox" >
        <?php llenar_combo("variedad",$where="",$orden='id_variedad',$campo_valor='id_variedad',$campo_descrip='nombre',$seleccionar=$info[variedad],$codificar=false) ?>
        </select></td>
    </tr>
    <tr>
      <td class="lbl">correlativo:</td>
      <td colspan="2"><input name="txtcorrelativo" type="text" class="textbox" id="txtcorrelativo" value="<?=$info[correlativo];?>" size="20" maxlength="100" /></td>
    </tr>
    <?$nomlote = $txtraza + " " + $txtvariedad + " " + $txtcorrelativo ?>
    
    <tr>
      <td width="160" class="lbl"><div align="left">Lote:</div></td>
      <td colspan="2"><input name="txtlote" type="text" class="textbox" id="txtlote" value="<?=$info[lote];?>" size="50" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td class="lbl">Fecha de Nacimiento:</td>
      <td colspan="2"><input name="txtfecha_nacimiento" type="text" class="textbox" id="txtfecha_nacimiento" value="<? if(isset($info[fecha_nacimiento])) {echo fecha($info[fecha_nacimiento]);}?>" size="20" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Fecha de Ingreso:</td>
      <td colspan="2"><input name="txtfecha_ingreso" type="text" class="textbox" id="txtfecha_ingreso" value="<? if(isset($info[fecha_ingreso])) {echo fecha($info[fecha_ingreso]);}?>" size="20" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Finca:</td>
      <td colspan="2"><?=$info[id_finca];?><select name="id_finca" id="id_finca" class="textbox" >
        <?php llenar_combo("fincas",$where="",$orden='id_finca',$campo_valor='id_finca',$campo_descrip='nombre',$seleccionar=$info[finca],$codificar=false) ?>
        </select></td>
    </tr>
    <tr>
      <td class="lbl">Fecha Inicio Postura:</td>
      <td colspan="2"><input name="txtfecha_postura" type="text" class="textbox" id="txtfecha_postura" value="<? if(isset($info[fecha_postura])) {echo fecha($info[fecha_postura]);}?>" size="20" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Sector:</td>
      <td colspan="2"><input name="txtsector" type="text" class="textbox" id="txtsector" value="<?=$info[sector];?>" size="20" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Galera:</td>
      <td colspan="2"><input name="txtgalera" type="text" class="textbox" id="txtgalera" value="<?=$info[galera];?>" size="20" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">No. de Hembras:</td>
      <td colspan="2"><input name="txthembras" type="text" class="textbox" id="txthembras" value="<?=$info[hembras];?>" size="20" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">No. de Machos:</td>
      <td colspan="2"><input name="txtmachos" type="text" class="textbox" id="txtmachos" value="<?=$info[machos];?>" size="20" maxlength="100" /></td>
    </tr>
    <tr> <td colspan="12" align="center"><p class="lblverde"><strong>SELECCION</strong></p></td>
    <tr>
      <td class="lbl">No. Selección de Machos:</td>
      <td colspan="2"><input name="txtsel_machos" type="text" class="textbox" id="txtsel_machos" value="<?=$info[sel_machos];?>" size="20" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">No. Selección de Hembras:</td>
      <td colspan="2"><input name="txtsel_hembras" type="text" class="textbox" id="txtsel_hembras" value="<?=$info[sel_hembras];?>" size="20" maxlength="100" /></td>
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
        <td width="96%" background="images/bg_titulo_frm.gif" class="titulo_frm">Lotes Existentes</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="535" class="lbl"><div align="center"><strong>Lote</strong></div></td>
    <td width="186" class="lbl"><div align="center">Activo</div></td>
    <td width="255" class="lbl"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  $qlista=runsql("select * from lote order by id_lote");
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr class="<?=set_row_class($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[lote];?></td>
    <td height="22" class="texto"><div align="center"><img src="images/ic_<?if($ilista[activo]==0){echo "no";}?>ok.gif" width="16" height="16" /></div></td>
    <td><div align="center"><a href="index1.php?<?="op=$op&pk={$ilista[id_lote]}";?>"><img src="images/ic_editar.gif" alt="Modificar" width="15" height="15" border="0" /></a> &nbsp;&nbsp;&nbsp;
    <a href="javascript:void(0);" onclick="cf_eliminar_lote('<?=$ilista[id_lote];?>');"><img src="images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0"/></a></div></td>
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
