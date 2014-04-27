<?php
include("../fnc.php");
conectado();

switch($tipo_trn){
  
  case "cambio_fecha_edicion":
       $_SESSION["edicion_fecha"]=fechabd($txtfechaed);
       redireccionar("index1.php?op=frm_noticia");
  break;
  
  case "cambio_seccion":
       $_SESSION["edicion_seccion"]=$seccion;
       redireccionar("index1.php?op=frm_noticia"); 
  break;

  case "Add":
       
       $qorden=runsql("select * 
                       from noticias 
                       where fecha = '".$_SESSION["edicion_fecha"]."'
                       and seccion = '".$_SESSION["edicion_seccion"]."'
                       order by orden desc limit 1");
       if(registros($qorden)==0){
         $orden=1;
       }else{
         $iorden=registro($qorden);
         $orden=$iorden[orden]+1;
       }                
       
       $campos=Array();
       $campos[seccion]=$_SESSION["edicion_seccion"];
       $campos[fecha]=$_SESSION["edicion_fecha"];
       $campos[titulo_portada]=$txttitular_portada;
       $campos[titulo_noticia]=$txttitular_noticia;
       $campos[contenido]=$txtcontenido;
       $campos[agrega_usr]=$_SESSION["usr_usuario"];
       $campos[agrega_fecha]=$fechahora;
       $campos[orden]=$orden;
       $campos[publicar]=$txtpublicar;
       $campos[autor]=$txtautor;
       
       
       $id=insertar("noticias",$campos);
       redireccionar("index1.php?op=frm_noticia&pk=$id&ac=$ac&msg=Noticia agregada!");
  break;
  
  
  case "Update":
       $campos=Array();
       $campos[titulo_portada]=$txttitular_portada;
       $campos[titulo_noticia]=$txttitular_noticia;
       $campos[contenido]=$txtcontenido;
       $campos[actualiza_usr]=$_SESSION["usr_usuario"];
       $campos[actualiza_fecha]=$fechahora;
       $campos[publicar]=$txtpublicar;
       $campos[autor]=$txtautor;
       
       $id=actualizar("noticias",$campos,"id='$pk'");
       redireccionar("index1.php?op=frm_noticia&pk=$pk&ac=$ac&msg=Noticia actualizada!");
  break;
  
  case "Delete":
        if($confirm=="Ok"){
          $del=runsql("delete from noticias where id = '$idn'");
          $del=runsql("delete from noticias_complementos where noticia = '$idn'");
        }
        
        redireccionar("index1.php?op=$op&ac=$ac&msg2=Noticia eliminada!");
  break;
  
  case "CambioOrden":
       $upd=runsql("update noticias set orden = '$norden' where id = '$idn'");
       redireccionar("index1.php?op=frm_noticia&pk=$pk&ac=$ac");
  break;
  
  case "DeleteComplemento":
       $del=runsql("delete from noticias_complementos where id = '$idnc'");
       redireccionar("index1.php?op=frm_noticia&pk=$pk&ac=$ac");
  break;
  
  case "DeleteImagen":
       $info=registro(runsql("select * from noticias_imagenes where id = '$idi'"));
       @unlink("../contenido/img_noticias/{$info[path]}");
       $del=runsql("delete from noticias_imagenes where id = '$idi'");
       redireccionar("index1.php?op=frm_noticia&pk=$pk&ac=$ac");
        
  break;
  
  case "Resaltada":
       $upd=runsql("update noticias set resaltada = 0 where resaltada = 1 and fecha = '".$_SESSION["edicion_fecha"]."'");
       $upd=runsql("update noticias set resaltada = 1 where id = '$idn' and fecha = '".$_SESSION["edicion_fecha"]."'");
       redireccionar("index1.php?op=frm_noticia");
  break;
  
  case "Publicar":
       $upd=runsql("update noticias set publicar = '$p' where id = '$idn' and fecha = '".$_SESSION["edicion_fecha"]."'");
       redireccionar("index1.php?op=frm_noticia");
  break;
}
?>
