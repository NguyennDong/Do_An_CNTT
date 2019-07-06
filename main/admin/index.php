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

    <title>Quản lý danh sách sinh viên</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- php5 Shim and Respond.js IE8 support of php5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/php5shiv/3.7.0/php5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

      <div id="wrapper">

        <?php include 'header_admin.php';?>

        <div id="page-wrapper">

          <div class="container-fluid">

           <div class="row">

            <h1 class="page-header">

             QUẢN LÝ SINH VIÊN

           </h1>

           <button class="btn btn-danger delete_all_student"> Xóa toàn bộ sinh viên trong danh sách </button>

           <table class="table table-hover">


            <thead>

              <tr>
               <th>Mã Sinh Viên</th>
               <th>Tên Sinh Viên</th>
               <th>Email</th>
               <th>Mã Lớp</th>
               <th>Mô Tả</th>
               <th>Sửa/Xóa</th>
             </tr>
           </thead>

            <tbody id="all_student">

                <?php student_manage_in_admin(); ?>

          </tbody>

        </table>















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
<script type="text/javascript" src="../function/function.js"> </script>

</body>

</html>


