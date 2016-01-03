<?php

	class clsDatos{
		private $servidor;
		private $usuario;
		private $clave;
		private $bd;
		private $conexion;


		public function __construct(){
			$this->servidor="localhost";
			$this->usuario="root";
			$this->clave="";
			$this->bd="bd_poliguaicaipuro";
		}


		public function conectar(){
			$this->conexion=mysqli_connect($this->servidor, $this->usuario, $this->clave, $this->bd);

			if($this->conexion){
				mysqli_select_db($this->conexion,$this->bd);

			}
			else{
				echo mysqli_error();
			}
		}

		public function __destruct(){ 
		
		}                
		
		public function getId($sql){
			 
			
			 if (mysqli_query($this->conexion,$sql)) {
		    	$id  = mysqli_insert_id($this->conexion);
		    	//echo $sql;
		       return $id;

		     
		    }else{
		    	echo "<script language='javascript'> alert('Proceso no Realizado!'); setTimeout('window.history.go(-1)',1000);</script>";
		    	//echo mysql_error()."<br>".$sql;
		    	return ;
		    }
		    
		}

		public function proximo($datos){
	  		$arreglo = mysqli_fetch_array($datos);
			return $arreglo;
	    }

  		public function filtro($sql){ 
   
   			$result= mysqli_query($this->conexion,$sql);  
   			return $result;
        }                   

		public  function cerrarfiltro($datos){
		    if	(mysqli_free_result($datos)){
			  // echo '<meta http-equiv="Refresh" content="1;url=../vistas/controlador.php">';
		    } else {
		    	mysqli_error();
		 	}
		}

	public function ejecutar($sqlx){
    
		    $this->consulta = mysqli_query($this->conexion,$sqlx);
			
			

		    if ($this->consulta) {
		    	 echo "<script language='javascript'> alert('Registro Exitoso!'); setTimeout('window.history.go(-1)',1000);</script>"; 
		    	 return 1;

		     
		    }
		    else {
			    echo '<meta http-equiv="Refresh" content="1;url=../VISTA/Usuario.php">';
			    //echo mysql_error();
		        echo "<script>alert('Proceso No Realizado')</script>"; 
		        return 0;
		    }
		}


		public function ejecutar2($sqlx){
    
		    $this->consulta = mysqli_query($this->conexion,$sqlx);
			//echo "<script> alert('existe".$sqlx."');</script>";
		    if ($this->consulta == 0) {
		    	//echo '<meta http-equiv="Refresh" content="1;url=../VISTA/Usuario.php">';
		    	echo mysql_error();
		       echo "<script>alert('Proceso No Realizado')</script>";

		     	return 0;
		    }else return 1;
		   
		}

		public function ejecutar3($sqlx,$ruta){
    
		    $this->consulta = mysqli_query($this->conexion,$sqlx);
			
			

		    if ($this->consulta) {
		    	echo "<script language='javascript'>alert('Proceso Realizado Correctamente');window.location.href='../VISTA/".$ruta.".php';</script>";
		    	 return 1;

		     
		    }
		    else {
			    
			    echo mysql_error();
		        echo "<script>alert('Proceso No Realizado')</script>"; 
		        echo '<meta http-equiv="Refresh" content="1;url=../VISTA/Usuario.php">';
		        return 0;
		    }
		}


		public function execute($resultado){
		     
		     $resultado = mysqli_query($this->conexion,$resultado);
		     $total= @mysqli_num_rows($resultado);
		     if ($total> 0) {
		         echo "este  dato  ya existe";
		     }
		     else { 
		     	echo "este dato fue incluido"; 
		 	}  	  
		      
        }

        public function cantidad($sql){
		     
		     
		     $cantidad = mysqli_query($this->conexion,$sql);
		     $total= mysqli_num_rows($cantidad);
		     



		      return $total;
        }

        

		public function desconectar ()
   		{
    	    $this->conexion=null;
    	}

    	public function consulta_query($sql){
    		//echo $sql;
    		//echo "<script> alert('existe".$sql."');</script>";

    		return mysqli_query($this->conexion,$sql);
    		
    	}

    	protected function resultado($datos){
    		$array = array();

    		while($fila = mysqli_fetch_array($datos)){
    			$array[] = $fila;
    		}

    		

    		return $array;
    	}

    	protected function resultadoActa($datos){
    		
    		$array = array();
    		
    		while($fila = mysqli_fetch_array($datos)){

    			/*$nombre_pro = $fila["nombre_pro"]; 
    			$codigo_act = $fila["codigo_act"];
    			$numero_act = $fila["numero_act"];
    			$fecha_act = $fila["fecha_act"];
    			$tipo_act = $fila["tipo_act"];
    			$comentario_act = $fila["comentario_act"];
    			$unidad_act = $fila["unidad_act"];
    			$sector_act = $fila["sector_act"];
    			$dependencia_act = $fila["dependencia_act"];
    			$cod_pro = $fila["cod_pro"];
    			$cantidad_per = $fila["cantidad_per"];
    			$nombre1 = explode(",", $fila["nombre1_per"]);
    			$nombre2 = explode(",", $fila["nombre2_per"]);
    			$apellido1 = explode(",", $fila["apellido1_per"]);
    			$apellido2 = explode(",", $fila["apellido2_per"]);
    			$cedula = explode(",", $fila["cedula_per"]);*/

    			
    			$fila["nombre1_per"]= explode(",", $fila["nombre1_per"]);
    			$fila["nombre2_per"]= explode(",", $fila["nombre2_per"]);
    			$fila["apellido1_per"]= explode(",", $fila["apellido1_per"]);
    			$fila["apellido2_per"]= explode(",", $fila["apellido2_per"]);


    			
    			/*echo "<script> alert('existe".$fila["nombre1_per"][0]."');</script>";
    			echo "<script> alert('existe".$fila["nombre1_per"][1]."');</script>";
    			echo "<script> alert('existe".$fila["nombre1_per"]."');</script>";*/

    			$array[] = $fila;
    		}


    		
    		return $array;
    	}

    	public function autenticado(){
			if(isset($_SESSION["email_usuario"]) && isset($_SESSION["tipo_usuario"])){
				return $_SESSION["tipo_usuario"];
			}else{
				return false;
			}
		}



    	protected function resultadoMulti($datos){
    		
    		$array = array();
    		
    		while($fila = mysqli_fetch_array($datos)){



    			$fila["cedula_per"]= explode(",", $fila["cedula_per"]);
    			$fila["nombre1_per"]= explode(",", $fila["nombre1_per"]);
    			$fila["nombre2_per"]= explode(",", $fila["nombre2_per"]);
    			$fila["apellido1_per"]= explode(",", $fila["apellido1_per"]);
    			$fila["apellido2_per"]= explode(",", $fila["apellido2_per"]);
    			if(isset($fila["credencial_fun"])){
    				$fila["credencial_fun"]= explode(",", $fila["credencial_fun"]);
    			}

    			
    			/*echo "<script> alert('existe".$fila["nombre1_per"][0]."');</script>";
    			echo "<script> alert('existe".$fila["nombre1_per"][1]."');</script>";
    			echo "<script> alert('existe".$fila["nombre1_per"]."');</script>";*/

    			$array[] = $fila;
    		}


    		
    		return $array;
    	}


    	public function dato($sql){
		     
		     $datos = mysqli_query($this->conexion,$sql);
		     $resultado = mysqli_fetch_array($datos);
		     $dato = $resultado[0];
		     

		       	  
		      return $dato;
        }

    	public function finalizar($ruta){
    		echo "<script language='javascript'>  setTimeout('window.history.go(-2)',1000); alert('Registro Exitoso!');</script>"; 

    	}

    	protected function resultadoinicio($datos){
    		
		     $resultado = mysqli_fetch_array($datos);
		   	
		     return $resultado;
/*
    		$codigo2 = "";
    		$tipo2="";

    		while($fila = mysqli_fetch_array($datos)){
    			$tipo2 = $fila['tipo_usu'];
    			$codigo2= $fila['codigo_usu'];
    		}

    		if($codigo2==""){
    			return "no";
    		}
    		else{

    			return $codigo2;
    		}*/

    	}
    	//setTimeout('location.href= "../VISTA/"+$ruta',1000);
    }
  




?>