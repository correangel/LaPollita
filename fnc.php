<?php
import_request_variables("GPC");
//error_reporting(E_ERROR);

include("fnc_db.php");

$fecha=date("Y-m-d",mktime(date("H")-1,date("i"),date("s"),date("m"),date("d"),date("Y")));
$hora=date("H:i:s",mktime(date("H")-1,date("i"),date("s"),date("m"),date("d"),date("Y")));
$fechahora="$fecha $hora";
$today  = date("d")."-".date("m")."-".date("Y");

$remote_ip=$REMOTE_ADDR;
if(strlen($remote_ip)==0){
  $remote_ip=$_SERVER["REMOTE_ADDR"];
}

//**COLORES DE FILAS DE DATALLE***
$bgf1="#ECF2F9";
$bgf2="#FFFFFF";
//**FIN DE COLORES DE DETALLE*****

session_start();
srand(crear_semilla());

/*if(!empty($_SESSION["usr_online001"])){
  define("usr_usuario",$_SESSION["usr_usuario"]);
  define("usr_nombre",$_SESSION["usr_nombre"]);
  define("usr_mail",$_SESSION["usr_mail"]);
}
*/
function crear_semilla()
{
    list($usec, $sec) = explode(' ', microtime());
    return (float) $sec + ((float) $usec * 100000);
}

function registro($res){
  return mysql_fetch_array($res);
}

function registros($res){
  return mysql_num_rows($res);
}

function insertar($tabla, $arreglo, $print_sql=0){
  while (list($posicion, $valor) = each($arreglo)){
    $campos.=$posicion.",";
    $valores.="'$valor',";
  }
  
  $campos=substr($campos,0,strlen($campos)-1);
  $valores=substr($valores,0,strlen($valores)-1);
  
  $sql="insert into $tabla ($campos) values ($valores)";
  //echo $sql;exit();
    
  if($print_sql==1){
    echo $sql;
    return;
  }else{
    $res=mysql_query($sql);
    if(!$res){
      echo "ERROR: ".mysql_error();
      exit();
    }
    return mysql_insert_id();
  }  
}

function seleccionar($tabla,$campos='*',$where='',$orden='',$print_sql=0,$limit='', $having=''){
    $sql="select $campos from $tabla";
    
    if(!empty($where)){
      $sql.=" where $where ";
    }    
    
    if(!empty($orden)){
      $sql.=" order by $orden";
    }
  if($print_sql==1){
    echo $sql;
    return;
  }else{
    $res=mysql_query($sql);
    if(!$res){
      echo "ERROR: ".mysql_error();
      exit();
    }
    return $res;
  }
}

function runsql($sql, $print_sql=0){
	echo 'trae esto:' . $sql;
	exit;
  if($print_sql==1){
    echo $sql."<br>";
    return;
  }else{
    $res=mysql_query($sql);
    if(!$res){
      echo "ERROR: ".mysql_error();
      echo "<br>$sql";
      exit();
    }
    return $res;
  }
}

function actualizar($tabla, $arreglo, $where='', $print_sql=0){
	
  while (list($posicion, $valor) = each($arreglo)) {
    $campos.="$posicion = '$valor', ";
  }
  
  $campos=substr($campos,0,strlen($campos)-2);
  
  $sql="update $tabla set $campos ";

  if(!empty($where)){
    $sql.="where $where ";
  }
  if($print_sql==1){
    echo $sql; 
    return;
  }else{
    //echo $sql; exit();
    $res=mysql_query($sql);
    if(!$res){
      echo "ERROR: ".mysql_error();
      exit();
    }
    return mysql_insert_id();
  }
}

function eliminar($tabla,$where,$print_sql=0){
  $sql="delete from $tabla where $where";
  if($print_sql==1){
   echo $sql;
   return;
  }else{
    $res=mysql_query($sql);
    if(!$res){
      echo "ERROR: ".mysql_error();
      exit();
    }
    return $res;
  }
}

function fecha($fecha, $separador=""){
// funcion para trasladar la fecha a formato GT (dd-mm-aaaa)
  if(empty($fecha)){
    return "";
  }
  if(!$separador){
   $separador="-";
  }
  $fecha=substr($fecha,8,2)."$separador".substr($fecha,5,2)."$separador".substr($fecha,0,4);
  return $fecha;
}

function fechacorta($fecha, $separador="-"){
// funcion para trasladar la fecha a formato GT (dd-mm-aa)
  if(empty($fecha)){
    return "";
  }
  $fecha=substr($fecha,8,2)."$separador".substr($fecha,5,2)."$separador".substr($fecha,2,2);
  return $fecha;
}


function fechabd($fecha, $separador="-"){
// funcion para trasladar la fecha a formato GT (aaaa-mm-dd)
  $fecha=substr($fecha,6,4)."$separador".substr($fecha,3,2)."$separador".substr($fecha,0,2);
  return $fecha;
}

function restaFechas($FecIni, $FecFin)
{
     $separa1 = explode("/",$FecIni);
	 $dia1 = $separa1[0];
	 $mes1 = $separa1[1];
	 $ano1 = $separa1[2];
	      
	 $separa2 = explode("-",$FecFin);
	 $dia2 = $separa2[0];
	 $mes2 = $separa2[1];
	 $ano2 = $separa2[2];
	 
    //calculo timestam de las dos fechas 
	$timestamp1 = mktime(0,0,0,$mes1,$dia1,$ano1); 
	$timestamp2 = mktime(0,0,0,$mes2,$dia2,$ano2); 

	//resto a una fecha la otra 
	$segundos_diferencia = $timestamp1 - $timestamp2; 

	//echo $segundos_diferencia; 

	//convierto segundos en días 
	$dias_diferencia = $segundos_diferencia / (60 * 60 * 24); 
	
	//obtengo el valor absoulto de los días (quito el posible signo negativo) 
	$dias_diferencia = abs($dias_diferencia); 

	//quito los decimales a los días de diferencia 
	$dias_diferencia = floor($dias_diferencia); 
	return $dias_diferencia;

}

function alert($msg, $link){
echo "<script language='javascript'>
        alert('$msg');
        self.location='$link';
       </script>";
  exit();
}

function fmascara(){
?>
<script type="text/javascript">
var patron = new Array(2,2,4)
var patron2 = new Array(1,3,3,3,3)
function mascara(d,sep,pat,nums){
if(d.valant != d.value){
        val = d.value
        largo = val.length
        val = val.split(sep)
        val2 = ''
        for(r=0;r<val.length;r++){
                val2 += val[r]
        }
        if(nums){
                for(z=0;z<val2.length;z++){
                        if(isNaN(val2.charAt(z))){
                                letra = new RegExp(val2.charAt(z),"g")
                                val2 = val2.replace(letra,"")
                        }
                }
        }
        val = ''
        val3 = new Array()
        for(s=0; s<pat.length; s++){
                val3[s] = val2.substring(0,pat[s])
                val2 = val2.substr(pat[s])
        }
        for(q=0;q<val3.length; q++){
                if(q ==0){
                        val = val3[q]
                }
                else{
                        if(val3[q] != ""){
                                val += sep + val3[q]
                                }
                }
        }
        d.value = val
        d.valant = val
        }
}
</script>
<?
}

function mascara($separador){
 if(!$separador){$separador="/";}
 echo "onkeyup=\"mascara(this,'$separador',patron,true)\"";
}

function conectado(){
  if(!$_SESSION["usr_online001"]=="YesS" || empty($_SESSION["usr_usuario"]) || empty($_SESSION["usr_nombre"]) || $_SESSION["usr_level"] != "Admin"){
    //echo "{$_SESSION["usr_online001"]} | {$_SESSION["usr_usuario"]} | {$_SESSION["usr_nombre"]} | {$_SESSION["usr_level"]}";
    alert("Usuario desconectado o sesión expirada","login.php");
  }
}

function conectadoc(){
  session_start();
  if(!$_SESSION["usr_online001"]=="YesS" || !$_SESSION["usr_usuario"] || !$_SESSION["usr_nombre"] || $_SESSION["usr_level"]!="Contratista"){
    alert("Usuario desconectado o sesión expirada","../index.php");
  }
}

function enc($valor){
  return base64_encode(base64_encode($valor));
}

function dec($valor){
  return base64_decode(base64_decode($valor));
}

function llenar_combo($tabla,$where='',$orden='',$campo_valor='',$campo_descrip='',$seleccionar='',$codificar=false,$separador='',$campo_descrip2=''){
  /*
  DESCRIPCIÓN DE PARÁMETROS RECIBIDOS
  $tabla         = origen de la información
  $where         = Condición where para seleccionar valores de la tabla
  $orden         = campos a ordenar, separados por coma Ej: codigo asc, nombre desc
  $campo_valor   = nombre del campo a colocar como valor de la opción
  $campo_descrip = nombre del campo a colocar como descripción de la opción
  $seleccionar   = Valor que se compara con el registro, si coincide el valor se marca la opción como seleccionada por defecto
  $codificar     = Si se envía true, codifica el valor de la opción
  */
 
  if($orden){
    $orden = "order by $orden";
  }

  echo "<option value='SV' selected>Seleccione...</option>";
	//echo "select * from $tabla $where $orden";exit();
  $q=runsql("select * from $tabla $where $orden");
          
  while($i=registro($q)){
    $sel="";
	
    if($seleccionar == $i[$campo_valor]){
      $sel="selected class='selected_option'";
    }

    if($codificar==true){
      $i[$campo_valor]=enc($i[$campo_valor]);
    }
  
    echo "<option value='{$i[$campo_valor]}' $sel>{$i[$campo_descrip]}$separador{$i[$campo_descrip2]}</option>";
  }
}


function llenar_combo_query($qry,$campo_valor='',$seleccionar='', $campo_descrip='',$separador='',$campo_descrip2='',$opcion_seleccione1=true){
  /*
  DESCRIPCIÓN DE PARÁMETROS RECIBIDOS
  $tabla         = origen de la información
  $where         = Condición where para seleccionar valores de la tabla
  $orden         = campos a ordenar, separados por coma Ej: codigo asc, nombre desc
  $campo_valor   = nombre del campo a colocar como valor de la opción
  $campo_descrip = nombre del campo a colocar como descripción de la opción
  $seleccionar   = Valor que se compara con el registro, si coincide el valor se marca la opción como seleccionada por defecto
  $codificar     = Si se envía true, codifica el valor de la opción
  */


  if($opcion_seleccione1){  echo "<option value='SV' selected>Seleccione...</option>";}  
	//echo "select * from $tabla $where $orden";exit();
  $q=runsql($qry);
          
  while($i=registro($q)){
    $sel="";
    if($seleccionar == $i[$campo_valor]){
      $sel="selected class='selected_option'";
    }
  
    echo "<option value='{$i[$campo_valor]}' $sel>{$i[$campo_descrip]}$separador{$i[$campo_descrip2]}</option>";
  }
}


function numero_registros($res){
  return mysql_num_rows($res);
}

function color_fila($i){
global $bgf1, $bgf2;
  if($i%2==0){
    return $bgf1;
  }else{
    return $bgf2;
  }
}

function moneda($valor,$simbolo="",$separador=""){
 if(!$separador){$separador=",";}
// if(!$simbolo){$simbolo="Q";}
 $resultado="";

 $tmp=explode(".",$valor);
 $entero=$tmp[0];
 $decimales=$tmp[1];

 $longitud=strlen($entero);
 if($longitud>3){
  $aux=$entero;
  $separadores=sprintf("%.0f",($longitud/3));

  for($i=1;$i<=$separadores; $i++){
    if(strlen($aux)>3){
     $resultado=substr($aux,-3).$resultado;
    }else{
     continue;
    }

    $aux=substr($aux,0,strlen($aux)-3);

     if(strlen($aux)>0){
       $resultado="$separador$resultado";
     }
  }
  $resultado=$aux."$resultado";
 }else{
  $resultado=$entero;
 }
 if(strlen($decimales)==0){$decimales="00";}
 if(strlen($decimales)==1){$decimales.="0";}
 
 if(!empty($resultado)){
  return $simbolo.$resultado.".".$decimales;
 }else{
  return $simbolo."0.".$decimales;
 }
}

function mes_letras($nmes){
 switch($nmes){
  case 1: return "Enero";
  break;
  case 2: return "Febrero";
  break;
  case 3: return "Marzo";
  break;
  case 4: return "Abril";
  break;
  case 5: return "Mayo";
  break;
  case 6: return "Junio";
  break;
  case 7: return "Julio";
  break;
  case 8: return "Agosto";
  break;
  case 9: return "Septiembre";
  break;
  case 10: return "Octubre";
  break;
  case 11: return "Noviembre";
  break;
  case 12: return "Diciembre";
  break;

  default: return "MES_INVALIDO";
 }
}

function dia_letras($fecha){
    //date("D",mktime(0,0,0,6,13,2005))
    $mes=substr($fecha,5,2);
    $dia=substr($fecha,8,2);
    $year=substr($fecha,0,4);

    $txtdia=date("D",mktime(0,0,0,$mes,$dia,$year));
    switch($txtdia){
     case "Sun": return "Domingo";
     break;
     case "Mon": return "Lunes";
     break;
     case "Tue": return "Martes";
     break;
     case "Wed": return "Miércoles";
     break;
     case "Thu": return "Jueves";
     break;
     case "Fri": return "Viernes";
     break;
     case "Sat": return "Sábado";
     break;
    }
}

function rd_imagen($path, $imagen, $tamano_maximo, $otrosparametros, $nocache='1'){
   global $fechahora;
   //echo $path.$imagen;
   if(!file_exists($path.$imagen) or is_dir($path.$imagen)){return "";}
   
   list($ancho, $altura, $tipo, $atr) = getimagesize($path.$imagen);
   $max=0;
   $vnocache="";
   
   if($nocache==1){$vnocache="?".$fechahora;}

   if($ancho >= $altura){
    $max=$ancho;
   }else{
    $max=$altura;
   }

   if($tamano_maximo < $max){
    $factor=sprintf("%f",$tamano_maximo/$max);
   }else{
    $factor=1;
   }

   $miancho=sprintf("%.0f",$ancho*$factor);
   $mialtura=sprintf("%.0f",$altura*$factor);
   return "<img src='$path$imagen{$vnocache}' width='$miancho' height='$mialtura' $otrosparametros>";
}

function sel_cbo($opcion, $valor){
  if($opcion == $valor){
    return "selected";
  }
}

function fechalarga($fecha,$separador="-"){
  $fecha=substr($fecha,8,2).$separador.substr($fecha,5,2).$separador.substr($fecha,0,4)." ".substr($fecha,-8);
  return $fecha;
}

function redireccionar($url){
  header("Location: $url");
  exit();
}

function encabezados(){
 header("Expires: Sun 25 Jul 1994 05:00:00 GMT");
 header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
 header("Cache-Control: no-cache, must-revalidate");
 header("Pragma: no-cache");
}

function generar_string($cant_letras){
  $str="ABCDEFGHIJKLMNPQRSTUVWXYZ";
  $resultado="";
  for($i=0;$i<$cant_letras;$i++){
    $posicion=rand(0,strlen($str)-1);
    $resultado.=substr($str,$posicion,1);
  }
  return $resultado;
}

function get_nombre_institucion(){
  return "Buskateka.com";
}

function rellenar($numero,$ancho='0',$caracter_relleno='0'){
   if($ancho == 0){
       return $numero;
   }
   $longitud=strlen($numero);
   $diferencia = $ancho - $longitud;
   if($diferencia > 0){
       $tmp="";
       for($i=1;$i<=$diferencia;$i++){
           $tmp.=$caracter_relleno;
       }
       return $tmp.$numero;
   }else{
       return $numero;
   }
}

function get_seccion($id){
  $iseccion=registro( runsql("select * from secciones where id = '$id'") );
  return $iseccion[seccion];
}

function get_nombre_paciente($id){
	$dpaciente=registro(runsql("select * from paciente where id= '$id'") );
	return $dpaciente[apellidos].", ".$dpaciente[nombres];
}

function get_extension_file($file){
  $tmp=explode(".",$file);
  $posicion_extension=count($tmp)-1;
  return $tmp[$posicion_extension];
}

function fecha_letras($fecha){
  $nfecha=substr($fecha,0,4)."-".substr($fecha,4,2)."-".substr($fecha,6,2);
  return dia_letras($nfecha)." ".substr($fecha,6,2)." de ".mes_letras(substr($fecha,4,2))." de ".substr($fecha,0,4);
}

function fechaedicion2fecha($fedicion){
  return substr($fedicion,0,4)."-".substr($fedicion,4,2)."-".substr($fedicion,6,2);
}

function get_autor($id){
  $iautores=registro( runsql("select * from autores where id = '$id'") );
  return $iautores[nombre];
}

function get_email_autor($id){
  $iautores=registro( runsql("select * from autores where id = '$id'") );
  return $iautores[email];
}

function get_foto_autor($id){
  $iautores=registro( runsql("select * from autores where id = '$id'") );
  return $iautores[foto];
}

function get_existencia_articulo($table,$id,$cual){
	switch($cual){
		case 'actual':
				$limites 	=	"LIMIT 1 OFFSET 0";
		break;
		case 'anterior':
				$limites	=	"LIMIT 1 OFFSET 1";
		break;	
	}
	//echo "<br><br>select existencia from $table where id_articulo='$id' order by id_tran desc $limites"; 
	$invent=registro( runsql("select existencia from $table where id_articulo='$id' order by id_tran desc $limites") );
	if ($invent[existencia]!=""){
		//echo $invent[existencia];exit();
		return $invent[existencia];
	}else{
		//echo "cero";exit();
		return 0;
	}

}

function get_saldo_cobro($table,$id,$cual){
	switch($cual){
		case 'actual':
				$limites 	=	"LIMIT 1 OFFSET 0"; // toma el ultimo
		break;
		case 'anterior':
				$limites	=	"LIMIT 1 OFFSET 1"; // toma el penultimo
		break;	
	}
	//echo select saldo from cobros where id_venta='$txtid_venta'; 
	$saldo=registro( runsql("select saldo from $table where id_venta='$id' order by id_cobro desc $limites") );
	if ($saldo[saldo]!=""){
		//echo $invent[existencia];exit();
		return $saldo;
	}else{
		//echo "cero";exit();
		return -1;
	}

}

function TipoCambio($moneda,$fecha){
	$tipocambio = registro ( runsql ("select tipocambio from tipocambio where moneda='$moneda' and fecha<='$fecha' order by fecha desc;"));
	return $tipocambio[tipocambio];
}


function Recalcular_Monto_Venta($idventa){  // agregar detalles a la venta
	$datosventa		=	registro( runsql("select fecha from ventas where id_venta='$idventa'") ); 
	$datosventadet	=	runsql("select total,moneda from ventas_det where id_venta='$idventa';");
	$tcUSD	=	TipoCambio('USD',$datosventa[fecha]);
	$tcEUR	=	TipoCambio('EUR',$datosventa[fecha]);
	$tcQUE	=	1;
	$Monto_Venta=0;$SubMonto=0;
	while($i=registro($datosventadet)){
		switch($i[moneda]){
			case "USD":
				$SubMonto	=	$i[total]*$tcUSD;
			break;
			case "EUR":
				$SubMonto	=	$i[total]*$tcEUR;
			break;	
			case "QUE":
				$SubMonto	=	$i[total]*$tcQUE;
			break;					
		}
		$Monto_Venta	=	$Monto_Venta + $SubMonto;
		$SubMonto		=	0;
	}
	$campos=Array();
    $campos[monto]	=	$Monto_Venta;
	$ins=actualizar("ventas",$campos,"id_venta = '$idventa'");
	recalcular_saldo_venta($idventa);
}	

function Recalcular_Monto_Compra($idcompra){  // agregar detalles a la compra
//echo "idcompra=".$idcompra;
	$datoscompra		=	registro( runsql("select fecha from compras where id_compra='$idcompra'") );
	$datoscompradet		=	runsql("select total,moneda from compras_det where id_compra='$idcompra';");
	$tcUSD	=	TipoCambio('USD',$datoscompra[fecha]);
	$tcEUR	=	TipoCambio('EUR',$datoscompra[fecha]);
	$tcQUE	=	1;
	$Monto_Compra=0;$SubMonto=0;
	while($i=registro($datoscompradet)){
		switch($i[moneda]){
			case "USD":
				$SubMonto	=	$i[total]*$tcUSD;
			break;
			case "EUR":
				$SubMonto	=	$i[total]*$tcEUR;
			break;	
			case "QUE":
				$SubMonto	=	$i[total]*$tcQUE;
			break;					
		}
		$Monto_Compra	=	$Monto_Compra + $SubMonto;
		$SubMonto		=	0;
	}
	$campos3=Array();
    $campos3[monto]	=	$Monto_Compra;
	$ins=actualizar("compras",$campos3,"id_compra = '$idcompra'");
}	

function Recalcular_Saldo_Venta($idventa){
	$monto		=	registro( runsql("select monto from ventas where id_venta='$idventa'") ); 
	$sumcobros	=	registro( runsql("select sum(monto) as sumcobros from cobros where id_venta='$idventa'") ); 
	$campos=Array();
	$campos[saldo]			=	$monto[monto]-$sumcobros[sumcobros];					
	$ins=actualizar("ventas",$campos,"id_venta = '$idventa'");
}

function Recalcular_Saldo_Venta_AddCobro($idventa){  /// CALCULAR SALDO ACTUAL ( AL AGREGAR COBROS ) 
	$datosventa		=	registro( runsql("select fecha, monto,saldo from ventas where id_venta='$idventa'") ); 
	$datoscobros	=	runsql("select id_cobro,fecha,monto,saldo,moneda from cobros where id_venta='$idventa' order by id_cobro desc LIMIT 1 OFFSET 0 ;"); // AGARRA EL ULTIMO
	$tcUSD	=	TipoCambio('USD',$datosventa[fecha]);
	$tcEUR	=	TipoCambio('EUR',$datosventa[fecha]);
	$tcQUE	=	1;
	$Monto_Pagado	=	0;
	$SubMonto		=	0;
	$Saldo_Anterior	=	$datosventa[saldo];
	while($i=registro($datoscobros)){
		switch($i[moneda]){
			case "USD":
				$Monto_Pagado	=	$i[monto]*$tcUSD;
				echo $Monto_Pagado;
			break;
			case "EUR":
				$Monto_Pagado	=	$i[monto]*$tcEUR;
				echo $Monto_Pagado;				
			break;	
			case "QUE":
				$Monto_Pagado	=	$i[monto]*$tcQUE;
				echo $Monto_Pagado;				
			break;					
		}
	}
	$Saldo_Actual	=	$Saldo_Anterior	 - $Monto_Pagado;
//	echo "<br>**************". $Saldo_Actual	."=".	$Saldo_Anterior	 ."-". $Monto_Pagado." ****<br>";exit();
	$campos=Array();
    $campos[saldo]	=	$Saldo_Actual;
	$ins=actualizar("ventas",$campos,"id_venta = '$idventa'");
	//recalcular_saldo_venta($idventa);
	//echo "<br>actualizar(ventas,".$Saldo_Actual.",id_venta = $idventa"; 	exit();
	return $Saldo_Actual;
}

function ShowTipoCambio($fecha,$moneda){
	if ($moneda!='QUE') {
		$fechaweb	=	fecha($fecha);
		$tc			=	TipoCambio($moneda,$fecha);	
		echo "<img src='../images/tipocambio.png' border='0' onmouseover='toolTip(";
		echo '"Tipo de Cambio:'.$tc.' para la fecha Fecha ['.$fechaweb.']"';
		echo ",this)' />";
		return $tc;
	}
	return 0;
}	

function CargarCorrelativos(){
	$arrResult;
	$qcorr=runsql("select id_tipodoc,correlativoini from tipodoc where id_tipodoc in (10,11,13,22) order by id_tipodoc");
	while($i=registro($qcorr)){
		switch($i[id_tipodoc]){
			case "10":
				$arrResult["factura10"]=$i[correlativoini];
			break;
			case "11":
				$arrResult["recibocaja11"]=$i[correlativoini];			
			break;	
			case "13":
				$arrResult["notadeenvio13"]=$i[correlativoini];			
			break;	
			case "22":
				$arrResult["reciboprovicional22"]=$i[correlativoini];
			break;					
		}
	}
	return $arrResult;
}

function set_row_class($i){
	if ($i%2==0){
		return 'rowpar';
	}else{
		return 'rowimpar';
	}
}




?>