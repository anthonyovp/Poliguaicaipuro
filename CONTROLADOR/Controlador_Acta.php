<?php


	
		
    include_once("../MODELO/clsActa.php");
    include_once("../MODELO/clsBitacora.php");
    include_once("../MODELO/clsProcedimiento.php");
    include_once("../MODELO/clsPersona.php");


    
 $lobjBitacora=new clsBitacora();
  $lobjProcedimiento=new clsProcedimiento();
  $lobjPersona=new clsPersona();
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
        $hora = $_POST['hora'];
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
        $hor = $_POST["hor"];
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
            $cod_act = $lobjActa->incluirActa($numero,$fecha,$hora,$tipo,$comentario,$unidad,$sector,$dependencia,$cod_pro);

            //Consulta para traer datos del procedimiento para usar en Bitácora
           
          $datos= $lobjProcedimiento->traerdatos($cod_pro);
          $nombre1a=$datos[2];
          //fin de consulta

            //bitácora
            date_default_timezone_set("America/Caracas");
              $descripcion1="Se registró el Acta Número: ".$numero.", de fecha: ".$fecha.", hora: ".$hora.", tipo: ".$tipo.", con el Procedimiento: ".$nombre1a.".";
              $fecha1=date("Y/n/j");
              $hora1=date("h:i:s");
              $cod_usu1=$_SESSION["codigo_usuario"];
              $lobjBitacora->incluir($fecha1,$hora1,$descripcion1,$cod_usu1);
              //bitácora

            if ( !empty($_POST["cod_fun"]) && is_array($_POST["cod_fun"]) ) { 
              
                foreach ( $_POST["cod_fun"] as $cod_per ) { 
                        
            //Consulta para traer datos del Funcionario para usar en Bitácora
           
          $datos= $lobjPersona->traerdatos($cod_per);
          $credenciala=$datos[1];
          $cedulaa=$datos[5];
          $nombre11a=$datos[6];
          $nombre2a=$datos[7];
          $apellido1a=$datos[8];
          $apellido2a=$datos[9];

          //fin de consulta

            $lobjActa->incluirActaPersona($cod_act,$cod_per);
            //bitácora
            date_default_timezone_set("America/Caracas");
              $descripcion1="Se agregó al Funcionario: ".$nombre11a." ".$nombre2a." ".$apellido1a." ".$apellido2a.", portador de la C.I: ".$cedulaa." y de la credencial: ".$credenciala." al Acta Número: ".$numero.", de fecha: ".$fecha.", hora: ".$hora.", tipo: ".$tipo." y de Procedimiento: ".$nombre1a.".";
              $fecha1=date("Y/n/j");
              $hora1=date("h:i:s");
              $cod_usu1=$_SESSION["codigo_usuario"];
              $lobjBitacora->incluir($fecha1,$hora1,$descripcion1,$cod_usu1);
              //bitácora

                       
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


            //Consulta para traer datos anteriores para usar en Bitácora

          $datos= $lobjActa->traerdatos($codigo);
          $numeroa=$datos[1];
          $fechaa=$datos[2];
          $horaa=$datos[3];
          $tipoa=$datos[4];
          $comentarioa=$datos[5];
          $unidada=$datos[6];
          $sectora=$datos[7];
          $dependenciaa=$datos[8];
          $codpa=$datos[9];
          //fin consulta



            $data = $lobjActa->modificarActa($codigo);
            
            //Bitácora
         
           date_default_timezone_set("America/Caracas");
           $descripcion1="Se modificaron los datos del Acta. Datos Anteriores -> Número de Acta: ".$numeroa.",  Fecha: ".$fechaa.", Hora: ".$horaa.", Tipo de Acta: ".$tipoa.", Comentario: ".$comentarioa.", Unidad: ".$unidada.", Sector: ".$sectora.", Dependencia: ".$dependenciaa.", Código de Procedimiento: ".$codpa.".  
           Nuevos Datos -> Número de Acta: ".$num.",  Fecha: ".$fec.", Hora: ".$horaa.", Tipo de Acta: ".$tip.", Comentario: ".$com.", Unidad: ".$uni.", Sector: ".$sec.", Dependencia: ".$dep.", Código de Procedimiento: ".$pro.".";
           $fecha1=date("Y/n/j");
            $hora1=date("h:i:s");
            $cod_usu1=$_SESSION["codigo_usuario"];
            $lobjBitacora->incluir($fecha1,$hora1,$descripcion1,$cod_usu1);
            //Fin Bitácora
           


        break;

      

      }

     
  		



?>