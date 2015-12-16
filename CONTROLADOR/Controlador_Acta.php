<?php


	
		
    include_once("../MODELO/clsActa.php");
   
		
		/*--------------------------------------------

	     $codigo = 9;  
        $num = "60";
        $fec = "12-12-2015";
        $tip = "1";
        $uni = "1";
        $sec = "1";
        $dep = "1";
        $com = "ninguno";
        $pro = "1";

  		--------------------------------------------*/
  		
      if(isset($_POST['Guardar'])){

        
        //datos del acta
        $numero = $_POST['numero'];
        $fecha = $_POST['fecha'];
        $tipo = $_POST['tipo'];
        $comentario = $_POST['comentario'];
        $unidad = $_POST['unidad'];
        $dependencia = $_POST['dependencia'];
        $cod_pro = $_POST['cod_pro'];
        $sector = $_POST['sector'];
        

        $procesar=1;

      } 
    

      else if(isset($_GET["dato"])){
              $dato = $_GET["dato"];
              $procesar=2;
            
            }

        else if(isset($_POST["num"])){

        $codigo =$_POST["cod"]; 
        $num = $_POST["num"];
        $fec = $_POST["fec"];
        $tip = $_POST["tip"];
        $uni = $_POST["uni"];
        $sec = $_POST["sec"];
        $dep = $_POST["dep"];
        $com = $_POST["com"];
        $pro = $_POST["pro"];
        
        
        $procesar=3;
      }
    
  		//echo "<script> alert('Hola!');</script>";
      switch($procesar) {
        case 1:
            
            
            $lobjActa = new clsActa();
            $cod_act = $lobjActa->incluirActa($numero,$fecha,$tipo,$comentario,$unidad,$sector,$dependencia,$cod_pro);

            if ( !empty($_POST["cod_fun"]) && is_array($_POST["cod_fun"]) ) { 
              
                foreach ( $_POST["cod_fun"] as $cod_per ) { 
                        
                        $lobjActa->incluirActaPersona($cod_act,$cod_per);
                       
                 }

            }
           
            $lobjActa->finalizar();
            
                

        break;    
         
        case 2:

            $lobjActa=new clsActa();

            $data =$lobjActa->consultarActaFecha($dato);
        
            
            //$resultado = str_replace ( $dato, "hola", $data); 
            header("Content-Type:Application/json");
            echo json_encode($data);
            //usleep(850000);

            break;

        case 3:

            $lobjActa = new clsActa();
            $lobjActa->set_numero($num);
            $lobjActa->set_fecha($fec);
            $lobjActa->set_tipo($tip);
            $lobjActa->set_unidad($uni);
            $lobjActa->set_sector($sec);
            $lobjActa->set_dependencia($dep);
            $lobjActa->set_comentario($com);
            $lobjActa->set_cod_pro($pro);


            $data = $lobjActa->modificarActa($codigo);
            
           


        break;

      

      }

     
  		



?>