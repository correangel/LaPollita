<?php
include("fnc.php");
conectado();
//echo $op;exit();
if($op){
    if(file_exists("{$op}.php")){
      $pagina="{$op}.php";
      //echo "existe<br>".$pagina;exit();
    }else{
      $pagina="inicio.php";
      //echo "No existe!";
    }
}else{
  $op="inicio";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>La Pollita.com 1.0</title>
<link type="text/css" href="css/start/jquery-ui-1.8.23.custom.css" rel="Stylesheet" />
<script src="jsincludes/jquery-1.8.0.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.23.custom.min.js"></script>
   <script type="text/javascript" src="js/jquery.ui.datepicker-es.js"></script>
<!--<script src="jsincludes/jquery-1.3.2.min.js" type="text/javascript"></script>
< script src="jsincludes/prototype.js" type="text/javascript"></script>
<script src="jsincludes/tooltip.js" type="text/javascript"></script -->
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<!-- <script language="JavaScript" src="../jsincludes/calendar/calendar_eu.js"></script>
<link rel="stylesheet" href="|1sincludes/calendar/calendar.css">-->

<link href="estilo.css" rel="stylesheet" type="text/css" />
<?=fmascara();?>
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

function actualizar_div(id_div, mi_url){
  new Ajax.Updater(id_div ,mi_url, { Method: 'get'});
}
</script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<?include("fnc_js.php");?>
<style type="text/css">
<!--
body {
	background-color: #ECE9D8;
}
-->
</style></head>

<body>
<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="20" background="images/head_cm.png">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#EBCB69"><div align="right">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
    <td width="903" valign="top" bgcolor="#F1D785">
    <ul id="MenuBar1" class="MenuBarHorizontal">
    <?
    $qcat=runsql("select distinct me_categorias.categoria, me_categorias.id 
                  from me_categorias inner join me_opciones ON me_opciones.categoria = me_categorias.id
                  inner join me_permisos ON me_permisos.opcion = me_opciones.id              
                  where me_permisos.usuario = '{$_SESSION["usr_usuario"]}'
                  order by me_categorias.orden");
			  
    while($icat=registro($qcat)){                  
    ?>
      <li><a class="MenuBarItemSubmenu" href="#"><?=$icat[categoria];?> &nbsp;&nbsp; </a>
          <ul>
          <?
          $qop=runsql("select me_opciones.* 
                       from me_categorias inner join me_opciones ON me_opciones.categoria = me_categorias.id
                       inner join me_permisos ON me_permisos.opcion = me_opciones.id              
                       where me_permisos.usuario = '{$_SESSION["usr_usuario"]}'
                       and me_categorias.id = '{$icat[id]}'
                       order by me_opciones.orden");
          while($iop=registro($qop)){
          ?>
            <li><a href="<?=$iop[link];?>"><img src="images/cuad_1.png" border="0"/> <?=$iop[opcion];?></a></li>
          <?}?>  
          </ul>
      </li>
    <?}?>
    
    </ul>    </td>
    <td width="47" valign="top" bgcolor="#F1D785"><div align="center"><a href="logout.php" class="link_little"><img src="images/ic_logout.jpg" width="32" height="32" border="0" /><br />  
    Salir</a></div></td>
  </tr>
      </table>
    </div></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><?php include($pagina);?></td>
  </tr>
  <tr >
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr >
    <td height="35" background="images/bg_foot.jpg" bgcolor="#CDD4F0"><div align="right"><span class="derechos">La Pollita.com</span></div></td>
  </tr>
</table>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
</body>
</html>



<!--<li><a class="MenuBarItemSubmenu" href="#">Perfil de usuario &nbsp;&nbsp; </a>
      <ul>
         <li><a href="index1.php?op=frm_perfil"><img src="../images/cuad_1.png" border="0"/>Actualizar datos</a></li>      
         <li><a href="index1.php?op=frm_usuario_permisos"><img src="../images/cuad_1.png" border="0"/>Permisos</a></li>
      </ul>
    </li>  
    
    <li><a class="MenuBarItemSubmenu" href="#">Development &nbsp;&nbsp; </a>
      <ul>
      <?
      //$directorio= opendir("./");
      //while($file = readdir($directorio)){
	      //if($file != "." && $file != ".." && !is_dir($file) && stristr($file,"frm_") ){
	       ?>
	       <li><a href="index1.php?op=<?//substr($file,0,strlen($file)-4);?>"><img src="../images/cuad_1.png" border="0"/><?//$file;?></a></li>
         <? 
	      //}
	    //}
      ?>
      </ul>
    </li> -->