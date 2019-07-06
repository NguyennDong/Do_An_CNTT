<?php

    include_once('../function/config.php');

    include '../connection.php';

    include '../requireSession.php';

    check_admin_permission($user_role);

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
                        <h1 class="page-header">THÊM SINH VIÊN</h1>
                    </div>

                    <div
				</div>


		        <form action="" method="post" enctype="multipart/form-data" style="height: 600px;">

	                <aside id="admin_sidebar" class="col-md-4">

		                <div class="form-group">

		                    <label>Email Sinh Viên</label>

		                    <input type="email" name="email" class="form-control" required />

		                </div>


		                <div class="form-group">

		                    <hr>

		                    <label>Họ Tên Sinh Viên</label>

		                    <input type="text" name="name" class="form-control" required />

		                </div>

		                <div class="form-group">

		                    <hr>

		                    <label>Mã số sinh viên</label>
		                    <input type="text" name="mssv" class="form-control" required />

		                </div>

			            <div class="form-group">

			                <hr>
			                <input type="submit" name="publish" class="btn btn-primary btn-lg pull-right" value="Save">

			            </div>
		            	<div> <?php display_message(); ?> </div>

	        		</aside><!--SIDEBAR-->

	                <aside class="col-md-4">

		                <div class="form-group">

		                    <label>Mã Lớp</label>
		                    <input type="tel" name="maLop" class="form-control"/>

		                </div>


		                <div class="form-group">

							<hr>

							<label>Mô tả</label>
							<input type="text" name="moTa" class="form-control"/>

		                </div>

	        		</aside><!--SIDEBAR-->

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

    if(isset($_POST['publish'])) {

        $email = escape_string($_POST['email']);
        $name = escape_string($_POST['name']);
        $maLop = escape_string($_POST['maLop']);
        $mota = escape_string($_POST['moTa']);
        $mssv = escape_string($_POST['mssv']);

        $query = query("INSERT INTO sinh_vien(maSV, tenSV, email, maLop, moTa) VALUES('$mssv', '$name', '$email', '$maLop', '$mota')");

        confirm($query);

        if ($query){

            header("Refresh:0");
            set_message("<strong class='text-success'>Bạn đã thêm thông tin sinh viên thành công!</strong>");
        }

        else {

           header("Refresh:0");
           set_message("<strong class='text-danger'> Đã có lỗi xảy ra khi thêm thông tin thông tin </strong>");
        }

    }

?>
