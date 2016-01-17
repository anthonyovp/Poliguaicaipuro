<?php
	include_once("clsDatos.php");

	class clsMulta extends clsDatos{
		
		
		private $cod_fun; 
        private $numero; 
        private $fecha; 
        private $ut;       
        private $monto; 
        private $comentario;
        private $status; 
        public $objDatos;

		function __construct(){
			
			
		}

		public function get_cod_fun(){
			return $this->cod_fun;
		}

		public function get_numero(){
			return $this->numero;
		}

		public function get_fecha(){
			return $this->fecha;
		}

		public function get_ut(){
			return $this->ut;
		}

		public function get_monto(){
			return $this->monto;
		}

		public function get_comentario(){
			return $this->comentario;
		}

		public function get_status(){
			return $this->status;
		}

		
		public function set_cod_fun($cod_fun){
			$this->cod_fun = $cod_fun;
		}

		public function set_numero($numero){
			$this->numero = $numero;
		}

		public function set_fecha($fecha){
			$this->fecha = $fecha;
		}

		public function set_ut($ut){
			$this->ut = $ut;
		}

		public function set_monto($monto){
			$this->monto = $monto;
		}

		public function set_comentario($comentario){
			$this->comentario = $comentario;
		}

		public function set_status($status){
			$this->status = $status;
		}

    	public function incluirMulta($numero,$fecha,$ut,$monto,$comentario,$cod_veh){
	       // $objDatos = new clsDatos();
			$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
		   
	        $sql = "INSERT INTO Multa(numero_mul,fecha_mul,ut_mul,monto_mul,comentario_mul,status_mul,cod_veh) VALUES ('$numero','$fecha','$ut','$monto','$comentario','activa','$cod_veh')";
	      
	        $id = $this->objDatos->getId($sql);
		    $this->objDatos->desconectar();

		    return $id;
    	}

    	public function consultarMultaCedula($cedula){
	       // $objDatos = new clsDatos();
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = "SELECT * FROM Multa  INNER JOIN Vehiculo ON  Vehiculo.codigo_veh = Multa.cod_veh INNER JOIN Multa_Persona ON  Multa.codigo_mul = Multa_Persona.cod_mul INNER JOIN Persona ON Persona.codigo_per  = Multa_Persona.cod_per   WHERE Persona.cedula_per like '$cedula%' ORDER BY Multa.numero_mul";
	   		$datos =  $this->objDatos->consulta_query($sql);
	   		// $this->objDatos->desconectar();
	   	   return  $this->objDatos->resultado($datos);
    	}

    	public function consultarMultaFecha($fecha){
	       // $objDatos = new clsDatos();
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = "SELECT m.* , v.* , p.codigo_per ,  COUNT(codigo_per) AS cantidad_per , GROUP_CONCAT(p.nombre1_per ORDER BY p.codigo_per) AS nombre1_per ,
			 GROUP_CONCAT(p.nombre2_per ORDER BY p.codigo_per) AS nombre2_per, GROUP_CONCAT(p.apellido1_per ORDER BY p.codigo_per) AS apellido1_per ,
			 GROUP_CONCAT(p.apellido2_per ORDER BY p.codigo_per) AS apellido2_per ,  GROUP_CONCAT(p.cedula_per ORDER BY p.codigo_per) AS cedula_per FROM Multa m 
			 INNER JOIN Vehiculo v ON  v.codigo_veh = m.cod_veh INNER JOIN Multa_Persona mp ON  m.codigo_mul = mp.cod_mul INNER JOIN Persona p ON p.codigo_per  = mp.cod_per 
			 WHERE   m.fecha_mul like '$fecha%' GROUP BY m.codigo_mul ORDER BY m.numero_mul";

	   		$datos =  $this->objDatos->consulta_query($sql);
	   		// $this->objDatos->desconectar();
	   	   return  $this->objDatos->resultadoMulti($datos);
    	} 
		
    	public function modificarMulta($codigo){
	       
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = " UPDATE Multa SET numero_mul = '$this->numero' ,  fecha_mul = '$this->fecha' , ut_mul = '$this->ut' , monto_mul = '$this->monto' , comentario_mul = '$this->comentario', status_mul = '$this->status'  WHERE codigo_mul = $codigo ";
	      	//echo "<script language='javascript'> console.log($sql)</script>"; da error a la consulta aunque llamen a otra funcion 

	   		$datos =  $this->objDatos->consulta_query($sql);
	   		// $this->objDatos->desconectar();
	   	   return  $datos;
    	}

    	public function incluirMultaPersona($cod_mul,$cod_per){
	       // $objDatos = new clsDatos();
			$this->objDatos= new clsDatos();
		   $this->objDatos->conectar();
		   
	       $sql = "INSERT INTO Multa_Persona(cod_mul,cod_per) VALUES ('$cod_mul','$cod_per')";
	      
	       
	       $this->objDatos->ejecutar2($sql);
		   $this->objDatos->desconectar();
		  
		   
	   	   return;
    	}

    	public function incluirMultaPersona2($cod_mul,$cod_per){
	       // $objDatos = new clsDatos();
			$this->objDatos= new clsDatos();
		   $this->objDatos->conectar();
		   
	       $sql = "INSERT INTO Multa_Persona(cod_mul,cod_per) VALUES ('$cod_mul','$cod_per')";
	      
	       
	       $this->objDatos->ejecutar($sql);
		   $this->objDatos->desconectar();
		  
		   
	   	   return;
    	}

    	public function traerdatos($codigo){
	       
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = "SELECT * FROM multa WHERE codigo_mul='$codigo'";
	      	
	   		$datos =  $this->objDatos->consulta_query($sql);

	   		// $this->objDatos->desconectar();

	   	  // return  $this->objDatos->resultado($datos);
	   	   $respuesta= $this->objDatos->resultadoinicio($datos);

	   	   
	   	   		return $respuesta;
	   	   
    	}



	}




?>