<?php


    header('Content-Type: text/html; charset=UTF-8');
    
    include_once("../MODELO/clsBitacora.php");
  
    /*--------------------------------------------*/
    session_start();
    

      /*--------------------------------------------*/
      
 
     if(isset($_GET["dato"])){
        $dato = $_GET["dato"];
        $procesar=2;
      }
      /*else if(isset($_GET["descripcion"])){
        date_default_timezone_set("America/Caracas");
        $fecha1=date("Y/n/j");
        $hora1=date("h:i:s");
        $descripcion1=$_GET["descripcion"];
        $cod_usu1=$_SESSION["codigo_usuario"];
        $procesar=1;
      }*/
      else{
        $dato = "1";
        $procesar=2;
      }

      switch($procesar) {
       /* case 1:
          $lobjBitacora=new clsBitacora();

          $lobjBitacora->incluir($fecha1,$hora1,$descripcion,$cod_usu1);
         
          break;*/
        case 2:
        
            
          $lobjBitacora=new clsBitacora();
          

          $lobjBitacora->set_fecha($dato);
          $data =$lobjBitacora->consultarBitacora();
            
            
          //$resultado = str_replace ( $dato, "hola", $data); 
          header("Content-Type:Application/json");
          echo json_encode($data);
          //usleep(850000);
          break;
            

      }

     
      



?>

