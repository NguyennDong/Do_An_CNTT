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

    <title>TẠO LOẠI ĐỀ TÀI</title>

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
                        <h1 class="page-header">TẠO LOẠI ĐỀ TÀI</h1>
                    </div>



    <form action="" method="post" enctype="multipart/form-data">


        <div class="col-md-8">

            <div class="form-group">

                <label>Tên loại đề tài</label>
                <input type="text" name="loai_detai_name" class="form-control" required>

            </div>


                <div class="form-group">
                 <label>Mô tả loại đề tài</label>
                 <textarea name="loai_detai_description" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>



            <div class="form-group row">

                <div class="col-xs-6">
                <label>Số lượng nhóm</label>
                <input type="text" name="group_number" class="form-control" size="60">
                </div>

            </div>

            <div class="form-group row">

                <div class="col-xs-6">
                <label>Số lượng sinh viên / nhóm</label>
                <input type="text" name="student_number" class="form-control" size="60">
                </div>

            </div>

        </div><!--Main Content-->


                <!-- SIDEBAR-->


        <aside id="admin_sidebar" class="col-md-4">


            <div class="form-group">
                <label>Ngày bắt đầu</label>
                <input type="datetime-local" name="startDate" class="form-control" required> </input>
            </div>


            <div class="form-group">

                <label>Ngày kết thúc</label>
                <input type="date" name="endDate" class="form-control"> </input>
            </div>


<!--             <div class="form-group">
                <hr>
                <label>Trang thái đề tài</label>
                <select id="" class="form-control">
                    <option value="">Duyệt</option>
                    <option value="">Chưa duyệt</option>
                </select>
            </div> -->

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

        $loai_detai_name = $_POST['loai_detai_name'];
        $loai_detai_description = $_POST['loai_detai_description'];
        $group_number = $_POST['group_number'];
        $student_number = $_POST['student_number'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];


        $duplicate = query("SELECT COUNT(tenLoai) as total FROM loai_detai WHERE tenLoai = '$loai_detai_name' ");
        confirm($duplicate);
        $row = fetch_array($duplicate);
        $count = $row['total'];

        if ($count > 0) {

            header("Refresh:0");
            set_message("<strong class='text-danger'> Tên loại đề tài này đã tồn tại </strong>");

        }

        else {


            $query = query("INSERT INTO loai_detai(tenLoai, moTa, slNhom, slSV, ngayBD, ngayKT) VALUES('$loai_detai_name', '$loai_detai_description', '$group_number', '$student_number','$startDate','$endDate')");

            if ($query){

                header("Refresh:0");
                set_message("<strong class='text-success'>Bạn đã thêm loại đề tài thành công!</strong>");
            }

            else {

              header("Refresh:0");
              set_message("<strong class='text-danger'> Đã có lỗi xảy ra khi thêm loại đề tài </strong>");
            }

        }

    }


?>

