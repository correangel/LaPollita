<?
include("../fnc.php");
conectado();
?>
<html>
<head>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<script src="../jsincludes/prototype.js" type="text/javascript"></script>
</head>
<body>
<form action="mnt_edicion_orden.php" method="post" enctype="multipart/form-data" name="form1" id="form1" onSubmit="return validar();" autocomplete="off">
  <table width="385" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="2"><table width="385" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="10"><img src="../images/ic_frm.gif" width="35" height="32" /></td>
          <td width="375" background="../images/bg_titulo_frm.gif" class="titulo_frm">Orden de secciones para publicaci&oacute;n</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td class="lblazul">Secci&oacute;n</td>
      <td class="lblazul">Orden</td>
    </tr>
    <?
    $i=0;
    $qsecciones=runsql("select secciones.* 
                        from secciones inner join orden_ediciones oe ON oe.seccion = secciones.id
                        order by oe.orden");
    $maxc=registros($qsecciones);
    while($iseccion=registro($qsecciones)){
    
    $iorden=registro(runsql("select * from orden_ediciones where fecha = '".$_SESSION["edicion_fecha"]."' and seccion = '{$iseccion[id]}'"));
    
    $i++;
    ?>
    <tr>
      <td class="lblazul"><input name="txtseccion<?=$i;?>" type="hidden" id="txtseccion<?=$i;?>" value="<?=$iseccion[id];?>"><?=$iseccion[seccion];?></td>
      <td width="126" class="lblazul">
      <select name="txtorden<?=$i;?>" class="textbox" id="txtorden<?=$i;?>">
      <option value='0' selected>Seleccione...</option>
      <?
      for($c=1;$c<=$maxc;$c++){
        $sel="";
        if($iorden[orden]==$c){$sel="selected";}
        echo "<option value='$c' $sel>{$c}</option>";
      }
      ?>
      </select>
      </td>
    </tr>
    <?
    }
    ?>
    <tr>
      <td width="259" class="lblazul"><input name="button" type="submit" class="boton1" id="button" value="Guardar">
      <input name="tipo_trn" type="hidden" id="tipo_trn" value="<?=$tipo_trn;?>">
      <input name="max" type="hidden" id="max" value="<?=$i;?>">
      
      <input name="idn" type="hidden" id="idn" value="<?=$idn;?>">
      <input name="idi" type="hidden" id="idi" value="<?=$idi;?>"></td>
    </tr>
  </table>  
</form>
</body>
</html>
