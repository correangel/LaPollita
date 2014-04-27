<?php
include("../fnc.php");
conectado();
//echo "<pre>";print_r($_POST);echo "</pre>";
switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[nombre_comercial]=$nombre_comercial;
                    $campos[razon_social]=$razon_social;
					$campos[id_cliente]=$id_cliente;
                    $campos[direccion]=$direccion;
                    $campos[email]=$email;
					$campos[fecha_ingreso]=fechabd($fecha_ingreso);
                    $campos[status]=$status;
					$campos[telefono]=$telefono;
					$campos[telefono2]=$telefono2;
					$campos[nit]=$nit;		
					$campos[tags]=$tags;
					//echo "<pre>";print_r($campos);echo "</pre>";exit();
                    $ins=insertar("empresa",$campos);
                    redireccionar("index1.php?op=$op&msg=Empresa agregada!");
    break;
    
    
    case "Update":
                    $campos=Array();
                    $campos[nombre_comercial]=$nombre_comercial;
                    $campos[razon_social]=$razon_social;
					$campos[id_cliente]=$id_cliente;
                    $campos[direccion]=$direccion;
                    $campos[email]=$email;
					$campos[fecha_ingreso]=fechabd($fecha_ingreso);
                    $campos[status]=$status;
					$campos[telefono]=$telefono;
					$campos[telefono2]=$telefono2;
					$campos[nit]=$nit;		
					$campos[tags]=$tags;
                    $ins=actualizar("empresa",$campos,"id_empresa = '$pk'");
                    redireccionar("index1.php?op=$op&msg=Empresa actualizada!");
    
    break;

	case "Delete":
        if($confirm=="Ok"){
          $del=runsql("delete from empresa where id_empresa = '$idn'");
        }
        redireccionar("index1.php?op=$op&ac=$ac&msg=Empresa eliminada!");
  break;
}
?>
