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

    <title>THÊM ĐỀ TÀI</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body>

    <div id="wrapper">
        <?php include 'header_admin.php';?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="col-md-12">

                    <div class="row">
                        <h1 class="page-header">THÊM ĐỀ TÀI</h1>
                    </div>



    <form action="" method="post" enctype="multipart/form-data">


        <div class="col-md-8">

            <div class="form-group">

                <label>Tên đề tài</label>
                <input type="text" name="tenDT" class="form-control"required>

            </div>


            <div class="form-group">
                 <label>Mô tả đề tài</label>
                 <textarea name="moTa" id="" cols="30" rows="10" class="form-control"></textarea>
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

    $('.detai_statement').change(function(){
        var number = $(this).val();
        $("#statement").val(number);
    });


</script>
</body>

</html>

<?php
    if(isset($_POST['publish'])) {

        $name = $_POST['tenDT'];
        $moTa = escape_string($_POST['moTa']);
        $loai_detai = $_POST['loai_detai'];

        if ($_POST['detai_statement'] == 'Đã Duyệt') {
          $detai_statement = 1;
        }

        else {
            $detai_statement = 0;
        }

        $result = query("SELECT max(id) FROM de_tai");

        if (mysqli_num_rows($result) == 0) {

            $maDT = 1;

        }

        else {

            $data = fetch_array($result);

            $maDT = $data['max(id)'] +1;

        }


        $query_loai_detai = query("SELECT id, slNhom, slSV, ngayBD, ngayKT FROM loai_detai WHERE tenLoai = '$loai_detai'");

        confirm($query_loai_detai);

        while ($row = fetch_array($query_loai_detai)) {

            $maDT = $maDT."_".$row['id'];
            $slNhom = $row['slNhom'];
            $slSV = $row['slSV'];
            $startDate = $row['ngayBD'];
            $endDate = $row['ngayKT'];
        }

        $query = query("INSERT INTO de_tai(maDT, tenDT, loaiDT, moTa, maGV, ngayBS, slNhom, slSV, ngayBD, ngayKT, VPKDuyet) VALUES('$maDT', '$name', '$loai_detai', '$moTa', '100', now(),'$slNhom', '$slSV', '$startDate', '$endDate', '$detai_statement')");

        confirm($query);

        if ($query){

            header("Refresh:0");
            set_message("<strong class='text-success'>Bạn đã thêm đề tài thành công!</strong>");
        }

        else {

            header("Refresh:0");
            set_message("<strong class='text-danger'> Đã có lỗi xảy ra khi thêm đề tài! </strong>");
        }

    }


?>

