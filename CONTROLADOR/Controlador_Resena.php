<!--Este Programa es el Controlador del Sistema, aqui se invoca a la Vista Principal del Sistema.

	Realizado por: Franklin Rivera
				   Anthony Vasquez
	
	Fecha: 27 de Abril de 2015
-->
<?php


	
		include_once("../MODELO/clsPersona.php");
    include_once("../MODELO/clsActa.php");
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
        $fechaN = $_POST['fechaN'];
        $direccion = $_POST['direccion'];
        $cod_act = $_POST['cod_act'];
        $procesar=1;

      }
      else if(isset($_GET["dato"])){
              $dato = $_GET["dato"];
              $procesar=2;
           
            }
      else if(isset($_POST["cod"])){
            $codigo = $_POST["cod"];
            $ci = $_POST["ced"];
            $nom1 = $_POST["nom1"];
            $nom2 = $_POST["nom2"];
            $ape1 = $_POST["ape1"];
            $ape2 = $_POST["ape2"];
            $fec = $_POST["fec"];
            $dir = $_POST["dir"];

            $procesar=3;
          }


      switch($procesar) {
        case 1:
           $lobjResena=new clsPersona();
           $id = $lobjResena->incluirPersona($cedula,$nombre1,$nombre2,$apellido1,$apellido2);
           $lobjResena->incluirResena($id,$fechaN,$direccion);

           //Bitácora
           date_default_timezone_set("America/Caracas");
           $descripcion1="Se registró la reseña del detenido: ".$nombre1." ".$nombre2." ".$apellido1." ".$apellido2." , 
           portador de la C.I: ".$cedula.", con fecha de nacimiento: ".$fechaN." y la siguiente dirección: ".$direccion.".";
           $fecha1=date("Y/n/j");
            $hora1=date("h:i:s");
            $cod_usu1=$_SESSION["codigo_usuario"];
            $lobjBitacora->incluir($fecha1,$hora1,$descripcion1,$cod_usu1);
            //Fin Bitácora


            $lobjActa = new clsActa();
            $lobjActa->incluirActaPersona($cod_act,$id);

            $lobjActa->finalizar();
            
           break;

        case 2:

            $Resena = new clsPersona();

            if(is_numeric($dato)){
              $Resena->set_cedula($dato);
              
              $data = $Resena->consultarDetenidoCedula();
            }else{
              $Resena->set_nombre($dato);
              $data = $Resena->consultarDetenidoNombre();
            }
            
         

            header("Content-Type:Application/json");
            echo json_encode($data);
            
           break;

        case 3:

          $Resena = new clsPersona();
          $Resena->set_cedula($ci);
          $Resena->set_nombre($nom1);
          $Resena->set_nombre2($nom2);
          $Resena->set_apellido1($ape1);
          $Resena->set_apellido2($ape2);
          

          //Consulta para traer datos anteriores para usar en Bitácora

          $datos= $Resena->traerdatosper($codigo);
          $datos2= $Resena->traerdatosdet($codigo);


          $cedulaa=$datos[1];
          $nombre1a=$datos[2];
          $nombre2a=$datos[3];
          $apellido1a=$datos[4];
          $apellido2a=$datos[5];

          $fechaa=$datos2[1];
          $direcciona=$datos2[2];

          //Bitácora
         
           date_default_timezone_set("America/Caracas");
           $descripcion1="Se modificaron los datos del detenido. Datos Anteriores -> Primer Nombre: ".$nombre1a.",  Segundo Nombre: ".$nombre2a.", Primer Apellido: ".$apellido1a.", Segundo Apellido: ".$apellido2a.", 
           Cédula: ".$cedulaa.", Fecha de Nacimiento: ".$fechaa.", Dirección: ".$direcciona.". Nuevos Datos -> Primer Nombre: ".$nom1.",  Segundo Nombre: ".$nom2.", Primer Apellido: ".$ape1.", Segundo Apellido: ".$ape2.", 
           Cédula: ".$ci.", Fecha de Nacimiento: ".$fec.", Dirección: ".$dir.".";
           $fecha1=date("Y/n/j");
            $hora1=date("h:i:s");
            $cod_usu1=$_SESSION["codigo_usuario"];
            $lobjBitacora->incluir($fecha1,$hora1,$descripcion1,$cod_usu1);
            //Fin Bitácora

          $data = $Resena->modificarPersona($codigo);

          $data2 = $Resena->modificarDetenido($codigo,$fec,$dir);
          


        break;

      

      }

     
  		



?>