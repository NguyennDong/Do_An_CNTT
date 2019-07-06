<?php

    include_once('../function/config.php');

    include '../connection.php';

    include '../requireSession.php';

    check_admin_permission($user_role);

	require 'vendor/autoload.php';


	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Thêm sinh viên</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <?php include 'header_admin.php';?>

    <div id="wrapper">

        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="col-md-12">

                    <div class="row">
                        <h1 class="page-header">THÊM DANH SÁCH SINH VIÊN</h1>
                    </div>

				</div>

		        <form action="" method="post" enctype="multipart/form-data" style="height: 400px;">

			    	<p>Add danh sách sinh viên bằng file excel (đuôi xlsx): </p>
	                <input type="file" name="list" id="file">

	                <br>

					<p>(Chú ý: các cột trong file theo thứ tự: Mã số sinh viên, Họ và tên, Email, Mã lớp, Mô tả). Download form mẫu ở <a href="https://drive.google.com/file/d/1nwQ3mUVaJsTlgV_LNRRVV-Cz4RRgwtg6/view?usp=sharing" target="_blank">đây</a>  </p>

			        <input type="submit" name="add_list" class="btn btn-primary" value="Ấn để thêm">

		            <div> <?php display_message(); ?> </div>

				</form>


</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/plugins/morris/morris.min.js"></script>
<script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
<?php

    if (isset($_POST['add_list'])) {

		$allowed =  array('xlsx','xls');
		$filename = $_FILES["list"]["name"];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);

		if ($_FILES["list"]["name"] == "") {   // check if file is empty (and not an error)

	        header("Refresh:0");
	        set_message("<strong class='text-danger'> File upload không được để trống ! </strong>");

    	}

    	else {

			if (in_array($ext,$allowed) ) {

				$dir = "danhsach/";
		        $main_temp_locaiton = $_FILES['list']['tmp_name'];

          		move_uploaded_file($main_temp_locaiton, $dir.$filename);

			    $count = 0;

				$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($dir.$filename);
				$worksheet = $spreadsheet->getActiveSheet();

				foreach ($worksheet->getRowIterator() as $row) {

				    $cellIterator = $row->getCellIterator();
				    $cellIterator->setIterateOnlyExistingCells(FALSE);

				    if ($count > 0) {

					    foreach ($cellIterator as $cell => $values) {

					    	if ($cell === 'A') {

					    		$mssv = $values;
					    	}

					    	if ($cell === 'B') {
					    		$name = $values;
					    	}

					    	if ($cell === 'C') {
					    		$email = $values;
					    	}

					    	if ($cell === 'D') {
					    		$maLop = $values;
					    	}

					    	if ($cell === 'E') {
					    		$moTa = $values;
					    	}
					    }


					    $query = query("INSERT INTO sinh_vien(maSV, tenSV, email, maLop, moTa) VALUES('$mssv', '$name', '$email', '$maLop', '$moTa')");
					    confirm($query);

					}

		    	     $count++;

				}

				if ($query) {

		            header("Refresh:0");
		            set_message("<strong class='text-success'> Bạn đã thêm thành công danh sách sinh viên ! </strong>");

				}

				else {

	          		header("Refresh:0");
	            	set_message("<strong class='text-danger'> Đã có lỗi khi thêm danh sách sinh viên ! </strong>");


				}


	        } else {

	            header("Refresh:0");
	            set_message("<strong class='text-danger'> File bạn upload không phải file Excel </strong>");

	        }


    	}



    }


?>
