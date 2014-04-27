<?
if(1==2){
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<?
}

$tipo_trn="Add";
if($pk){
  $qinfo=runsql("select * from noticias where id = '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}

if($txtfechaed){
  $_SESSION["edicion_fecha"]=fechabd($txtfechaed);
}

if(!$ac){$ac="Lista";}

?>
<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
          <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Edici&oacute;n 
            <?
            if(isset($_SESSION["edicion_fecha"])){
            ?>
            [ actualmente esta trabajando en la edici&oacute;n del d&iacute;a <?=fecha($_SESSION["edicion_fecha"]);?> ]
          <?
            }
            ?>            </td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td width="222" valign="middle" class="lbl"><form id="form_ed" name="form_ed" method="post" action="mnt_noticia.php" autocomplete="Off">
      <div align="center">Fecha de edici&oacute;n:<br />
          <input name="txtfechaed" type="text" id="txtfechaed" size="10" maxlength="10" value="<?=fecha($_SESSION["edicion_fecha"]);?>"/>
          <script language="JavaScript" type="text/javascript">
          	new tcal ({
          		// form name
          		'formname': 'form_ed',
          		// input name
          		'controlname': 'txtfechaed'
          	});
	          </script>
          <br />
          <input name="button2" type="submit" class="boton1" id="button2" value="Ver edici&oacute;n" />
          <input name="tipo_trn" type="hidden" id="tipo_trn" value="cambio_fecha_edicion" />
      </div>
    </form></td>
    
    <td width="296" valign="middle" class="lbl"><div align="center">
    <?
    if(isset($_SESSION["edicion_fecha"])){
    ?>
    <span class="lbl">Secci&oacute;n:</span><span class="texto"><br />
        <select name="jumpMenu" class="textbox" id="jumpMenu" onchange="MM_jumpMenu('self',this,0)">
          <option value="#" selected>Seleccione una...</option>
          <option value="mnt_noticia.php?<?="op=$op&seccion=Todas&tipo_trn=cambio_seccion";?>" selected>Ver todas...</option>
          <?
          $qseccion=runsql("select * from secciones where activa = 1 order by seccion");
          while($iseccion=registro($qseccion)){
            $sel="";
            if($_SESSION["edicion_seccion"]==$iseccion[id]){$sel="selected";}
            echo "<option value='mnt_noticia.php?op=$op&seccion={$iseccion[id]}&tipo_trn=cambio_seccion' $sel>{$iseccion[seccion]}</option>";
          }
          ?>
        </select>
    </span></div>
    <?}?>
    </td>
    <td width="472" valign="middle" class="lbl">
    <?
    if(isset($_SESSION["edicion_fecha"]) && isset($_SESSION["edicion_seccion"])){
    ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="25%"><div align="center" class="texto">
        <?if($_SESSION["edicion_seccion"]!="Todas"){?>
        <a href="index1.php?<?="op=$op&ac=Add";?>" class="link_texto">
        <?}?>
        <img src="../images/filenew.png" width="32" height="32" border="0" /><br />
          Agregar noticia
          <?if($_SESSION["edicion_seccion"]!="Todas"){?></a><?}?></div></td>
        <td width="25%"><div align="center"><a href="index1.php?<?="op=$op&ac=Lista";?>" class="link_texto"><img src="../images/ic_lista_noticias.png" width="32" height="32" border="0" /><br />
          Listado de noticias</a></div></td>
        <td width="25%"><div align="center"><a href="frm_edicion_orden.php?idn=<?=$pk;?>&nocache=<?=str_replace(" ","",str_replace(":","",str_replace("-","",$fechahora)));?>" class="link_texto"  OnClick="return  hs.htmlExpand(this, { objectType: 'iframe'} )"><img src="../images/ic_orden_secciones.png" width="32" height="32" border="0" /><br />
          Ordenar secciones</a></div></td>
        <td width="25%">&nbsp;</td>
      </tr>
    </table>
    <?
    }
    ?>
    </td>
  </tr>
</table>
<br />
<?if($ac=="Add" || $ac=="Update"){?>
<table width="989" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="765" valign="top">
    <form id="form1" name="form1" method="post" action="mnt_noticia.php" autocomplete="off">
      <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="4%" background="../images/bg_titulo_frm.gif"><img src="../images/ic_nota.gif" width="35" height="32" /></td>
          <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Noticia</td>
        </tr>
        <tr>
          <td colspan="2"><table width="100%" border="0" cellspacing="2" cellpadding="2">
            <?if($msg){?>
            <tr>
              <td colspan="2" bgcolor="#FFFFCC" class="lbl">&nbsp;&nbsp;<img src="../images/ic_info.gif" width="14" height="13" /> <span class="lblroja">
                <?=$msg;?>
              </span></td>
            </tr>
            <?}?>
            <tr>
              <td class="lbl">Categor&iacute;a:</td>
              <td>
              <select name="txtcategoria" class="textbox" id="txtcategoria">
              <option value="" selected>Seleccione una...</option>
              <?
              $qcategoria=runsql("select * from categorias where seccion = '".$_SESSION["edicion_seccion"]."' order by categoria ");
              while($icategoria=registro($qcategoria)){
                echo "<option value='{$icategoria[id]}'>{$icategoria[categoria]}</option>";
              }
              ?>
              </select>              </td>
            </tr>
            <tr>
              <td class="lbl">Autor:</td>
              <td>
              <select name="txtautor" class="textbox" id="txtautor">
              <option value="0" selected>Seleccione uno...</option>
              <?
              $qautor=runsql("select * from autores where activo = 1");
              while($iautor=registro($qautor)){
                $sel="";
                if($info[autor]==$iautor[id]){
                  $sel="selected";
                }
                echo "<option value='{$iautor[id]}' $sel>{$iautor[nombre]}</option>";
              }
              ?>
              </select>
              </td>
            </tr>
            <tr>
              <td width="18%" class="lbl">Titular portada:</td>
              <td width="82%"><input name="txttitular_portada" type="text" class="textbox" id="txttitular_portada" style="width:98%" value="<?=$info[titulo_portada];?>" size="70" /></td>
            </tr>
            <tr>
              <td class="lbl">Titular noticia:</td>
              <td><input name="txttitular_noticia" type="text" class="textbox" id="txttitular_noticia" style="width:98%" value="<?=$info[titulo_noticia];?>" size="70" /></td>
            </tr>
            <tr>
              <td class="lbl">Contenido:</td>
              <td><textarea name="txtcontenido" cols="75" rows="15" class="textbox" id="txtcontenido" style="width:100%"><?=$info[contenido];?></textarea></td>
            </tr>
            <tr>
              <td class="lbl">Publicar:</td>
              <td><input name="txtpublicar" type="checkbox" id="txtpublicar" value="1" <?if($info[publicar]==1) echo "checked"; ?>/></td>
            </tr>
            <tr>
              <td class="lbl">&nbsp;</td>
              <td><input name="button" type="submit" class="boton1" id="button" value="Guardar noticia" />
                <input name="tipo_trn" type="hidden" id="tipo_trn" value="<?=$tipo_trn;?>" />
                <input name="ac" type="hidden" id="ac" value="<?=$ac;?>" />
                <input name="pk" type="hidden" id="pk" value="<?=$pk;?>" /></td>
            </tr>
          </table></td>
        </tr>
      </table>
    </form>
    </td>
    <td width="28" valign="top">&nbsp;</td>
    <td width="196" valign="top">      <?
    if($pk){
    ?>
      <table width="98%" border="0" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <td width="19%" background="../images/bg_titulo_frm.gif"><img src="../images/ic_check.png" width="35" height="32" /></td>
        <td width="81%" background="../images/bg_titulo_frm.gif" class="titulo_frm"><div align="left">Complementos</div></td>
      </tr>
      <tr>
        <td colspan="2" bgcolor="#ECE9D8">
          <table width="100%" border="0" cellspacing="2" cellpadding="2">
          <?
          $qcomplemento=runsql("select * from complementos where activo = 1 order by complemento");
          while($icomplemento=registro($qcomplemento)){
          ?>
          <tr>
            <td width="6%"><img src="../images/ic_agregar.gif" width="15" height="15" /></td>
            <td width="94%">
            
            <a href="frm_noticia_complemento.php?cn=<?=$icomplemento[cantidad_texto];?>&idn=<?=$pk;?>&idc=<?=$icomplemento[id];?>&nocache=<?=str_replace(" ","",str_replace(":","",str_replace("-","",$fechahora)));?>" class="link_texto"  OnClick="return  hs.htmlExpand(this, { objectType: 'iframe'} )"><?=$icomplemento[complemento];?></a></td>
          </tr>
          <?
          }
          ?>
        </table></td>
      </tr>
    </table>
      <br />
      <br />
      <br />
      <br />
    <?
    }
    ?></td>
  </tr>
</table>
<br />
<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="50%" valign="top"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#7599B7">
      <tr>
        <td height="32" colspan="3" class="titulo_frm"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm_autok.gif" width="35" height="32" /></div></td>
              <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Listado de complementos asociados a la noticia<a name="cn" id="cn"></a></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td width="172" height="25" class="lbl"><div align="center">Tipo</div></td>
        <td width="720" class="lbl"><div align="center">Contenido(s)</div></td>
        <td width="98" class="lbl"><div align="center">Acciones</div></td>
      </tr>
      <?
  $qnoticia_complemento=runsql("select nc.*, c.complemento as dcomplemento, c.cantidad_texto
                                from noticias_complementos nc inner join complementos c ON c.id = nc.complemento
                                where noticia = '$pk' order by id");
  while($inoticia_complemento=registro($qnoticia_complemento)){
  ?>
      <tr bgcolor="<?=color_fila(++$cnt_nc);?>">
        <td class="texto"><div align="center">
          <?=$inoticia_complemento[dcomplemento];?>
        </div></td>
        <td class="texto"><div align="justify">
            <?
    if(!empty($inoticia_complemento[texto1])){
      echo "Posici&oacute;n 1: ".$inoticia_complemento[texto1];
    }
    ?>
            <?
    if(!empty($inoticia_complemento[texto2])){
      echo "<br>Posici&oacute;n 2: ".$inoticia_complemento[texto2];
    }
    ?>
            <?
    if(!empty($inoticia_complemento[texto3])){
      echo "<br>Posici&oacute;n 3: ".$inoticia_complemento[texto3];
    }
    ?>
            <?
    if(!empty($inoticia_complemento[texto4])){
      echo "<br>Posici&oacute;n 4: ".$inoticia_complemento[texto4];
    }
    ?>
        </div></td>
        <td class="texto"><div align="center"><a href="frm_noticia_complemento.php?cn=<?=$inoticia_complemento[cantidad_texto]."&idn=$pk&idc={$inoticia_complemento[complemento]}&idnc={$inoticia_complemento[id]}&nocache=$fechahora";?>" onclick="return  hs.htmlExpand(this, { objectType: 'iframe'} )" ><img src="../images/ic_editar.gif" width="15" height="15" border="0" /></a> &nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick="cf_eliminar_complemento('<?=$inoticia_complemento[id];?>');"><img src="../images/ic_delete.gif" width="15" height="15" border="0" /></a></div></td>
      </tr>
      <?
  }
  ?>
    </table></td>
    <td valign="top"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="100%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_foto.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Im&aacute;genes asociadas</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="30"><a href="frm_noticia_imagen.php?idn=<?=$pk;?>&nocache=<?=str_replace(" ","",str_replace(":","",str_replace("-","",$fechahora)));?>" class="link_texto"  OnClick="return  hs.htmlExpand(this, { objectType: 'iframe'} )"><img src="../images/ic_agregar.gif" width="15" height="15" border="0" /> Agregar fotograf&iacute;a</a></td>
      </tr>
      <tr>
        <td>
        <table width="490" border="0" cellpadding="2" cellspacing="1" bgcolor="#7599B7">
          <tr>
            <td width="202" class="lbl"><div align="center">Im&aacute;gen</div></td>
            <td width="217" class="lbl"><div align="center">Texto al pie</div></td>
            <td width="55" class="lbl">Acciones</td>
          </tr>
          <?
          $qimagenes=runsql("select * from noticias_imagenes where noticia = '$pk' order by id");
          while($imagen=registro($qimagenes)){
          ?>
          <tr bgcolor="<?=color_fila(++$cnt);?>">
            <td class="texto"><?=rd_imagen("../contenido/img_noticias/",$imagen[path],200,"border=0");?></td>
            <td class="texto"><?=$imagen[pie];?></td>
            <td class="texto"><div align="center"><a href="frm_noticia_imagen.php?noimg=1&<?="idn=$pk&idi={$imagen[id]}";?>&nocache=<?=str_replace(" ","",str_replace(":","",str_replace("-","",$fechahora)));?>" class="link_texto"  OnClick="return  hs.htmlExpand(this, { objectType: 'iframe'} )""><img src="../images/ic_editar.gif" width="15" height="15" border="0" /></a> &nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick="cf_eliminar_imagen('<?=$imagen[id];?>');"><img src="../images/ic_delete.gif" width="15" height="15" border="0" /></a></div></td>
          </tr>
          <?
          }
          ?>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<?
}
?>
<br />
<?if($ac=="Lista"){?>
<table width="990" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#9CB6CC">
  <tr>
    <td colspan="7"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_recordatorio.png" width="35" height="32" /></div></td>
        <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Listado de noticias  
          <?
            if(isset($_SESSION["edicion_fecha"]) && $_SESSION["edicion_seccion"]!="Todas"){
            ?>
          [ actualmente esta trabajando en la edici&oacute;n del d&iacute;a <?=fecha($_SESSION["edicion_fecha"]);?> - Secci&oacute;n: <?=get_seccion($_SESSION["edicion_seccion"]);?>]
          <?
            }elseif(isset($_SESSION["edicion_fecha"]) && $_SESSION["edicion_seccion"]=="Todas"){
            ?>
          [ actualmente esta trabajando en la edici&oacute;n del d&iacute;a <?=fecha($_SESSION["edicion_fecha"]);?> - Todas las secciones ]
          <?
            }
            ?>        </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="199" bgcolor="#9CB6CC" class="lbl"><div align="center">Titular portada</div></td>
    <td width="129" bgcolor="#9CB6CC" class="lbl"><div align="center">Titular noticia</div></td>
    <td width="156" bgcolor="#9CB6CC" class="lbl"><div align="center">Contenido</div></td>
    <td width="105" bgcolor="#9CB6CC" class="lbl"><div align="center">Secci&oacute;n</div></td>
    <td width="208" bgcolor="#9CB6CC" class="lbl"><div align="center">Otros</div></td>
    <td width="104" bgcolor="#9CB6CC" class="lbl"><div align="center">Orden / Publicaci&oacute;n</div></td>
    <td width="81" bgcolor="#9CB6CC" class="lbl"><div align="center">Acciones</div></td>
  </tr>
  <?
  $where_seccion="";
  $order_by=" seccion, orden ";
  if($_SESSION["edicion_seccion"]!="Todas"){
    $where_seccion=" and seccion = '".$_SESSION["edicion_seccion"]."' ";
    $order_by=" orden ";
  }
  $qnoticias=runsql("select * from noticias where fecha = '".$_SESSION["edicion_fecha"]."' $where_seccion order by $order_by ");
  $numero_noticias=registros($qnoticias);
  while($inoticia=registro($qnoticias)){
  if($inoticia[publicar]==1){
    $publicar="00";
  }else{
    $publicar="1";
  }
  ?>
  <tr bgcolor="<?=color_fila(++$cnt);?>">
    <td height="21" class="texto"><?=$inoticia[titulo_portada];?></td>
    <td class="texto"><?=$inoticia[titulo_noticia];?></td>
    <td class="texto"><?=substr($inoticia[contenido],0,255);?><?if(strlen($inoticia[contenido])>255){echo " ...";}?></td>
    <td class="texto"><div align="center"><?=get_seccion($inoticia[seccion]);?></div></td>
    <td class="texto"><div align="center"><?if($inoticia[resaltada]==1){?><span class="lblroja">Resaltada</span><?}else{?><a href="mnt_noticia.php?tipo_trn=Resaltada&idn=<?=$inoticia[id];?>" class="link_texto">Establecer como resaltada</a><?}?></div></td>
    <td class="lbl">
      <div align="center">
        <select name="jumpMenu2" class="textbox" id="jumpMenu2" onchange="MM_jumpMenu('parent',this,0)">
        <option value="#" selected>Seleccione...</option>
          <?
          for($o=1;$o<=$numero_noticias;$o++){
          $sel="";
          if($inoticia[orden] == $o){
            $sel="selected";
          }
          ?>
          <option value="mnt_noticia.php?tipo_trn=CambioOrden&<?="pk=$pk&ac=$ac&idn={$inoticia[id]}&norden={$o}";?>" <?=$sel;?>><?=$o;?></option>
          <?
          }
          ?>
        </select>
        <br />
        Publicar: <a href="mnt_noticia.php?tipo_trn=Publicar&idn=<?=$inoticia[id]."&p=$publicar";?>"><img src="../images/ic_<?if($inoticia[publicar]=="0"){echo "no";}?>ok.gif" width="16" height="16" border="0" /></a> </div>    </td>
    <td class="lbl"><div align="center"><a href="index1.php?<?="op=$op&ac=Update&pk={$inoticia[id]}";?>"><img src="../images/ic_editar.gif" width="15" height="15" border="0" /></a> &nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" OnClick="cf_eliminar_noticia('<?=$inoticia[id];?>');"><img src="../images/ic_delete.gif" width="15" height="15" border="0" /></a></div></td>
  </tr>
  <?
  }
  ?>
</table>
<?}?>
