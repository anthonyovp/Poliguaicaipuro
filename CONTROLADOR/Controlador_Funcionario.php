<!--Este Programa es el Controlador del Sistema, aqui se invoca a la Vista Principal del Sistema.

	Realizado por: Franklin Rivera
				   Anthony Vasquez
	
	Fecha: 27 de Abril de 2015
-->

<?php


	
		include_once("../MODELO/clsPersona.php");
		
		/*--------------------------------------------*/

		

  		/*--------------------------------------------*/
  		
      if($_POST['Guardar']){
        $cedula = $_POST['cedula']; 
        $nombre1 = $_POST['nombre1']; 
        $nombre2 = $_POST['nombre2']; 
        $apellido1 = $_POST['apellido1']; 
        $apellido2 = $_POST['apellido2'];
        $credencial = $_POST['credencial'];
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
            $cre = $_POST["cre"];
            $sta = $_POST["sta"];

            $procesar=3;
          }else{
            $ci = "1";
            $procesar=3;
          
          }


      switch($procesar) {
        case 1:
           $lobjFuncionario=new clsPersona();
           $id = $lobjFuncionario->incluirPersona($cedula,$nombre1,$nombre2,$apellido1,$apellido2,$credencial);
           $lobjFuncionario->incluirFuncionario($id,$credencial);
           break;

        case 2:

            $funcionario = new clsPersona();

            if(is_numeric($dato)){
              $funcionario->set_cedula($dato);
              
              $data = $funcionario->consultarFuncionarioCedula();
            }else{
              $funcionario->set_nombre($dato);
              $data = $funcionario->consultarFuncionarioNombre();
            }
            
           

            header("Content-Type:Application/json");
            echo json_encode($datos);
            
           break;

        case 3:

          $funcionario = new clsPersona();
          $funcionario->set_cedula($ci);
          $funcionario->set_nombre($nom1);
          $funcionario->set_nombre2($nom2);
          $funcionario->set_apellido1($ape1);
          $funcionario->set_apellido2($ape2);
          

          $data = $funcionario->modificarPersona($codigo);
          $data2 = $funcionario->modificarFuncionario($codigo,$cre,$sta);


        break;

      

      }

     
  		



?>