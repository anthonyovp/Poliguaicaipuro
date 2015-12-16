<?php
	include_once("clsDatos.php");

	class clsUsuario extends clsDatos{
		
		
        private $correo; 
        private $clave;
        private $tipo;  
        public $objDatos;

		function __construct(){
			
			
		}

		

		public function get_correo(){
			return $this->correo;
		}

		public function get_clave(){
			return $this->clave;
		}

		public function get_tipo(){
			return $this->tipo;
		}



		
		

		public function set_correo($correo){
			$this->correo = $correo;
		}

		public function set_clave($clave){
			$this->clave = $clave;
		}

		public function set_tipo($tipo){
			$this->tipo = $tipo;
		}


	

    	public function incluir($nombre,$apellido,$correo,$clave,$tipo,$ruta){
	       
			$this->objDatos= new clsDatos();
		   $this->objDatos->conectar();
		   
	       $sql = "INSERT INTO usuario(nombre1_usu,apellido1_usu,correo_usu,clave_usu,tipo_usu,ruta) VALUES ('$nombre','$apellido','$correo','$clave','$tipo','$ruta')";
	      
	       
	       $res=$this->objDatos->ejecutar($sql);
	      
		   $this->objDatos->desconectar();
		   if($res==1){
	       	copy($_FILES['files']['tmp_name'],$ruta);
	       }
		   
	   	   return;
    	} 
		
		
    	public function consultarUsuario(){
	       
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = "SELECT * FROM Usuario  WHERE tipo_usu like '$this->tipo%'";

	   		$datos =  $this->objDatos->consulta_query($sql);
	   		// $this->objDatos->desconectar();
	   	   return  $this->objDatos->resultado($datos);
    	}
		
		public function iniciarsesion($correo,$clave){
	       
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = "SELECT * FROM Usuario  WHERE correo_usu='$correo' and clave_usu='$clave'";

	   		$datos =  $this->objDatos->consulta_query($sql);

	   		// $this->objDatos->desconectar();



	   	  // return  $this->objDatos->resultado($datos);
	   	   $respuesta= $this->objDatos->resultadoinicio($datos);

	   	   
	   	   		return $respuesta;
	   	   
    	}

		/*
    	public function consultarProcedimientoNombre(){
	       
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = "SELECT * FROM Procedimiento  WHERE nombre_pro like '$this->correo%'";

	   		$datos =  $this->objDatos->consulta_query($sql);
	   		// $this->objDatos->desconectar();
	   	   return  $this->objDatos->resultado($datos);
    	}

    	public function modificarProcedimiento(){
	       
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = " UPDATE Procedimiento SET  nombre_pro = '$this->nombre' , puntaje_pro = '$this->puntaje'  WHERE codigo_pro = $this->codigo ";
	      	//echo "<script language='javascript'> console.log($sql)</script>"; da error a la consulta aunque llamen a otra funcion 

	   		$datos =  $this->objDatos->consulta_query($sql);
	   		// $this->objDatos->desconectar();
	   	   return  $datos;
    	}

*/


	}




?>