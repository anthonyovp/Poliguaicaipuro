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
		   
	       $sql = "INSERT INTO Usuario(nombre1_usu,apellido1_usu,correo_usu,clave_usu,tipo_usu,ruta) VALUES ('$nombre','$apellido','$correo','$clave','$tipo','$ruta')";
	      
	       
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

    	public function consultarUsuario2(){
	       
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = "SELECT * FROM Usuario  WHERE correo_usu = '$this->correo'";

	   		$datos =  $this->objDatos->consulta_query($sql);
	   		// $this->objDatos->desconectar();
	   	   return  $this->objDatos->resultado($datos);
    	}

    	

    	public function modificar($nombre,$apellido,$correo,$email){
	       
			$this->objDatos= new clsDatos();
		   $this->objDatos->conectar();
		   
	       $sql = "UPDATE Usuario  SET nombre1_usu = '$nombre', apellido1_usu = '$apellido', correo_usu = '$correo' WHERE correo_usu = '$email'";
	       $ruta = "Usuario";
	       
	       $resul = $this->objDatos->ejecutar3($sql,$ruta);
	      
		  
		  if($resul == 1){

		  	return 1;
		  	
		  }else return 0;
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


    	public function verificarClaveA($correo,$clave){
    		
    		$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = "SELECT * FROM Usuario  WHERE correo_usu='$correo' and clave_usu='$clave'";

	   


	   	  // return  $this->objDatos->resultado($datos);
	   	   $respuesta= $this->objDatos->cantidad($sql);

	   	   
	   	   		return $respuesta;
	   	   
    	}

    	public function modificarClaveA($correo,$clave){
    		
    		$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = "UPDATE Usuario SET clave_usu = '$clave' WHERE correo_usu='$correo' ";

	   


	   	  // return  $this->objDatos->resultado($datos);
	   	   $respuesta= $this->objDatos->ejecutar3($sql,"Perfil");

	   	   
	   	   		return $respuesta;
	   	   
    	}

    	public function traerdatos($codigo){
	       
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = "SELECT * FROM Usuario WHERE codigo_usu='$codigo'";
	      	
	   		$datos =  $this->objDatos->consulta_query($sql);

	   		// $this->objDatos->desconectar();

	   	  // return  $this->objDatos->resultado($datos);
	   	   $respuesta= $this->objDatos->resultadoinicio($datos);

	   	   
	   	   		return $respuesta;
	   	   
    	}

		


	}




?>