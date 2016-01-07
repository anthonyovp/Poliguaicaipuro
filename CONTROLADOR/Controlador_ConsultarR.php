<?php
	  
	include_once("../MODELO/clsPersona.php");
	
	if(isset($_GET["dato"])){
		$dato = $_GET["dato"];
	}else{
		$dato = "1";
		 
	}

	$Resena = new clsPersona();

            if(is_numeric($dato)){
              $Resena->set_cedula($dato);
              
              $data = $Resena->consultarDetenidoCedula();
            }else{
              $Resena->set_nombre($dato);
              $data = $Resena->consultarDetenidoNombre();
            }
	
	
	header("Content-Type:Application/json");
	echo json_encode($data);
	
?>