<?
 /*SCRIPT PARA MANTENIMIENTO DE PRIVILEGIOS DEL MENU */ 
  include("fnc.php");
  conectado();

  if(!$tipo_trn){
    alert("Parámetros incorrectos","javascript:history.go(-1)");
  }


  switch($tipo_trn){
   case "PermisO":
                 
                 $id_us=dec($idu);
                 
                 $del=runsql("delete from me_permisos where usuario = '$id_us'");
                 
                 for($i=1;$i<=$totalp;$i++){
                 
                  $tmp="op$i";
                  $tmp2="chk$i";
                  $opcion=$$tmp;
                  $vopcion=$$tmp2;
                  
                  if(isset($opcion)){
                    $sql="insert into me_permisos
                          set usuario='$id_us',
                          opcion='$vopcion'";
                    //echo $sql."<br>";
                    $ins=mysql_query($sql);
                  }
                 }
                 
                 $sql="";
                       //echo $sql;
                 //$res=mysql_query($sql);
                 header("Location: index1.php?op=frm_usuario_permisos&idu=$idu&msg=Permisos para $id_us actualizados");
   break;
      
   default:
    alert("Parámetros incorrectos","javascript:history.go(-1)");
  }
?>
