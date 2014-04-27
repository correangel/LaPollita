<script>

//Campo Fecha
$(document).ready(function(){
   
   $("#txtfecha").datepicker();
   
   $("#txtfecha").change(function(evento){	
		$('#txtm_hembras').focus();
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
  $qinfo=runsql("select * from granja where id_granja = '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="txtm_hembras";

?><form id="form1" name="form1" method="post" action="mnt_granja.php" autocomplete="off" onsubmit="return validar();">
  <table width="990" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="images/bg_titulo_frm.gif"><div align="left"><img src="images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="images/bg_titulo_frm.gif" class="titulo_frm">Control Diario de Granja</td>
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
      <td class="lbl">Fecha:</td>
      <td colspan="2"><input name="txtfecha" type="text" class="textbox" id="txtfecha" value="<? if(isset($info[fecha])) {echo fecha($info[fecha]);}?>" size="20" maxlength="100" /></td>
      </tr>
      <tr>
      <td class="lbl">Mortalidad Hembras:</td>
      <td colspan="2"><input name="txtm_hembras" type="text" class="textbox" id="txtm_hembras" value="<?=$info[m_hembras];?>" size="20" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Mortalidad Machos:</td>
      <td colspan="2"><input name="txtm_machos" type="text" class="textbox" id="txtm_machos" value="<?=$info[m_machos];?>" size="20" maxlength="100" /></td>
    </tr>
    <!--<tr> <td colspan="12" align="center"><p class="lblverde"><strong>CONTROL DE PESO</strong></p></td> -->
    <tr>
      <td class="lbl">% de Fertilidad:</td>
      <td colspan="2"><input name="txtfertilidad" type="text" class="textbox" id="txtfertilidad" value="<?=$info[fertilidad];?>" size="20" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Producción:</td>
      <td colspan="2"><input name="txtproduccion" type="text" class="textbox" id="txtproduccion" value="<?=$info[produccion];?>" size="20" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Rechazo:</td>
      <td colspan="2"><input name="txtrechazo" type="text" class="textbox" id="txtrechazo" value="<?=$info[rechazo];?>" size="20" maxlength="100" /></td>
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
        <td width="96%" background="images/bg_titulo_frm.gif" class="titulo_frm">Controles Existentes</td>
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
  $qlista=runsql("select * from granja order by id_granja");
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr class="<?=set_row_class($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[lote];?></td>
    <td height="22" class="texto"><div align="center"><img src="images/ic_<?if($ilista[activo]==0){echo "no";}?>ok.gif" width="16" height="16" /></div></td>
    <td><div align="center"><a href="index1.php?<?="op=$op&pk={$ilista[id_granja]}";?>"><img src="images/ic_editar.gif" alt="Modificar" width="15" height="15" border="0" /></a> &nbsp;&nbsp;&nbsp;
    <a href="javascript:void(0);" onclick="cf_eliminar_granja('<?=$ilista[id_granja];?>');"><img src="images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0"/></a></div></td>
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
