<?php
    include_once('../function/config.php');

    include '../connection.php';

    include '../requireSession.php';

    check_admin_permission($user_role);

	//Require tập tin autoload.php để tự động nạp thư viện PhpSpreadsheet
	require 'vendor/autoload.php';

	//Khai báo sử dụng các thư viện cần thiết
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	if ($_GET['action'] == 'download') {

		//Khởi tạo đối tượng spreadsheet
		$spreadsheet = new Spreadsheet();

		//Lấy bảng tính thao tác
		$sheet = $spreadsheet->getActiveSheet();

		//Nhập nội dung vào ô
		$sheet->setCellValue('A1', "Loại Đề Tài");
		$sheet->setCellValue('B1', 'Tên Đề Tài');
		$sheet->setCellValue('C1', 'Nhóm Sinh Viên');
		$sheet->setCellValue('D1', "Ngày Đăng Ký");
		$sheet->setCellValue('E1', "Trạng Thái");

		$spreadsheet->getActiveSheet()->getStyle('A1:E1')->getFont()->setBold(true);

        /* Kết quả đăng ký khi tất cả thành viên nhóm ttDK = 2 */

        $query = query("SELECT DISTINCT maNhom, ngayDK, maDT FROM dang_ky WHERE ttDK = 2 and maNhom NOT IN(SELECT maNhom FROM dang_ky WHERE ttDK!=2 and ttDK != 4)");

        confirm($query);

        $count = 2;
        while ($row = fetch_array($query)) {

            $maNhom = $row['maNhom'];

			$date = date('d-m-Y H:i:s', strtotime($row['ngayDK']));


	        $get_all_member = get_all_member_by_maNhom($maNhom);
	        $get_all_member = str_replace("<br>", "\r", $get_all_member);

            $tenDT = get_tenDT_by_maDT($row['maDT']);
            $loaiDT = get_loaiDT_by_maDT($row['maDT']);

			$sheet->setCellValue("A".$count, $loaiDT);
			$spreadsheet->getActiveSheet()->getStyle("A".$count)->getAlignment()->setWrapText(true);

			$sheet->setCellValue("B".$count, $tenDT);
			$spreadsheet->getActiveSheet()->getStyle("B".$count)->getAlignment()->setWrapText(true);


			$sheet->setCellValue("C".$count, $get_all_member);
			$spreadsheet->getActiveSheet()->getStyle("C".$count)->getAlignment()->setWrapText(true);


			$sheet->setCellValue("D".$count, $date);
			$spreadsheet->getActiveSheet()->getStyle("D".$count)->getAlignment()->setWrapText(true);


			$sheet->setCellValue("E".$count, 'Chờ Duyệt');
			$spreadsheet->getActiveSheet()->getStyle("E".$count)->getAlignment()->setWrapText(true);


			$count = $count + 1;
        }

        /* Kết quả đăng ký khi ttDK các thành viên != 2 */

        $rest_query = query("SELECT DISTINCT maNhom, maDT, ttDK FROM dang_ky WHERE ttDK!=2");

        confirm($rest_query);

        while ($rest_row = fetch_array($rest_query)) {

	        $get_all_member = get_all_member_by_maNhom($rest_row['maNhom']);
	        $get_all_member = str_replace("<br>", "\r", $get_all_member);

    		$trangthai = get_trangthai_by_ttDK($rest_row['ttDK']);

            $tenDT = get_tenDT_by_maDT($rest_row['maDT']);

            $loaiDT = get_loaiDT_by_maDT($rest_row['maDT']);

			$sheet->setCellValue("A".$count, $loaiDT);
			$spreadsheet->getActiveSheet()->getStyle("A".$count)->getAlignment()->setWrapText(true);

			$sheet->setCellValue("B".$count, $tenDT);
			$spreadsheet->getActiveSheet()->getStyle("B".$count)->getAlignment()->setWrapText(true);


			$sheet->setCellValue("C".$count, $get_all_member);
			$spreadsheet->getActiveSheet()->getStyle("C".$count)->getAlignment()->setWrapText(true);


			$sheet->setCellValue("D".$count, $date);
			$spreadsheet->getActiveSheet()->getStyle("D".$count)->getAlignment()->setWrapText(true);


			$sheet->setCellValue("E".$count, $trangthai);
			$spreadsheet->getActiveSheet()->getStyle("E".$count)->getAlignment()->setWrapText(true);


			$count = $count + 1;

        }


		//Khởi tạo đối tượng writer
		$writer = new Xlsx($spreadsheet);

		//Lưu tập tin Excel

		$filename = 'ketqua_dangky.xlsx';
		$download_file = 'danhsach/ketqua_dangky.xlsx';
		$writer->save($download_file);
      	header('Content-Disposition: attachment; filename=' . $filename);
      	readfile($download_file);
      	exit;



	}
?>