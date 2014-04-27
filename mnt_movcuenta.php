<?php
include("../fnc.php");
conectado();

switch($tipo_trn){
  
    case "Add":      
                    $campos=Array();
					$campos[id_cuenta]			=		$txtid_cuenta;
                    $campos[id_tipotran]		=		$txtid_tipotran;
					$campos[fecha]				=		fechabd($txtfecha);
					$campos[monto]				=		$txtmonto;
					$campos[moneda]				=		$txtmoneda;															
					$campos[observaciones]		=		$txtobservaciones;															
					//echo "<pre>";print_r($_POST);echo"</pre>";exit();
                    $ins=insertar("movcuenta",$campos);
                    redireccionar("index1.php?op=$op&msg=Movimiento Bancario agregado!");
    break;
    
    
    case "Update":
                    $campos=Array();
                    $campos[id_cuenta]			=		$txtid_cuenta;
                    $campos[id_tipotran]		=		$txtid_tipotran;
					$campos[fecha]				=		fechabd($txtfecha)	;
					$campos[monto]				=		$txtmonto;
					$campos[moneda]				=		$txtmoneda;															
					$campos[observaciones]		=		$txtobservaciones;																
					$ins=actualizar("movcuenta",$campos,"id_mov = '$pk'");
                    redireccionar("index1.php?op=$op&msg=Movimiento Bancario actualizado!");
    
    break;

	case "Delete":
		//echo "delete from movcuenta where id_mov = '$idn'";exit();
        if($confirm=="Ok"){
          $del=runsql("delete from movcuenta where id_mov = '$idn'");
        }
        redireccionar("index1.php?op=$op&ac=$ac&msg2=Movimiento Bancario eliminado!");
  break;
}
?>
