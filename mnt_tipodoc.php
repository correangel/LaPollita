<?php
include("../fnc.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[nombre]=$txtnombre;
					$campos[descripcion]=$txtdescripcion;
					$campos[tipotransac]=$txttipotransac;
					$campos[correlativoini]=$txtcorrelativoini;
					$campos[correlativofin]=$txtcorrelativofin;
                    $ins=insertar("tipodoc",$campos);
                    redireccionar("index1.php?op=$op&msg=Tipo de documento agregado!");
    break;
    
    
    case "Update":
                    $campos=Array();
                    $campos[nombre]=$txtnombre;
					$campos[descripcion]=$txtdescripcion;
					$campos[tipotransac]=$txttipotransac;	
					$campos[correlativoini]=$txtcorrelativoini;
					$campos[correlativofin]=$txtcorrelativofin;
					$ins=actualizar("tipodoc",$campos,"id_tipodoc = '$pk'");
                    redireccionar("index1.php?op=$op&msg=Tipo de documento actualizado!");
    
    break;

	case "Delete":
        if($confirm=="Ok"){
          $del=runsql("delete from tipodoc where id_tipodoc = '$idn'");
        }
        redireccionar("index1.php?op=$op&ac=$ac&msg2=Tipo de documento eliminado!");
  break;
}
?>
