<?php

		
			require('fpdf/tanpapage.php');
			extract(PopulateForm());
			$pdf=new PDF('L','mm','A4');
			//die($ven);
			
			//die($kat."-".$div."-".$ven);
			
			$data = $this->db->query("sp_unclosepogmi '".inggris_date($start_date)."','".inggris_date($end_date)."'")
							 ->result();
							 
			$pdf->SetMargins(10,0,0,5);
			$pdf->AliasNbPages();	
			$pdf->AddPage();
			$pdf->SetFont('Arial','B',12);
			$pdf->setFillColor(222,222,222);
			if ($kat == 1){
						$kat = 'Divisi';
					}else if ($kat == 2){
						$kat = 'Vendor';
					}else if ($kat == 3){
						$kat = 'ALL';
					}else {
						$kat = 'anda salah syntax';
					}
			#HEAD
			#HEADER CONTENT
			#$pdf->Image(site_url().'assets/images/bakrie_gmi.JPG',4,8,20);	
				$judul 		= "UNCLOSE PO REPORT";
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
				$pdf->Cell(0,10,$judul,20,0,'L');
			
				$pdf->SetFont('Arial','',8);
				
					
				
				
				$pdf->SetXY(25,16);
				$pdf->Cell(0,10,'Kategori'.' : '.$kat,20,0,'L');
				$pdf->SetXY(25,19);
				$pdf->Cell(0,10,'Periode'.' : '.$start_date.' s/d '.$end_date,20,0,'L');
		
			
			// Start Isi Tabel
			
			$pdf->Ln(15);
							
			$pdf->SetX(3);
			
			
			$pdf->SetFont('Arial','',6);
				
			
			
			$pdf->Ln(4);
			
			
			$pdf->Cell(8,10,'No',1,0,'C',1);
			$pdf->Cell(50,5,'PO',1,0,'C',1);
			$pdf->Cell(50,5,'MRR',1,0,'C',1);
			$pdf->Cell(30,10,'VENDOR',1,0,'C',1);
			$pdf->Cell(70,10,'Description',1,0,'C',1);
			$pdf->Cell(20,10,'Amount',1,0,'C',1);
			$pdf->Cell(25,10,'Division',1,0,'C',1);
			$pdf->Cell(30,5,'Lead Time',1,0,'C',1);
			
			
			$pdf->Ln(5);
			
			
			//$pdf->Cell(22,5,'I. THE 18th',1,0,'C',0);
			$pdf->Cell(8,5,'',0,0,'C',0);
			$pdf->Cell(20,5,'Date',1,0,'C',1);
			$pdf->Cell(30,5,'No',1,0,'C',1);
			$pdf->Cell(20,5,'Date',1,0,'C',1);
			$pdf->Cell(30,5,'No',1,0,'C',1);
			$pdf->Cell(30,5,'',0,0,'R',0);
			$pdf->Cell(70,5,'',0,0,'R',0);
			$pdf->Cell(20,5,'',0,0,'R',0);
			$pdf->Cell(25,5,'',0,0,'R',0);
			$pdf->Cell(15,5,'PR to PO',1,0,'C',1);
			$pdf->Cell(15,5,'PO to MRR',1,0,'C',1);		
			
			
			
			
			
			//$pdf->Cell(22,5,'I. THE 18th',1,0,'C',0);
					
			
			$i = 1;	
			$no = 0;
			$max = 27;	
			$pdf->Ln(5);
			$tot = 0;
			
			
			
	foreach($data as $row){
			$tot = $tot + $row->harga_tot;	
		if($no == $max){ 
			$pdf->AddPage();
			//				
			#CETAK TANGGAL
				$tgl  = date("d-m-Y");
			#HEADER CONTENT
				$judul 		= "OUTSTANDING PR REPORT";
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
			
				$pdf->SetFont('Arial','B',18);
	
				$pdf->SetX(25);
				$pdf->Cell(0,10,$judul,20,0,'L');
				$pdf->Image(site_url().'assets/images/bakrie_gmi.JPG',4,8,20);
				$pdf->SetFont('Arial','',8);
				
				$pdf->SetXY(25,16);
				$pdf->Cell(0,10,'Kategori'.' : '.$kat,20,0,'L');
				$pdf->SetXY(25,19);
				$pdf->Cell(0,10,'Periode'.' : '.indo_date($start_date).' - '.indo_date($end_date),20,0,'L');
		
			
			
			$pdf->Ln(15);
			
			$pdf->SetX(2);
			
			
			$pdf->SetFont('Arial','',6);
				
			
			
			$pdf->Ln(4);
			
			
			$pdf->Cell(8,10,'No',1,0,'C',1);
			$pdf->Cell(50,5,'PO',1,0,'C',1);
			$pdf->Cell(50,5,'MRR',1,0,'C',1);
			$pdf->Cell(30,10,'VENDOR',1,0,'C',1);
			$pdf->Cell(70,10,'Description',1,0,'C',1);
			$pdf->Cell(20,10,'Amount',1,0,'C',1);
			$pdf->Cell(25,10,'Division',1,0,'C',1);
			$pdf->Cell(30,5,'Lead Time',1,0,'C',1);
			
			$pdf->Ln(5);
			
			
			//$pdf->Cell(22,5,'I. THE 18th',1,0,'C',0);
			$pdf->Cell(8,5,'',0,0,'C',0);
			$pdf->Cell(20,5,'Date',1,0,'C',1);
			$pdf->Cell(30,5,'No',1,0,'C',1);
			$pdf->Cell(20,5,'Date',1,0,'C',1);
			$pdf->Cell(30,5,'No',1,0,'C',1);
			$pdf->Cell(30,5,'',0,0,'R',0);
			$pdf->Cell(70,5,'',0,0,'R',0);
			$pdf->Cell(20,5,'',0,0,'R',0);
			$pdf->Cell(25,5,'',0,0,'R',0);
			$pdf->Cell(15,5,'PR to PO',1,0,'C',1);
			$pdf->Cell(15,5,'PO to MRR',1,0,'C',1);	
					
			
			$pdf->Ln(5);
			$no = 0;
			//$pdf->Ln(5);
			
		}
		//
			
			$pdf->SetFont('Arial','',6);
			//$pdf->Ln(5);
			//$pdf->Cell(22,5,'I. THE 18th',1,0,'C',0);
			$pdf->Cell(8,5,$i,1,0,'C',0);
			$pdf->Cell(20,5,indo_date($row->tgl_po),1,0,'L',0);
			$pdf->Cell(30,5,$row->no_po,1,0,'L',0);
			$pdf->Cell(20,5,indo_date($row->tgl_mrr),1,0,'L',0);
			$pdf->Cell(30,5,$row->no_mrr,1,0,'L',0);
			$pdf->Cell(30,5,$row->nm_supp,1,0,'L',0);
			$pdf->Cell(70,5,$row->ket_pr,1,0,'L',0);
			$pdf->Cell(20,5,number_format($row->harga_tot),1,0,'R',0);
			$pdf->Cell(25,5,$row->divisi_nm,1,0,'C',0);
			$pdf->Cell(15,5,$row->d1,1,0,'C',0);
			$pdf->Cell(15,5,$row->d2,1,0,'C',0);
			$pdf->Ln(5);				
			$i++;
			$no++;
		
		
	}
	/*
			$pdf->SetFont('Arial','B',6);
			//$pdf->Ln(5);
			//$pdf->Cell(22,5,'I. THE 18th',1,0,'C',0);
			$pdf->Cell(8,5,'',0,0,'C',0);
			$pdf->Cell(15,5,'Date',1,0,'C',1);
			$pdf->Cell(10,5,'No',1,0,'C',1);
			$pdf->Cell(10,5,'Qty',1,0,'C',1);
			$pdf->Cell(15,5,'Date',1,0,'C',1);
			$pdf->Cell(10,5,'No',1,0,'C',1);
			$pdf->Cell(10,5,'Qty',1,0,'C',1);
			$pdf->Cell(25,5,'',1,0,'R',0);
			$pdf->Cell(35,5,'',1,0,'R',0);
			$pdf->Cell(20,5,'',1,0,'R',0);
			$pdf->Cell(20,5,'',1,0,'R',0);
			$pdf->Cell(17.5,5,'PR to PO',1,0,'C',1);
			$pdf->Cell(17.5,5,'PO to MRR',1,0,'C',1);
			*/
			
			$pdf->Output("hasil.pdf","I");

