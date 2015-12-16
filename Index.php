<!--Este Programa es el Index del Sistema, aqui se invoca al Controlador Principal, 
	quien llama a la Vista Principal del Sistema.

	Realizado por: Franklin Rivera
				   Anthony Vasquez
	
	Fecha: 27 de Abril de 2015
-->

<?php

	include_once("/CONTROLADOR/Controlador_principal.php");

	$objeto_controlador_principal=new controlador_principal();
	$objeto_controlador_principal->controlador_principal();

?>