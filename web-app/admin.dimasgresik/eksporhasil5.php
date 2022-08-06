<?php
	ob_start();
	session_start();
	if($_SESSION['sudahloginadmin']==true){
		include("db-connect.php");
		koneksi_db();
		$dari = $_GET['d'];
		$sampai = $_GET['s'];
		
		// Load plugin PHPExcel nya
		require_once 'PHPExcel/PHPExcel.php';

		// Panggil class PHPExcel nya
		$excel = new PHPExcel();

		// Settingan awal file excel
		$excel->getProperties()->setCreator('DIGITAL MENGAWASI BC GRESIK')
					 ->setLastModifiedBy('BEA CUKAI GRESIK')
					 ->setTitle("LAPORAN")
					 ->setSubject("DIGITAL MENGAWASI BC GRESIK")
					 ->setDescription("LAPORAN DIGITAL MENGAWASI BC GRESIK")
					 ->setKeywords("LAPORAN DIGITAL MENGAWASI BC GRESIK");

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
		  'font' => array('bold' => true), // Set font nya jadi bold
		  'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		  )
		);

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
		  'alignment' => array(
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		  )
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN DIGITAL MENGAWASI BC GRESIK"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:S1'); // Set Merge Cell pada kolom A1 sampai F1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "#ID LAPORAN"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "TANGGAL LAPOR");
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA SARKUT");
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "BENDERA");  // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "LOKASI SANDAR");
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "TANGGAL ETA");
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "ETA");  // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "TANGGAL ETB");
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "ETB");
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "KATEGORI");
		$excel->setActiveSheetIndex(0)->setCellValue('K3', "MUATAN");  // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('L3', "STATUS");
		$excel->setActiveSheetIndex(0)->setCellValue('M3', "NAMA AGEN");
		$excel->setActiveSheetIndex(0)->setCellValue('N3', "NO BC 1.0.");
		$excel->setActiveSheetIndex(0)->setCellValue('O3', "FILE BC 1.0.");  // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('P3', "NO BC 1.1.");
		$excel->setActiveSheetIndex(0)->setCellValue('Q3', "FILE BC 1.1.");
		$excel->setActiveSheetIndex(0)->setCellValue('R3', "RUTE");
		$excel->setActiveSheetIndex(0)->setCellValue('S3', "FILE RUTE");

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('S3')->applyFromArray($style_col);


		// Set height baris ke 1, 2 dan 3
		$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(25);
		$excel->getActiveSheet()->getRowDimension('2')->setRowHeight(25);
		$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(25);

		// Buat query untuk menampilkan semua data siswa
		$query = "SELECT id_laporan, tanggal_laporan, sarana_laporan, bendera_laporan, B.nama_lokasi, tanggaleta_laporan, eta_laporan, tanggaletb_laporan, etb_laporan, kategori_laporan, muatan_laporan, impor_laporan, approve_laporan, C.nama_agen, rute_laporan, nobc10_laporan, nobc11_laporan, filerute_laporan, bc10_laporan, bc11_laporan FROM laporan AS A INNER JOIN lokasi AS B ON A.id_lokasi = B.id_lokasi INNER JOIN agen AS C ON A.id_agen = C.id_agen WHERE";
															if($dari != "" && $sampai != ""){
																$query = $query . " tanggal_laporan BETWEEN '" . $dari . "' AND '" . $sampai . "'";
															} else if($dari != ""){
																$query = $query . " tanggal_laporan >= '" . $dari . "'";
															} else if($sampai != ""){
																$query = $query . " tanggal_laporan <= '" . $sampai . "'";
															}
															$get_laporan = mysql_query($query);

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 5
		while($data = mysql_fetch_array($get_laporan)){ // Ambil semua data dari hasil eksekusi $sql
			$date_lapor=date_create($data['tanggal_laporan']);
			$date_eta=date_create($data['tanggaleta_laporan']);
			$date_etb=date_create($data['tanggaletb_laporan']);
			$time_eta=date_create($data['eta_laporan']);
			$time_etb=date_create($data['etb_laporan']);
			
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['id_laporan']);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, date_format($date_lapor,"d/m/Y"));
			  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['sarana_laporan']);
			  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['bendera_laporan']);
			  $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['nama_lokasi']);
			  $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, date_format($date_eta,"d/m/Y"));
			  $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, date_format($time_eta,"H:i"));
			  $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, date_format($date_etb,"d/m/Y"));
			  $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, date_format($time_etb,"H:i"));
			  $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data['kategori_laporan']);
			  $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data['muatan_laporan']);
			  $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data['impor_laporan']);
			  $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data['nama_agen']);
			  $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data['nobc10_laporan']);
			  $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, "http://" . $data['bc10_laporan']);
			  $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data['nobc11_laporan']);
			  $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, "http://" . $data['bc11_laporan']);
			 $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data['rute_laporan']);
			  $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, "http://" . $data['filerute_laporan']);

		  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);

		  $excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);

		  $numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(15); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(35); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(15); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(10); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(10); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(10); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(10); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(10); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('M')->setWidth(35); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('N')->setWidth(10); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('O')->setWidth(50); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('P')->setWidth(10); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(50); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('R')->setWidth(10); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('S')->setWidth(50); // Set width kolom B

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("LAPORAN KSP BC GRESIK");
		$excel->setActiveSheetIndex(0);

		
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
		ob_end_clean();
		// Proses file excel
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="LAPORAN DIGITAL MENGAWASI BC GRESIK.xls"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write->save('php://output');
	}
	else header("Location: index.php");
	ob_end_flush();
?>