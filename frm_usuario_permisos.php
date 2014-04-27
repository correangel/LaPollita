<?
include_once("fnc.php");
conectado();

if(1==2){
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<?
}

$tipo_trn="Add";
if($idu){
  $id_u=dec($idu);
  $info=registro(runsql("select * from usuarios where usuario = '$id_u'"));
  $tipo_trn="Update";
}
?>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF"><form id="form1" name="form1" method="post" action="mnt_usuario.php" onsubmit="return validar();" autocomplete="Off">
      <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="700" class="lbl_roja"><span class="lbl">Seleccione un usuario: </span>
            <select name="jumpMenu2" class="textbox" id="jumpMenu2" onchange="MM_jumpMenu('self',this,0)">
              <option value="#">Seleccione uno...</option>
              <?
            $qest=runsql("select * from usuarios order by nombre");
            while($iest=registro($qest)){
              $sel="";
              if(dec($idu) == $iest[usuario]){
                $sel="selected";
              }
              echo "<option value='index1.php?op=$op&idu=".enc($iest[usuario])."' $sel>{$iest[nombre]} | Usuario: {$iest[usuario]}</option>";
            }
            ?>
            </select>
            <input name="button3" type="submit" class="boton1" id="button3" value="Continuar" /></td>
        </tr>
        <?if($msg){?>
        <tr>
          <td bgcolor="#FFFFCC" class="lblroja">&nbsp;<img src="../images/ic_info.gif" width="14" height="13" />             <?=$msg;?></td>
        </tr>
      <?}?>
      </table>
        </form>
    </td>
  </tr>
  <?
  if($idu){
  ?>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><form id="form3" name="form3" method="post" action="mnt_menu_permisos.php">
      <div align="center">
        <table width="750" border="0" cellspacing="1" cellpadding="1">
          <?
                            $i=0;
                            //$id_u=dec($usuario);
                            $qcategorias=mysql_query("select * from me_categorias where tipo_menu = 'ME' order by orden");
                            while($icat=mysql_fetch_array($qcategorias)){
                            $j++;
                            ?>
          <tr>
            <td colspan="3" ><div align="left">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="5%" background="../images/bg_titulo_frm.gif"><img src="../images/ic_nota.gif" width="35" height="32" /></td>
                    <td width="74%" background="../images/bg_titulo_frm.gif"><strong class="titulo_frm">
                      <?=$icat[categoria];?>
                    </strong></td>
                    <td width="21%" background="../images/bg_titulo_frm.gif"><div align="right"><strong class="titulo_formulario">
                        <input name="Submit22" type="submit" class="boton1" value="Guardar privilegios" />
                    </strong></div></td>
                  </tr>
                </table>
            </div></td>
          </tr>
          <?
                            $qop=mysql_query("select * from me_opciones where categoria = '{$icat[id]}' order by orden");
                            
                            while($iop=mysql_fetch_array($qop)){
                            $i++;
                            
                            $qpermiso=mysql_query("select * from me_permisos where usuario = '$id_u' and opcion = {$iop[id]}");
                            if(mysql_num_rows($qpermiso)==1){
                             $checked="checked";
                            }else{
                             $checked="";
                            }
                            ?>
          <tr>
            <td width="4%" ><input type="hidden" name="chk<?=$i;?>" value="<?=$iop[id];?>" />
                <input type="checkbox" name="op<?=$i;?>" value="S" <?=$checked;?> /></td>
            <td colspan="2"  class="font_blue_11"><div align="left" class="texto" onclick="chequear(op<?=$i;?>);"><strong>
              <?=$iop[opcion];?>
            </strong></div></td>
          </tr>
          <?
                              }//fin de las opciones
                              ?>
          <?
                            }//fin de las categorias
                            ?>
          <?
                            //$i=0;
                            //$id_us=dec($usuario);
                            $qcategorias=mysql_query("select * from me_categorias where tipo_menu = 'MR' order by orden");
                            while($icat=mysql_fetch_array($qcategorias)){
                            $j++;
                            ?>
          <?
                            $qop=mysql_query("select * from me_opciones where categoria = '{$icat[id]}'");
                            
                            while($iop=mysql_fetch_array($qop)){
                            $i++;
                            
                            $qpermiso=mysql_query("select * from me_permisos where usuario = '$id_u' and opcion = {$iop[id]}");
                            if(mysql_num_rows($qpermiso)==1){
                             $checked="checked";
                            }else{
                             $checked="";
                            }
                            ?>
          <?
                              }//fin de las opciones
                              ?>
          <?
                            }//fin de las categorias
                            ?>
          <tr>
            <td colspan="3" background="../images/tema/bg_frm_campos.png" ><div align="center">
                <input name="Submit" type="submit" class="boton1" value="Guardar privilegios" />
                <input name="tipo_trn" type="hidden" id="tipo_trn" value="PermisO" />
                <input name="idu" type="hidden" id="idu" value="<?=$idu;?>" />
                <input name="totalp" type="hidden" id="totalp" value="<?=$i;?>" />
            </div></td>
          </tr>
        </table>
      </div>
    </form>
    </td>
  </tr>
  <?}?>
</table>
