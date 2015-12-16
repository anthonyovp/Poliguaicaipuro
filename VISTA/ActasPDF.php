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
			$this->Cell(1,45,utf8_decode('Lista Resumen de Actas'),0,0,'C');
			// Colores, ancho de línea y fuente en negrita
			$this->SetFillColor(7, 1, 123);
			$this->SetTextColor(255);
			//$this->SetDrawColor(128,0,0);
			$this->SetDrawColor(100,100,100);
			$this->SetLineWidth(.4);
			$this->SetFont('','B');
			$this->Ln(30);
			// Cabecera
			$w = array(15, 25, 35, 40 , 25 , 55);
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
			$con = mysql_num_rows($resultado);
			//echo "<script language='javascript'> alert(''+$con); </script>";

			
			while($row = mysql_fetch_array($resultado)){		
				$row[0] = iconv('UTF-8', 'ISO-8859-1', $row[0]); // cambiar a utf-8			
				$row[1] = iconv('UTF-8', 'ISO-8859-1', $row[1]);
				$row[2] = iconv('UTF-8', 'ISO-8859-1', $row[2]);
				$row[3] = iconv('UTF-8', 'ISO-8859-1', $row[3]);
				$row[4] = iconv('UTF-8', 'ISO-8859-1', $row[4]);
				$row[5] = iconv('UTF-8', 'ISO-8859-1', $row[5]);
				$this->Cell($w[0],6,$row[0],'LR',0,'R',$fill);
				$this->Cell($w[1],6,$row[1],'LR',0,'R',$fill);
				$this->Cell($w[2],6,$row[2],'LR',0,'R',$fill);
				$this->Cell($w[3],6,$row[3],'LR',0,'R',$fill);
				$this->Cell($w[4],6,$row[4],'LR',0,'R',$fill);
				$this->Cell($w[5],6,$row[5],'LR',0,'R',$fill);
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
	$header = array('Código','Fecha', 'Tipo', 'Sector', 'Funcionarios' , 'Procedimiento');
	// Carga de datos
	$pdf->SetFont('Arial','',12);
	$pdf->AddPage();
	$sql = "SELECT a.numero_act  , a.fecha_act ,a.tipo_act ,a.sector_act ,  COUNT(per.codigo_per) AS cantidad_per , p.nombre_pro
		FROM Procedimiento p INNER JOIN Acta a ON p.codigo_pro = a.cod_pro	 INNER JOIN acta_per ap ON a.codigo_act = ap.cod_act INNER JOIN Persona per ON ap.cod_per = per.codigo_per INNER JOIN Funcionario f ON per.codigo_per = f.cod_per
			 GROUP BY a.codigo_act";
	

	$resultado = mysql_query($sql); 
	//echo $resultado;
	if(!$resultado){
			echo "<script language='javascript'> alert('Error de Consulta!'); </script>";
	}else{ 
			
				if(!mysql_num_rows($resultado)){
				
					echo "<script language='javascript'> alert('Ninguna Acta Registrada!'); window.close();</script>";
					
				}
			}
	$pdf->Table($header,$resultado);
	$pdf->Output();
?>