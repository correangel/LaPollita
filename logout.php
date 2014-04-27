<?
  include("fnc.php");
  encabezados();
  //session_start();
  
  
  session_unset();
  session_destroy();
  
  redireccionar("login.php");  
  
  
?>
