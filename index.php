<?php
    session_start();
    $con = mysqli_connect("localhost","root","","pvhuyc5_doan");
    mysqli_set_charset($con, 'UTF8');
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <script src="js/all.js"></script>
    <script src="alertify/lib/alertify.min.js"></script>
    <link rel="stylesheet" href="alertify/themes/alertify.core.css" />
    <link rel="stylesheet" href="alertify/themes/alertify.default.css" />
    <!-- Scripts -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/jquery.tabledit.js"></script>
    <!-- Custom script -->
    <script src="click.js"></script>
    <script>
        var search;
        var index = 0;
        var mang_sinh_vien = new Array();
        //Search mssv
        $(document).ready(function () {
            function load_data(query) {
                var id = query;
                var query = $('#search_text' + id).val();

                $.ajax({
                    url: "fetch.php",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        query: query
                    },
                    success: function (data) {
                        $('#result' + id).html(data.search_text);
                    },

                    error: function (ts) {
                        alert("Không tìm thấy sinh viên")
                    }

                });
            }

            $('.timkiem').click(function () {
                var id = $(this).attr("id");
                var values = id.split('m');
                var timkiem_id = values[2];
                search = $('#search_text' + timkiem_id).val();
                if (search != '') {
                    load_data(timkiem_id);
                    $(this).val() = "";
                } else {
                    load_data('');
                    $('#result');
                }
            });

            $(".search_text").keyup(function (event) {
                var id = $(this).attr("id");
                var values = id.split("text");
                var button_id = values[1];
                if (event.keyCode === 13) {
                    $("#" + button_id).click();
                }
            });



        });


        //Load lên bảng đề tài
        function load_dsdangky(maDT) {
            var load_maDT = maDT;
            $.ajax({
                url: "adddangky.php",
                method: "POST",
                data: {
                    load_maDT: load_maDT
                },
                dataType: "json",
                success: function (data) {
                    //alert("success add");
                    $("#result_return" + load_maDT).html(data.mssv);
                    //$("#slsv"+id).html(data.slsv);
                }
                /*,
                error: function () {
                    alert("Có lỗi khi thêm sinh viên");
                }*/
            });
        }

        //Click thêm mssv vào bảng đề tài
        $(document).on('click', '.them', function (id) {
            var id = $(this).attr("id");
            var maDT = $('#maDT' + id + '').val();
            var maSV = $('#search_text' + id + '').val(); // store input value
            var action = "add";

            $.ajax({
                url: "action.php",
                method: "POST",
                data: {
                    maDT: maDT,
                    maSV: maSV,
                    action: action,
                    id: id
                },
                success: function (data) {
                    load_dsdangky(maDT);
                    $("#result" + id).html('');
                    $("#search_text" + id).val('');

                },
                error: function () {
                    alert("error action");
                }
            });


        });

        //Xóa mssv
        $(document).on('click', '.fa-minus-circle', function () {
            var id = $(this).attr("id");
            var values = id.split("and");
            var del_id = values[1];
            var maDT = values[0];
            var action = "delete";

            $.ajax({

                url: "action.php",
                method: "POST",
                //dataType: "json",
                data: {
                    action: action,
                    del_id: del_id
                },
                success: function (data) {
                    load_dsdangky(maDT);
                },
                error: function () {

                    alert("error delete");

                }

            });

        });

        $(document).on('click', '.xacnhan', function () {
            var maNhom = $(this).attr("id");
            var action = "xacnhan";
            if (confirm("Bạn có chắc muốn duyệt cho nhóm này?")) {

                $.ajax({

                    url: "action.php",
                    method: "POST",
                    //dataType: "json",
                    data: {
                        action: action,
                        maNhom: maNhom
                    },
                    success: function (data) {

                        alert("Bạn đã duyệt thành công cho nhóm này!");
                        $("#duyet" + maNhom).html("Đã duyệt");
                        $("#tuchoi" + maNhom).hide();
                        $("#" + maNhom).hide();
                    },
                    error: function () {

                        alert("error xác nhận");

                    }

                });
            } else {
                return false;
            }

        });

        $(document).on('click', '.tuchoi', function () {
            var id = $(this).attr("id");
            var values = id.split("oi");
            var maNhom = values[1];
            var action = "tuchoi";
            if (confirm("Bạn có chắc muốn từ chối duyệt nhóm này?")) {

                $.ajax({

                    url: "action.php",
                    method: "POST",
                    //dataType: "json",
                    data: {
                        action: action,
                        maNhom: maNhom
                    },
                    success: function (data) {

                        alert("Bạn đã từ chối nhóm này!");
                        $("#duyet" + maNhom).html("Từ chối duyệt");
                        $("#tuchoi" + maNhom).hide();
                        $("#" + maNhom).hide();
                    },
                    error: function () {

                        alert("error delete");

                    }

                });
            } else {
                return false;
            }

        });

        $(document).on('click', '.submitNhom', function () {

            var id = $(this).attr("id");
            var values = id.split("mit");
            var maDT = values[1];
            var action = "submitNhom";
            var ttHientai = $('#ttHientai' + maDT + '').val();
            var slNhom = $('#slNhom' + maDT + '').val();
            var slSinhVien = $('#slSinhVien' + maDT + '').val();
            if (confirm("Bạn có chắc muốn đăng ký cho nhóm này?")) {
                $.ajax({

                    url: "action.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        action: action,
                        maDT: maDT,
                        slSinhVien: slSinhVien
                    },
                    success: function (data) {
                        load_dsdangky(maDT);
                        reload(maDT);
                        alert(data.alert);

                    },
                    error: function (xhr, status, error) {
                        alert(xhr.responseText);
                    }


                });
            } else {
                return false;
            }

        });

        $(document).on('click', '#accept', function () {
            var action = "confirm";
            $.ajax({

                url: "confirm.php",
                method: "POST",
                data: {
                    action: action
                },
                success: function (data) {
                    location.reload();
                },
            });
        });

        $(document).on('click', '#deny', function () {
            var action = "deny";
            $.ajax({

                url: "deny.php",
                method: "POST",
                data: {
                    action: action
                },
                success: function (data) {
                    location.reload();
                },
            });
        });

        $(document).on('click', '.huynhom', function () {

            var id = $(this).attr("id");
            var values = id.split("and");
            var maNhom = values[0];
            var maDT = values[1];
            var action = "huynhom";

            if (confirm("Bạn có chắc muốn hủy nhóm này?")) {
                $.ajax({

                    url: "action.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        action: action,
                        maNhom: maNhom,
                        maDT: maDT
                    },
                    success: function (data) {
                        alert(data.alert);
                        $("#nhom" + maNhom).remove();
                    },
                    error: function (xhr, status, error) {
                        alert(xhr.responseText);
                    }
                });
            } else {
                return false;
            }
        });

        $(document).on('click', '.roinhom', function () {

            var id = $(this).attr("id");
            var values = id.split("and");
            var maNhom = values[0];
            var maDT = values[1];
            var action = "roinhom";

            if (confirm("Bạn có chắc muốn rời nhóm này?")) {
                $.ajax({

                    url: "action.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        action: action,
                        maNhom: maNhom,
                        maDT: maDT
                    },
                    success: function (data) {
                        alert(data.alert);
                        $("#nhom" + maNhom).remove();
                    },
                    error: function (xhr, status, error) {
                        alert(xhr.responseText);
                    }
                });
            } else {
                return false;
            }
        });

        $(document).ready(function () {
            $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            var activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('#myTab a[href="' + activeTab + '"]').tab('show');
            }
        });
    </script>
</head>

<body>
    <?php require 'checkDupplicated.php'; ?>

    <header>
        <div class="container-fluid top-content">
            <div class="row">
                <div class="img-logo col-sm-2">
                    <img src="images/logo/TĐT_logo.png" alt="TDT-logo">
                </div>
                <div class="col-sm-8" id="top-title" style="align=" center"">
                    <p>ĐĂNG KÍ ĐỒ ÁN KHOA CÔNG NGHỆ THÔNG TIN</p>
                </div>
                <div class="col-sm-2" id="user-space">
                    <div id="user-info">
                        <span id="user-name">
                            <?php echo $user_name; ?></span>
                        <a href="../login/logout.php">
                            <span id="icon-off">
                                <i class="fas fa-power-off"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- hr id="hr-top-content" -->
        </div>
    </header>

    <div class="sidenav">
        <ul class="nav nav-tabs" id="mainNav" style="border-bottom: none;">
            <li class="active"><a data-toggle="tab" href="#home-page"><span><i class="fas fa-home"></i></span>
                    <span>TRANG CHỦ</span></a></li>
            <li><a data-toggle="tab" href="#register"><span><i class="fas fa-sign-in-alt"></i></span> <span>ĐĂNG KÍ ĐỀ
                        TÀI</span></a></li>
            <li><a data-toggle="tab" href="#result"><span><i class="fas fa-chalkboard-teacher"></i></span> <span>KẾT QUẢ
                        ĐĂNG KÍ</span></a></li>
            <li>
                <?php
                if(isset($_SESSION['gv'])){
                    echo '<a href="giangvien.php" target="_blank"><span><i class="fas fa-poll"></i></span> <span>GIẢNG VIÊN</span></a>';
                }else {
                    echo '';
                }
                ?>
            </li>
        </ul>
    </div>

    <div class="tab-content">
        <div id="home-page" class="tab-pane active">
            <h1>Hướng dẫn đăng kí đề tài đồ án</h1>
            <p>
                <p><span class="step">Bước 1:</span> Click vào “ĐĂNG KÍ ĐỀ TÀI” ở
                    thanh menu bên trái <br><img id="img_1" src="images/tutorial/1.PNG" alt="img_001.png"></p>
                <p><span class="step">Bước 2:</span> Xuất hiện ra danh sách các đề
                    tài. Click vào icon dấu <img id="img_2" src="images/tutorial/3.PNG" alt="img_003.png"> với đề tài
                    mong
                    muốn</p>
                <p><span class="step">Bước 3:</span> Nhập mã số sinh viên vào <br>
                    <img id="img_3" src="images/tutorial/4.PNG" alt="image_0004.png"> <br> Sau đó bấm nút search <img
                        id="img_4" src="images/tutorial/5.PNG" alt="image_005.png"> để kiểm tra tên sinh viên có nằm
                    trong danh sách được làm đồ án hay
                    không. <br> Sau đó bấm <img id="img_5" src="images/tutorial/7.PNG" alt="image_007.png"> Làm tương tự
                    để
                    thêm các thành viên khác</p>
                <p><span class="step">Bước 4:</span> Bấm <img id="img_6" src="images/tutorial/9.PNG"
                        alt="image_009.png"> để hoàn tất việc đăng kí đề tài và chờ xác nhận của giảng viên ở phần
                    <img id="img_7" src="images/tutorial/11.PNG" alt="image_011.png"> </p>
                <p><span class="step">Bước 5:</span> Chờ xác nhận từ giảng viên</p>
                <p><span class="step">Feedback cho trang web:</span><span><a target="_blank"
                            href="https://docs.google.com/forms/d/1TfXppbZb5TpSwcg-rH5oHxumvnWfawFWkj6ILZSESq0/viewform?edit_requested=true"
                            style="color: blue; text-decoration: underline;">link</a></span></p>
            </p>
        </div>

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
                        <?php
                            if(isset($_SESSION['gv'])) {

                        ?>
                        <?php
                            }
                        ?>
                        <th scope="col">Trạng Thái</th>
                        <th scope="col">Thao Tác</th>
                    </tr>
                </thead>
                <?php
                /* *********************************************** Xử lý hiển thị đề tài ****************************************** */
                $result = mysqli_query($con, "SELECT * FROM de_tai where loaiDT = 'Đồ án 3' ORDER BY id ASC");
                if (mysqli_num_rows($result) > 0) {
                    while ($data = mysqli_fetch_array($result)){

                            $check_slNhom = mysqli_query($con,"SELECT DISTINCT maNhom FROM dang_ky WHERE maDT='".preg_replace("/[^0-9]/", "", $data['maDT'])."' and ttDK != 4");
                            $ttHientai = mysqli_num_rows($check_slNhom);
                            if ($check_slNhom){
                                if ($ttHientai == null) {$ttHientai = 0;}
                                    $ttHientai = mysqli_num_rows($check_slNhom);
                            }
                        ////////////////////////////////////////////////////////////

                /* *********************************************** Xử lý đề tài vào session ****************************************** */
                        if(isset($_SESSION["dsdetai"])) {
                            $is_available = 0;

                            foreach($_SESSION["dsdetai"] as $keys => $values) {
                                if($_SESSION["dsdetai"][$keys]['maDT'] == $data["maDT"]) { //check mã sv nếu trùng
                                    $is_available++;
                                }
                            }

                            if ($is_available == 0) {
                                $id = $data['id'];
                                $maDT = $data['maDT'];
                                $tenDT = $data['tenDT'];
                                $nhomSV =  "<a href='#'><i class='fas fa-plus-circle' data-toggle='modal' data-target='#addModal".$id."'></i></a>";
                                $slSinhVien = $data['slSV'];
                                $check_slNhom = mysqli_query($con,"SELECT DISTINCT maNhom FROM dang_ky WHERE maDT='".preg_replace("/[^0-9]/", "", $data['maDT'])."' and ttDK != 4");
                                $ttHientai = mysqli_num_rows($check_slNhom);
                                if ($check_slNhom){
                                    if ($ttHientai == null) {$ttHientai = 0;}
                                        $ttHientai = mysqli_num_rows($check_slNhom);
                                }
                                $slNhom = $data['slNhom'];


                                $item_array = array(

                                    'id'                 =>     $id,
                                    'maDT'               =>     $maDT,
                                    'tenDT'              =>     $tenDT,
                                    'nhomSV'             =>     $nhomSV,
                                    'slSinhVien'         =>     $slSinhVien,
                                    'slNhom'             =>     $slNhom,
                                    'ttHientai'          =>     $ttHientai,

                                );

                                $_SESSION["dsdetai"][] = $item_array;
                            }


                        }
                        else{

                            $id = $data['id'];
                            $maDT = $data['maDT'];
                            $tenDT = $data['tenDT'];
                            $nhomSV =  "<a href='#'><i class='fas fa-plus-circle' data-toggle='modal' data-target='#addModal".$id."'></i></a>";
                            $slSinhVien = $data['slSV'];
                            $check_slNhom = mysqli_query($con,"SELECT DISTINCT maNhom FROM dang_ky WHERE maDT='".preg_replace("/[^0-9]/", "", $data['maDT'])."' and ttDK != 4");
                            $ttHientai = mysqli_num_rows($check_slNhom);
                            if ($check_slNhom){
                                if ($ttHientai == null) {$ttHientai = 0;}
                                    $ttHientai = mysqli_num_rows($check_slNhom);
                            }
                            $slNhom = $data['slNhom'];


                            $item_array = array(

                                'id'                 =>     $id,
                                'maDT'               =>     $maDT,
                                'tenDT'              =>     $tenDT,
                                'nhomSV'             =>     $nhomSV,
                                'slSinhVien'         =>     $slSinhVien,
                                'slNhom'             =>     $slNhom,
                                'ttHientai'          =>     $ttHientai,

                            );

                            $_SESSION["dsdetai"][] = $item_array;

                        }
                        //////////////////////////////////////////////////////
            ?>
                <script>
                    load_dsdangky("<?php echo $data['maDT']; ?>");
                    reload("<?php echo $data['maDT']; ?>");

                    function reload(maDT) {
                        var load_maDT = maDT;
                        var action = "reload";
                        $.ajax({
                            url: "action.php",
                            method: "POST",
                            dataType: "json",
                            data: {
                                action: action,
                                load_maDT: load_maDT
                            },
                            success: function (data) {
                                $("#reload" + maDT).html(data.count);
                            }
                            /*,
                                                    error: function(){
                                                        alert("Lỗi khi tải danh sách nhóm!");
                                                    }*/
                        });
                    }
                </script>
                <!-- =======================BẢNG ĐỀ TÀI========================= -->
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $data['loaiDT']; ?></th>
                        <td><a href="#" data-toggle="modal" data-target="#addmodal<?php echo $data['maDT']; ?>"
                                style="color: blue; text-decoration: none; font-weight: bold;"><?php echo $data['tenDT']; ?></a>
                        </td>
                        <td>
                            <span id="result_return<?php echo $data['maDT']; ?>"> </span>
                            <a href="#"><i class="fas fa-plus-circle" data-toggle="modal"
                                    data-target="#addModal<?php echo $data['id']; ?>"></i></a>
                        </td>
                        <td> <?php echo $data['slSV']; ?></td>
                        <td> <?php echo $data['slNhom']; ?> </td>
                        <td>
                            <span id="reload<?php echo $data['maDT'] ?>">
                                <?php
                                echo $ttHientai;
                            ?>
                                /
                                <?php echo $data['slNhom']; ?>
                            </span>
                        </td>
                        <td>
                            <?php
                                if(isset($_SESSION['gv'])){
                            ?>
                            <a href="#" class="submitNhom" id="submit<?php echo $data['maDT']; ?>"><button type="button"
                                    class="btn btn-success">Đăng kí</button></a>
                            <?php
                                }
                                else if(isset($_SESSION['sv'])){ //Phân Quyền truy cập: icon cho bảng đề tài
                            ?>
                            <a href="#" class="submitNhom" id="submit<?php echo $data['maDT']; ?>"><button type="button"
                                    class="btn btn-success">Đăng kí</button></a>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                </tbody>
                <input type="hidden" name="hidden_ttHientai" id="ttHientai<?php echo $data['maDT']; ?>"
                    value="<?php echo $ttHientai; ?>" />
                <input type="hidden" name="hidden_slNhom" id="slNhom<?php echo $data['maDT']; ?>"
                    value="<?php echo $data['slNhom']; ?>" />
                <input type="hidden" name="hidden_slSinhVien" id="slSinhVien<?php echo $data['maDT']; ?>"
                    value="<?php echo $data['slSV']; ?>" />
                <!-- =======================KẾT THÚC BẢNG ĐỀ TÀI=================== -->
                <?php
                        }
                    }
                ?>
            </table>
        </div>
        

        <!-- ===========================KẾT QUẢ ĐĂNG KÝ============================ -->
        <div id="result" class="tabe-pane fade" style="overflow-y: scroll;">
            <h3>KẾT QUẢ ĐĂNG KÍ ĐỒ ÁN ĐỢT <span id="id-">1</span></h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Mã Đề Tài</th>
                        <th scope="col">Tên Đề Tài</th>
                        <th scope="col">Nhóm Sinh Viên</th>
                        <th scope="col">Trạng Thái</th>
                        <th scope="col">Thao Tác</th>
                    </tr>
                </thead>

                <?php
                /* Xử lý kết quả đăng ký */
                if(isset($_SESSION['gv'])){ //khi user là giảng viên
                	/* Kết quả đăng ký khi ttDK các thành viên = 2 */
                    $check_detai= mysqli_query($con, "SELECT * FROM de_tai WHERE maGV = '$user_number'"); //Xử lý đề tài của giảng viên
                    if (mysqli_num_rows($check_detai) > 0) {
                        while ($data_dt = mysqli_fetch_array($check_detai)) {
                            $check_dk = mysqli_query($con, "SELECT DISTINCT maNhom FROM dang_ky WHERE maDT = '".preg_replace("/[^0-9]/", "", $data_dt['maDT'])."' and ttDK = 2 and maNhom NOT IN(SELECT maNhom FROM dang_ky WHERE maDT = '".preg_replace("/[^0-9]/", "", $data_dt['maDT'])."' and ttDK!=2 and ttDK != 4)");// xử lý maNhom theo format table dang_ky

                            if (mysqli_num_rows($check_dk) > 0) {

                                while ($data_dk = mysqli_fetch_array($check_dk)) {
                                    $maDT = $data_dt['maDT'];
                                    $tenDT = $data_dt['tenDT'];
                                    $maNhom = $data_dk['maNhom'];
                                    $xacnhan = "<a href='#'' class='xacnhan' id='".$data_dk['maNhom']."'><button type='button' class='btn btn-success'>Duyệt</button></a>";
                                    $tuchoi = "<a href='#'' class='tuchoi' id='tuchoi".$data_dk['maNhom']."'><button type='button' class='btn btn-danger'>Từ Chối</button></a>";
                            ?>
                <!-- ================================ BẢNG KẾT QUẢ ĐĂNG KÝ  ================================== -->
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $maDT; ?></th>
                        <td><?php echo $tenDT; ?></td>
                        <td>
                            <?php echo $maNhom; ?>
                        </td>
                        <td>
                            <p id="duyet<?php echo $maNhom; ?>">Chờ duyệt</p>
                        </td>
                        <td>
                            <?php echo $xacnhan;
                                                            echo $tuchoi;
                                                    ?>
                        </td>
                    </tr>
                </tbody>
                <!-- ================================ KẾT THÚC BẢNG KẾT QUẢ ĐĂNG KÝ  ================================== -->
                <?php

                                }
                            }

                	/* Kết quả đăng ký khi ttDK các thành viên != 2 */

                            $check_dkconlai = mysqli_query($con, "SELECT DISTINCT maNhom, ttDK FROM dang_ky WHERE maDT = '".preg_replace("/[^0-9]/", "", $data_dt['maDT'])."' and ttDK!=2");

                            if (mysqli_num_rows($check_dkconlai) > 0) {

                                while ($data_dkconlai = mysqli_fetch_array($check_dkconlai)) {
                                    if ($data_dkconlai['ttDK'] == 1) {
                ?>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $data_dt['maDT']; ?></th>
                        <td><?php echo $data_dt['tenDT']; ?></td>
                        <td>
                            <?php echo $data_dkconlai['maNhom']; ?>
                        </td>
                        <td>Chờ sinh viên</td>

                    </tr>
                </tbody>
                <?php
                                    }

                                    if ($data_dkconlai['ttDK'] == 3) {
                ?>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $data_dt['maDT']; ?></th>
                        <td><?php echo $data_dt['tenDT']; ?></td>
                        <td>
                            <?php echo $data_dkconlai['maNhom']; ?>
                        </td>
                        <td>Đã duyệt</td>

                    </tr>
                </tbody>

                <?php
                                    }

                                    if ($data_dkconlai['ttDK'] == 4) {
                ?>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $data_dt['maDT']; ?></th>
                        <td><?php echo $data_dt['tenDT']; ?></td>
                        <td>
                            <?php echo $data_dkconlai['maNhom']; ?>
                        </td>
                        <td>Từ chối duyệt</td>

                    </tr>
                </tbody>
                <?php

                                    }
                                }
                            }
                        }
                    }
                }

                    if(isset($_SESSION['sv'])){
                        $tvnhom_collect ="";
                        $check_kqdk = mysqli_query($con, "SELECT maSV, maDT,ttDK, maNhom from dang_ky where maSV='$user_number'");
                            if (mysqli_num_rows($check_kqdk) > 0) {
                                while ($kqdk = mysqli_fetch_array($check_kqdk)) {
                                    $check_kqdt = mysqli_query($con, "SELECT tenDT, maDT from de_tai");
                                    while ($kqdt = mysqli_fetch_array($check_kqdt)){
                                        if (preg_replace("/[^0-9]/", "", $kqdt['maDT']) == $kqdk['maDT']) {
                                            if ($kqdk['ttDK'] != 4) {

                            ?>
                <tbody id="nhom<?php echo $kqdk['maNhom']; ?>">
                    <tr>
                        <th scope="row"><?php echo $kqdt['maDT']; ?></th>
                        <td><?php echo $kqdt['tenDT']; ?></td>
                        <td>
                            <?php
                                                                    $check_tvnhom = mysqli_query($con, "SELECT maSV from dang_ky where maNhom ='".$kqdk['maNhom']."' and maDT='".preg_replace("/[^0-9]/", "", $kqdt['maDT'])."'");
                                                                    while ($print_tvnhom = mysqli_fetch_array($check_tvnhom)) {
                                                                            $convert_toName = mysqli_query($con, "SELECT tenSV from sinh_vien where maSV ='".$print_tvnhom['maSV']."'");
                                                                            while ($array_convert_toName = mysqli_fetch_array($convert_toName)){
                                                                                echo $array_convert_toName['tenSV']."<br>";
                                                                            }

                                                                    }
                                    ?>
                        </td>
                        <td><?php if ($kqdk['ttDK'] == 2) {echo "Chờ duyệt";}
                                                                    else if ($kqdk['ttDK'] == 3) {echo "Đã duyệt";}?>
                        </td>
                        <?php
                                                if ($kqdk['maNhom'] == $user_number) {
                        ?>
                        <td> <a href="#" class="huynhom" id="<?php echo $kqdk['maNhom']."and".$kqdk['maDT']; ?>"><button
                                    type="button" class="btn btn-danger">Hủy nhóm</button></a> </td>
                        <?php
                                                }
                                                if ($kqdk['maNhom'] != $user_number) {
                                                    if ($kqdk['ttDK'] !=1) {
                        ?>
                        <td> <a href="#" class="roinhom" id="<?php echo $kqdk['maNhom']."and".$kqdk['maDT']; ?>"><button
                                    type="button" class="btn btn-danger">Rời nhóm</button></a> </td>
                    </tr>
                </tbody>
                <?php
                                                    }
                                                }
                                            }
                                            else if ($kqdk['ttDK'] == 4){
?>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $kqdt['maDT']; ?></th>
                        <td><?php echo $kqdt['tenDT']; ?></td>
                        <td>
                            <?php echo $kqdk['maNhom']; ?>
                        </td>
                        <td>
                            <?php echo "Từ chối duyệt";?>
                        </td>
                    </tr>
                </tbody>
                <?php
                                            }
                                        }
                                    }
                                }
                            }
                    }
                ?>
            </table>
        </div>
    </div>

    <?php

            $result = mysqli_query($con, "SELECT * from de_tai");
            while ($data = mysqli_fetch_array($result)){
	            $tenGV = mysqli_query($con, "SELECT tenGV from giang_vien where id = '".$data['maGV']."'");
	            $print_tenGV = mysqli_fetch_array($tenGV);

        ?>

    <div class="modal fade" id="addmodal<?php echo $data['maDT']; ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Mô Tả Đề Tài</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo str_replace("\n", "<br>",$data['moTa']); ?>
                    <p style="text-align: right"><br>Đề tài của giảng viên : <span
                            style="font-weight: bold"><?php echo $print_tenGV['tenGV']; ?></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addModal<?php echo $data['id']; ?>" tabindex="-1" role="dialog"
        aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Nhập Mã Số Sinh Viên</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form onSubmit="return false;">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="search_text" id="search_text<?php echo $data['id'];?>"
                                    placeholder="Nhập mã số sinh viên" class="form-control search_text" />
                                <button type="button" class="btn btn-primary timkiem"
                                    id="timkiem<?php echo $data['id']; ?>" style="float: right;"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div>

                        <div id="result<?php echo $data['id']; ?>"></div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary them" id="<?php echo $data['id']; ?>"
                        data-dismiss="modal">Thêm Mã Số Sinh Viên</button>
                    <input type="hidden" name='hidden_maDT' id='maDT<?php echo $data['id']; ?>'
                        value='<?php echo $data['maDT']; ?>' />

                </div>
            </div>
        </div>

    </div>


    <?php
        }
    ?>

    <?php
        if (isset($_SESSION['userData']['maSV'])) {
        $user_data = $_SESSION['userData'];
        $maSV = $user_data['maSV'];
        $sql = "SELECT * FROM dang_ky WHERE maSV = '$maSV' AND ttDK = 1";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row =  mysqli_fetch_array($result);
    ?>
    <div id="id01" class="modal" role="dialog" style="display: block; width: 30%; height: 280px; margin: 15% auto;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Thông báo</h3>
                </div>
                <div class="modal-body">
                    <p>Bạn được thêm vào nhóm của <?php echo $row['maNhom'];?> với mã đề tài là
                        <?php echo $row['maDT'];?>. </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="accept" type="submit">Xác nhận</button>
                    <button class="btn btn-secondary" id="deny">Từ chối</button>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    }

    ?>
    </div>
</body>