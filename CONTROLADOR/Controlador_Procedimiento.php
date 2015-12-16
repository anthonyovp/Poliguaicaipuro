<?php


	
		include_once("../MODELO/clsProcedimiento.php");
		
		/*--------------------------------------------*/

		

  		/*--------------------------------------------*/
  		
     

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
            $data = $lobjProcedimiento->modificarProcedimiento($cod);

        break;

      

      }

     
  		



?>