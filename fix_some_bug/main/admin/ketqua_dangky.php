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

    <title>Quản lý kết quả đăng ký</title>

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

    <div id="wrapper">

        <?php include 'header_admin.php';?>

        <div id="page-wrapper">

            <div class="container-fluid">



                    <div class="col-lg-12">


                        <h1 class="page-header">
                            QUẢN LÝ KẾT QUẢ ĐĂNG KÝ

                        </h1>

                        <button class="download btn btn-primary"><a href="download.php?action=download" style="color: white; text-decoration: none"> Ấn để download bảng kết quả đăng ký </a></button>

                        <div class="col-md-12">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Loại Đề Tài</th>
                                        <th>Tên Đề Tài</th>
                                        <th>Nhóm Sinh Viên</th>
                                        <th>Ngày Đăng Ký</th>
                                        <th>Trạng Thái </th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php ketquadangky_admin(); ?>

                                </tbody>
                            </table> <!--End of Table-->


                        </div>

                    </div>

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
<!--     <script type="text/javascript" src="../function/function.js"> </script>
 -->
</body>

</html>


