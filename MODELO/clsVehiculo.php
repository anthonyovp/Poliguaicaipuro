<?php
	include_once("clsDatos.php");

	class clsVehiculo extends clsDatos{
		
		
		private $placa;
        private $marca_veh; 
        private $modelo_veh;
        private $tipo_veh;      
        public $objDatos;



		function __construct(){
			
			
		}

		public function get_placa(){
			return $this->placa;
		}

		public function get_marca_veh(){
			return $this->marca_veh;
		}

		public function get_modelo_veh(){
			return $this->modelo_veh;
		}

		public function get_tipo_veh(){
			return $this->tipo_veh;
		}

		

		
		public function set_placa($placa){
			$this->placa = $placa;
		}

		public function set_marca_veh($marca_veh){
			$this->marca_veh = $marca_veh;
		}

		public function set_modelo_veh($modelo_veh){
			$this->modelo_veh = $modelo_veh;
		}

		public function set_tipo_veh($tipo_veh){
			$this->tipo_veh = $tipo_veh;
		}
		

	

    	public function incluir($placa,$marca_veh,$modelo_veh,$tipo_veh){
	       // $objDatos = new clsDatos();
			$this->objDatos= new clsDatos();
		   $this->objDatos->conectar();
		   
	       $sql = "INSERT INTO Vehiculo(placa_veh,marca_veh,modelo_veh,tipo_veh) VALUES ('$placa','$marca_veh','$modelo_veh','$tipo_veh')";
	       $id = $this->objDatos->getId($sql);
		   $this->objDatos->desconectar();
		   
		   return $id;
	   	   
    	} 
		
		
    	public function consultarCod($sql){

    		$this->objDatos= new clsDatos();
    		$this->objDatos->conectar();
	        $dato = $this->objDatos->dato($sql);
		    $this->objDatos->desconectar();
		  
		   
	   	   return $dato;

    	}

    	public function modificarVehiculo($placa){
	       
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = " UPDATE Vehiculo SET placa_veh = '$this->placa' , marca_veh = '$this->marca_veh' , modelo_veh = '$this->modelo_veh' , tipo_veh = '$this->tipo_veh'  WHERE placa_veh = '$placa' ";
	      	//echo "<script language='javascript'> console.log($sql)</script>"; da error a la consulta aunque llamen a otra funcion 

	   		$datos =  $this->objDatos->consulta_query($sql);
	   		// $this->objDatos->desconectar();
	   	   return  $datos;
    	}


    	public function traerdatos($codigo){
	       
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = "SELECT * FROM vehiculo WHERE codigo_veh='$codigo'";
	      	
	   		$datos =  $this->objDatos->consulta_query($sql);

	   		// $this->objDatos->desconectar();

	   	  // return  $this->objDatos->resultado($datos);
	   	   $respuesta= $this->objDatos->resultadoinicio($datos);

	   	   
	   	   		return $respuesta;
	   	   
    	}

    	public function traerdatos2($codigo){
	       
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = "SELECT * FROM vehiculo WHERE placa_veh='$codigo'";
	      	
	   		$datos =  $this->objDatos->consulta_query($sql);

	   		// $this->objDatos->desconectar();

	   	  // return  $this->objDatos->resultado($datos);
	   	   $respuesta= $this->objDatos->resultadoinicio($datos);

	   	   
	   	   		return $respuesta;
	   	   
    	}





	}




?>