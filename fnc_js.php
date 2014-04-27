<?php
switch($op){
  
  case "frm_lotes":
  ?>
  <script language="javascript">

  function cf_eliminar_lote(str){
    var respuesta;
    respuesta = confirm("Está seguro de eliminar este Lote?");
    if(respuesta){	  
      self.location="mnt_lotes.php?confirm=Ok&<?="op=$op";?>&tipo_trn=Delete&idn="+str;
	  
    }
  }
  </script>
  <?
  break;
  
  case "frm_granja":
  ?>
  <script language="javascript">

  function cf_eliminar_granja(str){
    var respuesta;
    respuesta = confirm("Está seguro de eliminar este Control?");
    if(respuesta){	  
      self.location="mnt_granja.php?confirm=Ok&<?="op=$op";?>&tipo_trn=Delete&idn="+str;
	  
    }
  }
  </script>
  <?
  break;
  
  case "frm_envios":
  ?>
  <script language="javascript">

  function cf_eliminar_envio(str){
    var respuesta;
    respuesta = confirm("Está seguro de eliminar este Envío?");
    if(respuesta){	  
      self.location="mnt_envios.php?confirm=Ok&<?="op=$op";?>&tipo_trn=Delete&idn="+str;
	  
    }
  }
  </script>
  <?
  break;
  
  case "frm_ingresos":
  ?>
  <script language="javascript">

  function cf_eliminar_ingreso(str){
    var respuesta;
    respuesta = confirm("Está seguro de eliminar este Ingreso?");
    if(respuesta){	  
      self.location="mnt_ingresos.php?confirm=Ok&<?="op=$op";?>&tipo_trn=Delete&idn="+str;
	  
    }
  }
  </script>
  <?
  break;
  
  case "frm_cargas":
  ?>
  <script language="javascript">

  function cf_eliminar_carga(str){
    var respuesta;
    respuesta = confirm("Está seguro de eliminar esta Carga?");
    if(respuesta){	  
      self.location="mnt_cargas.php?confirm=Ok&<?="op=$op";?>&tipo_trn=Delete&idn="+str;
	  
    }
  }
  </script>
  <?
  break;
  
  case "frm_rel_empresaxsubcategoria":
  ?>
  <script language="javascript">

  function cf_eliminar_rel_empresaxsubcategoria(str){
    var respuesta;
    respuesta = confirm("Está seguro de eliminar esta Relación ( Empresa x SubCategoría )?");
    if(respuesta){
	  //alert("mnt_rel_empresaxsubcategoria.php?confirm=Ok&<?="op=$op";?>&tipo_trn=Delete&id="+str);
      self.location="mnt_rel_empresaxsubcategoria.php?confirm=Ok&<?="op=$op";?>&tipo_trn=Delete&id="+str;
	  
    }
  }
  </script>
  <?
  break;	
  case "frm_categoria":
  ?>
  <script language="javascript">
  function validar(){
    var formulario = document.form1;
    var objeto;
    
    objeto = formulario.txtcategoria;
    if(objeto.value==""){
      alert("Ingrese una categoría");
      objeto.focus();
      return (false);
    }
    
    return (true);
  }
  
  function cf_eliminar_categoria(str){
    var respuesta;
    
    respuesta = confirm("Está seguro de eliminar esta categoría?");
    if(respuesta){
	  //alert("mnt_paciente.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str);
      self.location="mnt_categoria.php?confirm=Ok&<?="op=$op";?>&tipo_trn=Delete&id="+str;
	  
    }
  }
  
  
  </script>
  <?
  break;

  case "frm_subcategoria":
  ?>
  <script language="javascript">
  function cf_eliminar_subcategoria(str){ 
    var respuesta; 
    
    respuesta = confirm("Está seguro de eliminar esta sub-categoría?");
    if(respuesta){
      self.location="mnt_subcategoria.php?confirm=Ok&<?="op=$op";?>&tipo_trn=Delete&id="+str;
	  
    }
  }
  
  
  </script>
  <?
  break;

  
  case "frm_noticia":
  ?>
  <script type="text/javascript" src="../jsincludes/highslide/highslide-with-html.js"></script>
  <link rel="stylesheet" type="text/css" href="../jsincludes/highslide/highslide.css" />
  
  <script type="text/javascript">
    hs.graphicsDir = '../jsincludes/highslide/graphics/';
    hs.outlineType = 'rounded-white';
    hs.wrapperClassName = 'draggable-header';
    
    </script>

  <script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
  <script type="text/javascript" src="../jsincludes/tiny_mce/tiny_mce.js"></script>
  <script type="text/javascript">
  tinyMCE.init({
	// General options
	mode : "textareas",
	theme : "advanced"});

  </script>
  
  <script language="javascript">
  function cf_eliminar_noticia(str){
    var respuesta;
    
    respuesta = confirm("Está seguro de eliminar esta noticia?");
    if(respuesta){
      self.location="mnt_noticia.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str;
    }
  }
  
  function cf_eliminar_complemento(str){
    var respuesta;
    
    respuesta = confirm("Está seguro de eliminar este complemento de la noticia?");
    if(respuesta){
      self.location="mnt_noticia.php?confirm=Ok&<?="op=$op&ac=$ac&pk=$pk";?>&tipo_trn=DeleteComplemento&idnc="+str;
    }
  }
  
  function cf_eliminar_imagen(str){
    var respuesta;
    
    respuesta = confirm("Está seguro de eliminar esta imagen de la noticia?");
    if(respuesta){
      self.location="mnt_noticia.php?confirm=Ok&<?="op=$op&ac=$ac&pk=$pk";?>&tipo_trn=DeleteImagen&idi="+str;
    }
  }
  </script>
  <?
  break;
  
  case "frm_bancos":
  ?>
  <script type="text/javascript" src="../jsincludes/highslide/highslide-with-html.js"></script>
  <link rel="stylesheet" type="text/css" href="../jsincludes/highslide/highslide.css" />
  
  <script type="text/javascript">
    hs.graphicsDir = '../jsincludes/highslide/graphics/';
    hs.outlineType = 'rounded-white';
    hs.wrapperClassName = 'draggable-header';
    
    </script>

  <script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
  <script type="text/javascript" src="../jsincludes/tiny_mce/tiny_mce.js"></script>
  <script type="text/javascript">
  tinyMCE.init({
	// General options
	mode : "textareas",
	theme : "advanced"});

  </script>
  
  <script language="javascript">
  function cf_eliminar_banco(str){
    var respuesta;
    
    respuesta = confirm("Está seguro de eliminar este Banco?");
    if(respuesta){
      self.location="mnt_bancos.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str;
    }
  }
  
 
  </script>
  <?
  break;
  
  
  case "frm_proveedor":
  ?>
  <script type="text/javascript" src="../jsincludes/highslide/highslide-with-html.js"></script>
  <link rel="stylesheet" type="text/css" href="../jsincludes/highslide/highslide.css" />
  
  <script type="text/javascript">
    hs.graphicsDir = '../jsincludes/highslide/graphics/';
    hs.outlineType = 'rounded-white';
    hs.wrapperClassName = 'draggable-header';
    
    </script>

  <script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
  <script type="text/javascript" src="../jsincludes/tiny_mce/tiny_mce.js"></script>
  <script type="text/javascript">
  tinyMCE.init({
	// General options
	mode : "textareas",
	theme : "advanced"});

  </script>
  
  <script language="javascript">
  function cf_eliminar_proveedor(str){
    var respuesta;
    
    respuesta = confirm("Está seguro de eliminar este Banco?");
    if(respuesta){
      self.location="mnt_proveedor.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str;
    }
  }
  
 
  </script>
  <?
  break;  

  case "frm_servicios":
  ?>
  <script type="text/javascript" src="../jsincludes/highslide/highslide-with-html.js"></script>
  <link rel="stylesheet" type="text/css" href="../jsincludes/highslide/highslide.css" />
  
  <script type="text/javascript">
    hs.graphicsDir = '../jsincludes/highslide/graphics/';
    hs.outlineType = 'rounded-white';
    hs.wrapperClassName = 'draggable-header';
    
    </script>

  <script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
  <script type="text/javascript" src="../jsincludes/tiny_mce/tiny_mce.js"></script>
  <script type="text/javascript">
  tinyMCE.init({
	// General options
	mode : "textareas",
	theme : "advanced"});

  </script>
  
  <script language="javascript">
  function cf_eliminar_servicio(str){
    var respuesta;
    respuesta = confirm("Está seguro de eliminar este Servicio?");
    if(respuesta){
      self.location="mnt_servicios.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str;
    }
  }
 </script>
  <?
  break;
 
  case "frm_cuentas":
  ?>
  <script type="text/javascript" src="../jsincludes/highslide/highslide-with-html.js"></script>
  <link rel="stylesheet" type="text/css" href="../jsincludes/highslide/highslide.css" />
  
  <script type="text/javascript">
    hs.graphicsDir = '../jsincludes/highslide/graphics/';
    hs.outlineType = 'rounded-white';
    hs.wrapperClassName = 'draggable-header';
    
    </script>

  <script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
  <script type="text/javascript" src="../jsincludes/tiny_mce/tiny_mce.js"></script>
  <script type="text/javascript">
  tinyMCE.init({
	// General options
	mode : "textareas",
	theme : "advanced"});

  </script>
  
  <script language="javascript">
  function cf_eliminar_cuenta(str){
    var respuesta;
    
    respuesta = confirm("Está seguro de eliminar esta Cuenta?");
    if(respuesta){
      self.location="mnt_cuentas.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str;
    }
  }
  
 
  </script>
  <?
  break;
  case "frm_estadoctaxpaciente":
  ?>
<script type="text/javascript" src="../jsincludes/highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="../jsincludes/highslide/highslide.css" />
  
<script type="text/javascript">
    hs.graphicsDir = '../jsincludes/highslide/graphics/';
    hs.outlineType = 'rounded-white';
    hs.wrapperClassName = 'draggable-header';
</script>
<script type="text/javascript">
<!--
function buscar_paciente(){
	var array_req	=	$$('.textbox_req');
	array_req = array_req.without("txtfnac");
//	trace(array_req);
	busqueda_valida	=	false;	
	error_msj		=	'Error\n ___________________________________ \nIngrese almenos un campo requerido para su búsqueda.\n';

	array_req.each(function(item) {
 	if (item.value!='') { 
						busqueda_valida	=	true;	
						}
						(item.alt!='')? error_msj+='- '+item.alt: error_msj+='- '+item.name;
						error_msj+= '\n';
	});
	
	if(busqueda_valida){
		$('form1').writeAttribute('action', 'index1.php?op=frm_paciente');
		$('tipo_trn').writeAttribute('value','search');
		$('form1').submit();									
		}else{
		alert(error_msj);		
	}
} 
//-->

  </script>
  <?
  break;
  
  case "frm_cliente":
  ?>
<script type="text/javascript" src="../jsincludes/highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="../jsincludes/highslide/highslide.css" />
  
<script type="text/javascript">
    hs.graphicsDir = '../jsincludes/highslide/graphics/';
    hs.outlineType = 'rounded-white';
    hs.wrapperClassName = 'draggable-header';
</script>
<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

function cf_eliminar_cliente(str){
    var respuesta;
    
    respuesta = confirm("Está seguro de eliminar este cliente?");
    if(respuesta){
	  //alert("mnt_cliente.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str);
      self.location="mnt_cliente.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str;
	  
    }
  }
  
function val_cliente(){
	var array_req	=	$$('.textbox_req');
	validate_form	=	true;	
	error_msj		=	'Error\n ___________________________________ \n Los siguientes campos son requeridos:\n';

	array_req.each(function(item) {
 	if (item.value=='') { 
						validate_form	=	false;	
						(item.alt!='')? error_msj+='- '+item.alt: error_msj+='- '+item.name;
						error_msj+= '\n';
						}
	});
	
	if(validate_form){
		$('form1').submit();						
		}else{
		alert(error_msj);		
	}
} 

function buscar_cliente(){
	var array_req	=	$$('.textbox_req');
	array_req = array_req.without("txtfnac");
//	trace(array_req);
	busqueda_valida	=	false;	
	error_msj		=	'Error\n ___________________________________ \nIngrese almenos un campo requerido para su búsqueda.\n';

	array_req.each(function(item) {
 	if (item.value!='') { 
						busqueda_valida	=	true;	
						}
						(item.alt!='')? error_msj+='- '+item.alt: error_msj+='- '+item.name;
						error_msj+= '\n';
	});
	
	if(busqueda_valida){
		$('form1').writeAttribute('action', 'index1.php?op=frm_cliente');
		$('tipo_trn').writeAttribute('value','search');
		$('form1').submit();									
		}else{
		alert(error_msj);		
	}
} 
//-->

  </script>
  <?
  break;

  case "frm_empresa":
  ?>
<script type="text/javascript" src="../jsincludes/highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="../jsincludes/highslide/highslide.css" />
  
<script type="text/javascript">
    hs.graphicsDir = '../jsincludes/highslide/graphics/';
    hs.outlineType = 'rounded-white';
    hs.wrapperClassName = 'draggable-header';
</script>
<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

function cf_eliminar_empresa(str){
    var respuesta;
    
    respuesta = confirm("Está seguro de eliminar esta empresa?");
    if(respuesta){
      self.location="mnt_empresa.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str;
	  
    }
  }
  
function val_empresa(){
	var array_req	=	$$('.textbox_req');
	validate_form	=	true;	
	error_msj		=	'Error\n ___________________________________ \n Los siguientes campos son requeridos:\n';

	array_req.each(function(item) {
 	if (item.value=='') { 
						validate_form	=	false;	
						(item.alt!='')? error_msj+='- '+item.alt: error_msj+='- '+item.name;
						error_msj+= '\n';
						}
	});
	
	if(validate_form){
		$('form1').submit();						
		}else{
		alert(error_msj);		
	}
} 

function buscar_empresa(){
	var array_req	=	$$('.textbox_req');
	array_req = array_req.without("txtfnac");
//	trace(array_req);
	busqueda_valida	=	false;	
	error_msj		=	'Error\n ___________________________________ \nIngrese almenos un campo requerido para su búsqueda.\n';

	array_req.each(function(item) {
 	if (item.value!='') { 
						busqueda_valida	=	true;	
						}
						(item.alt!='')? error_msj+='- '+item.alt: error_msj+='- '+item.name;
						error_msj+= '\n';
	});
	
	if(busqueda_valida){
		$('form1').writeAttribute('action', 'index1.php?op=frm_cliente');
		$('tipo_trn').writeAttribute('value','search');
		$('form1').submit();									
		}else{
		alert(error_msj);		
	}
} 
//-->

  </script>
  <?
  break;


   case "frm_usuario":
  ?>
  <script type="text/javascript" src="../jsincludes/highslide/highslide-with-html.js"></script>
  <link rel="stylesheet" type="text/css" href="../jsincludes/highslide/highslide.css" />
  
  <script type="text/javascript">
    hs.graphicsDir = '../jsincludes/highslide/graphics/';
    hs.outlineType = 'rounded-white';
    hs.wrapperClassName = 'draggable-header';
    
    </script>

  <script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
  
  
  <script language="javascript">

  function cf_eliminar_usuario(str){
    var respuesta;
    

    respuesta = confirm("Está seguro de eliminar este usuario?");
    if(respuesta){


	  //alert("mnt_usuario.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str);
      self.location="mnt_usuario.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str;
	  
    }
  }

  </script>
  <?
  break;
   case "frm_articulo":
  ?>
  <script type="text/javascript" src="../jsincludes/highslide/highslide-with-html.js"></script>
  <link rel="stylesheet" type="text/css" href="../jsincludes/highslide/highslide.css" />
  
  <script type="text/javascript">
    hs.graphicsDir = '../jsincludes/highslide/graphics/';
    hs.outlineType = 'rounded-white';
    hs.wrapperClassName = 'draggable-header';
    
    </script>

  <script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
  
  
  <script language="javascript">
 function cf_eliminar_articulo(str){
    var respuesta;
    respuesta = confirm("Está seguro de eliminar este Articulo?");
    if(respuesta){
	  //alert("mnt_usuario.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str);
      self.location="mnt_articulo.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str;
    }
  }
  </script>
  <?
  break;

   case "frm_compras":
  ?>
  <script type="text/javascript" src="../jsincludes/highslide/highslide-with-html.js"></script>
  <link rel="stylesheet" type="text/css" href="../jsincludes/highslide/highslide.css" />
  <script type="text/javascript">
    hs.graphicsDir = '../jsincludes/highslide/graphics/';
    hs.outlineType = 'rounded-white';
    hs.wrapperClassName = 'draggable-header';
  </script>
  <script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
 
<script language="javascript">
 function cf_eliminar_compra(str){
    var respuesta;
    respuesta = confirm("Está seguro de eliminar este registro de compra?");
    if(respuesta){
	  //alert("mnt_usuario.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str);
      self.location="mnt_compras.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str;
    }
  }

 function cf_eliminar_compradet(str,str2){
    var respuesta;
	//alert("mnt_compras.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=DeleteDet&pk="+str+"&pk2="+str2);
    respuesta = confirm("Está seguro de eliminar este artículo del detalle de Compra?");
    if(respuesta){
	  //alert("mnt_comprasdet.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&pk="+str+"&pk2="+str2);
      self.location="mnt_compras.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=DeleteDet&pk="+str+"&pk2="+str2;
    }
  }
  
function cf_eliminar_pago(str,str2){
    var respuesta;
    respuesta = confirm("Está seguro de eliminar este registro de pago?");
    if(respuesta){
      self.location="mnt_compras.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=DeletePago&pk="+str+"&pk2="+str2;
    }
  }  
  </script>
  <?
  break;


  case "frm_tipodoc":
  ?>
  <script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
  <script language="javascript">
 function cf_eliminar_tipodoc(str){
    var respuesta;
    respuesta = confirm("Está seguro de eliminar este tipo de documento?");
    if(respuesta){
	  //alert("mnt_usuario.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str);
      self.location="mnt_tipodoc.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str;
    }
  }
  </script>
  <?
  break;

case "frm_pagos":
  ?>
  <script type="text/javascript" src="../jsincludes/highslide/highslide-with-html.js"></script>
  <script language="JavaScript" src="../jsincludes/calendar/calendar_eu.js"></script>
  <link rel="stylesheet" type="text/css" href="../jsincludes/highslide/highslide.css" />
  <script type="text/javascript">
    hs.graphicsDir = '../jsincludes/highslide/graphics/';
    hs.outlineType = 'rounded-white';
    hs.wrapperClassName = 'draggable-header';
  </script>
  <script type="text/javascript">
<!--
  function calendario(str){
        window.open('./calendario.php?'+str,'calendario','width=250, height=200, location=no,menubar=no,resaizable=no,status=no,scrollbars=yes');
  }

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
   <?
  break; 

   case "frm_ventas":
  ?>
  <script type="text/javascript" src="../jsincludes/highslide/highslide-with-html.js"></script>
  <link rel="stylesheet" type="text/css" href="../jsincludes/highslide/highslide.css" />
  <script type="text/javascript">
    hs.graphicsDir = '../jsincludes/highslide/graphics/';
    hs.outlineType = 'rounded-white';
    hs.wrapperClassName = 'draggable-header';
  </script>
  <script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
 
<script language="javascript">
 function cf_eliminar_venta(str){
    var respuesta;
    respuesta = confirm("Está seguro de eliminar este registro de Venta?");
    if(respuesta){
	  //alert("mnt_usuario.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str);
      self.location="mnt_ventas.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str;
    }
  }

 function cf_eliminar_ventadet(str,str2){
    var respuesta;
	//alert("mnt_ventas.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=DeleteDet&pk="+str+"&pk2="+str2);
    respuesta = confirm("Está seguro de eliminar este artículo del detalle de Venta?");
    if(respuesta){
	  //alert("mnt_comprasdet.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&pk="+str+"&pk2="+str2);
      self.location="mnt_ventas.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=DeleteDet&pk="+str+"&pk2="+str2;
    }
  }
  
function cf_eliminar_cobro(str,str2){
    var respuesta;
    respuesta = confirm("Está seguro de eliminar este registro de Cobro?");
    if(respuesta){
      self.location="mnt_ventas.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=DeleteCobro&pk="+str+"&pk2="+str2;
    }
  }  
  </script>
  <?
  break;


case "frm_inventario":
  ?>
  <script type="text/javascript" src="../jsincludes/highslide/highslide-with-html.js"></script>
  <script language="JavaScript" src="../jsincludes/calendar/calendar_eu.js"></script>
  <link rel="stylesheet" type="text/css" href="../jsincludes/highslide/highslide.css" />
  <script type="text/javascript">
    hs.graphicsDir = '../jsincludes/highslide/graphics/';
    hs.outlineType = 'rounded-white';
    hs.wrapperClassName = 'draggable-header';
  </script>
  <script type="text/javascript">
<!--
  function calendario(str){
        window.open('./calendario.php?'+str,'calendario','width=250, height=200, location=no,menubar=no,resaizable=no,status=no,scrollbars=yes');
  }

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

 function cf_eliminar_traninv(str){
    var respuesta;
    respuesta = confirm("Está seguro de eliminar esta Transacción del Inventario Médico ?");
    if(respuesta){
	  //alert("mnt_usuario.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str);
      self.location="mnt_inventario.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str;
    }
  }
//-->  
  </script>
   <?
  break; 
  
case "frm_inventariolib":
  ?>
  <script type="text/javascript" src="../jsincludes/highslide/highslide-with-html.js"></script>
  <script language="JavaScript" src="../jsincludes/calendar/calendar_eu.js"></script>
  <link rel="stylesheet" type="text/css" href="../jsincludes/highslide/highslide.css" />
  <script type="text/javascript">
    hs.graphicsDir = '../jsincludes/highslide/graphics/';
    hs.outlineType = 'rounded-white';
    hs.wrapperClassName = 'draggable-header';
  </script>
  <script type="text/javascript">
<!--
  function calendario(str){
        window.open('./calendario.php?'+str,'calendario','width=250, height=200, location=no,menubar=no,resaizable=no,status=no,scrollbars=yes');
  }

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

 function cf_eliminar_traninvlib(str){
    var respuesta;
    respuesta = confirm("Está seguro de eliminar esta Transacción del Inventario de Librería?");
    if(respuesta){
	  //alert("mnt_usuario.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str);
      self.location="mnt_inventariolib.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str;
    }
  }
//-->  
  </script>
   <?
  break;   
  
case "frm_cajachica":
  ?>
  <script type="text/javascript" src="../jsincludes/highslide/highslide-with-html.js"></script>
  <script language="JavaScript" src="../jsincludes/calendar/calendar_eu.js"></script>
  <link rel="stylesheet" type="text/css" href="../jsincludes/highslide/highslide.css" />
  <script type="text/javascript">
    hs.graphicsDir = '../jsincludes/highslide/graphics/';
    hs.outlineType = 'rounded-white';
    hs.wrapperClassName = 'draggable-header';
  </script>
  <script type="text/javascript">
<!--
  function calendario(str){
        window.open('./calendario.php?'+str,'calendario','width=250, height=200, location=no,menubar=no,resaizable=no,status=no,scrollbars=yes');
  }

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

 function cf_eliminar_tranCajaChica(str){
    var respuesta;
    respuesta = confirm("Está seguro de eliminar esta Transacción del Inventario?");
    if(respuesta){
	  //alert("mnt_usuario.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str);
      self.location="mnt_cajachica.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str;
    }
  }
//-->  
  </script>
   <?
  break;   
  
  
  case "rep_gralventasxpaciente":
  case "rep_gralventas":
  ?>
  <script type="text/javascript" src="../jsincludes/highslide/highslide-with-html.js"></script>
  <script language="JavaScript" src="../jsincludes/calendar/calendar_eu.js"></script>
  <link rel="stylesheet" type="text/css" href="../jsincludes/highslide/highslide.css" />
  <script type="text/javascript">
    hs.graphicsDir = '../jsincludes/highslide/graphics/';
    hs.outlineType = 'rounded-white';
    hs.wrapperClassName = 'draggable-header';
  </script>
  <script type="text/javascript">
<!--
  function calendario(str){
        window.open('./calendario.php?'+str,'calendario','width=250, height=200, location=no,menubar=no,resaizable=no,status=no,scrollbars=yes');
  }

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->  
  </script>
   <?
  break;
  
  case "frm_prodserv":
  ?>
  <script type="text/javascript" src="../jsincludes/highslide/highslide-with-html.js"></script>
  <script language="JavaScript" src="../jsincludes/calendar/calendar_eu.js"></script>
  <link rel="stylesheet" type="text/css" href="../jsincludes/highslide/highslide.css" />
  <script type="text/javascript">
    hs.graphicsDir = '../jsincludes/highslide/graphics/';
    hs.outlineType = 'rounded-white';
    hs.wrapperClassName = 'draggable-header';
  </script>
  <script type="text/javascript">
<!--
  function cf_eliminar_proserv(str){
    var respuesta;
    
    respuesta = confirm("Está seguro de eliminar este producto/servicio?");
    if(respuesta){
      self.location="mnt_prodserv.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str;
	  
    }
  }

//-->  
  </script>
   <?
  break;


  case "frm_movcuenta":
  ?>
  <script type="text/javascript" src="../jsincludes/highslide/highslide-with-html.js"></script>
  <script language="JavaScript" src="../jsincludes/calendar/calendar_eu.js"></script>
  <link rel="stylesheet" type="text/css" href="../jsincludes/highslide/highslide.css" />
  <script type="text/javascript">
    hs.graphicsDir = '../jsincludes/highslide/graphics/';
    hs.outlineType = 'rounded-white';
    hs.wrapperClassName = 'draggable-header';
  </script>
  <script type="text/javascript">
<!--
  function calendario(str){
        window.open('./calendario.php?'+str,'calendario','width=250, height=200, location=no,menubar=no,resaizable=no,status=no,scrollbars=yes');
  }

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

 function cf_eliminar_movcuenta(str){
    var respuesta;
    respuesta = confirm("Está seguro de eliminar este Movimiento de la cuenta?");
    if(respuesta){
	  //alert("mnt_usuario.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str);
      self.location="mnt_movcuenta.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str;
    }
  }
  function cf_eliminar_movdet(str,str2){
    var respuesta;
    respuesta = confirm("Está seguro de eliminar este Detalle de Movimiento de la cuenta?");
    if(respuesta){
	  //alert("mnt_usuario.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&idn="+str);
      self.location="mnt_movcuenta.php?confirm=Ok&<?="op=$op&ac=$ac";?>&tipo_trn=Delete&pk="+str+"&pk2="+str2;
    }
  }
  
//-->  
  </script>
   <?
  break;  
}

?>
