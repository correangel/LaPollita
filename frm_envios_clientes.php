<script>

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
  $qinfo=runsql("select * from humedad where usuario = '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="txtid_lote";

?><form id="form1" name="form1" method="post" action="mnt_ingresos.php" autocomplete="off" onsubmit="return validar();">
  <table width="990" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="images/bg_titulo_frm.gif"><div align="left"><img src="images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="images/bg_titulo_frm.gif" class="titulo_frm">Control de Envío a Clientes</td>
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
      <td width="160" class="lbl"><div align="left">No. Envío:</div></td>
      <td colspan="2"><input name="txthuevos_pesados" type="text" class="textbox" id="txthuevos_pesados" value="<?=$info[huevos_pesados];?>" size="40" maxlength="100" /></td>
      <td width="178"><div align="center">
        <?if($tipo_trn=="Update"){?>
        <a href="index1.php?op=<?=$op;?>" class="link_texto">Agregar nuevo</a>
        <?}?>
      </div></td>
    </tr>
    <tr>
      <td class="lbl">Lote:</td>
      <td width="700"><?=$info[id_lote];?><select name="id_lote" id="id_lote" class="textbox" >
        <?php llenar_combo("lote",$where="",$orden='id_lote',$campo_valor='id_lote',$campo_descrip='lote',$seleccionar=$info[lote],$codificar=false) ?>
        </select></td>
    </tr>
    
    <tr>
      <td class="lbl">Fecha de Nacimiento:</td>
      <td colspan="2"><input name="txtfecha_carga" type="text" class="textbox" id="txtfecha_carga" value="<?=$info[fecha_carga];?>" size="70" maxlength="100" /></td>
      </tr>
      
   
    <tr>
      <td class="lbl">Cantidad:</td>
      <td colspan="2"><input name="txtpeso_entrada" type="text" class="textbox" id="txtpeso_entrada" value="<?=$info[peso_entrada];?>" size="40" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">+ 2%:</td>
      <td colspan="2"><input name="txtpeso_prome" type="text" class="textbox" id="txtpeso_prome" value="<?=$info[peso_prome];?>" size="50" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Total:</td>
      <td colspan="2"><input name="txtpeso_prome" type="text" class="textbox" id="txtpeso_prome" value="<?=$info[peso_prome];?>" size="50" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Genero:</td>
      <td colspan="2"><input name="txtpeso_prome" type="text" class="textbox" id="txtpeso_prome" value="<?=$info[peso_prome];?>" size="50" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Descripci&oacute;n de Ave:</td>
      <td colspan="2"><input name="txtpeso_prome" type="text" class="textbox" id="txtpeso_prome" value="<?=$info[peso_prome];?>" size="50" maxlength="100" /></td>
    </tr>
    <tr> <td colspan="4" align="center"><p class="lblverde">MATERIAL UTILIZADO</p></td></tr>
    <tr>
      <td width="25%" class="lbl">Vacunas:</td>
      <td width="25%"><input name="txtvacunas" type="text" class="textbox" id="txtvacunas" value="<?=$info[vacunas];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Antibiotico:</td>
      <td width="25%"><input name="txtantibiotico" type="text" class="textbox" id="txtantibiotico" value="<?=$info[antibiotico];?>" size="40" maxlength="100" /></td>      
    </tr>   
    </tr>    
    <tr>
      <td width="25%" class="lbl">Canastas Amarillas:</td>
      <td width="25%"><input name="txtcanasta_a" type="text" class="textbox" id="txtcanasta_a" value="<?=$info[canasta_a];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Canastas Verdes:</td>
      <td width="25%"><input name="txtcanasta_v" type="text" class="textbox" id="txtcanastav" value="<?=$info[canasta_v];?>" size="40" maxlength="100" /></td>      
    </tr>    
    </tr>    
    <tr>
      <td width="25%" class="lbl">Canastas Azules:</td>
      <td width="25%"><input name="txtcanasta_az" type="text" class="textbox" id="txtcanasta_az" value="<?=$info[canasta_az];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Canastas Blancas:</td>
      <td width="25%"><input name="txtcanasta_b" type="text" class="textbox" id="txtcanasta_b" value="<?=$info[canasta_b];?>" size="40" maxlength="100" /></td>      
    </tr>     
    <tr>
      <td width="25%" class="lbl">Canastas Anaranjadas:</td>
      <td width="25%"><input name="txtcanasta_an" type="text" class="textbox" id="txtcanasta_an" value="<?=$info[canasta_an];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Canastas Celestes:</td>
      <td width="25%"><input name="txtcanasta_c" type="text" class="textbox" id="txtcanasta_c" value="<?=$info[canasta_c];?>" size="40" maxlength="100" /></td>      
    </tr>     
    <tr>
      <td width="25%" class="lbl">Canastas Grises:</td>
      <td width="25%"><input name="txtcanasta_g" type="text" class="textbox" id="txtcanasta_g" value="<?=$info[canasta_g];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Canastas Rosadas:</td>
      <td width="25%"><input name="txtcanasta_r" type="text" class="textbox" id="txtcanasta_r" value="<?=$info[canasta_r];?>" size="40" maxlength="100" /></td>      
    </tr>     
    <tr>
      <td width="25%" class="lbl">Cajas de Cartón Usadas:</td>
      <td width="25%"><input name="txtcarton_usa" type="text" class="textbox" id="txtcarton_usa" value="<?=$info[carton_usa];?>" size="50" maxlength="100" /></td>
      <td width="25%" class="lbl">Cajas de Cartón Nuevas:</td>
      <td width="25%"><input name="txtcarton_nue" type="text" class="textbox" id="txtcarton_nue" value="<?=$info[carton_nue];?>" size="40" maxlength="100" /></td>      
    </tr>        
    <tr>
      <td class="lbl">Lugar de Entrega:</td>
      <td colspan="2"><input name="txtpeso_prome" type="text" class="textbox" id="txtpeso_prome" value="<?=$info[peso_prome];?>" size="50" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Transporte:</td>
      <td colspan="2"><input name="txtpeso_prome" type="text" class="textbox" id="txtpeso_prome" value="<?=$info[peso_prome];?>" size="50" maxlength="100" /></td>
    </tr>
    <tr>
      <td class="lbl">Piloto:</td>
      <td colspan="2"><input name="txtpeso_prome" type="text" class="textbox" id="txtpeso_prome" value="<?=$info[peso_prome];?>" size="50" maxlength="100" /></td>
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
    <td width="535" class="lbl"><div align="center"><strong>Lote</strong></div></td>
    <td width="186" class="lbl"><div align="center">Activo</div></td>
    <td width="255" class="lbl"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
  <?
  $cnt_lista=0;
  $qlista=runsql("select * from nacimiento order by id_nacimiento");
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>
  <tr class="<?=set_row_class($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[id_lote];?></td>
    <td height="22" class="texto"><div align="center"><img src="../images/ic_<?if($ilista[activo]==0){echo "no";}?>ok.gif" width="16" height="16" /></div></td>
    <td><div align="center"><a href="index1.php?<?="op=$op&pk={$ilista[usuario]}";?>"><img src="../images/ic_editar.gif" alt="Modificar" width="15" height="15" border="0" /></a> &nbsp;&nbsp;&nbsp;
    <a href="javascript:void(0);" onclick="cf_eliminar_usuario('<?=$ilista[usuario];?>');"><img src="../images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0"/></a></div></td>
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
