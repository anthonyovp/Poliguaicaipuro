<?php 

	include_once("../MODELO/clsDatos.php");
	require('../FPDF/fpdf.php');
	$conexion = mysql_connect("localhost","root","")or die("Error de conexion");
	$db = mysql_select_db("bd_poliguaicaipuro",$conexion)or die("Error de la base de datos");

	function Primer(){
		$row[0] = iconv('UTF-8', 'ISO-8859-1', $row[0]);			
		$row[1] = iconv('UTF-8', 'ISO-8859-1', $row[1]);
		$row[2] = iconv('UTF-8', 'ISO-8859-1', $row[2]);
		$row[3] = iconv('UTF-8', 'ISO-8859-1', $row[3]);
		$row[4] = iconv('UTF-8', 'ISO-8859-1', $row[4]);
		$row[5] = iconv('UTF-8', 'ISO-8859-1', $row[5]);
		$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
		$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
		$this->Cell($w[2],6,$row[2],'LR',0,'R',$fill);
		$this->Cell($w[3],6,$row[3],'LR',0,'R',$fill);
		$this->Cell($w[4],6,$row[4],'LR',0,'R',$fill);
		$this->Cell($w[5],6,$row[5],'LR',0,'R',$fill);
		$this->Ln();
		$fill = !$fill;
	
	}

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
			$this->Cell(1,45,utf8_decode('Lista de Funcionarios'),0,0,'C');
			// Colores, ancho de línea y fuente en negrita
			$this->SetFillColor(7, 1, 123);
			$this->SetTextColor(255);
			//$this->SetDrawColor(128,0,0);
			$this->SetDrawColor(100,100,100);
			$this->SetLineWidth(.4);
			$this->SetFont('','B');
			$this->Ln(30);
			// Cabecera
			$w = array(20, 35, 32, 35 , 35 , 21 , 17);
			for($i=0;$i<count($header);$i++)
				$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
			$this->Ln();
			// Nuevos colores y fuentes
			//$this->SetFillColor(224,235,255);
			$this->SetFillColor(132, 234, 184);
			$this->SetTextColor(0);
			$this->SetFont('');
			// Datos
			$fill = false;
			$con = mysql_num_rows($resultado);
			//echo "<script language='javascript'> alert(''+$con); </script>";

			
			while($row = mysql_fetch_array($resultado)){		
				$row[0] = iconv('UTF-8', 'ISO-8859-1', $row[0]); // cambiar a utf-8			
				$row[1] = iconv('UTF-8', 'ISO-8859-1', $row[1]);
				$row[2] = iconv('UTF-8', 'ISO-8859-1', $row[2]);
				$row[3] = iconv('UTF-8', 'ISO-8859-1', $row[3]);
				$row[4] = iconv('UTF-8', 'ISO-8859-1', $row[4]);
				$row[5] = iconv('UTF-8', 'ISO-8859-1', $row[5]);
				$row[6] = iconv('UTF-8', 'ISO-8859-1', $row[6]);
				$this->Cell($w[0],6,$row[0],'LR',0,'R',$fill);
				$this->Cell($w[1],6,$row[1],'LR',0,'R',$fill);
				$this->Cell($w[2],6,$row[2],'LR',0,'R',$fill);
				$this->Cell($w[3],6,$row[3],'LR',0,'R',$fill);
				$this->Cell($w[4],6,$row[4],'LR',0,'R',$fill);
				$this->Cell($w[5],6,$row[5],'LR',0,'R',$fill);
				$this->Cell($w[6],6,$row[6],'LR',0,'R',$fill);
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
	$header = array('Cedula','1er Nombre', '2do Nombre', '1er Apellido', '2do Apellido' , 'Credencial','Status');
	// Carga de datos
	$pdf->SetFont('Arial','',12);
	$pdf->AddPage();
	$sql = "SELECT cedula_per,nombre1_per,nombre2_per,apellido1_per,apellido2_per,credencial_fun,status_fun FROM Persona  INNER JOIN Funcionario ON Persona.codigo_per = Funcionario.cod_per WHERE status_fun = 'Inactivo' ORDER BY cedula_per ASC ";
	

	$resultado = mysql_query($sql); 
	//echo $resultado;
	if(!$resultado){
			echo "<script language='javascript'> alert('Error de Consulta!'); </script>";
	}else{ 
			
				if(!mysql_num_rows($resultado)){
				
					echo "<script language='javascript'> alert('Ningun Funcionario Registrado!'); window.close(); </script>";
					
				}
			}
	$pdf->Table($header,$resultado);
	$pdf->Output();
?>