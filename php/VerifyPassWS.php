<?php
//incluimos la clase nusoap.php
require_once('../lib/class.nusoap.php');
require_once('../lib/class.wsdlcache.php');
//creamos el objeto de tipo soap_server
$ns="http://".$_SERVER['HTTP_HOST']."/ProyectoSW1/php";
//$ns="http://ws20c487f.000webhostapp.com/ProyectoSW1/ProyectoSW1/php";
$server = new soap_server;
$server->configureWSDL('contrasenia',$ns);
$server->wsdl->schemaTargetNamespace=$ns;
//registramos la función que vamos a implementar
$server->register('contrasenia',array('x'=>'xsd:string','y'=>'xsd:int'),array('z'=>'xsd:string'),$ns);
//implementamos la función
function contrasenia ($x, $y){  


 if($y==1010){

 	$bool=true;
 	$fich= fopen('../txt/toppasswords.txt', "r");

 	while(!feof($fich)) {
 		$content=fgets($fich);
 	  if($x==$content){
 	  	$bool=false;
 	  }
 	}

 	fclose($fich);

 	if($bool){
 		return "VALIDA";

 	}else{
 		return "INVALIDA";
 	}

 }else{
 	return "SIN SERVICIO";
 }

}
//llamamos al método service de la clase nusoap antes obtenemos los valores de los parámetros
if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
$server->service($HTTP_RAW_POST_DATA);
