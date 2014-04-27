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
<body onload="$('txtusr').focus();">
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="400" valign="top" background="images/bg_login2.jpg">
    <form id="form1" name="form1" method="post" action="mnt_login.php">
      <table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="122" colspan="2" class="link_texto">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" ><div align="center"><span class="titulo_frm">Ingreso al sistema</span></div></td>
        </tr>
        <tr>
          <td width="59" class="titulo_frm"><span class="texto"><strong>Usuario:</strong></span></td>
          <td width="141">            <span class="texto">
            <input name="txtusr" type="text" id="txtusr" size="20" maxlength="25" />          
            </span></td>
        </tr>
        <tr>
          <td class="titulo_frm"><span class="texto"><strong>Clave:</strong></span></td>
          <td>            <span class="texto">
            <input name="txtclave" type="password" id="txtclave" size="20" />
          </span></td>
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
