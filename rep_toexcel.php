<?
include("../fnc.php");
include("fnc_js.php");
conectado();
if($sql!=''){
//echo $sql;exit();
	$qinfo=runsql($sql);
  	if(registros($qinfo)<1){
      	echo "NO HAY REGISTROS PARA EXPORTAR.";
		exit();
  }
 }else{
echo "NO HAY QUERY .";
exit();
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>JQuery Excel</title>
<script type="text/javascript" src="../jsincludes/jquery-1.3.2.min.js"></script>
<script language="javascript">
$(document).ready(function() {
	$(".botonExcel").click(function(event) {
		$("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
		$("#FormularioExportacion").submit();
		window.close();
});
});
</script>
<style type="text/css">
.botonExcel{cursor:pointer;}
</style>
</head>
<body>
<form action="ficheroExcel.php" method="post" target="_blank" id="FormularioExportacion">
<p>Exportar a Excel  <img src="../images/export_to_excel.gif" class="botonExcel" /></p>
<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
<input type="hidden" id="nombre" name="nombre"/>
</form>
<table width="90%" border="1" cellpadding="5" cellspacing="0" bordercolor="#666666" id="Exportar_a_Excel" style="border-collapse:collapse;">
<?
  $encabezado=false;
  while($row=registro($qinfo)){
  	if (!$encabezado){
		echo "<tr>";
		foreach($row as $nombre_campo => $valor_campo) {
			if(is_int($nombre_campo)) { continue; }//mysql_fetch_array, php genera un array con todos los valores dos veces, uno numérico y otro con el nombre del campo. 
		echo "<td bgcolor='#FFFFCC'><strong>".$nombre_campo."</strong></td>";}
		echo "</tr>";
		echo "<tr>";
		foreach($row as $nombre_campo => $valor_campo) {if(is_int($nombre_campo)) { continue; };echo "<td>".$valor_campo."</td>";}
		//if(is_int($nombre_campo)) { continue; }//mysql_fetch_array, php genera un array con todos los valores dos veces, uno numérico y otro con el nombre del campo. 
		echo "</tr>";
		$encabezado=true;
	}else{
		echo "<tr>";
		foreach($row as $nombre_campo => $valor_campo) {if(is_int($nombre_campo)) { continue; };echo "<td>".$valor_campo."</td>";}
		//if(is_int($nombre_campo)) { continue; }//mysql_fetch_array, php genera un array con todos los valores dos veces, uno numérico y otro con el nombre del campo. 
		echo "</tr>";
	}
  }
?>
</table>

</body>
</html>
