<?
 /*SCRIPT PARA MANTENIMIENTO DE NIVELES ESCOLARES */ 
  include("fnc.php");
  conectado();

  if(!$tipo_trn){
    alert("Parámetros incorrectos","javascript:history.go(-1)");
  }


  switch($tipo_trn){
   case "Add":
                 $sql="insert into me_categorias
                       set 
                       categoria='$txtcategoria',
                       orden='$txtorden',
                       tipo_menu='$txttipo_menu'";
                 $res=mysql_query($sql);
                 $idc=enc(mysql_insert_id());
                 header("Location: index1.php?op=frm_menu_opciones&idc=$idc");
   break;
   
   case "Upd":
                 $id_ca=dec($idc);
                 $sql="update me_categorias
                       set 
                       categoria='$txtcategoria',
                       orden='$txtorden',
                       tipo_menu='$txttipo_menu'
                       where
                       id = '$id_ca'";
                 //echo $sql;
                 $res=mysql_query($sql);
                 header("Location: index1.php?op=frm_menu_opciones&idc=$idc");
   break;
   
   default:
    alert("Parámetros incorrectos","javascript:history.go(-1)");
  }
?>
