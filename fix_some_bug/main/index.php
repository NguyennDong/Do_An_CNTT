<?php
    include_once('function/config.php');

    include 'connection.php';

    include 'requireSession.php';


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="refresh" content="3000000;url=/login/logout.php" />
    <title>TRANG CHỦ</title>
    <!--CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Custrom boostrap script  ... -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="alertify/themes/alertify.core.css" />
    <link rel="stylesheet" href="alertify/themes/alertify.default.css" />
    <!-- Scripts -->
</head>

<body>
    <div class="loading" style="display: none;">Loading&#8230;</div>
    <?php require 'checkDupplicated.php'; ?>

    <!-- =========================== HEADER ============================ -->

    <?php include("template/header.php"); ?>

    <!-- =========================== TAB CÁC MỤC TÙY CHỌN ============================ -->

    <?php include("template/sidenav.php"); ?>

    <div class="tab-content">

        <!-- =========================== BẢNG HƯỚNG DẪN ============================ -->


        <div id="home-page" class="tab-pane active">

        	<?php include("template/tutorial_page.php");  ?>

        </div>

        <!-- =========================== BẢNG ĐĂNG KÝ ĐỒ ÁN ============================ -->

        <div id="register" class="tab-pane fade" style="overflow-y: scroll; height: 700px;">
            <h3>ĐĂNG KÍ ĐỒ ÁN ĐỢT <span id="id-">1</span></h3>
            <table class="table scrollbar">
                <thead>
                    <tr>
                        <th scope="col">Loại Đề Tài</th>
                        <th scope="col">Tên Đề Tài</th>
                        <th scope="col">Thành Viên</th>
                        <th scope="col">Sinh viên tối đa</th>
                        <th scope="col">Nhóm tối đa</th>
                        <th scope="col">Trạng Thái</th>
                        <th scope="col">Thao Tác</th>
                    </tr>
                </thead>

                <?php dangky_table() ?>
            </table>
        </div>

		<?php detai_and_dangky_modal() ?>

        <!-- ===========================KẾT QUẢ ĐĂNG KÝ============================ -->

        <div id="result" class="tabe-pane fade" style="overflow-y: scroll;">
            <h3>KẾT QUẢ ĐĂNG KÍ ĐỒ ÁN ĐỢT <span id="id-">1</span></h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Tên Đề Tài</th>
                        <th scope="col">Nhóm Sinh Viên</th>
                        <th scope="col">Trạng Thái</th>
                        <th scope="col">Thao Tác</th>
                    </tr>
                </thead>

                <?php
                /* Xử lý kết quả đăng ký */
                	if(isset($_SESSION['gv'])){ //khi user là giảng viên

                		ketquadangky_teacher($user_number);

                	}

                    if(isset($_SESSION['sv'])){ //khi user là sinh viên

                    	ketquadangky_student($user_number);

                    }
                ?>
            </table>
        </div>
    </div>

    <!-- =========================== BẢNG XÁC NHẬN VÀO NHÓM ============================ -->

    <?php
        if (isset($_SESSION['userData']['maSV'])) {
	        $user_data = $_SESSION['userData'];
	        $maSV = $user_data['maSV'];
	        thongbao($maSV);
    	}
    ?>


    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<script src="js/all.js"></script>

<script src="alertify/lib/alertify.min.js"></script>

<script src="js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="js/jquery.tabledit.js"></script>
<!-- Custom script -->
<script src="click.js"></script>

<script type="text/javascript" src="js/index.js"></script>

<!-- Load Session Each Reload -->
<?php get_dsdangky_maDT() ?>

</body>

</html>

