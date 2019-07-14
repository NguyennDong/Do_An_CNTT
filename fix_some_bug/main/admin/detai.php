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

  <title>Đề tài</title>

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

           <div class="row">

            <h1 class="page-header">
             QUẢN LÝ ĐỀ TÀI

           </h1>
           <select id ="loai_detai" onchange ='location.href = this.value'>
              <option value = 0 selected> Chọn loại đề tài </option>
              <?php loai_detai_select_admin() ?>
           </select>

           <table class="table table-hover">
            <thead>

              <tr>
               <th>Mã Đề Tài</th>
               <th>Loại Đề Tài</th>
               <th>Tên Đề Tài</th>
               <th>Giảng viên</th>
               <th>Ngày bắt đầu</th>
               <th>Ngày kết thúc</th>
               <th>Trạng thái</th>
               <th>Sửa/Xóa</th>
             </tr>
           </thead>
           <tbody>
              <?php

                if (isset($_GET['loaiDT'])) {
                    $loai_detai = $_GET['loaiDT'];
                    detai_manage_in_admin($loai_detai);
                }

               ?>
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
