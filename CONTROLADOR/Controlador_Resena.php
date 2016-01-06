<!--Este Programa es el Controlador del Sistema, aqui se invoca a la Vista Principal del Sistema.

	Realizado por: Franklin Rivera
				   Anthony Vasquez
	
	Fecha: 27 de Abril de 2015
-->

<?php


	
		include_once("../MODELO/clsPersona.php");
    include_once("../MODELO/clsActa.php");
		
		/*--------------------------------------------*/

		

  		/*--------------------------------------------*/
  		
      if($_POST['Guardar']){
        $cedula = $_POST['cedula']; 
        $nombre1 = $_POST['nombre1']; 
        $nombre2 = $_POST['nombre2']; 
        $apellido1 = $_POST['apellido1']; 
        $apellido2 = $_POST['apellido2'];
        $fechaN = $_POST['fechaN'];
        $direccion = $_POST['direccion'];
        $cod_act = $_POST['cod_act'];
        $procesar=1;

      }
      else if(isset($_GET["dato"])){
              $dato = $_GET["dato"];
              $procesar=2;
           
            }
      else if(isset($_POST["codigo"])){
            $codigo = $_POST["codigo"];
            $ci = $_POST["ci"];
            $nom1 = $_POST["nom1"];
            $nom2 = $_POST["nom2"];
            $ape1 = $_POST["ape1"];
            $ape2 = $_POST["ape2"];

            $procesar=3;
          }


      switch($procesar) {
        case 1:
           $lobjResena=new clsPersona();
           $id = $lobjResena->incluirPersona($cedula,$nombre1,$nombre2,$apellido1,$apellido2);
           $lobjResena->incluirResena($id,$fechaN,$direccion);


            $lobjActa = new clsActa();
            $lobjActa->incluirActaPersona($cod_act,$id);

            $lobjActa->finalizar();
            
           break;

        case 2:

            $Resena = new clsPersona();

            if(is_numeric($dato)){
              $Resena->set_cedula($dato);
              
              $data = $Resena->consultarResenaCedula();
            }else{
              $Resena->set_nombre($dato);
              $data = $Resena->consultarResenaNombre();
            }
            
           

            header("Content-Type:Application/json");
            echo json_encode($datos);
            
           break;

        case 3:

          $Resena = new clsPersona();
          $Resena->set_cedula($ci);
          $Resena->set_nombre($nom1);
          $Resena->set_nombre2($nom2);
          $Resena->set_apellido1($ape1);
          $Resena->set_apellido2($ape2);
          

          $data = $Resena->modificarPersona($codigo);
          $data2 = $Resena->modificarResena($codigo,$cre,$sta);


        break;

      

      }

     
  		



?>