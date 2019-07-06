    <div class="sidenav">
        <ul class="nav nav-tabs" id="mainNav" style="border-bottom: none;">
            <li class="active"><a data-toggle="tab" href="#home-page"><span><i class="fas fa-home"></i></span>
                    <span>TRANG CHỦ</span></a></li>
            <li><a data-toggle="tab" href="#register"><span><i class="fas fa-sign-in-alt"></i></span> <span>ĐĂNG KÍ ĐỀ
                        TÀI</span></a></li>
            <li><a data-toggle="tab" href="#result"><span><i class="fas fa-chalkboard-teacher"></i></span> <span>KẾT QUẢ
                        ĐĂNG KÍ</span></a></li>
            <li>
                <?php check_user($user_role) ?>
            </li>
        </ul>
    </div>