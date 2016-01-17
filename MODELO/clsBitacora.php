<?php
	include_once("clsDatos.php");

	class clsBitacora extends clsDatos{
		 private $fecha;  
		 public $objDatos;

		


		public function get_fecha(){
			return $this->fecha;
		}

		public function set_fecha($fecha){
			$this->fecha = $fecha;
		}
        

		function __construct(){
			
		}
	

    	public function incluir($fecha1,$hora1,$descripcion,$cod_usu1){
	       
			$this->objDatos= new clsDatos();
		   $this->objDatos->conectar();
		   
	       $sql = "INSERT INTO bitacora(fecha_bit,hora_bit,proceso_bit,cod_usu) VALUES ('$fecha1','$hora1','$descripcion','$cod_usu1')";
	      
	       
	       $res=$this->objDatos->ejecutar2($sql);
	      
		   $this->objDatos->desconectar();
		  
		   
	   	   return;
    	} 
		
		
    	public function consultarBitacora(){
	       
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = "SELECT * FROM bitacora  INNER JOIN usuario ON bitacora.cod_usu=usuario.codigo_usu WHERE bitacora.fecha_bit like '$this->fecha%' ORDER BY bitacora.codigo_bit DESC";

	   		$datos =  $this->objDatos->consulta_query($sql);
	   		// $this->objDatos->desconectar();
	   	   return  $this->objDatos->resultado($datos);
    	}


    	/*public function consultarUsuario2(){
	       
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = "SELECT * FROM Usuario  WHERE correo_usu = '$this->correo'";

	   		$datos =  $this->objDatos->consulta_query($sql);
	   		// $this->objDatos->desconectar();
	   	   return  $this->objDatos->resultado($datos);
    	}

    	*/

    	
		


	}




?>