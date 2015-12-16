<?php
	include_once("clsDatos.php");

	class clsActa extends clsDatos{
		
		

        private $numero; 
        private $fecha; 
        private $tipo;       
        private $comentario; 
        private $unidad; 
        private $sector; 
        private $dependencia;
        private $cod_pro; 
        public $objDatos;

		function __construct(){
			
			
		}


		public function get_numero(){
			return $this->numero;
		}

		public function get_fecha(){
			return $this->fecha;
		}

		public function get_tipo(){
			return $this->tipo;
		}

		public function get_unidad(){
			return $this->unidad;
		}

		public function get_sector(){
			return $this->sector;
		}

		public function get_dependencia(){
			return $this->sector;
		}

		public function get_cod_pro(){
			
			return $this->sector;
		}

		public function get_comentario(){
			return $this->comentario;
		}
		



		public function set_numero($numero){
			$this->numero = $numero;
		}

		public function set_fecha($fecha){
			$this->fecha = $fecha;
		}

		public function set_tipo($tipo){
			$this->tipo = $tipo;
		}

		
		public function set_unidad($unidad){
			$this->unidad = $unidad;
		}

		public function set_sector($sector){
			$this->sector = $sector;
		}
		public function set_dependencia($dependencia){
			$this->dependencia = $dependencia;
		}

		public function set_comentario($comentario){
			$this->comentario = $comentario;
		}

		public function set_cod_pro($cod_pro){
			$this->cod_pro = $cod_pro;
		}
		

	

    	public function incluirActa($numero,$fecha,$tipo,$comentario,$unidad,$sector,$dependencia,$cod_pro){
	       // $objDatos = new clsDatos();
			$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
		   
	        $sql = "INSERT INTO Acta(numero_act,fecha_act,tipo_act,comentario_act,unidad_act,sector_act,dependencia_act,cod_pro) VALUES ('$numero','$fecha','$tipo','$comentario','$unidad','$sector','$dependencia','$cod_pro')";
	      
	        $id = $this->objDatos->getId($sql);
		    $this->objDatos->desconectar();

		    return $id;
    	}

    	

    	public function consultarActaFecha($fecha){
	       // $objDatos = new clsDatos();
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	//$sql = "SELECT * FROM  Procedimiento INNER JOIN Acta a ON Procedimiento.codigo_pro = Acta.cod_pro INNER JOIN acta_per ap ON Acta.codigo_act = acta_per.cod_act INNER JOIN Persona ON acta_per.cod_per = Persona.codigo_per  WHERE Acta.fecha_act like '$fecha%' ORDER BY Acta.numero_act";
	      
			$sql = "SELECT p.nombre_pro , a.* , COUNT(per.codigo_per) AS cantidad_per , GROUP_CONCAT(per.nombre1_per ORDER BY per.codigo_per) AS nombre1_per ,
			 GROUP_CONCAT(per.nombre2_per ORDER BY per.codigo_per) AS nombre2_per, GROUP_CONCAT(per.apellido1_per ORDER BY per.codigo_per) AS apellido1_per ,
			 GROUP_CONCAT(per.apellido2_per ORDER BY per.codigo_per) AS apellido2_per , GROUP_CONCAT(per.cedula_per ORDER BY per.codigo_per) AS cedula_per ,
			 GROUP_CONCAT(f.credencial_fun ORDER BY per.codigo_per) AS credencial_fun FROM Procedimiento p INNER JOIN Acta a ON p.codigo_pro = a.cod_pro
			 INNER JOIN acta_per ap ON a.codigo_act = ap.cod_act INNER JOIN Persona per ON ap.cod_per = per.codigo_per INNER JOIN Funcionario f ON per.codigo_per = f.cod_per
			 WHERE a.fecha_act like '$fecha%' GROUP BY a.codigo_act ";


	      	
	   		$datos =  $this->objDatos->consulta_query($sql);
	   		// $this->objDatos->desconectar();
	   	   return  $this->objDatos->resultadoMulti($datos);
    	} 
		
    	

    	public function modificarActa($codigo){
	       
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = " UPDATE Acta SET numero_act = '$this->numero' , fecha_act = '$this->fecha' , tipo_act = '$this->tipo' , unidad_act = '$this->unidad' , comentario_act = '$this->comentario' , cod_pro = '$this->cod_pro' WHERE codigo_act = $codigo ";
	      	//echo "<script language='javascript'> console.log($sql)</script>"; da error a la consulta aunque llamen a otra funcion 

	   		$datos =  $this->objDatos->consulta_query($sql);
	   		// $this->objDatos->desconectar();
	   	   return  $datos;
    	}

    	public function incluirActaPersona($cod_act,$cod_per){
	       // $objDatos = new clsDatos();
			$this->objDatos= new clsDatos();
		   $this->objDatos->conectar();
		   
	       $sql = "INSERT INTO Acta_Per(cod_act,cod_per) VALUES ('$cod_act','$cod_per')";
	      
	       
	       $this->objDatos->ejecutar2($sql);
		   $this->objDatos->desconectar();
		  
		   
	   	   return;
    	}

    	public function finalizar(){

    		$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
		    $ruta = "Actas.php";
		    $this->objDatos->finalizar($ruta);

    	}



	}




?>