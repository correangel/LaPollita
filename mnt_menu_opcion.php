<?
 /*SCRIPT PARA MANTENIMIENTO DE OPCIONES DEL MENU */ 
  include("fnc.php");
  conectado();

  if(!$tipo_trn){
    alert("Parámetros incorrectos","javascript:history.go(-1)");
  }


  switch($tipo_trn){
   case "Add":
                 $id_ca=dec($idc);
                 $sql="insert into me_opciones
                       set
                       opcion='$txtopcion',
                       link='$txtlink',
                       categoria='$id_ca',
                       orden='$txtorden'";
                       //echo $sql;
                 $res=mysql_query($sql);
                 header("Location: index1.php?op=frm_menu_opciones&idc=$idc");
   break;
   
   case "Upd":
                 $id_ca=dec($idc);
                 $id_op=dec($ido);
                 $sql="update me_opciones
                       set 
                       opcion='$txtopcion',
                       link='$txtlink',
                       orden='$txtorden'
                       where
                       id = '$id_op'";
                 $res=mysql_query($sql);
                 header("Location: index1.php?op=frm_menu_opciones&idc=$idc");
   break;
   
   default:
    alert("Parámetros incorrectos","javascript:history.go(-1)");
  }
?>
