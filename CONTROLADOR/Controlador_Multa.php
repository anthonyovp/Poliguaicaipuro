<?php


	
	include_once("../MODELO/clsPersona.php");
    include_once("../MODELO/clsMulta.php");
    include_once("../MODELO/clsVehiculo.php");
	include_once("../MODELO/clsBitacora.php");
		/*--------------------------------------------*/
        $lobjBitacora=new clsBitacora();
		

  		/*--------------------------------------------*/
  		
      if(isset($_POST['Guardar'])){

        //datos de multado
        $cedula = $_POST['cedula']; 
        $nombre1 = $_POST['nombre1']; 
        $nombre2 = ""; 
        $apellido1 = $_POST['apellido1']; 
        $apellido2 = "";
        //datos de multa
        $cod_fun = $_POST['cod_fun'];
        $numero = $_POST['numero'];
        $fecha = $_POST['fecha'];
        $ut = $_POST['ut'];
        $monto = $_POST['monto'];
        $comentario = $_POST['comentario'];
        //datos de vehiculo de la persona multada
        $placa = $_POST['placa'];
        $marca_veh = $_POST['marca'];
        $modelo_veh = $_POST['modelo'];
        $tipo_veh = $_POST['tipo'];
        $procesar=1;

      }
      else if(isset($_POST["num"])){

        $codigo = $_POST["cod"];  
        $cedula = $_POST["cedula"];  
        $placa = $_POST["placa"]; 
        $num = $_POST["num"];
        $fec = $_POST["fec"];
        $ut = $_POST["ut"];
        $mon = $_POST["mon"];
        $com = $_POST["com"];
        $ced = $_POST["ced"];
        $nom = $_POST["nom"];
        $ape = $_POST["ape"];
        $pla = $_POST["pla"];
        $mod = $_POST["mod"];
        $mar = $_POST["mar"];
        $tip = $_POST["tip"];
        $sta = $_POST["sta"];
        $nom2 = "";
        $ape2 = "";
        
        $procesar=3;
      }

      else if(isset($_GET["dato"])){
              $dato = $_GET["dato"];
              $procesar=2;
            }else{

              $dato = "1";
              $procesar=2;
            }
    
  		//echo "<script> alert('Hola!');</script>";
      switch($procesar) {
        case 1:

            $lobjMultado=new clsPersona();
            $sql = "SELECT cod_per FROM Multado INNER JOIN Persona ON Persona.codigo_per = Multado.cod_per WHERE Persona.cedula_per = $cedula";
            $cod_mul = $lobjMultado->consultarCod($sql);
            
            if($cod_mul == 0){
              
              $cod_mul = $lobjMultado->incluirPersona($cedula,$nombre1,$nombre2,$apellido1,$apellido2);
              $lobjMultado->incluirMultado($cod_mul);
              //Bitácora
           date_default_timezone_set("America/Caracas");
           $descripcion1="Se registraron los datos del Multado: ".$nombre1." ".$apellido1." , portador de la C.I: ".$cedula.".";
           $fecha1=date("Y/n/j");
            $hora1=date("h:i:s");
            $cod_usu1=$_SESSION["codigo_usuario"];
            $lobjBitacora->incluir($fecha1,$hora1,$descripcion1,$cod_usu1);
            //Fin Bitácora
              
  

            }

            $lobjVehiculo = new clsVehiculo();

            $sql = "SELECT placa_veh FROM Vehiculo  WHERE placa_veh = '$placa'";

            $cod_veh = $lobjVehiculo->consultarCod($sql);
            
            
            if($cod_veh < 1){
              
              
              $cod_veh = $lobjVehiculo->incluir($placa,$marca_veh,$modelo_veh,$tipo_veh);
              //Bitácora
           date_default_timezone_set("America/Caracas");
           $descripcion1="Se registró el vehículo de placa: ".$placa.", marca: ".$marca_veh.", modelo: ".$modelo_veh." y de tipo: ".$tipo_veh.".";
           $fecha1=date("Y/n/j");
            $hora1=date("h:i:s");
            $cod_usu1=$_SESSION["codigo_usuario"];
            $lobjBitacora->incluir($fecha1,$hora1,$descripcion1,$cod_usu1);
            //Fin Bitácora
  

            }
            
            
            $lobjMulta = new clsMulta();
            $cod_multa = $lobjMulta->incluirMulta($numero,$fecha,$ut,$monto,$comentario,$cod_veh);
            $lobjMulta->incluirMultaPersona($cod_multa,$cod_mul);
            $lobjMulta->incluirMultaPersona2($cod_multa,$cod_fun);


            //Consulta para traer datos del funcionario para usar en Bitácora
            $funcionario = new clsPersona();
          $datos= $funcionario->traerdatos($cod_fun);
          $credenciala=$datos[1];
          $statusa=$datos[2];
          $cedulaa=$datos[5];
          $nombre1a=$datos[6];
          $nombre2a=$datos[7];
          $apellido1a=$datos[8];
          $apellido2a=$datos[9];
          //fin de consulta


          //Consulta para traer datos de la persona para usar en Bitácora
            $persona = new clsPersona();
          $datos= $persona->traerdatosper($cod_mul);
         
          $cedulap=$datos[1];
          $nombre1p=$datos[2];
          $nombre2p=$datos[3];
          $apellido1p=$datos[4];
          $apellido2p=$datos[5];
          //fin de consulta

          //Consulta para traer datos del vehículo para usar en Bitácora
            $vehiculo = new clsVehiculo();
          $datos= $vehiculo->traerdatos($cod_veh);
         
          $placav=$datos[1];
          $marcav=$datos[2];
          $modelov=$datos[3];
          $tipov=$datos[4];
          
          //fin de consulta



                //Bitácora
           date_default_timezone_set("America/Caracas");
           $descripcion1="Se registró la multa nº: ".$numero.", de fecha: ".$fecha." y de: ".$ut." U.T., con un monto de: ".$monto." bs. 
           La multa fue registrada al ciudadano(a): ".$nombre1p." ".$apellido1p.", titular de la C.I: ".$cedulap."; 
           con el vehículo de placa: ".$placav.", marca: ".$marcav.", modelo: ".$modelov." y de tipo: ".$tipov.". El funcionario actuante 
           fue: ".$nombre1a." ".$nombre2a." ".$apellido1a." ".$apellido2a.", titular de la C.I: ".$cedulaa." y de la credencial nº: ".$credenciala.".";
           $fecha1=date("Y/n/j");
            $hora1=date("h:i:s");
            $cod_usu1=$_SESSION["codigo_usuario"];
            $lobjBitacora->incluir($fecha1,$hora1,$descripcion1,$cod_usu1);
            //Fin Bitácora


            

           

        break;    
         
        case 2:

            $lobjMulta=new clsMulta();
            
       
            $data =$lobjMulta->consultarMultaFecha($dato);

            
            //$resultado = str_replace ( $dato, "hola", $data); 
            header("Content-Type:Application/json");
            echo json_encode($data);
            //usleep(850000);

            break;

        case 3:

            $lobjMultado = new clsPersona();
            $lobjMultado->set_cedula($ced);
            $lobjMultado->set_nombre($nom);
            $lobjMultado->set_nombre2($nom2);
            $lobjMultado->set_apellido1($ape);
            $lobjMultado->set_apellido2($ape2);


            //Consulta para traer datos anteriores de la persona para usar en Bitácora
            $persona = new clsPersona();
          $datos= $persona->traerdatosper2($cedula);
         
          $cedulaa=$datos[1];
          $nombre1a=$datos[2];
          $nombre2a=$datos[3];
          $apellido1a=$datos[4];
          $apellido2a=$datos[5];
          //fin de consulta

            $data = $lobjMultado->modificarPersona($cedula);

            //Bitácora
         
           date_default_timezone_set("America/Caracas");
           $descripcion1="Se modificaron los datos del Multado. Datos Anteriores -> Primer Nombre: ".$nombre1a.", Primer Apellido: ".$apellido1a.", Cédula: ".$cedulaa.".  
           Nuevos Datos -> Primer Nombre: ".$nom.", Primer Apellido: ".$ape.", Cédula: ".$ced.".";
           $fecha1=date("Y/n/j");
            $hora1=date("h:i:s");
            $cod_usu1=$_SESSION["codigo_usuario"];
            $lobjBitacora->incluir($fecha1,$hora1,$descripcion1,$cod_usu1);
            //Fin Bitácora



            if($data == 1){
              //echo '<script language="javascript">alert("Registro Modificado Exitosamente! ");</script>'; 
            }else if($data == 0){
              //echo '<script language="javascript">alert("Registro No Modificado! ");</script>'; 
            }

            $lobjVehiculo = new clsVehiculo();
            $lobjVehiculo->set_placa($pla);
            $lobjVehiculo->set_modelo_veh($mod);
            $lobjVehiculo->set_marca_veh($mar);
            $lobjVehiculo->set_tipo_veh($tip);
            

            //Consulta para traer datos del vehículo para usar en Bitácora
            $vehiculo = new clsVehiculo();
          $datos= $vehiculo->traerdatos2($placa);
         
          $placav=$datos[1];
          $marcav=$datos[2];
          $modelov=$datos[3];
          $tipov=$datos[4];
          
          //fin de consulta


          //Bitácora
         
           date_default_timezone_set("America/Caracas");
           $descripcion1="Se modificaron los datos del Vehículo. Datos Anteriores -> Placa: ".$placav.",  Marca: ".$marcav.", Modelo: ".$modelov.", Tipo: ".$tipov.".  
           Nuevos Datos -> Placa: ".$pla.",  Marca: ".$mar.", Modelo: ".$mod.", Tipo: ".$tip.".";
           $fecha1=date("Y/n/j");
            $hora1=date("h:i:s");
            $cod_usu1=$_SESSION["codigo_usuario"];
            $lobjBitacora->incluir($fecha1,$hora1,$descripcion1,$cod_usu1);
            //Fin Bitácora


            $data = $lobjVehiculo->modificarVehiculo($placa);

            if($data == 1){
              //echo '<script language="javascript">alert("Registro Modificado Exitosamente! ");</script>'; 
            }else if($data == 0){
              //echo '<script language="javascript">alert("Registro No Modificado! ");</script>'; 
            }



            $lobjMulta = new clsMulta();
            $lobjMulta->set_numero($num);
            $lobjMulta->set_fecha($fec);
            $lobjMulta->set_ut($ut);
            $lobjMulta->set_monto($mon);
            $lobjMulta->set_comentario($com);
            $lobjMulta->set_status($sta);

            //Consulta para traer datos anteriores de la multa para usar en Bitácora

                $datos= $lobjMulta->traerdatos($codigo);
         
                $numerom=$datos[1];
                $fecham=$datos[2];
                $utm=$datos[3];
                $montom=$datos[4];
                $comentariom=$datos[5];
                $statusm=$datos[6];
          
          //fin de consulta



            
            $data = $lobjMulta->modificarMulta($codigo);


             //Bitácora
         
           date_default_timezone_set("America/Caracas");
           $descripcion1="Se modificaron los datos de la multa. Datos Anteriores -> Número de multa: ".$numerom.",  Fecha: ".$fecham.", U.T.: ".$utm.", Monto: ".$montom." bs, 
           Comentario: ".$comentariom.", Status: ".$statusm.". Nuevos Datos -> Número de multa: ".$num.",  Fecha: ".$fec.", U.T.: ".$ut.", Monto: ".$mon." bs, 
           Comentario: ".$com.", Status: ".$sta.".";
           $fecha1=date("Y/n/j");
            $hora1=date("h:i:s");
            $cod_usu1=$_SESSION["codigo_usuario"];
            $lobjBitacora->incluir($fecha1,$hora1,$descripcion1,$cod_usu1);
            //Fin Bitácora
            if($data == 1){
              //echo '<script language="javascript">alert("Registro Modificado Exitosamente! ");</script>'; 
            }else if($data == 0){
              //echo '<script language="javascript">alert("Registro No Modificado! ");</script>'; 
            }



        break;

      

      }

     
  		



?>