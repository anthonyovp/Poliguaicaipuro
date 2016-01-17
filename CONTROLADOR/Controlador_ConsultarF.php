<?php
	  
	include_once("../MODELO/clsPersona.php");
	
	if(isset($_GET["dato"])){
		$dato = $_GET["dato"];
	}else{
		$dato = "1";
		 
	}

	$funcionario = new clsPersona();

	if(is_numeric($dato)){
		$funcionario->set_cedula($dato);
		
		$data = $funcionario->consultarFuncionarioCedula();
	}else{
		$funcionario->set_nombre($dato);
		$data = $funcionario->consultarFuncionarioNombre();
	}
	
	
	header("Content-Type:Application/json");
	echo json_encode($data);
	
?>