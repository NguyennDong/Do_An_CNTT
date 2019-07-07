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

    <title>SỬA ĐỀ TÀI</title>

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

        <?php

            $id = escape_string($_GET['id']);
            $query = query("SELECT * FROM de_tai WHERE id = '$id'");
            confirm($query);
            while ($row = fetch_array($query)) {
                $tenDT = $row['tenDT'];
                //$giangvien = check_teacher_by_id($row['maGV']);
                $mota = $row['moTa'];
                $ngayBD = date("Y-m-d\TH:i:s", strtotime($row['ngayBD']));
                $ngayKT = escape_string($row['ngayKT']);
                $trangthai = escape_string(trangthai_detai($row['VPKDuyet']));
                $loai_detai = escape_string($row['loaiDT']);
                $slNhom = escape_string($row['slNhom']);
                $slSV = escape_string($row['slSV']);


            }

        ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="col-md-12">

                    <div class="row">
                        <h1 class="page-header">SỬA ĐỀ TÀI</h1>
                    </div>



    <form action="" method="post" enctype="multipart/form-data">


        <div class="col-md-8">

            <div class="form-group">

                <label>Tên đề tài</label>
                <input type="text" name="tenDT" class="form-control" value='<?php echo $tenDT; ?>' required>

            </div>


            <div class="form-group">
                 <label>Mô tả đề tài</label>
                 <textarea name="moTa" id="" cols="30" rows="10" class="form-control"><?php echo $mota; ?></textarea>
            </div>

            <div class="form-group row">

                <div class="col-xs-6">
                <label>Số lượng nhóm</label>
                <input type="text" name="slNhom" class="form-control" size="60" value="<?php echo $slNhom; ?>" required>
                </div>

            </div>


            <div class="form-group row">

                <div class="col-xs-6">
                <label>Số lượng sinh viên / nhóm</label>
                <input type="text" name="slSV" class="form-control" size="60" value="<?php echo $slSV; ?>" required>
                </div>

            </div>


        </div><!--Main Content-->


                <!-- SIDEBAR-->


        <aside id="admin_sidebar" class="col-md-4">


           <div class="form-group">
               <label>Loại đề tài</label>
               <select name="loai_detai" id="loai_detai" class="form-control">

                    <?php loai_detai_select_edit() ?>

               </select>
           </div>


            <div class="form-group">
                <hr>
                <label>Ngày bắt đầu</label>
                <input type="datetime-local" name="ngayBD" class="form-control" value='<?php echo $ngayBD; ?>' required> </input>
            </div>


            <div class="form-group">
                <hr>
                <label>Ngày kết thúc</label>
                <input type="date" name="ngayKT" class="form-control" value='<?php echo $ngayKT; ?>' > </input>
            </div>


            <div class="form-group">
                <hr>
                <label>Trang thái đề tài</label>
                <select id="detai_statement" class="form-control detai_statement">
                    <option>Đã Duyệt</option>
                    <option>Chưa Duyệt</option>
                </select>
            </div>

            <div class="form-group">
                <hr>
                <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Save">
            </div>

            <div> <?php display_message(); ?> </div>

        </aside><!--SIDEBAR-->

        <input type="hidden" name="detai_statement" id="statement" value='<?php  echo $trangthai; ?>' />


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

    $("#detai_statement").val('<?php echo $trangthai; ?>').change();
    $("#statement").val('<?php echo $trangthai; ?>');

    $('.detai_statement').change(function(){
        var number = $(this).val();
        $("#statement").val(number);
    });

    $("#loai_detai").val('<?php echo $loai_detai; ?>').change();


</script>
</body>

</html>

<?php
    if(isset($_POST['publish'])) {

        $name = escape_string($_POST['tenDT']);
        $moTa = escape_string($_POST['moTa']);
        $loai_detai = escape_string($_POST['loai_detai']);
        $startDate = escape_string($_POST['ngayBD']);
        $endDate = escape_string($_POST['ngayKT']);
        $slNhom = escape_string($_POST['slNhom']);
        $slSV = escape_string($_POST['slSV']);

        if ($_POST['detai_statement'] == 'Đã Duyệt') {
          $detai_statement = 1;
        }

        else {
            $detai_statement = 0;
        }

        $query = query("UPDATE de_tai SET tenDT = '$name', moTa = '$moTa', loaiDT = '$loai_detai', ngayBD = '$startDate', ngayKT ='$endDate', VPKDuyet = '$detai_statement', slNhom = '$slNhom', slSV = '$slSV' where id = '$id'");

        confirm($query);

        if ($query){

            header("Refresh:0");
            set_message("<strong class='text-success'>Bạn đã sửa đề tài thành công!</strong>");
        }

        else {

          header("Refresh:0");
          set_message("<strong class='text-danger'> Đã có lỗi xảy ra khi sửa đề tài </strong>");
        }

    }


?>

