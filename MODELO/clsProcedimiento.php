<?php
	include_once("clsDatos.php");

	class clsProcedimiento extends clsDatos{
		
		
		private $numero; 
        private $nombre; 
        private $puntaje; 
        public $objDatos;

		function __construct(){
			
			
		}

		public function get_numero(){
			return $this->numero;
		}

		public function get_nombre(){
			return $this->nombre;
		}

		public function get_puntaje(){
			return $this->puntaje;
		}



		
		public function set_numero($numero){
			$this->numero = $numero;
		}

		public function set_nombre($nombre){
			$this->nombre = $nombre;
		}

		public function set_puntaje($puntaje){
			$this->puntaje = $puntaje;
		}


	

    	public function incluir($numero,$nombre,$puntaje){
	       
			$this->objDatos= new clsDatos();
		   $this->objDatos->conectar();
		   
	       $sql = "INSERT INTO Procedimiento(numero_pro,nombre_pro,puntaje_pro) VALUES ('$numero','$nombre','$puntaje')";
	      
	       
	       $this->objDatos->ejecutar($sql);
		   $this->objDatos->desconectar();
		  
		   
	   	   return;
    	} 
		public function consultar($numero){
	       
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = "SELECT codigo_pro FROM Procedimiento  WHERE numero_pro like '$numero'";

	   		$datos =  $this->objDatos->dato($sql);
	   		// $this->objDatos->desconectar();
	   	   return  $datos;
    	}
		
    	public function consultarProcedimientonumero(){
	       
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = "SELECT * FROM Procedimiento  WHERE numero_pro like '$this->numero%'";

	   		$datos =  $this->objDatos->consulta_query($sql);
	   		// $this->objDatos->desconectar();
	   	   return  $this->objDatos->resultado($datos);
    	}

    	public function consultarProcedimientoNombre(){
	       
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = "SELECT * FROM Procedimiento  WHERE nombre_pro like '$this->nombre%'";

	   		$datos =  $this->objDatos->consulta_query($sql);
	   		// $this->objDatos->desconectar();
	   	   return  $this->objDatos->resultado($datos);
    	}

    	public function modificarProcedimiento($codigo){
	       
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = " UPDATE Procedimiento SET  numero_pro = '$this->numero' ,nombre_pro = '$this->nombre' , puntaje_pro = '$this->puntaje'  WHERE codigo_pro = $codigo ";
	      	//echo "<script language='javascript'> console.log($sql)</script>"; da error a la consulta aunque llamen a otra funcion 

	   		$datos =  $this->objDatos->consulta_query($sql);
	   		// $this->objDatos->desconectar();
	   	   return  $datos;
    	}




	}




?>