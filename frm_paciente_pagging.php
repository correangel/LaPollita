<?
include('../mysqlpaginationphp/paginator.class.php');
if(1==2){
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<?
}

$tipo_trn="Add";
if($pk){
  $qinfo=runsql("select * from paciente where id = '$pk'");
  if(registros($qinfo)>0){
    $info=registro($qinfo);
    $tipo_trn="Update";
  }
}
$foco="txtcliente";

?><form id="form1" name="form1" method="post" action="mnt_paciente.php" autocomplete="off" onsubmit="return validar();">
  <table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="4">
      	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_frm.gif" width="35" height="32" /></div></td>
            <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Administraci&oacute;n de Pacientes</td>
          </tr>
      </table></td>
    </tr>
    <?
    if($msg){
    ?>
    <tr>
      <td height="22" colspan="4" bgcolor="#FFFFCC" class="lbl">&nbsp;&nbsp;<img src="../images/ic_info.gif" width="14" height="13" /> <span class="lblroja"><?=$msg;?></span></td>
    </tr>
    <?
    }
    ?>
    <tr>
      <td class="lbl"><div align="left">Nombres:</div></td>
      <td><div align="left"><input name="txtnombres" type="text" class="textbox" id="txtnombres" value="<?=$info[nombres];?>" size="50" maxlength="100" /></div></td>
      <td></td>
      <td><div align="center"><?if($tipo_trn=="Update"){?>
        <a href="index1.php?op=<?=$op;?>" class="link_texto">Agregar nuevo</a>
      <?}?></div></td>
    </tr>
    <tr>
      <td class="lbl">Apellidos:</td>
      <td><input name="txtapellidos" type="text" class="textbox" id="txtapellidos" value="<?=$info[apellidos];?>" size="50" maxlength="100" /></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td class="lbl">Direcci&oacute;n:</td>
      <td ><input name="txtdireccion" type="text" class="textbox" id="txtdireccion" value="<?=$info[direccion];?>" size="70" maxlength="100" /></td>
      <td><span class="lbl">Correo electr&oacute;nico:</span></td>
      <td><input name="txtemail" type="text" class="textbox" id="txtemail" value="<?=$info[email];?>" size="50" maxlength="100" /></td>
    </tr>
        <tr>
      <td class="lbl">Tel. Mobil:</td>
      <td><input name="txttelmobil" type="text" class="textbox" id="txttelmobil" value="<?=$info[telmobil];?>" size="20" maxlength="100" /></td>
      <td><span class="lbl">Tel. Casa:</span></td>
      <td><input name="txttelcasa" type="text" class="textbox" id="txttelcasa" value="<?=$info[telcasa];?>" size="20" maxlength="100" /></td>
    </tr>
        <tr>
      <td class="lbl">Nit:</td>
      <td ><input name="txtnit" type="text" class="textbox" id="txtnit" value="<?=$info[nit];?>" size="40" maxlength="100" /></td>
	<td class="lbl">Fecha Nacimiento:</td>
	<td><input name="txtfnac" type="text" class="textbox" id="txtfnac" value="<?=fechacorta($info[fnac]);?>" size="15" maxlength="100" />
    <script language="JavaScript" type="text/javascript">new tcal ({'formname': 'form1','controlname': 'txtfnac'});</script>
    </td>      
    </tr>
    <tr>
      <td class="lbl">Activo:</td>
      <td ><input name="txtactivo" type="checkbox" id="txtactivo" value="1" <?if($info[activo]==1){echo "checked";}?>/></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td><input name="tipo_trn" type="hidden" id="tipo_trn" value="<?=$tipo_trn;?>" />
      <input name="op" type="hidden" id="op" value="<?=$op;?>" />
      <input name="pk" type="hidden" id="pk" value="<?=$pk;?>" /></td>
      <td ><input name="button" type="submit" class="boton1" id="button" value="Guardar" /></td>
      <td></td>
      <td></td>
    </tr>            
  </table>
</form>
<br />
<table width="990" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#D1DDE7">
  <tr>
    <td colspan="7"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="../images/bg_titulo_frm.gif"><div align="left"><img src="../images/ic_recordatorio.png" width="35" height="32" /></div></td>
        <td width="96%" background="../images/bg_titulo_frm.gif" class="titulo_frm">Pacientes  existentes</td>
      </tr>
    </table></td>
  </tr>
 </table>
<?  
$host = 'localhost';
$user = 'root';
$pwd = '';
$db = 'ozono';
$connection = mysql_connect($host,$user,$pwd) or die("Could not connect");
mysql_select_db($db) or die("Could not select database");

$query = "SELECT COUNT(*) FROM paciente";
$result = mysql_query($query) or die(mysql_error());
$num_rows = mysql_fetch_row($result);

$pages = new Paginator;
$pages->items_total = $num_rows[0];
$pages->mid_range = 9; // Number of pages to display. Must be odd and > 3
$pages->paginate();

echo $pages->display_pages();
echo "<span class=\"\">".$pages->display_jump_menu().$pages->display_items_per_page()."</span>";

$query = "SELECT paciente.id,paciente.nombres,paciente.apellidos,paciente.direccion,paciente.email,paciente.telmobil,paciente.telcasa,paciente.nit
FROM paciente ORDER BY paciente.apellidos ASC $pages->limit";
$result = mysql_query($query) or die(mysql_error());

echo "<table>";
echo "<tr><th>Id</th><th>Nombres</th><th>Apellidos</th><th>Direccion</th><th>Email</th><th>Tel Movil</th><th>Tel Casa</th><th>Nit</th><th>Acciones</th></tr>";
while($row = mysql_fetch_row($result))
{
	echo "<tr onmouseover=\"hilite(this)\" onmouseout=\"lowlite(this)\"><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>";?>
	<div align="center"><a href="index1.php?<?="op=$op&pk={$row[0]}";?>"><img src="../images/ic_editar.gif" alt="Modificar" width="15" height="15" border="0" /></a> &nbsp;&nbsp;&nbsp;
    <a href="javascript:void(0);" onclick="cf_eliminar_paciente('<?=$row[0];?>');"><img src="../images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0"/></a></div>
    <?
	echo "</td></tr>\n";
}
echo "</table>";

echo $pages->display_pages();
echo "<p class=\"paginate\">Page: $pages->current_page of $pages->num_pages</p>\n";
echo "<p class=\"paginate\">SELECT * FROM table $pages->limit (retrieve records $pages->low-$pages->high from table - $pages->items_total item total / $pages->items_per_page items per page)";
?>
<?
if($foco){
echo "<script language=\"javascript\">";
echo "$('{$foco}').focus();";
echo "</script>";
}
?>
