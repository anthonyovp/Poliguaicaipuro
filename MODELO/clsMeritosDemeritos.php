<?php
	include_once("clsDatos.php");

	class clsMeritosDemeritos extends clsDatos{
		
		
		private $fecha; 
        private $dependencia; 
        private $tipo; 
        private $categoria; 
        private $comentario; 
        private $especificacion; 
        public $objDatos;

       

		function __construct(){
			
			
		}

		public function get_fecha(){
			return $this->fecha;
		}

		public function get_dependencia(){
			return $this->dependencia;
		}

		public function get_tipo(){
			return $this->tipo;
		}

		public function get_categoria(){
			return $this->categoria;
		}

		public function get_comentario(){
			return $this->comentario;
		}

		public function get_especificacion(){
			return $this->especificacion;
		}



		
		public function set_fecha($fecha){
			$this->fecha = $fecha;
		}

		public function set_dependencia($dependencia){
			$this->dependencia = $dependencia;
		}

		public function set_tipo($tipo){
			$this->tipo = $tipo;
		}

		public function set_categoria($categoria){
			$this->categoria = $categoria;
		}

		public function set_comentario($comentario){
			$this->comentario = $comentario;
		}

		public function set_especificacion($especificacion){
			$this->especificacion = $especificacion;
		}


	

    	public function incluir($cod_fun, $fec, $dep, $com , $tip ,$cat, $esp){

       
	       
			$this->objDatos= new clsDatos();
		   $this->objDatos->conectar();
		   
	       $sql = "INSERT INTO fun_mer_dem (cod_per, fecha_fun_mer, dependencia_fun_mer, comentario_fun_mer, tipo_mer_dem ,categoria_mer_dem, especificacion_mer_dem)
	        VALUES ('$cod_fun', '$fec', '$dep', '$com' , '$tip' ,'$cat', '$esp')";
	       $ruta = "Meritos Demeritos";
	       
	       $this->objDatos->ejecutar3($sql,$ruta);
		   
	   	   return;
    	} 

		public function consultar($fecha){
	       
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = "SELECT codigo_pro FROM Procedimiento  WHERE numero_pro like '$numero'";

	   		$datos =  $this->objDatos->dato($sql);
	   		// $this->objDatos->desconectar();
	   	   return  $datos;
    	}
		
    	public function consultarFuncionarioCedula($cedula){
	       // $objDatos = new clsDatos();
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = "SELECT p.* , f.* , COUNT(md.tipo_mer_dem) AS cantidad_mer_dem
				,COUNT(if(md.tipo_mer_dem = 'Meritos',1,NULL)) AS cantidad_mer
				, COUNT(if(md.tipo_mer_dem = 'Demeritos',1,NULL)) AS cantidad_dem
				, GROUP_CONCAT(md.codigo_fun_mer ORDER BY md.fecha_fun_mer) AS codigo_fun_mer 
				, GROUP_CONCAT(md.fecha_fun_mer ORDER BY md.fecha_fun_mer) AS fecha_fun_mer 
				, GROUP_CONCAT(md.dependencia_fun_mer ORDER BY md.fecha_fun_mer) AS dependencia_fun_mer 
				, GROUP_CONCAT(md.comentario_fun_mer ORDER BY md.fecha_fun_mer) AS comentario_fun_mer
				, GROUP_CONCAT(md.tipo_mer_dem ORDER BY md.fecha_fun_mer) AS tipo_mer_dem
				, GROUP_CONCAT(md.categoria_mer_dem ORDER BY md.fecha_fun_mer) AS categoria_mer_dem
				, GROUP_CONCAT(md.especificacion_mer_dem ORDER BY md.fecha_fun_mer) AS especificacion_mer_dem
				FROM Persona p INNER JOIN Funcionario f ON p.codigo_per = f.cod_per 
				LEFT JOIN fun_mer_dem md ON p.codigo_per = md.cod_per 
				WHERE p.cedula_per like '$cedula%' GROUP BY p.codigo_per";

	   		$datos =  $this->objDatos->consulta_query($sql);

	   	   return  $this->objDatos->resultadoMD($datos);
    	}

    	public function consultarFuncionarioNombre($nombre){
	       // $objDatos = new clsDatos();
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = "SELECT p.* , f.* , COUNT(md.tipo_mer_dem) AS cantidad_mer_dem
				,COUNT(if(md.tipo_mer_dem = 'Meritos',1,NULL)) AS cantidad_mer
				, COUNT(if(md.tipo_mer_dem = 'Demeritos',1,NULL)) AS cantidad_dem
				, GROUP_CONCAT(md.codigo_fun_mer ORDER BY md.fecha_fun_mer) AS codigo_fun_mer 
				, GROUP_CONCAT(md.fecha_fun_mer ORDER BY md.fecha_fun_mer) AS fecha_fun_mer 
				, GROUP_CONCAT(md.dependencia_fun_mer ORDER BY md.fecha_fun_mer) AS dependencia_fun_mer 
				, GROUP_CONCAT(md.comentario_fun_mer ORDER BY md.fecha_fun_mer) AS comentario_fun_mer
				, GROUP_CONCAT(md.tipo_mer_dem ORDER BY md.fecha_fun_mer) AS tipo_mer_dem
				, GROUP_CONCAT(md.categoria_mer_dem ORDER BY md.fecha_fun_mer) AS categoria_mer_dem
				, GROUP_CONCAT(md.especificacion_mer_dem ORDER BY md.fecha_fun_mer) AS especificacion_mer_dem
				FROM Persona p INNER JOIN Funcionario f ON p.codigo_per = f.cod_per 
				LEFT JOIN fun_mer_dem md ON p.codigo_per = md.cod_per 
				WHERE p.nombre1_per like '$nombre%' GROUP BY p.codigo_per";

	   		$datos =  $this->objDatos->consulta_query($sql);
	   		// $this->objDatos->desconectar();
	   	   return  $this->objDatos->resultadoMD($datos);
    	}

    	public function modificarMerDem($codigo){
	       
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = " UPDATE fun_mer_dem SET  fecha_fun_mer = '$this->fecha' ,dependencia_fun_mer = '$this->dependencia' , comentario_fun_mer = '$this->comentario' 
	      	, tipo_mer_dem = '$this->tipo' ,categoria_mer_dem = '$this->categoria' , especificacion_mer_dem = '$this->especificacion' WHERE codigo_fun_mer = $codigo ";
	      	//echo "<script language='javascript'> console.log($sql)</script>"; da error a la consulta aunque llamen a otra funcion 

	   		$datos =  $this->objDatos->ejecutar2($sql);
	   		// $this->objDatos->desconectar();
	   	   return  $datos;
    	}




	}




?>