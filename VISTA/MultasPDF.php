<?php 

	include_once("../MODELO/clsDatos.php");
	require('../FPDF/fpdf.php');
	$conexion = mysql_connect("localhost","root","")or die("Error de conexion");
	$db = mysql_select_db("bd_poliguaicaipuro",$conexion)or die("Error de la base de datos");



	class PDF extends FPDF
	{
		
		
		function Table($header, $resultado)
		{
			$this->Image('../img/logo.png',10,10,15);
			$this->Cell(20);
			$this->SetFont('Times','I');
			$this->Image('../img/logoalcaldia.jpg',160,10,35);
			$this->Cell(1,10,utf8_decode('POLIGUAICAIPURO'),0,0,'L');
			$this->Cell(80);
			$this->Cell(1,45,utf8_decode('Lista Resumen de Multas'),0,0,'C');
			// Colores, ancho de línea y fuente en negrita
			$this->SetFillColor(7, 1, 123);
			$this->SetTextColor(255);
			//$this->SetDrawColor(128,0,0);
			$this->SetDrawColor(100,100,100);
			$this->SetLineWidth(.4);
			$this->SetFont('','B');
			$this->Ln(30);
			// Cabecera
			$w = array(25, 35, 35, 40 , 35 , 25);
			for($i=0;$i<count($header);$i++)
				$this->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C',true);
			$this->Ln();
			// Nuevos colores y fuentes
			//$this->SetFillColor(224,235,255);
			$this->SetFillColor(132, 234, 184);
			$this->SetTextColor(0);
			$this->SetFont('');
			// Datos
			$fill = false;
			

			
			while($row = mysql_fetch_array($resultado)){
				
				$ced= explode(",", $row["cedula_per"]);
    			$nom= explode(",", $row["nombre1_per"]);   			
    			$ape= explode(",", $row["apellido1_per"]);	
    			$ced = array_pop($ced);
    			$nom = array_pop($nom);
    			$ape = array_pop($ape);

				$row[0] = iconv('UTF-8', 'ISO-8859-1', $row[0]); // cambiar a utf-8			
				$row[1] = iconv('UTF-8', 'ISO-8859-1', $row[1]);
				$row[2] = iconv('UTF-8', 'ISO-8859-1', $row["cedula_per"]);
				$row[3] = iconv('UTF-8', 'ISO-8859-1', $row[3]);
				$row[4] = iconv('UTF-8', 'ISO-8859-1', $row[4]);
				$row[5] = iconv('UTF-8', 'ISO-8859-1', $row[5]);
				
				$this->Cell($w[0],6,$row[1],'LR',0,'R',$fill);
				$this->Cell($w[1],6,$ced,'LR',0,'R',$fill);
				$this->Cell($w[2],6,$nom,'LR',0,'R',$fill);
				$this->Cell($w[3],6,$ape,'LR',0,'R',$fill);
				$this->Cell($w[4],6,$row[5],'LR',0,'R',$fill);
				$this->Cell($w[5],6,$row[0],'LR',0,'R',$fill);
				
				$this->Ln();
				$fill = !$fill;
			}
		
			// Línea de cierre
			$this->Cell(array_sum($w),0,'','T');
		}
		// Pie de página
		function Footer()
		{
		// Posición: a 1,5 cm del final
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Número de página
		$this->Cell(0,10,'Page '.$this->PageNo().'',0,0,'C');
		}
	}

	$pdf = new PDF('P','mm','letter');
	// Títulos de las columnas
	$header = array('Fecha', 'Cedula', 'Nombre', 'Apellido','Placa','Status');
	// Carga de datos
	$pdf->SetFont('Arial','',12);
	$pdf->AddPage();
	$sql = "SELECT m.status_mul , m.fecha_mul , GROUP_CONCAT(p.cedula_per ORDER BY p.codigo_per) AS cedula_per ,
	GROUP_CONCAT(p.nombre1_per ORDER BY p.codigo_per) AS nombre1_per , GROUP_CONCAT(p.apellido1_per ORDER BY p.codigo_per) AS apellido1_per ,
	v.placa_veh  FROM Multa m INNER JOIN Vehiculo v ON v.codigo_veh = m.cod_veh 
	INNER JOIN Multa_Persona mp ON m.codigo_mul = mp.cod_mul INNER JOIN Persona p ON p.codigo_per = mp.cod_per GROUP BY m.codigo_mul ORDER BY m.numero_mul ";
	

	$resultado = mysql_query($sql); 
	//echo $resultado;
	if(!$resultado){
			echo "<script language='javascript'> alert('Error de Consulta!'); </script>";
	}else{ 
			
				if(!mysql_num_rows($resultado)){
				
					echo "<script language='javascript'> alert('Ninguna Multa Registrada!'); window.close();</script>";
					
				}
			}
	$pdf->Table($header,$resultado);
	$pdf->Output();
?>