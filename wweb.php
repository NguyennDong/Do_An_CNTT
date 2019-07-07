<?php
	// Check database connection
	require 'config.php';
	require 'connection.php';
	//Check login
	require 'requireSession.php';
?>

<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="refresh" content="300000;url=/login/logout.php" />
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
    <script src="alerttify/lib/alertify.min.js"></script>
    <link rel="stylesheet" href="alerttify/themes/alertify.core.css" />
    <link rel="stylesheet" href="alerttify/themes/alertify.default.css" />
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
var mang_sinh_vien =  new Array();
//Search mssv
$(document).ready(function(){
	function load_data(query) {
		var id = query;
		var query = $('#search_text'+id).val();

		$.ajax({
			url:"fetch.php",
			method:"POST",
			dataType: 'json',
			data:{query:query},
			success:function(data) {
				var table = data['table'];
				var row = data['row'];
				$('#result'+id).html(table + '<tr><td>'+row["maSV"]+'</td><td>'+ row["tenSV"] + '</td><td>' + row["maLop"] + '</td></tr></table>');
			},

			error: function(ts) { alert(ts.responseText) }

		});
	}

	$('.timkiem').click(function() {
		var id = $(this).attr("id");
		var values = id.split('m');
		var timkiem_id = values[2];
		search = $('#search_text'+timkiem_id).val();
		if(search != '') {
			load_data(timkiem_id);
			$(this).val() = "";
		}else {
			load_data('');
			$('#result');
		}
	});


});


//Load lên bảng đề tài
function load_dsdangky(maDT) {
	var load_maDT = maDT;
	$.ajax({
		url:"adddangky.php",
		method:"POST",
		data:{load_maDT: load_maDT},
		dataType: "json",
		success: function(data){
			//alert("success add");
			$("#result_return"+load_maDT).html(data.mssv);
			//$("#slsv"+id).html(data.slsv);
		},
		error: function(){
			alert("error add");
		}
	});
}

//Click thêm mssv vào bảng đề tài
$(document).on('click','.them', function(id){
	var id = $(this).attr("id");
	var maDT = $('#maDT'+id+'').val();
	var maSV = $('#search_text'+id+'').val(); // store input value
	var action = "add";

	$.ajax({
		url:"action.php",
		method:"POST",
		data:{maDT:maDT, maSV:maSV,action:action,id:id},
		success: function(data){
			load_dsdangky(maDT);
		},
		error: function(){
			alert("error action");
		}
	});


});

//Xóa mssv
$(document).on('click','.fa-minus-circle', function(){
	var del_id = $(this).attr("id");
	var action = "delete";

	$.ajax({

		url:"action.php",
		method:"POST",
		//dataType: "json",
		data:{action:action,del_id:del_id},
		success: function(data){

			alert("success delete");
			location.reload();
		},
		error: function(){

		alert("error delete");

		}

	});

});

$(document).on('click','#accept', function(){
    var action = "confirm";
    $.ajax({

		url:"confirm.php",
		method:"POST",
		data:{action:action},
		success: function(data){
            location.reload();
		},
	});
});

$(document).on('click','#deny', function(){
    var action = "deny";
    $.ajax({

		url:"deny.php",
		method:"POST",
		data:{action:action},
		success: function(data){
            location.reload();
		},
	});
});



//Check trùng mssv đã được đăng kí
function notify4() {
	alert("Sinh viên trong nhóm đã đăng ký 1 nhóm khác");
}

	</script>
</head>

<body>

	<?php require 'checkDupplicated.php'; ?>
    <div class="container-">
        <!-- Header-->
        <div class="top-content">
            <div class="row">
                <div class="img-logo col-sm-2">
                    <img src="images/logo/TĐT_logo.png" alt="TDT-logo">
                </div>
                <div class="col-sm-7">
                    <h1 id="top-title">ĐĂNG KÍ ĐỒ ÁN KHOA CÔNG NGHỆ THÔNG TIN</h1>
                </div>
                <div class="col-sm-3">
                    <div id="user-info">
                        <span id="user-name"><?php echo $user_name; ?></span>
                        <a href="/login/logout.php">
                            <span id="icon-off">
                                <i class="fas fa-power-off"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <hr id="hr-top-content">
        </div>

        <!-- Side Menu-->
        <div class="sidenav">
            <a href="#" id="showHomepage"><i class="fas fa-home"></i> TRANG CHỦ</a>
            <a href="#" id="showSignInProject"><i class="fas fa-sign-in-alt"></i> ĐĂNG KÍ ĐỀ TÀI</a>
            <a href="#" id="showResultTable"><i class="fas fa-chalkboard-teacher"></i> KẾT QUẢ ĐĂNG KÍ</a>
			<!-- Nếu là GV mới hiện tab Giảng Viên -->
            <?php
            if(isset($_SESSION['gv'])){
                echo '<a href="#" id="showTeacherTable"><i class="fas fa-poll"></i> GIẢNG VIÊN</a>';
            }else {
                echo '';
            }
            ?>
        </div>


        <div class="container">
            <div class="main-content">
                <!-- Trang Chủ-->
                <div class="home-page">
                    <h1>Thông báo</h1>
                    <p>Maecenas erat diam, mollis non sem ut, mollis dignissim est. Pellentesque tempus, ex id mattis
                        bibendum, nisl augue scelerisque augue, eget lacinia eros tellus sit amet urna. Aenean sodales
                        cursus facilisis. Nulla dignissim lorem non urna euismod viverra sed id nunc. Pellentesque
                        sollicitudin justo vel massa interdum volutpat. Praesent at neque condimentum, dignissim tellus
                        ut, cursus ligula. Integer nec bibendum justo, lacinia vehicula sem. Aenean nec mauris lacinia,
                        maximus tortor vel, venenatis ligula. Quisque suscipit interdum nisl, at lobortis ligula
                        pellentesque sed. Sed enim sapien, porttitor ac odio ut, placerat volutpat purus. Vestibulum
                        vitae augue a nunc commodo gravida. Sed quis porttitor dolor, id eleifend libero. Praesent
                        viverra vehicula porta. In in est in sem posuere rhoncus. Sed a turpis vitae turpis facilisis
                        imperdiet.

                        Cras convallis nisl ligula, at feugiat felis bibendum in. Sed ipsum arcu, placerat at suscipit
                        et, hendrerit ut arcu. Vivamus vestibulum, leo in pellentesque tempor, odio enim tempus lectus,
                        quis volutpat mi justo vitae felis. Phasellus eget facilisis magna, nec tincidunt tellus. In
                        elementum mi vel nunc eleifend, at venenatis eros sollicitudin. Cras sed feugiat eros. Morbi a
                        enim pulvinar, dignissim justo at, tempor risus. Sed risus nunc, dapibus et magna quis,
                        dignissim tempus justo. Sed quis nisi varius, pharetra augue a, ultricies massa. Sed quis
                        aliquam lorem. Nam laoreet posuere velit eget porttitor. Pellentesque orci nunc, pretium id
                        tempor a, pharetra at tellus. Vestibulum luctus dolor a enim pharetra porta. Vivamus eleifend
                        est a purus hendrerit, quis aliquam ipsum elementum.
                    </p>
                </div>

                <!-- Đăng kí đề tài -->
                <br>
                <div class="title-notfi" style="display: none;">
                    <h3>ĐĂNG KÍ ĐỒ ÁN ĐỢT <span id="id-">1</span></h3>
                </div>
                <br>
                <table class="table" id="table-signup" style="display: none;">
                    <thead>
                        <tr>
                            <th scope="col">Mã Đề Tài</th>
                            <th scope="col">Tên Đề Tài</th>
                            <th scope="col">Nhóm Sinh Viên</th>
							<?php
								if(isset($_SESSION['gv'])) {

							?>
                            <th scope="col">Số lượng sinh viên</th>
                            <th scope="col">Số lượng đề tài</th>

							<?php
								}
							?>
                            <th scope="col">Trạng Thái</th>
                            <th scope="col">Thao Tác</th>
                        </tr>
                    </thead>

					<?php
						$result = mysqli_query($con, "SELECT * FROM de_tai ORDER BY id ASC");
						if (mysqli_num_rows($result) > 0) {

							while ($data = mysqli_fetch_array($result)){
					?>
					<script>
						load_dsdangky("<?php echo $data['maDT']; ?>");

					</script>
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $data['maDT']; ?></th>
                            <td><?php echo $data['tenDT']; ?></td>
                            <td>
                                <p id="result_return<?php echo $data['maDT']; ?>">  </p>
                                <a href="#"><i class="fas fa-plus-circle" data-toggle="modal" data-target="#addModal<?php echo $data['id']; ?>"></i></a>
                            </td>
							<?php
								if(isset($_SESSION['gv'])) {

							?>
							<td> <?php echo $data['slSV']; ?></td>
							<td> <?php echo $data['slNhom']; ?> </td>
							<?php
								}
							?>
                            <td><?php
									$check_slNhom = mysqli_query($con,"SELECT DISTINCT maNhom FROM dang_ky WHERE maDT=".$data['maDT']."");
									echo mysqli_num_rows($check_slNhom);

								?>/<?php echo $data['slNhom']; ?></td>
                            <td>
                                <?php
									if(isset($_SESSION['gv'])){
								?>
								<a href="action.php?maDT=<?php echo $data['maDT']; ?>"><i class="fas fa-check"></i></a><span>/</span><a href="#"><i class="fas fa-edit"></i></a><span>/</span><a href="#"><i class="fas fa-trash-alt"></i></a>
								<?php
									}
									else if(isset($_SESSION['sv'])){ //Phân Quyền truy cập: icon cho bảng đề tài
                                ?>
								<a href="action.php?maDT=<?php echo $data['maDT']; ?>"><i class="fas fa-check"></i></a><span>/</span><a href="#"><i class="fas fa-redo-alt"></i></a>
								<?php
									}
								?>
							</td>
                        </tr>
                    </tbody>
			<?php
				}
			}
			?>
                </table>
				<!-- Kết Quả Đăng Kí Đề Tài-->
                <br>
                <div class="tab3-title" style="display: none;">
                    <h3>KẾT QUẢ ĐĂNG KÍ ĐỒ ÁN ĐỢT <span id="id-">1</span></h3>
                </div>
                <br>
                <table class="table" id="tab3-table" style="display: none;">
                    <thead>
                        <tr>
                            <th scope="col">Mã Đề Tài</th>
                            <th scope="col">Tên Đề Tài</th>
                            <th scope="col">Nhóm Sinh Viên</th>
                            <th scope="col">Trạng Thái</th>
                            <?php
                            if(isset($_SESSION['gv'])){
                                echo '<th scope="col">Thao Tác</th>';
                            }else {
                                echo '';
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Đề tài 1</td>
                            <td>
                                <p id="result-return"></p>
                            </td>
                            <td>Chờ duyệt</td>
                            <?php
								if(isset($_SESSION['gv'])){
									echo '<td>';
										echo $icon_action_table_2;
									echo '</td>';
								}else {
									echo '';
								}
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
		<?php

			$result = mysqli_query($con, "SELECT * from de_tai");
			while ($data = mysqli_fetch_array($result)){

		?>

		<div class="modal fade" id="addModal<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Đăng Kí</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <p class="input-group-addon">Nhập Mã Số Sinh Viên</p>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="search_text" id="search_text<?php echo $data['id'];?>"  placeholder="mã số sinh viên" class="form-control search_text" />
                                </div>
                            </div>
                            <button type="button"  class="btn btn-primary timkiem" id="timkiem<?php echo $data['id']; ?>" style="float: right;">Tìm kiếm</button>
                            <div id="result<?php echo $data['id']; ?>"></div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary them" id="<?php echo $data['id']; ?>" data-dismiss="modal">Thêm Mã Số Sinh Viên</button>
						<input type="hidden" name='hidden_maDT' id='maDT<?php echo $data['id']; ?>' value='<?php echo $data['maDT']; ?>' />

                    </div>
                </div>
            </div>
        </div>


        <?php
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
                    <div class="modal-body" >
                        <p>Bạn được thêm vào nhóm của <?php echo $row['maNhom'];?> với mã đề tài là <?php echo $row['maDT'];?>. </p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" id="accept" type="submit">Xác nhận</button>
                        <button class="btn btn-secondary" id="deny" >Từ chối</button>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
	<?php
		}
	?>
    </div>
</body>
</html>