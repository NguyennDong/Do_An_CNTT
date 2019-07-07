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

    <title>Thêm Giảng Viên</title>

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

                <div class="col-md-12">

                    <div class="row">
                        <h1 class="page-header">THÊM GIẢNG VIÊN</h1>
                    </div>



    <form action="" method="post" enctype="multipart/form-data">



                <!-- SIDEBAR-->


                <aside id="admin_sidebar" class="col-md-4">



                   <div class="form-group">
                       <label>Email Giảng Viên</label>
                       <input type="email" name="email" class="form-control" required> </input>
                </div>


                <div class="form-group">
                    <hr>
                    <label>Họ Tên</label>
                    <input type="txt" name="name" class="form-control" required> </input>
                </div>


                <div class="form-group">
                    <hr>
                    <label>Học Hàm</label>
                    <input type="tel" name="hocHam" class="form-control"> </input>
                </div>


                <div class="form-group">
                  <hr>
                  <label>Mô tả</label>
                  <input type="text" name="moTa" class="form-control">
                </div>


                <div class="form-group">
                    <hr>
                    <label>Loại tài khoản</label>
                    <select id="user_category" class="form-control user_category">
                        <option>Giảng Viên</option>
                        <option>Admin</option>
                    </select>
                </div>

            <div class="form-group">
                <hr>
                <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Save">
            </div>

            <div> <?php display_message(); ?> </div>

        </aside><!--SIDEBAR-->

        <input type="hidden" name="user_category" id="category" />

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
<script type="text/javascript">

        $('.user_category').change(function(){
            var number = $(this).val();
            $("#category").val(number);
        });
</script>

</body>

</html>
<?php
    if(isset($_POST['publish'])) {

        $email = $_POST['email'];
        $name = $_POST['name'];
        $hocham = $_POST['hocHam'];
        $moTa = $_POST['moTa'];
        $role = $_POST['user_category'];

        if ($role == 'Admin') {

          $quyentruycap = 1;

        }
        else if ($role == 'Giảng Viên') {

          $quyentruycap = 0;

        }

        $result = query("SELECT max(id) FROM giang_vien");

        if (mysqli_num_rows($result) == 0) {

            $user_id = 1;

        }

        else {

            $data = fetch_array($result);

            $user_id = $data['max(id)'] +1;

        }

        $MaGV = $user_id;

        $duplicate = query("SELECT COUNT(email) as total FROM giang_vien WHERE email = '$email' ");
        confirm($duplicate);
        $row = fetch_array($duplicate);
        $count = $row['total'];

        if ($count > 0) {

            header("Refresh:0");
            set_message("<strong class='text-danger'> Email này đã tồn tại </strong>");

        }

        else {

            $query = query("INSERT INTO giang_vien(maGV, TenGV, email, hocHam, moTa, role) VALUES('$MaGV', '$name', '$email', '$hocham','$moTa','$quyentruycap')");

            if ($query){

                header("Refresh:0");
                set_message("<strong class='text-success'>Bạn đã thêm user thành công!</strong>");
            }

            else {

              header("Refresh:0");
              set_message("<strong class='text-danger'> Đã có lỗi xảy ra khi thêm user </strong>");
            }

        }

    }

?>
