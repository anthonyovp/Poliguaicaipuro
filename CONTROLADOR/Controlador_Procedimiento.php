<?php


	
		include_once("../MODELO/clsProcedimiento.php");
		include_once("../MODELO/clsBitacora.php");
		/*--------------------------------------------*/

		$lobjBitacora=new clsBitacora();
      $lobjProcedimiento=new clsProcedimiento();
  		/*--------------------------------------------*/
  		session_start();
     

      if(isset($_POST['Guardar'])){
        
        $nombre = $_POST['nombre']; 
        $numero = $_POST['numero']; 
        $puntaje = $_POST['puntaje']; 
        $procesar=1;

      }
      else if(isset($_POST["cod"])){
        $cod = $_POST["cod"];
        $num = $_POST["num"];
        $nom = $_POST["nom"];
        $pun = $_POST["pun"];
        $procesar=3;
      }
      else if(isset($_GET["dato"])){
              $dato = $_GET["dato"];
              $procesar=2;
            }else{

              $dato = "1";
              $procesar=2;
            }
      
  		
      switch($procesar) {
        case 1:
           $lobjProcedimiento=new clsProcedimiento();
           $lobjProcedimiento->incluir($numero,$nombre,$puntaje);

           //Bitácora
           date_default_timezone_set("America/Caracas");
           $descripcion1="Se registró el procedimiento nº: ".$numero.", de nombre: ".$nombre.", con un puntaje de ".$puntaje." puntos.";
           $fecha1=date("Y/n/j");
            $hora1=date("h:i:s");
            $cod_usu1=$_SESSION["codigo_usuario"];
            $lobjBitacora->incluir($fecha1,$hora1,$descripcion1,$cod_usu1);
            //Fin Bitácora
            
           break;
        case 2:
        
            
           $lobjProcedimiento=new clsProcedimiento();
            
            if(is_numeric($dato)){
             
             $lobjProcedimiento->set_numero($dato);
              $data =$lobjProcedimiento->consultarProcedimientonumero();
            }else{
              
             $lobjProcedimiento->set_nombre($dato);
              $data =$lobjProcedimiento->consultarProcedimientoNombre();
            }
            
            //$resultado = str_replace ( $dato, "hola", $data); 
            header("Content-Type:Application/json");
            echo json_encode($data);
            usleep(850000);
             break;
        case 3:
            $lobjProcedimiento=new clsProcedimiento();
            $lobjProcedimiento->set_numero($num);
            $lobjProcedimiento->set_nombre($nom);
            $lobjProcedimiento->set_puntaje($pun);


            //Consulta para traer datos del procedimiento para usar en Bitácora
           
          $datos= $lobjProcedimiento->traerdatos2($cod);
          $numeroa=$datos[1];
          $nombre1a=$datos[2];
          $puntajea=$datos[3];
          //fin de consulta



            $data = $lobjProcedimiento->modificarProcedimiento($cod);

            //Bitácora
         
           date_default_timezone_set("America/Caracas");
           $descripcion1="Se modificaron los datos del Procedimiento. Datos Anteriores -> Número: ".$numeroa.",  Nombre: ".$nombre1a.", Puntaje: ".$puntajea.".  
           Nuevos Datos -> Número: ".$num.",  Nombre: ".$nom.", Puntaje: ".$pun.".";
           $fecha1=date("Y/n/j");
            $hora1=date("h:i:s");
            $cod_usu1=$_SESSION["codigo_usuario"];
            $lobjBitacora->incluir($fecha1,$hora1,$descripcion1,$cod_usu1);
            //Fin Bitácora

        break;

      

      }

     
  		



?>