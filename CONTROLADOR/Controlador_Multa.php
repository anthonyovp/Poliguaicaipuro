<?php


	
		include_once("../MODELO/clsPersona.php");
    include_once("../MODELO/clsMulta.php");
    include_once("../MODELO/clsVehiculo.php");
		
		/*--------------------------------------------*/

		

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
              
  

            }

            $lobjVehiculo = new clsVehiculo();

            $sql = "SELECT placa_veh FROM Vehiculo  WHERE placa_veh = '$placa'";
            
            $cod_veh = $lobjVehiculo->consultarCod($sql);
            
            
            if($cod_veh < 1){
              
              
              $cod_veh = $lobjVehiculo->incluir($placa,$marca_veh,$modelo_veh,$tipo_veh);
              
  

            }
            
            
            $lobjMulta = new clsMulta();
            $cod_multa = $lobjMulta->incluirMulta($numero,$fecha,$ut,$monto,$comentario,$cod_veh);
            $lobjMulta->incluirMultaPersona($cod_multa,$cod_mul);
            $lobjMulta->incluirMultaPersona2($cod_multa,$cod_fun);



            
           

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

            $data = $lobjMultado->modificarPersona($cedula);
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
            

            $data = $lobjMulta->modificarMulta($codigo);
            if($data == 1){
              //echo '<script language="javascript">alert("Registro Modificado Exitosamente! ");</script>'; 
            }else if($data == 0){
              //echo '<script language="javascript">alert("Registro No Modificado! ");</script>'; 
            }



        break;

      

      }

     
  		



?>