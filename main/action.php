<?php
	require 'function/config.php';
    include 'requireSession.php';

if (isset($_POST['action'])){

	if($_POST["action"] == "reload") { // Load trạng thái khi reload

		$ttHientai = "";
		$count = "";

		if(isset($_SESSION["dsdetai"])) {

			foreach($_SESSION["dsdetai"] as $keys => $values) {
			    if($_SESSION["dsdetai"][$keys]['maDT'] == $_POST["load_maDT"]) {

			    	$maDT = preg_replace("/[^0-9]/", "", $values['maDT']);
					$check_slNhom = mysqli_query($con,"SELECT DISTINCT maNhom FROM dang_ky WHERE maDT='$maDT' and ttDK != 4");

					if ($check_slNhom){
						if ($ttHientai == null) {$ttHientai = 0;}
						$ttHientai = mysqli_num_rows($check_slNhom);
					}

					$ttHientai = mysqli_num_rows($check_slNhom);

					$_SESSION["dsdetai"][$keys]['ttHientai'] = $ttHientai;
					$count .= $ttHientai;
					$count .= " / ";
					$count .= $values['slNhom'];
				}
			}

			$data = array(
				'count'		=>	$count
			);

			echo json_encode($data);
		}
	}

	if($_POST["action"] == "add") { // Thêm sinh viên khi dùng nút (+)
		$maSV = $_POST['maSV'];
		$maDT = $_POST['maDT'];
		if(isset($_SESSION["dsdangky"])) {
			$is_available = 0;

			foreach($_SESSION["dsdangky"] as $keys => $values) {
				if($_SESSION["dsdangky"][$keys]['maSV'] == $_POST["maSV"]) {
					$is_available++;
				}
			}
			if($is_available == 0) {
				$check = query("SELECT * FROM sinh_vien WHERE maSV ='$maSV'");
				if (mysqli_num_rows($check) > 0) {
					$item_array = array(
						'maSV'               =>     $maSV,
						'maDT'               =>     $maDT,

					);
					$_SESSION["dsdangky"][] = $item_array;
				}
			}
		}

		else {
			$check = query("SELECT * FROM sinh_vien WHERE maSV ='$maSV'");
			if (mysqli_num_rows($check) > 0) {

				$item_array = array(
					'maSV'               =>     $maSV,
					'maDT'               =>     $maDT,
					);

				$_SESSION["dsdangky"][] = $item_array;

			}
		}
	}

	if($_POST["action"] == 'delete') { //Xóa sinh viên khi dùng nút (-)

		foreach($_SESSION["dsdangky"] as $keys => $values) {

			if($values["maSV"] == $_POST["del_id"]) {

				unset($_SESSION["dsdangky"][$keys]);

			}

		}

	}


	if($_POST["action"] == 'xacnhan') { //Duyệt cho nhóm sinh viên

		$maNhom = $_POST['maNhom'];

		$check_xacnhan = query("UPDATE dang_ky SET ttDK ='3' WHERE maNhom = '$maNhom' and ttDK = 2");

	}

	if($_POST["action"] == 'tuchoi') { // Từ chối duyệt nhóm sinh viên

		$maNhom = $_POST['maNhom'];

		$check_xacnhan = query("UPDATE dang_ky SET ttDK ='4' WHERE maNhom = '$maNhom'");
	}

	if($_POST["action"] == 'delete_giangvien') { // Xóa giảng viên trong admin

		$teacher_id = $_POST['teacher_id'];
		$query = query("DELETE FROM giang_vien WHERE maGV='$teacher_id'");

	}

	if($_POST["action"] == 'delete_loai_detai') { // Xóa loại đề tài trong admin

		$loai_detai_id = $_POST['loai_detai_id'];
		$query = query("DELETE FROM loai_detai WHERE id='$loai_detai_id'");

	}

	if($_POST["action"] == 'delete_student') { // Xóa sinh viên trong admin

		$student_id = $_POST['student_id'];
		$query = query("DELETE FROM sinh_vien WHERE maSV='$student_id'");

	}

	if($_POST["action"] == 'delete_detai') { // Xóa đề tài trong admin

		$detai_id = $_POST['detai_id'];
		$query = query("DELETE FROM de_tai WHERE id='$detai_id'");

	}

	if($_POST["action"] == 'delete_all_student') { // Xóa tất cả sinh viên trong admin

		$query = query("DELETE FROM sinh_vien");

	}

	if($_POST["action"] == 'huynhom') { //Hủy nhóm nếu là nhóm trưởng
		$maDT = $_POST['maDT'];
		$maNhom = $_POST['maNhom'];
		$check_huynhom = mysqli_query($con, "DELETE FROM dang_ky WHERE maNhom='$maNhom' and maDT ='$maDT' and ttDK !=4");
		$alert = "Bạn đã hủy nhóm thành công!";
		$data = array(
			'alert'		=>	$alert
		);

		echo json_encode($data);
	}

	if($_POST["action"] == 'roinhom') { //Rời khỏi nhóm nếu là thành viên nhóm
		$maDT = $_POST['maDT'];
		$maNhom = $_POST['maNhom'];
		$check_roinhom = mysqli_query($con, "DELETE FROM dang_ky WHERE maNhom='$maNhom' and maSV='$user_number' and maDT = '$maDT' and ttDK !=4");
		$alert = "Bạn đã rời nhóm thành công!";
		$data = array(
			'alert'		=>	$alert
		);

		echo json_encode($data);
	}

}

if ($_POST['action'] == 'submitNhom') { //Xác nhận đăng ký đề tài

	$trangthai ="";
	$check_dt = "";
	$check_trung = "";
	$count ="";
	$alert ="";
	$maSV_nhomtruong = "";
	$maDT_nhomtruong = "";
	$maDT = $_POST['maDT'];
	$slSinhVien = $_POST['slSinhVien'];
			$check_slNhom = query("SELECT DISTINCT maNhom FROM dang_ky WHERE maDT='".preg_replace("/[^0-9]/", "", $maDT)."' and ttDK != 4");

			$ttHientai = mysqli_num_rows($check_slNhom);

			if ($check_slNhom){

				if ($ttHientai == null) {$ttHientai = 0;}
				$ttHientai = mysqli_num_rows($check_slNhom);

			}

	foreach($_SESSION["dsdetai"] as $keys => $values) {

		if($_SESSION["dsdetai"][$keys]['maDT'] == $_POST["maDT"]) {

			if ($ttHientai < $values['slNhom']) { //Kiểm tra nếu đề tài đã đầy nhóm

				$trangthai = "0";

			}

			else {

				$trangthai = "1";
			}
		}
	}

	if ($trangthai == "0") { // Nếu đề tài chưa đầy nhóm

		if(isset($_SESSION["dsdangky"])) {

			if(array_search($user_number, array_column($_SESSION['dsdangky'], 'maSV')) !== False) { // Kiểm tra: sinh viên phải nhập tên mình vào nhóm
				foreach($_SESSION["dsdangky"] as $keys => $values) {

					if ($values['maSV'] == $user_number) {

						$maSV_nhomtruong = $values['maSV'];

						$maDT_nhomtruong = $values['maDT'];
					}
				}

				foreach($_SESSION["dsdangky"] as $keys => $values) {

					// Kiểm tra: sinh viên phải để mình và thành viên nhóm vào 1 đề tài
					if ($values['maDT'] == $maDT_nhomtruong) {

						$check_dt .= "1";
					}

					else {
						$check_dt .= "0";
					}

					$check_dangky = mysqli_query($con, "SELECT maSV FROM dang_ky WHERE maSV = ".$values['maSV']." and ttDK != 4");
					if (mysqli_num_rows($check_dangky) == 0) {
						$check_trung .="0";
					}
					if (mysqli_num_rows($check_dangky) > 0) {
						$check_trung .="1";
					}
				}

				if (strpos($check_dt, '0') !== false) {
					$alert = "Vui lòng để các sinh viên chung 1 đề tài";
				}

				else{ // Nếu sinh viên đã đặt mình và thành viên vào 1 đề tài
					foreach($_SESSION["dsdangky"] as $keys => $values) {

						if ($values['maDT'] == $maDT) {

							$count = array_count_values(array_column($_SESSION['dsdangky'], 'maDT'))[$maDT];

							//Kiểm tra nếu sinh viên đặt không quá số lượng sinh viên / nhóm

							if ($count <= $slSinhVien) {

								if ($values['maDT'] == $values['maDT']) {
									$id = '';
									$session_maSV = $values['maSV'];
									$session_maDT = preg_replace("/[^0-9]/", "", $values['maDT']);
									$session_login = $_SESSION['userData'];
									$id = $user_number;
									$maNhom = $id;

									$ttDK = 1;
									if($session_maSV == $id){
										$ttDK = 2;
									}

									if (strpos($check_trung, '1') !== false) {
										$alert ="Bạn hoặc thành viên trong nhóm đã đăng ký rồi";
									}

									else {
										$adddetai = query("INSERT INTO dang_ky(maSV, maDT, ngayDK, maNhom, ttDK, ngayTT) VALUE('$session_maSV','$session_maDT', now(),'$maNhom','$ttDK',now())");

										if(isset($_SESSION["dsdetai"])) {

											foreach($_SESSION["dsdetai"] as $keys => $values) {

			                        			if($_SESSION["dsdetai"][$keys]['maDT'] == $_POST["maDT"]) { //check mã sv nếu trùng
													$check_slNhom = query("SELECT DISTINCT maNhom FROM dang_ky WHERE maDT='".preg_replace("/[^0-9]/", "", $maDT)."' and ttDK != 4");
													$ttHientai = mysqli_num_rows($check_slNhom);
													if ($check_slNhom){
														if ($ttHientai == null) {$ttHientai = 0;}
														$ttHientai = mysqli_num_rows($check_slNhom);
													}
													$_SESSION["dsdetai"][$keys]['ttHientai'] = $ttHientai;

			                        			}
											}
										}
										$alert ="Bạn đã đăng ký cho nhóm thành công!";
									}

								}
							}

							else {
								$alert ="Bạn đã nhập quá số lượng sinh viên cho phép";
							}
			            }
			        }
		        }

			}
			else {
				$alert ="Bạn cần phải thêm mình vào nhóm để đăng ký!";

			}

				$data = array(
					'alert'		=>  $alert
				);

				echo json_encode($data);

		}
		else {
			$alert = "Chỗ nhập mã số sinh viên không được để rỗng";
			$data = array(
				'alert'		=>  $alert
			);

			echo json_encode($data);

		}
	}

	if ($trangthai == "1") {

		$alert = "Số lượng nhóm đã đầy";
		$data = array(
			'alert'		=>  $alert
		);

		echo json_encode($data);

	}
}

?>