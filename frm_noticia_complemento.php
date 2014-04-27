<?
include("../fnc.php");
conectado();
if(!$cn){$cn=1;}

$tipo_trn="Add";
if($idnc){
  $qnoticia_complemento=runsql("select * from noticias_complementos where id = '$idnc'");
  if(registros($qnoticia_complemento)>0){
    $info=registro($qnoticia_complemento);
    $tipo_trn="Update";
  }
}

$icomplemento=registro( runsql("select * from complementos where id = '$idc'") );
?>
<html>
<head>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<script src="../jsincludes/prototype.js" type="text/javascript"></script>
</head>
<body OnLoad="document.form1.txttexto1.focus();">
<form id="form1" name="form1" method="post" action="mnt_noticia_complemento.php" autocomplete="off" onSubmit="return validar();">
  <table width="385" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="2"><table width="385" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="10"><img src="../images/ic_check.png" width="35" height="32" /></td>
          <td width="375" background="../images/bg_titulo_frm.gif" class="titulo_frm"><div align="left">Informaci&oacute;n para el complemento</div></td>
        </tr>
      </table></td>
    </tr>
    <?
    for($i=1;$i<=$cn;$i++){
    $posicion="texto{$i}";
    ?>
    <tr>
      <td width="278" class="lblazul">Texto Posici&oacute;n <?=$i;?>
        :<br>
      <textarea name="txttexto<?=$i;?>" cols="40" rows="2" class="textbox" id="txttexto<?=$i;?>" ><?=$info[$posicion];?></textarea></td>
      <?if($i==1){?>
      <td width="107" rowspan="<?=($cn+1);?>" align="center" valign="middle" class="lblazul"><?=rd_imagen("../contenido/complementos/",$icomplemento[ilustracion],"100");?></td>
      <?}?>
      
    </tr>
    <?
    }
    ?>
    <tr>
      <td class="lblazul"><input name="button" type="submit" class="boton1" id="button" value="Guardar">
      <input name="tipo_trn" type="hidden" id="tipo_trn" value="<?=$tipo_trn;?>">
      <input name="max" type="hidden" id="max" value="<?=$cn;?>">
      <input name="idc" type="hidden" id="idc" value="<?=$idc;?>">
      <input name="idn" type="hidden" id="idn" value="<?=$idn;?>">
      <input name="idnc" type="hidden" id="idn" value="<?=$idnc;?>">
      </td>
    </tr>
  </table>  
</form>
</body>
</html>
