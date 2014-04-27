<?php
include("../fnc.php");
conectado();
//echo"<pre>"; print_r($_POST);echo"</pre>";
//exit();
switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[nombre]			    	=			$nombre;
					$campos[id_empresa]				=			$id_empresa;
                    $campos[descripcion]			=			$descripcion;
					$campos[imagen]					=			$imagen;
                    $campos[tags]					=			$tags;
                    $campos[status]					=			$status;
                    $ins=insertar("prodserv",$campos);
                    redireccionar("index1.php?op=frm_prodserv&msg=Producto/Servicio Agregado!");
    break;
    
    
    case "Update":
                    $campos=Array();
                    $$campos[nombre]			   	=			$nombre;
					$campos[id_empresa]				=			$id_empresa;
                    $campos[descripcion]			=			$descripcion;
					$campos[imagen]					=			$imagen;
                    $campos[tags]					=			$tags;
                    $campos[status]					=			$status;
					$ins=actualizar("prodserv",$campos,"id_prodserv = '$pk'");
                    redireccionar("index1.php?op=$op&msg=Producto/Servicio Actualizado!");
    
    break;

	case "Delete":
        if($confirm=="Ok"){
          $del=runsql("delete from prodserv where id_prodserv = '$idn'");
        }
        redireccionar("index1.php?op=$op&ac=$ac&msg2=Cliente eliminado!");
  break;
}
?>
