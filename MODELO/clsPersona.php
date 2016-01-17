<?php
	session_start();
	include_once("clsDatos.php");



	class clsPersona extends clsDatos{
		private $cedula;
		private $nombre1;
		private $nombre2;
		private $apellido1;
		private $apellido2;

		public $objDatos;


		function __construct(){
			
			
		}

		public function get_cedula(){
			return $this->cedula;
		}

		public function get_nombre1(){
			return $this->nombre1;
		}

		public function get_nombre2(){
			return $this->nombre2;
		}

		public function get_apellido1(){
			return $this->apellido1;
		}

		public function get_apellido2(){
			return $this->apellido2;
		}
		
		
		public function set_cedula($cedula){
			$this->cedula = $cedula;
		}

		public function set_nombre($nombre){
			$this->nombre1 = $nombre;
		}

		public function set_nombre2($nombre2){
			$this->nombre2 = $nombre2;
		}

		public function set_apellido1($apellido1){
			$this->apellido1 = $apellido1;
		}
		public function set_apellido2($apellido2){
			$this->apellido2 = $apellido2;
		}
		
		function begin(){
   			
		}

		function commit(){
    		mysql_query("COMMIT");
		}

		function rollback(){
    		mysql_query("ROLLBACK");
		}


		public function incluirPersona($cedula,$nombre1,$nombre2,$apellido1,$apellido2){
	       // $objDatos = new clsDatos();
			$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
		    $sql = "INSERT INTO Persona (cedula_per,nombre1_per,nombre2_per,apellido1_per,apellido2_per) values ('$cedula','$nombre1',
	        '$nombre2','$apellido1','$apellido2')";
	        $id = $this->objDatos->getId($sql);
		    $this->objDatos->desconectar();

		    return $id;
    	} 

    	public function incluirFuncionario($id,$credencial){
	       // $objDatos = new clsDatos();
			$this->objDatos= new clsDatos();
		   $this->objDatos->conectar();
		   
		   try{
		   		    $sql = "INSERT INTO Funcionario(credencial_fun,cod_per,status_fun) VALUES ('$credencial','$id','activo')";
	       			$this->objDatos->ejecutar($sql);
		   			
		   			

		   }
		   catch (Exception $e) {
    			rollback(); // transaction rolls back
    			echo "<script>alert('Error al Insertar')</script>";
    			exit;
			}
	   		$this->objDatos->desconectar();
		  
		   
	   	   return;
    	} 



    	public function consultarCod($sql){

    		$this->objDatos= new clsDatos();
    		$this->objDatos->conectar();
	        $dato = $this->objDatos->dato($sql);
		    $this->objDatos->desconectar();
		  
		   
	   	   return $dato;

    	}

    	public function validarRegistrado($sql){

    		$this->objDatos= new clsDatos();
    		$this->objDatos->conectar();
	        $resultado =  $this->objDatos->cantidad($datos);
		    $this->objDatos->desconectar();

		    return $resultado;

    	}

    	

    	public function incluirResena($id,$fechaN,$direccion){
	       // $objDatos = new clsDatos();
			$this->objDatos= new clsDatos();
		   $this->objDatos->conectar();
		   
	       $sql = "INSERT INTO Detenido(fecha_nac_det,direccion_det,cod_per) VALUES ('$fechaN','$direccion','$id')";
	       $this->objDatos->ejecutar2($sql);
		   $this->objDatos->desconectar();
		  
		   
	   	   return;
    	} 

    	public function incluirMultado($cod_per){

    		$this->objDatos= new clsDatos();
		   $this->objDatos->conectar();		   
	       $sql = "INSERT INTO Multado(cod_per) VALUES ('$cod_per')";
	       $this->objDatos->ejecutar2($sql);
		   $this->objDatos->desconectar();

		   return ;
    	}
		
		public function consultar($cedula){
	       // $objDatos = new clsDatos();
		   $this->objDatos->conectar();
	       $sql = "SELECT * FROM funcionario WHERE cedula='$cedula'";
	       $this->objDatos->ejecutar($sql);
		   $this->objDatos->desconectar();
		  
		   
	   	   return;
    	} 

    	public function consultarFuncionarioCedula(){
	       // $objDatos = new clsDatos();
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = "SELECT * FROM Persona  INNER JOIN Funcionario ON Persona.codigo_per = Funcionario.cod_per WHERE Persona.cedula_per like '$this->cedula%'";

	   		$datos =  $this->objDatos->consulta_query($sql);
	   		

	   		/*$dato = array(
              0 => array( 
                          "cedula_per" => 22048223,
                          "nombre1_per" => "Anthony",
                          "nombre2_per" => "Orlando",
                          "apellido1_per" => "Vasquez",
                          "apellido2_per" => "Peña",
                          "credencial_fun" => "1"


                )

              );*/
	   		// $this->objDatos->desconectar();
	   	   return  $this->objDatos->resultado($datos);
    	}

    	public function consultarFuncionarioNombre(){
	       // $objDatos = new clsDatos();
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = "SELECT * FROM Persona  INNER JOIN Funcionario ON Persona.codigo_per = Funcionario.cod_per WHERE Persona.nombre1_per like '$this->nombre1%'";

	   		$datos =  $this->objDatos->consulta_query($sql);
	   		// $this->objDatos->desconectar();
	   	   return  $this->objDatos->resultado($datos);
    	}

    	public function consultarDetenidoCedula(){
	       // $objDatos = new clsDatos();
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = "SELECT * FROM Persona  INNER JOIN Detenido ON Persona.codigo_per = Detenido.cod_per  INNER JOIN acta_per  ON Persona.codigo_per = acta_per.cod_per
	      	 INNER JOIN Acta ON Acta.codigo_act =  acta_per.cod_act WHERE Persona.cedula_per like '$this->cedula%'";

	   		$datos =  $this->objDatos->consulta_query($sql);
	   		
	   		// $this->objDatos->desconectar();
	   	   return  $this->objDatos->resultado($datos);
    	}

    	public function consultarDetenidoNombre(){
	       // $objDatos = new clsDatos();
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = "SELECT * FROM Persona  INNER JOIN Detenido ON Persona.codigo_per = Detenido.cod_per INNER JOIN acta_per  ON Persona.codigo_per = acta_per.cod_per
	      	 INNER JOIN Acta ON Acta.codigo_act =  acta_per.cod_act WHERE Persona.nombre1_per like '$this->nombre1%'";

	   		$datos =  $this->objDatos->consulta_query($sql);
	   		// $this->objDatos->desconectar();
	   	   return  $this->objDatos->resultado($datos);
    	}

    	public function modificarPersona($codigo){
	       
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = " UPDATE Persona SET cedula_per = '$this->cedula' ,nombre1_per = '$this->nombre1' , nombre2_per = '$this->nombre2' , apellido1_per = '$this->apellido1' , apellido2_per = '$this->apellido2'  WHERE codigo_per = $codigo ";   
	   		$datos =  $this->objDatos->ejecutar2($sql);
	   		// $this->objDatos->desconectar();
	   	   return  $datos;
    	}

    	public function modificarFuncionario($codigo,$cre,$sta){
	       
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = " UPDATE Funcionario SET credencial_fun = '$cre'  , status_fun = '$sta'  WHERE cod_per = $codigo ";
	      	//echo "<script language='javascript'> console.log($sql)</script>"; da error a la consulta aunque llamen a otra funcion 

	   		$datos =  $this->objDatos->consulta_query($sql);
	   		// $this->objDatos->desconectar();
	   	   return  $datos;
    	}

    	public function modificarDetenido($codigo,$fec,$dir){
	       
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = " UPDATE Detenido SET fecha_nac_det = '$fec' , direccion_det = '$dir'  WHERE cod_per = $codigo ";    

	   		$datos =  $this->objDatos->ejecutar2($sql);
	   		// $this->objDatos->desconectar();
	   	   return;
    	}

    	public function traerdatos($codigo){
	       
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = "SELECT * FROM funcionario INNER JOIN persona ON funcionario.cod_per=persona.codigo_per WHERE funcionario.cod_per='$codigo'";
	      	
	   		$datos =  $this->objDatos->consulta_query($sql);

	   		// $this->objDatos->desconectar();

	   	  // return  $this->objDatos->resultado($datos);
	   	   $respuesta= $this->objDatos->resultadoinicio($datos);

	   	   
	   	   		return $respuesta;
	   	   
    	}


    	public function traerdatosper($codigo){
	       
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = "SELECT * FROM  persona WHERE codigo_per='$codigo'";
	      	
	   		$datos =  $this->objDatos->consulta_query($sql);

	   		// $this->objDatos->desconectar();

	   	  // return  $this->objDatos->resultado($datos);
	   	   $respuesta= $this->objDatos->resultadoinicio($datos);

	   	   
	   	   		return $respuesta;
	   	   
    	}


    	public function traerdatosdet($codigo){
	       
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = "SELECT * FROM  detenido WHERE cod_per='$codigo'";
	      	
	   		$datos =  $this->objDatos->consulta_query($sql);

	   		// $this->objDatos->desconectar();

	   	  // return  $this->objDatos->resultado($datos);
	   	   $respuesta= $this->objDatos->resultadoinicio($datos);

	   	   
	   	   		return $respuesta;
	   	   
    	}

    	public function traerdatosper2($codigo){
	       
		  	$this->objDatos= new clsDatos();
		    $this->objDatos->conectar();
	      	$sql = "SELECT * FROM  persona WHERE cedula_per='$codigo'";
	      	
	   		$datos =  $this->objDatos->consulta_query($sql);

	   		// $this->objDatos->desconectar();

	   	  // return  $this->objDatos->resultado($datos);
	   	   $respuesta= $this->objDatos->resultadoinicio($datos);

	   	   
	   	   		return $respuesta;
	   	   
    	}





	}




?>