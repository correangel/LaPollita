<?php
include("../fnc.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
                    $campos[id_banco]=$id_banco;
                    $campos[stipo]=$txtstipo;
                    $campos[smoneda]=$txtsmoneda;
                    $campos[saldo]=$txtsaldo;					
    				$campos[snocuenta]=$txtsnocuenta;
					//echo"<pre>";print_r($campos);echo"</pre>";exit();
                    $ins=insertar("cuenta",$campos);
                    redireccionar("index1.php?op=$op&msg=Cuenta Agregada!");
    break;
    
    
    case "Update":
                    $campos=Array();
                    $campos[id_banco]=$id_banco;
                    $campos[stipo]=$txtstipo;
                    $campos[smoneda]=$txtsmoneda;
                    $campos[saldo]=$txtsaldo;
    				$campos[snocuenta]=$txtsnocuenta;
					//echo"<pre>";print_r($campos);echo"</pre>";exit();					
                    $ins=actualizar("cuenta",$campos,"id_cuenta = '$pk'");
                    redireccionar("index1.php?op=$op&msg=Cuenta actualizada!");
    
    break;

	case "Delete":
        if($confirm=="Ok"){
          $del=runsql("delete from cuenta where id_cuenta = '$idn'");
        }
        redireccionar("index1.php?op=$op&ac=$ac&msg2=Cuenta eliminada!");
  break;
}
?>
