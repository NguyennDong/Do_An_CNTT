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

    <title>Đổi thông tin sinh viên</title>

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

<?php

    $id = escape_string($_GET['id']);
    $query = query("SELECT * FROM sinh_vien WHERE maSV = '$id'");
    confirm($query);
    while ($row = fetch_array($query)) {
        $email = escape_string($row['email']);
        $name = escape_string($row['tenSV']);
        $maLop = escape_string($row['maLop']);
        $mota = escape_string($row['moTa']);
    }

?>
    <div id="wrapper">

        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="col-md-12">

                    <div class="row">
                        <h1 class="page-header">ĐỔI THÔNG TIN SINH VIÊN</h1>
                    </div>



    <form action="" method="post" enctype="multipart/form-data">


                <aside id="admin_sidebar" class="col-md-4">

                <div class="form-group">
                    <label>Email Sinh Viên</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" required />
                </div>


                <div class="form-group">
                    <hr>
                    <label>Họ Tên Sinh Viên</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" required />
                </div>

                <div class="form-group">

                    <hr>
                    <hr>
                    <label>Mã số sinh viên</label>
                    <input type="text" name="mssv" class="form-control" value="<?php echo $id; ?>" />

                </div>

                <div class="form-group">
                    <hr>
                    <label>Mã Lớp</label>
                    <input type="tel" name="maLop" class="form-control" value="<?php echo $maLop; ?>" />
                </div>



                <div class="form-group">
                  <hr>
                  <label>Mô tả</label>
                  <input type="text" name="moTa" class="form-control" value="<?php echo $mota; ?>" />
                </div>


            <div class="form-group">
                <hr>
                <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Save">
            </div>

            <div> <?php display_message(); ?> </div>

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

        $edit_email = escape_string($_POST['email']);
        $name = escape_string($_POST['name']);
        $maLop = escape_string($_POST['maLop']);
        $mota = escape_string($_POST['moTa']);
        $mssv = escape_string($_POST['mssv']);

        if(strcmp($email, $edit_email) == 0 ) {

            $edit = query("UPDATE sinh_vien SET email = '$edit_email', tenSV = '$name', maLop = '$maLop', moTa = '$mota', maSV = '$mssv' where maSV = '$id'");


            if ($edit){

                header("Refresh:0");
                set_message("<strong class='text-success'>Bạn đã đổi thông tin sinh viên thành công!</strong>");
            }

            else {

               header("Refresh:0");
               set_message("<strong class='text-danger'> Đã có lỗi xảy ra khi đổi thông tin sinh viên! </strong>");
            }

        }

        else {

            $duplicate = query("SELECT COUNT(email) as total FROM sinh_vien WHERE email = '$edit_email' ");
            confirm($duplicate);
            $row = fetch_array($duplicate);
            $count = $row['total'];

            if ($count > 0) {

                header("Refresh:0");
                set_message("<strong class='text-danger'> Email này đã tồn tại </strong>");

             }

             else {

                $edit = query("UPDATE sinh_vien SET email = '$edit_email', tenSV = '$name', maLop = '$maLop', moTa = '$mota', maSV = '$mssv' where maSV = '$id'");

                if ($edit){

                    header("Refresh:0");
                    set_message("<strong class='text-success'>Bạn đã đổi thông tin sinh viên thành công!</strong>");
                }

                else {

                  header("Refresh:0");
                  set_message("<strong class='text-danger'> Đã có lỗi xảy ra khi đổi thông tin sinh viên! </strong>");
                }

             }

        }

    }
?>
