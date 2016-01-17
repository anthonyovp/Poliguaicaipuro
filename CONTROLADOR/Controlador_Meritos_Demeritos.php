<?php


	
    include_once("../MODELO/clsMeritosDemeritos.php");
    
		
		/*--------------------------------------------*/

		

  		/*--------------------------------------------*/
  		
      if(isset($_POST['Guardar'])){

        //datos de merito o demerito 

        $cod_fun = $_POST['cod_fun']; 
        $fec = $_POST['fec']; 
        $dep = $_POST["dep"];
        $tip = $_POST["tip"];
        $cat = $_POST["cat"];
        $com = $_POST["com"];
        if(isset($_POST["esp"])){
             $esp = $_POST["esp"];

        }else {
          $esp = "";
        }

       
        $procesar=1;

      }

       else if(isset($_GET["dato"])){
              $dato = $_GET["dato"];
              $procesar=2;
            }

      else if(isset($_POST["cod"])){

        $codigo = $_POST["cod"];  
        $tip = $_POST["tip"];
        $fec = $_POST["fec"];
        $cat = $_POST["cat"];
        $esp = $_POST["esp"];
        $dep = $_POST["dep"];
        $com = $_POST["com"];

        
        $procesar=3;
      }

     
    
  		//echo "<script> alert('Hola!');</script>";
      switch($procesar) {
        case 1:

            $lobjMerDem=new clsMeritosDemeritos();
            
            $lobjMerDem->incluir($cod_fun, $fec, $dep, $com , $tip ,$cat, $esp);



        break;    
         
        case 2:

             $lobjMerDem=new clsMeritosDemeritos();
            
              if(is_numeric($dato)){

                $data = $lobjMerDem->consultarFuncionarioCedula($dato);
              }else{

                $data = $lobjMerDem->consultarFuncionarioNombre($dato);
              }

            

            header("Content-Type:Application/json");
            echo json_encode($data);

            break;

        case 3:

            
            $lobjMerDem=new clsMeritosDemeritos();

            $lobjMerDem->set_fecha($fec);
            $lobjMerDem->set_tipo($tip);
            $lobjMerDem->set_categoria($cat);
            $lobjMerDem->set_especificacion($esp);
            $lobjMerDem->set_dependencia($dep);
            $lobjMerDem->set_comentario($com);


            $data = $lobjMerDem->modificarMerDem($codigo);



        break;

      

      }

     
  		



?>