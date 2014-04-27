<?
include ("fnc.php");

switch($op){
	
	case "reload_lote":			
			$array[0] 	= 	$raz . " " . $var . " " . $cor;                      //fetch result    
			echo json_encode($array);
	break;
	
	case "reload_saldo_inicial":	
	        $qry	=	"select max(saldo_inicial) from ingresos where lote=$lot";
			$info = runsql($qry);
			$array 	= 	mysql_fetch_row($info); 
			$valor  =   $array[0];
									
			switch($valor){			
				case 0:				   	
				       $qry2    =	"select saldo_final from ingresos where lote=$lot and saldo_inicial=0";
					   $info2   =   runsql($qry2);
					   $array2 	= 	mysql_fetch_row($info2);
					   if ($array2[0] > 0)
					   {
					   }
					   else
					   {
						   $array2[0] = 0;
					   }
				break;
				
				default:
				        if ($valor != NULL)
						{
						   $qry3   	=	"select saldo_final from ingresos where lote=$lot and saldo_inicial=$valor";
				           $info3   =   runsql($qry3);
						   $array2 	= 	mysql_fetch_row($info3);
						}
				break;			
			}
			echo json_encode($array2);
	break;
	
	case "reload_crechazada":
			$array[0]	=	$val+$val1+$val2+$val3+$val4+$val5+$val6+$val7+$val8+$val9+$val10+$val11;
			$array[1]   =   $val12+$val13-$array[0];
			echo json_encode($array);
	break;	
	
	case "reload_capacidad":
			$qry	=	"select existencia, capacidad, capacidad-existencia as disponible from incubadoras where id_incubadora=$id";
			$info	=	runsql($qry);
			$array 	= 	mysql_fetch_row($info);                          //fetch result 				
			echo json_encode($array);
	break;
	
	case "reload_hpesado":
			$qry	=	"select huevo_pesado, fecha_carga, nacimiento, lote, incubadora from cargas where nacimiento='$id'";
			$info	=	runsql($qry);
			$array 	= 	mysql_fetch_row($info);                          //fetch result    
			$array[1]  =   fecha($array[1]);
			echo json_encode($array);
	break;
	
	case "reload_fertil":
			$qry	=	"select fecha_carga, fecha_nacimiento, lote, incubadora,edad from nacimiento where nacimiento='$id'";
			$info	=	runsql($qry);
			$array 	= 	mysql_fetch_row($info);                          //fetch result    
			$array[0]  =   fecha($array[0]);
			$array[1]  =   fecha($array[1]);
			echo json_encode($array);
	break;
	
	case "reload_calcula_edad":
           
	        $array[0] 	= 	floor((restaFechas($fecha1,$fecha2))/7);                          //fetch result    
			echo json_encode($array);
	break;
	
	case "reload_ppeso":
			$qry	=	"select peso_entrada-$out from cargas where nacimiento='$id'";
			$info	=	runsql($qry);
			$array 	= 	mysql_fetch_row($info);                          //fetch result    
			echo json_encode($array);
	break;
	
	case "reload_porcentaje":
			$qry	=	"select peso_entrada from cargas where nacimiento='$id'";
			$qinfo	=	runsql($qry);
			if(registros($qinfo)>0){
    										$info=registro($qinfo);
					}
			$array[0] = 1 - ((($out * 100)/ $info[peso_entrada])/100);
			 	                          //fetch result    
			echo json_encode($array);
	break;
	
	case "reload_huevos_claros":
			$array[0] 	= 	($claro * 100)/$cargado;                          //fetch result    
			echo json_encode($array);
	break;
	
	case "reload_hembras_primera":
			$array[0] 	= 	($primera * 100)/$cargado;                          //fetch result    
			echo json_encode($array);
	break;
	
	case "reload_hembras_mixtas":
			$array[0] 	= 	($mixtas * 100)/$cargado;                          //fetch result    
			echo json_encode($array);
	break;
	
	case "reload_hembras_total":
			$array[0] 	= 	$primera + $mixtas;                          //fetch result
			$array[1] 	= 	($array[0] * 100)/$cargado;
			echo json_encode($array);
	break;
	
	case "reload_machos_primera":
			$array[0] 	= 	($primera * 100)/$cargado;                          //fetch result    
			echo json_encode($array);
	break;
	
	case "reload_machos_mixtos":
			$array[0] 	= 	($mixtas * 100)/$cargado;                          //fetch result 
			$array[1] 	= 	$primera + $mixtas;        
			$array[2] 	= 	($array[1] * 100)/$cargado;
			$array[3]   =   $array[1] + $totalh;
			$array[4]   =   ($array[3] * 100) / $cargado;
			echo json_encode($array);
	break;
	
	case "reload_nonacidos":
			$array[0] 	= 	($nonacidos * 100)/$cargado;                          //fetch result    
			echo json_encode($array);
	break;
	
	case "reload_muestra":
			$array[0] 	= 	$sep * $cant;                          //fetch result    
			echo json_encode($array);
	break;
	
	case "reload_cfertilidad":
			$array[0] 	= 	($val * 100)/$mue;                          //fetch result 			
			$array[1]   =    100 - ($inf+$des+$tem+$con);			
			$array[2]   =   $val + $val2;
			$array[3]   =   $val3 + $array[0];
			$array[4]   =   $val+$val1+$val3+$val5+$val7+$val9+$val11+$val13+$val15+$val17+$val19;
			$array[5]	=	$val2+$val4+$val6+$val8+$val10+$val12+$val14+$val16+$val18+$val20+$array[0];
			echo json_encode($array);
	break;	

}

?>