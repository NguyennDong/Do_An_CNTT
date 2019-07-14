<?php
	  session_start();
	  $con = mysqli_connect("localhost","root","","pvhuyc5_doan");
	  mysqli_set_charset($con, 'UTF8');
	  include 'connection.php';
	  include_once('function/function.php');
	  include 'requireSession.php';
	  $_DOMAIN = 'http://localhost/IT-1/main/';
	?>
<html>

<head>
	<title>TDTU</title>
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
								<div class="alert"></div>
							</form>
						</div>
						<div class="modal-footer">
						</div>
					</div>
				</div>
			</div>
			
			<table class="table">
				<thead>
					<tr>
						<th class="title-name" scope="col">Loại đề tài</th>
						<th class="title-name" scope="col">Tên đề tài</th>
						<th class="title-name" scope="col">Số lượng sinh viên tối đa</th>
						<th class="title-name" scope="col">Số lượng nhóm tối đa</th>
						<th class="title-name" scope="col">Trạng thái</th>
						<th class="title-name" scope="col">Thao tác</th>
					</tr>
				</thead>
<?php
				$sql_get_data_topic = "SELECT * FROM de_tai WHERE maGV ='".$user_data['maGV']."'";
				$result = mysqli_query($con , $sql_get_data_topic);
				if (mysqli_num_rows($result) > 0){
					$data_topic = mysqli_fetch_array($result);
				}
				else {
					$data_topic = NULL;
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
										<form method="POST" action="" id=formEditTopic  ">
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
												<button type="submit" class="btn btn-primary" data-id="'.$data_topic['id'].'">Lưu thay đổi</button>
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
</body>

</html>

<!-- 

	<hr>
			<p class="title-list">
				<h3>Danh sách sinh viên đăng kí:</h3>
			</p>
			<table class="table">
				<thead>
					<tr>
						<th class="title-name" scope="col">Mã số sinh viên</th>
						<th class="title-name" scope="col">Tên sinh viên</th>
						<th class="title-name" scope="col">Mã Đề tài</th>
						<th class="title-name" scope="col">Mã Nhóm</th>
						<th class="title-name" scope="col">Trạng thái</th>
						<th class="title-name" scope="col">Thao tác</th>
					</tr>
				</thead>

				$sql_get_data_detai = "SELECT * FROM de_tai WHERE maGV ='".$user_data['maGV']."'";
				$sql_get_data_sinhvien = "SELECT * FROM dang_ky ORDER BY id ASC";
				$result_detai = mysqli_query($con , $sql_get_data_topic);
				$result_sinhvien = mysqli_query($con ,$sql_get_data_sinhvien );
				if (mysqli_num_rows($result) > 0){ 
					$data_detai = mysqli_fetch_array($result_detai);
				}
				if (mysqli_num_rows($result) > 0){ 
					$data_sinhvien = mysqli_fetch_array($result_sinhvien);
				}
				foreach ($result_sinhvien as $key => $data_detai) {
					if ($data_topic['VPKDuyet'] == 0){
							$status='Chưa duyệt';
					}
						
						else {
							$status='Đã duyệt';	
					}
					
				}
?>
			</table>
 -->