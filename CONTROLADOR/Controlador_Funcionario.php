<!--Este Programa es el Controlador del Sistema, aqui se invoca a la Vista Principal del Sistema.

	Realizado por: Franklin Rivera
				   Anthony Vasquez
	
	Fecha: 27 de Abril de 2015
-->

<?php


	
		include_once("../MODELO/clsPersona.php");
		include_once("../MODELO/clsBitacora.php");
		/*--------------------------------------------*/

		 $lobjBitacora=new clsBitacora();

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
          
           $id = $lobjFuncionario->incluirPersona($cedula,$nombre1,$nombre2,$apellido1,$apellido2);
           $lobjFuncionario->incluirFuncionario($id,$credencial);
           //Bitácora
           date_default_timezone_set("America/Caracas");
           $descripcion1="Se registró al Funcionario ".$nombre1." ".$nombre2." ".$apellido1." ".$apellido2. ", portador de la C.I: ".$cedula.", con la Credencial Nº: ".$credencial.".";
           $fecha1=date("Y/n/j");
            $hora1=date("h:i:s");
            $cod_usu1=$_SESSION["codigo_usuario"];
            $lobjBitacora->incluir($fecha1,$hora1,$descripcion1,$cod_usu1);
            //Fin Bitácora
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
          

          

          //Consulta para traer datos anteriores para usar en Bitácora

          $datos= $funcionario->traerdatos($codigo);
          $credenciala=$datos[1];
          $statusa=$datos[2];
          $cedulaa=$datos[5];
          $nombre1a=$datos[6];
          $nombre2a=$datos[7];
          $apellido1a=$datos[8];
          $apellido2a=$datos[9];


          //Para Modificar los Datos
          $data = $funcionario->modificarPersona($codigo);
          $data2 = $funcionario->modificarFuncionario($codigo,$cre,$sta);



          //Bitácora
         
           date_default_timezone_set("America/Caracas");
           $descripcion1="Se modificaron los datos del Funcionario. Datos Anteriores -> Primer Nombre: ".$nombre1a.",  Segundo Nombre: ".$nombre2a.", Primer Apellido: ".$apellido1a.", Segundo Apellido: ".$apellido2a.", Cédula: ".$cedulaa.", Credencial: ".$credenciala.", Status: ".$statusa.". 
           Nuevos Datos -> Primer Nombre: ".$nom1.",  Segundo Nombre: ".$nom2.", Primer Apellido: ".$ape1.", Segundo Apellido: ".$ape2.", Cédula: ".$ci.", Credencial: ".$cre.", Status: ".$sta.".";
           $fecha1=date("Y/n/j");
            $hora1=date("h:i:s");
            $cod_usu1=$_SESSION["codigo_usuario"];
            $lobjBitacora->incluir($fecha1,$hora1,$descripcion1,$cod_usu1);
            //Fin Bitácora




        break;

      

      }

     
  		



?>