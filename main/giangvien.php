<?php
	  session_start();
	  $con = mysqli_connect("localhost","root","","pvhuyc5_doan");
	  mysqli_set_charset($con, 'UTF8');
	  include 'connection.php';
<<<<<<< HEAD
	  include_once('function/function.php');
	  include 'requireSession.php';
	  $_DOMAIN = 'http://localhost/IT-1/main/';
	?>
<html>

<head>
	<title>TDTU</title>
=======

	  include 'requireSession.php';
?>
<html>

<head>
>>>>>>> master
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
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

	<!-- Scripts -->
	<script src="js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="js/jquery.tabledit.js"></script>
	<!-- Custom script -->
<<<<<<< HEAD

</head>

<body>
<?php
	function edit_load_detai() {
		if (isset($_GET['id'])){
			$id = trim(addslashes(htmlspecialchars($_GET['id'])));
		} else {
			$id='';
		}
		$query = query("SELECT * FROM de_tai WHERE id = '$id'");

		confirm($query);

		while ($row = fetch_array($query))  {

			$detai = <<<DELIMETER

			
DELIMETER;
        	echo $detai;
		}
	}
	
?>
	
=======
</head>

<body>
>>>>>>> master
	<div class="container">
		<div class="giangvien">
			<p class="title-list">
				<h3>Danh sách đề tài của giảng viên:</h3>
			</p>
			<!-- Button trigger modal -->
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="exampleModalLabel">Tạo đề tài</h3>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
<<<<<<< HEAD
							<form method="POST" action="" id=formAddTopic>
								<div class="form-group">
									<label>Tên đề tài</label>
									<textarea class="form-control" id="name_topic" rows="3"></textarea>
								</div>
								<div class="form-group">
									<label>Mô tả</label>
									<textarea class="form-control" id="desc_topic" rows="3"></textarea>
								</div>
								<div class="form-group">
									<label>Loại đề tài 1</label>
									<select class="form-control" id="cate_topic">
											     <?php loai_detai_select_edit() ?>
									</select>
								</div>
								<div class="form-group" style="text-align: right">
									<button type="submit" class="btn btn-primary">Tạo mới</button>
								</div>
								<div class="alert alert-danger hidden"></div>
							</form>
						</div>
						<div class="modal-footer">
=======
							<form>
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Tên đề tài</label>
									<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
								</div>
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Mô tả</label>
									<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
								</div>
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Số lượng sinh viên tối đa</label>
									<textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
								</div>
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Số lượng nhóm tối đa</label>
									<textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
								</div>
								<div class="form-group">
									<label for="exampleFormControlSelect1">Loại đề tài 1</label>
									<select class="form-control" id="exampleFormControlSelect1">
										<option>DACNTT 1</option>
										<option>DACNTT 2</option>
										<option>DA 1</option>
										<option>DA 2</option>
									</select>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
							<button type="button" class="btn btn-primary">Tạo mới</button>
>>>>>>> master
						</div>
					</div>
				</div>
			</div>
<<<<<<< HEAD
			
=======

>>>>>>> master
			<table class="table">
				<thead>
					<tr>
						<th class="title-name" scope="col">Loại đề tài</th>
						<th class="title-name" scope="col">Tên đề tài</th>
<<<<<<< HEAD
=======
						<th class="title-name" scope="col">Mô tả</th>
>>>>>>> master
						<th class="title-name" scope="col">Số lượng sinh viên tối đa</th>
						<th class="title-name" scope="col">Số lượng nhóm tối đa</th>
						<th class="title-name" scope="col">Trạng thái</th>
						<th class="title-name" scope="col">Thao tác</th>
					</tr>
				</thead>
<<<<<<< HEAD
<?php
				$sql_get_data_topic = "SELECT * FROM de_tai WHERE maGV ='".$user_data['maGV']."'";
				$result = mysqli_query($con , $sql_get_data_topic);
				if (mysqli_num_rows($result) > 0){
					$data_topic = mysqli_fetch_array($result);
				}
				foreach ($result as $key => $data_topic) {
					if ($data_topic['VPKDuyet'] == 0){
							$status='Chưa duyệt';
					}
						
						else {
							$status='Đã duyệt';	
					}
					echo '<div class="modal fade" id="addmodal'.$data_topic['maDT'].'" tabindex="-1" role="dialog"
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
										'.str_replace("\n", "<br>",$data_topic['moTa']).'
										<p style="text-align: right"><br>Đề tài của giảng viên : <span
												style="font-weight: bold">'.$user_data['tenGV'].'</span></p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
									</div>
								</div>
							</div>
						</div>';
					echo'<tbody>
							<tr>
								<th id="topic" scope="row">'.$data_topic['loaiDT'].'</th>
								<td><a href="#" data-toggle="modal" data-target="#addmodal'.$data_topic['maDT'].'"
										style="color: blue; text-decoration: none; font-weight: bold;">'.$data_topic['tenDT'].'</a>
								</td>
								<td id="student-max">'.$data_topic['slSV'].'</td>
								<td id="amount-max">'.$data_topic['slNhom'].'</td>
								<td id="status">'.$status.'</td>
								<td>
									<a class="btn btn-outline-primary btn-sm" href="add_detaigv.php" data-toggle="modal" data-target="#exampleModal_'.$data_topic['id'].'"><span
											class="far fa-edit"></span></a>
									<a class="btn btn-outline-danger btn-sm  del-post-list" data-id="'.$data_topic['id'].'">
											<span class="fa fa-trash"></span>
									</a>
								</td>
							</tr>
						</tbody>';
					echo'<div class="modal fade" id="exampleModal_'.$data_topic['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
								aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h3 class="modal-title" id="exampleModalLabel">Tạo đề tài</h3>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form method="POST" id="formEditTopic"  data-id="'.$data_topic['id'].'">
											<div class="form-group">
												<label>Tên đề tài</label>
												<textarea class="form-control" id="name_edit_topic" rows="3">'.$data_topic['tenDT'].'</textarea>
											</div>
											<div class="form-group">
												<label>Mô tả</label>
												<textarea class="form-control" id="desc_edit_topic" rows="3">'.$data_topic['moTa'].'</textarea>
											</div>
											<div class="form-group">
												<label>Loại đề tài 1</label>
												<select class="form-control" id="cate_edit_topic">
															<option>'.$data_topic['loaiDT'].'</option>
												</select>
											</div>
											<div class="form-group" style="text-align: right">
												<button type="submit" class="btn btn-primary">Lưu thay đổi</button>
											</div>
											<div class="alert alert-danger hidden"></div>
										</form>
									</div>
									<div class="modal-footer">
									</div>
								</div>
							</div>
						</div>';
				}
?>
			</table>
				
			<a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" href="add_detaigv.php">Tạo đề tài</a>
		<!-- ==============================================Admin============================================== -->
	<script src="form.js"></script>
=======
				<tbody>
					<tr>
						<th id="topic" scope="row">1</th>
						<td id="name-topic">sadsad</td>
						<td id="describe">asdsad</td>
						<td id="student-max">@1231231231</td>
						<td id="amount-max">@44623432</td>
						<td id="status"></td>
						<td id="action"><a href="#" data-toggle="modal" data-target="#exampleModal_2"><i
									class="far fa-edit"></i></a></td>
					</tr>
				</tbody>
			</table>
			<div class="modal fade" id="exampleModal_2" tabindex="-1" role="dialog"
				aria-labelledby="exampleModalLabel_2" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="exampleModalLabel_2">Sửa đề tài</h3>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST" id=#formCreatNew>
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Tên đề tài</label>
									<input class="form-control" id="exampleFormControlTextarea1" value="Đề tài 1">
								</div>
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Mô tả</label>
									<input class="form-control" id="exampleFormControlTextarea2" value="Mô tả 1">
								</div>
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Số lượng sinh viên tối đa</label>
									<input class="form-control" id="exampleFormControlTextarea3" values="1">
								</div>
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Số lượng nhóm tối đa</label>
									<input class="form-control" id="exampleFormControlTextarea4" values="1">
								</div>
								<div class="form-group">
									<label for="exampleFormControlSelect1">Loại đề tài 1</label>
									<select class="form-control" id="exampleFormControlSelect1">
										<option>DACNTT 1</option>
										<option>DACNTT 2</option>
										<option>DA 1</option>
										<option>DA 2</option>
									</select>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
							<button type="button" class="btn btn-primary">Tạo mới</button>
						</div>
					</div>
				</div>
			</div>
			<a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" href="#">Tạo đề tài</a>
		</div>


		<!-- ==============================================Admin============================================== -->
<?php

	if ($user_role == '1'){
	echo '
		<div class="admin">
			<p class="title-list">
				<h3>Đợt đăng ký:</h3>
			</p>
			<!-- Modal -->
			<div class="modal fade" id="exampleModal_3" tabindex="-1" role="dialog"
				aria-labelledby="exampleModalLabel_3" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel_3">Tạo đề tài</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Tên Đợt Đăng Kí</label>
									<input class="form-control" id="exampleFormControlTextarea1" values="Đợt đăng ký">
								</div>
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Ngày bắt đầu</label>
								</div>
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Ngày kết thúc</label>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
							<button type="button" class="btn btn-primary">Tạo mới</button>
						</div>
					</div>
				</div>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th class="title-name" scope="col">Tên đợt đăng ký</th>
						<th class="title-name" scope="col">Ngày bắt đầu</th>
						<th class="title-name" scope="col">Ngày kết thúc</th>
						<th class="title-name" scope="col">Trạng thái</th>
						<th class="title-name" scope="col">Thao tác</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th id="topic" scope="row">Dự án công nghệ thông tin 1 | <a href="#">sửa</a> / <a href="#">xóa</a></th>
						<td id="name-topic">1/5/2019</td>
						<td id="describe">10/5/2019</td>
						<td id="student-max">Đóng</td>
						<td id="amount-max">
							<style>
								.fast .toggle-group {
									transition: left 0.1s;
									-webkit-transition: left 0.1s;
								}
							</style>
							<input type="checkbox" checked data-toggle="toggle" data-class="fast">
						</td>
					</tr>
				</tbody>
			</table>
			<a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_3" href="#">Tạo đợt đăng ký</a>


			<p class="title-list">
				<h3>Danh sách các đề tài giảng viên đăng kí:</h3>
			</p>
			<table class="table">
				<thead>
					<tr>
						<th class="title-name" scope="col">Loại đề tài</th>
						<th class="title-name" scope="col">Tên đề tài</th>
						<th class="title-name" scope="col">Mô tả</th>
						<th class="title-name" scope="col">Số lượng sinh viên tối đa</th>
						<th class="title-name" scope="col">Số lượng nhóm tối đa</th>
						<th class="title-name" scope="col">Trạng thái</th>
						<th class="title-name" scope="col">Thao tác</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th id="topic" scope="row">1</th>
						<td id="name-topic">sadsad</td>
						<td id="describe">asdsad</td>
						<td id="student-max">@1231231231</td>
						<td id="amount-max">@44623432</td>
						<td id="status"><a href="#">Duyệt</a>/ <a href="#">Không duyệt</a></td>
						<td id="action"><a href="#" data-toggle="modal" data-target="#exampleModal_2"><i
									class="far fa-edit"></i></a></td>
					</tr>
				</tbody>
			</table>
		</div>';
	}
	?>
		<a href="export.php?export=true">Xuất kết quả đăng kí</a>
	</div>
>>>>>>> master
</body>

</html>