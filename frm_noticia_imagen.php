<?
include("../fnc.php");
conectado();
if(!$cn){$cn=1;}

$tipo_trn="Add";
if($idi){
  $qnoticia_imagen=runsql("select * from noticias_imagenes where id = '$idi'");
  if(registros($qnoticia_imagen)>0){
    $info=registro($qnoticia_imagen);
    $tipo_trn="Update";
  }
}
?>
<html>
<head>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<script src="../jsincludes/prototype.js" type="text/javascript"></script>
<script type="text/javascript">
   function validar(){
     var formulario = document.form1;
     
     objeto = formulario.txtimagen;
     if(objeto.value==""){
       alert("Seleccione una imagen a cargar");
       objeto.focus();
       return(false);
     }
     
     return (true);
   }
  </script>
</head>
<body>
<form action="mnt_noticia_imagen.php" method="post" enctype="multipart/form-data" name="form1" id="form1" onSubmit="return validar();" autocomplete="off">
  <table width="385" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="2"><table width="385" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="10"><img src="../images/ic_foto.gif" width="35" height="32" /></td>
          <td width="375" background="../images/bg_titulo_frm.gif" class="titulo_frm">Carga de im&aacute;genes a la noticia</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      
      <td colspan="2" class="lblazul">
      <?
      if($noimg!=1){
      ?>
      Seleccione la im&aacute;gen a cargar:<br>
      <input name="txtimagen" type="file" class="textbox" id="txtimagen" size="40">
      <?
      }
      ?>       
      <br>
      Texto pie de im&aacute;gen:<br>
      <textarea name="txtpie" cols="45" rows="3" class="textbox" id="txtpie"><?=$info[pie];?></textarea></td>
      <?if($i==1){?>
      <?}?>
    </tr>
    <tr>
      <td width="278" class="lblazul"><input name="button" type="submit" class="boton1" id="button" value="Guardar">
      <input name="tipo_trn" type="hidden" id="tipo_trn" value="<?=$tipo_trn;?>">
      <input name="max" type="hidden" id="max" value="<?=$cn;?>">
      <input name="idn" type="hidden" id="idn" value="<?=$idn;?>">
      <input name="idi" type="hidden" id="idi" value="<?=$idi;?>"></td>
    </tr>
  </table>  
</form>
</body>
</html>
