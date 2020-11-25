<?php
//incluimos la clase nusoap.php

require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');
//creamos el objeto de tipo soapclient.

$soapclient = new nusoap_client('https://www.ehusw.es/jav/ServiciosWeb/comprobarcontrasena.php?wsdl',true);
//Llamamos la función que habíamos implementado en el Web Service
//e imprimimos lo que nos devuelve
$result = $soapclient->call('comprobar',array( 'x'=>$_GET['contrasena'],'y'=>$_GET['ticket']));
//echo "<script>alert($result);</script>";
print_r($result);

?> 