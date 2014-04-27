<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>La Pollita.com 1.0</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<script src="jsincludes/prototype.js" type="text/javascript"></script>
<style type="text/css">
<!--
body {
	background-color: #DBE0F3;
}
-->
</style></head>
<?php
/* header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header ("Pragma: no-cache");
*/
?> 
<body onload="$('txtusr').focus();">
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="400" valign="top" background="images/bg_login2.jpg"><form id="form1" name="form1" method="post" action="mnt_login.php">
      <table width="223" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="122" colspan="2" class="link_texto">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" class="titulo_frm"><div align="center">Ingreso al sistema</div></td>
        </tr>
        <tr>
          <td width="77" class="titulo_frm">Usuario:</td>
          <td width="223"><input name="txtusr" type="text" id="txtusr" size="20" maxlength="25" /></td>
        </tr>
        <tr>
          <td class="titulo_frm">Clave:</td>
          <td><input name="txtclave" type="password" id="txtclave" size="20" /></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">
              <input name="button" type="submit" class="boton1" id="button" value="Ingresar" />
          </div></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
</body>
</html>
