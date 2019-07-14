<?php
    include_once('../function/config.php');

    include '../connection.php';

    include '../requireSession.php';

    check_admin_permission($user_role);

?>

 <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">QUẢN LÝ</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
              <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $user_name; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">

                        <li class="divider"></li>
                        <li>
                            <a href="../../login/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <!-- Thêm-->
                    <li>
                        <a href="add_loai_detai.php"><i class="fa fa-fw fa-wrench"></i> THÊM LOẠI ĐỀ TÀI</a>
                    </li>
                    <li>
                        <a href="add_detai.php"><i class="fa fa-fw fa-wrench"></i> THÊM ĐỀ TÀI</a>
                    </li>
                    <li>
                        <a href="add_sinhvien.php"><i class="fa fa-fw fa-wrench"></i> THÊM SINH VIÊN</a>
                    </li>
                    <li>
                        <a href="add_multi_sinhvien.php"><i class="fa fa-fw fa-wrench"></i> THÊM DANH SÁCH SINH VIÊN</a>
                    </li>
                    <li>
                        <a href="add_giangvien.php"><i class="fa fa-fw fa-wrench"></i> THÊM GIẢNG VIÊN</a>
                    </li>
                    
                    <!-- Quản lý -->
                    <li>
                        <a href="loai_detai.php"><i class="fa fa-fw fa-table"></i> QUẢN LÝ LOẠI ĐỀ TÀI</a>
                    </li>

                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-table"></i> QUẢN LÝ DANH SÁCH SINH VIÊN</a>
                    </li>
                    <li>
                        <a href="detai.php"><i class="fa fa-fw fa-table"></i> QUẢN LÝ ĐỀ TÀI</a>
                    </li>

                    <li>
                        <a href="giangvien.php"><i class="fa fa-fw fa-table"></i>QUẢN LÝ DANH SÁCH GIẢNG VIÊN</a>
                    </li>

                    <li>
                        <a href="ketqua_dangky.php"><i class="fa fa-fw fa-table"></i> QUẢN LÝ KẾT QUẢ ĐĂNG KÝ</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>