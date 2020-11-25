<?php
//incluimos la clase nusoap.php
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');
//creamos el objeto de tipo soapclient.

$soapclient = new nusoap_client('https://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl ',true);
//Llamamos la función que habíamos implementado en el Web Service
//e imprimimos lo que nos devuelve
$result = $soapclient->call('comprobar',array('x'=>$_GET['correo']));
print_r($result);

//return $result;

?> 