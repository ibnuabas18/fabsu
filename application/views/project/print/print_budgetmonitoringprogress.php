<?php

		
			require('fpdf/tanpapage.php');
			extract(PopulateForm());
			$pdf=new PDF('P','mm','A4');
			
			$pdf->SetMargins(10,10,2);
			$pdf->AliasNbPages();	
			$pdf->AddPage();
			$pdf->SetFont('Arial','B',12);
			$pdf->setFillColor(222,222,222);
			
			#HEAD
			#HEADER CONTENT
				$pt			= "PT. Graha Multi Insani";
				$judul 		= "Budget Monitoring Progress";
				$periode	= "Periode";
	
			#CETAK TANGGAL
				$tgl  = date("d-m-Y");
			#TANGGAL CETAK
				$pdf->SetFont('Arial','',6);
				$pdf->SetXY(258,10);
				$pdf->Cell(10,4,'Print Date',0,0,'L',0);	
							
				$pdf->SetXY(268,10);
				$pdf->Cell(2,4,':',4,0,'L');
								
				$pdf->SetXY(269,10);
				$pdf->Cell(10,4,$tgl,0,0,'L');
			
			#Header
				$pdf->Image(site_url().'assets/images/bakrie_gmi.JPG',4,8,20);	
				$pdf->SetFont('Arial','B',18);
	
				$pdf->SetX(25);
				$pdf->Cell(0,10,$pt,20,0,'L');
			
				$pdf->SetFont('Arial','B',12);
				
				$pdf->SetXY(25,16);
				$pdf->Cell(0,10,$judul,20,0,'L');
				$pdf->SetFont('Arial','B',11);
				$pdf->SetXY(25,22);
				$pdf->Cell(0,10,'As Of'.' : '. ' s/d ',20,0,'L');
		
				$pdf->Ln(10);
				
				$pdf->Cell(0,0,'',1,0,'L');
			
			// Start Isi Tabel
			
		
		
			$pdf->SetFont('Arial','B',7);
			$pdf->Ln(4);
			
			$pdf->Cell(8,5,'No',1,0,'C',1);
			$pdf->Cell(80,5,'Project Description',1,0,'C',1);
			$pdf->Cell(30,5,'Budget',1,0,'C',1);
			$pdf->Cell(30,5,'Progress',1,0,'C',1);
			$pdf->Cell(30,5,'%',1,0,'C',1);
				
			
		
			$pdf->SetFont('Arial','',6);
			
			$i = 1;	
			$no = 1;
			$noo = 0;
			$max = 45;	
			$pdf->Ln(5);
			
					
			
	for($i = 1;$i <= 200; $i++){
		if($noo == $max){ 
			$pdf->AddPage();
			//				
			#CETAK TANGGAL
				$tgl  = date("d-m-Y");
			#HEADER CONTENT
				$pt			= "PT. Graha Multi Insani";
				$judul 		= "Budget Monitoring Progress";
				$periode	= "Periode";
				
			#CETAK TANGGAL
				$tgl  = date("d-m-Y");
			#TANGGAL CETAK
				$pdf->SetFont('Arial','',6);
				$pdf->SetXY(258,10);
				$pdf->Cell(10,4,'Print Date',0,0,'L',0);	
							
				$pdf->SetXY(268,10);
				$pdf->Cell(2,4,':',4,0,'L');
								
				$pdf->SetXY(269,10);
				$pdf->Cell(10,4,$tgl,0,0,'L');
			
			#$month1 = date( 'F', mktime(0, 0, 0, $periode1));		
			#$month2 = date( 'F', mktime(0, 0, 0, $periode2));		
					
			#Header
				$pdf->Image(site_url().'assets/images/bakrie_gmi.JPG',4,8,20);	
				$pdf->SetFont('Arial','B',18);
	
				$pdf->SetX(25);
				$pdf->Cell(0,10,$pt,20,0,'L');
			
				$pdf->SetFont('Arial','B',12);
				
				$pdf->SetXY(25,16);
				$pdf->Cell(0,10,$judul,20,0,'L');
				$pdf->SetFont('Arial','B',11);
				$pdf->SetXY(25,22);
				$pdf->Cell(0,10,'As Of'.' : '. ' s/d ',20,0,'L');
			
				$pdf->Ln(10);
				
				$pdf->Cell(0,0,'',1,0,'L');
								
			
			$pdf->SetX(2);
			$pdf->SetFont('Arial','B',8);
			$pdf->Ln(4);
			$pdf->Cell(8,5,'No',1,0,'C',1);
			$pdf->Cell(80,5,'Project Description',1,0,'C',1);
			$pdf->Cell(30,5,'Budget',1,0,'C',1);
			$pdf->Cell(30,5,'Progress',1,0,'C',1);
			$pdf->Cell(30,5,'%',1,0,'C',1);
			
			
			$pdf->Ln(5);
			$noo = 0;
	
			
		}
	$a = "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa4";
			$pdf->SetFont('Arial','',6);
			$pdf->Cell(8,5,$no,1,0,'C',0);
			$pdf->Cell(80,5,'Project Description',1,0,'C',0);
			$pdf->Cell(30,5,'Budget',1,0,'C',0);
			$pdf->Cell(30,5,'Progress',1,0,'C',0);
			$pdf->Cell(30,5,'%',1,0,'C',0);
		
			$pdf->Ln(5);		
			$i++;
			$no++;
			$noo++;
		
	}
			$pdf->SetFont('Arial','B',6);
	  	/*
			//$pdf->Cell(8,5,$no,1,0,'C',0);
			$pdf->Cell(23,5,'',10,0,'C',0);
			$pdf->Cell(40,5,'',10,0,'C',0);
			$pdf->Cell(60,5,'',10,0,'L',0);
			$pdf->Cell(20,5,'',10,0,'L',0);
			$pdf->Cell(40,5,'TOTAL',1,0,'C',1);
			$pdf->Cell(20,5,number_format(1000000000),1,0,'R',1);
		*/
			$pdf->Ln(10);
				$pdf->SetFont('Arial','',6);
				$pdf->SetX(180);
				$pdf->Cell(10,4,'Print Date',0,0,'L',0);	
				$pdf->Cell(2,4,':',4,0,'L');
				$pdf->Cell(2,4,date("Y-m-d"),4,0,'L');
			$pdf->Output("budgetmonitoringprogress.pdf","I");	;
	
