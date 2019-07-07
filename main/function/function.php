<?php

	function query($sql) { // Sử dụng hàm query

		global $con;

		return mysqli_query($con, $sql);
	}

	function confirm($result){ // Kiểm tra nếu query fail

		global $con;

		if(!$result) {
			die("QUERY FAILED " . mysqli_error($con));
		}

	}

	function escape_string($string){

		global $con;

		return mysqli_real_escape_string($con, $string);
	}

	function fetch_array($result){

		return mysqli_fetch_array($result);
	}

	function get_role($id) {
		if ($id == 1) {
			$role = 'Admin';
		}
		else if ($id == 0) {
			$role = 'Giảng Viên';
		}

		return $role;
	}

	function get_trangthai_by_ttDK($ttDK) {

		if ($ttDK == 1) {
			$trangthai = 'Chờ sinh viên';
		}

		if ($ttDK == 2) {
			$trangthai = 'Chờ duyệt';
		}
		else if ($ttDK == 3) {
			$trangthai = 'Đã duyệt';
		}

		else if ($ttDK == 4) {
			$trangthai = 'Từ chối duyệt';
		}

		return $trangthai;

	}

	function get_dsdangky_maDT() {

		$query = query("SELECT maDT from de_tai");

		confirm($query);

		while ($row = fetch_array($query)) {

			$output = <<<DELIMETER

			<script>
    			load_dsdangky("{$row['maDT']}");
    			reload("{$row['maDT']}");
			</script>

DELIMETER;
		echo $output;
		}
	}


	function get_thaotac_by_user_role($maNhom, $user_number, $maDT) {

        if(strcmp($maNhom, $user_number) == 0 ) {

        	$thaotac = <<<DELIMETER

    <a href="#" class="huynhom" id="{$maNhom}and{$maDT}"><button type="button" class="btn btn-danger">Hủy nhóm</button></a>


DELIMETER;

        }

        else {

        	$thaotac = <<<DELIMETER

        <a href="#" class="roinhom" id="{$maNhom}and{$maDT}"><button type="button" class="btn btn-danger">Rời nhóm</button></a>

DELIMETER;

        }
        return $thaotac;

	}

	function get_tenDT_by_maDT($maDT) {

		$query = query("SELECT tenDT, maDT from de_tai");

		confirm($query);

        while ($row = fetch_array($query)) {

            if (preg_replace("/[^0-9]/", "", $row['maDT']) == $maDT) {

            	return $row['tenDT'];


            }

		}

	}

	function get_loaiDT_by_maDT($maDT) {

		$query = query("SELECT maDT, loaiDT from de_tai");

		confirm($query);

        while ($row = fetch_array($query)) {

            if (preg_replace("/[^0-9]/", "", $row['maDT']) == $maDT) {

            	return $row['loaiDT'];


            }

		}

	}

	function get_student_by_maSV($maSV) {

		$query = query("SELECT tenSV from sinh_vien WHERE maSV = '$maSV'");

		confirm($query);

		$row = fetch_array($query);

		return $row['tenSV'];
	}


	function get_all_member_by_maNhom($maNhom) {

		$tenSV = '';

		$query = query("SELECT maSV FROM dang_ky WHERE maNhom = '$maNhom'");

		confirm($query);

		while ($row = fetch_array($query)) {

			$tenSV .= $row['maSV']." - ".get_student_by_maSV($row['maSV']). "<br>";

		}

		return $tenSV;
	}

	function trangthai_detai($duyet) {

		if ($duyet == 1) {
			$role = 'Đã Duyệt';
		}

		else if ($duyet == 0) {
			$role = 'Chưa Duyệt';
		}

		return $role;
	}

	function set_message($msg){

		if(!empty($msg)) {

			$_SESSION['message'] = $msg;
		} else {

			$msg = "";
		}
	}

	function display_message() {

	    if(isset($_SESSION['message'])) {

	        echo $_SESSION['message'];
	        unset($_SESSION['message']);

	    }
	}

	function check_user($user_role) {

		$output ='';
    	if(isset($_SESSION['gv'])){
    		if ($user_role == 0) {
        	    $output = <<<DELIMETER

            	<a href="giangvien.php" target="_blank"><span><i class="fas fa-poll"></i></span> <span>GIẢNG VIÊN</span></a>;
DELIMETER;
            } else if ($user_role == 1) {

        	    $output = <<<DELIMETER

            	<a href="admin/index.php" target="_blank"><span><i class="fas fa-poll"></i></span> <span>ADMIN</span></a>;
DELIMETER;

            }

       	}

    	echo $output;

    }

	function check_teacher_by_id($id) {

		$output = '';
		$query = query("SELECT tenGV from giang_vien where maGV ='$id'");
		confirm($query);
		while ($row = fetch_array($query)) {
			$output = $row['tenGV'];
		}

		return $output;
	}

	function check_admin_permission($user_role) {

		if ($user_role !=  1) {

			header('Location: ../index.php');
		}

	}

	function loai_detai_select_admin() {
		$query = query("SELECT tenLoai from loai_detai");

		confirm($query);

		while ($row = fetch_array($query)) {

			$output = <<<DELIMETER

			<option value = '?loaiDT={$row['tenLoai']} '> {$row['tenLoai']} </option>

DELIMETER;

			echo $output;
		}

	}

	function loai_detai_select_edit() {
		$query = query("SELECT tenLoai from loai_detai");

		confirm($query);

		while ($row = fetch_array($query)) {

			$output = <<<DELIMETER

			<option> {$row['tenLoai']} </option>

DELIMETER;

			echo $output;
		}

	}

	function student_manage_in_admin() {

		$query = query("SELECT * FROM sinh_vien");

		confirm($query);

		while ($row = fetch_array($query)) {

			$sinh_vien = <<<DELIMETER

            <tr id="student{$row['maSV']}">
              <td>{$row['maSV']}</td>
              <td>{$row['tenSV']}</td>
              <td>{$row['email']}</td>
              <td>{$row['maLop']}</td>
              <th>{$row['moTa']}</th>

              <th>
                  <a href="edit_sinhvien.php?id={$row['maSV']}"><input type="submit" name="draft" class="btn btn-primary" value="Sửa"></a>
                  <input type="submit" name="draft" class="btn btn-warning delete_student" id="{$row['maSV']}" value="Xóa">
              </th>

            </tr>
DELIMETER;
        	echo $sinh_vien;
		}
	}

	function teacher_manage_in_admin() {
		$query = query("SELECT * FROM giang_vien");

		confirm($query);

		while ($row = fetch_array($query)) {

			$role = get_role($row['role']);
			$sinh_vien = <<<DELIMETER

            <tr id="teacher{$row['maGV']}">
              <td>{$row['maGV']}</td>
              <td>{$row['tenGV']}</td>
              <td>{$row['email']}</td>
              <td>{$row['hocHam']}</td>
              <th>{$row['moTa']}</th>
              <th>{$role}</th>

              <th>
                  <a href="edit_giangvien.php?id={$row['maGV']}"><input type="submit" name="draft" class="btn btn-primary" value="Sửa"></a>
                  <input type="submit" name="draft" class="btn btn-warning delete_giangvien" id={$row['maGV']} value="Xóa">
              </th>

            </tr>
DELIMETER;
        	echo $sinh_vien;
		}

	}

	function detai_manage_in_admin($loai_detai) {

		$query = query("SELECT * FROM de_tai where loaiDT = '$loai_detai'");

		confirm($query);

		while ($row = fetch_array($query)) {

			$giang_vien = check_teacher_by_id($row['maGV']);
			$trangthai = trangthai_detai($row['VPKDuyet']);
			$detai = <<<DELIMETER

            <tr id="detai{$row['id']}">
	          <th>{$row['maDT']}</th>
	          <th>{$row['loaiDT']}</th>
	          <th class='col-md-3'>{$row['tenDT']}</th>
	          <th>{$giang_vien}</th>
	          <th>{$row['ngayBD']}</th>
	          <th>{$row['ngayKT']}</th>
	          <th>{$trangthai}</th>

              <th>
                  <a href="edit_detai.php?id={$row['id']}"><input type="submit" name="draft" class="btn btn-primary" value="Sửa"></a>
                  <input type="submit" name="draft" class="btn btn-warning delete_detai" id="{$row['id']}" value="Xóa">
              </th>

            </tr>
DELIMETER;
        	echo $detai;
		}

	}

	function loai_detai_manage_in_admin() {
		$query = query("SELECT * FROM loai_detai");

		confirm($query);

		while ($row = fetch_array($query)) {

			$sinh_vien = <<<DELIMETER

            <tr id="loai_detai{$row['id']}">
	          <th>{$row['tenLoai']}</th>
	          <th class='col-md-3'>{$row['moTa']}</th>
	          <th>{$row['slNhom']}</th>
	          <th>{$row['slSV']}</th>
	          <th>{$row['ngayBD']}</th>
	          <th>{$row['ngayKT']}</th>

              <th>
                  <a href="edit_loai_detai.php?id={$row['id']}"><input type="submit" name="draft" class="btn btn-primary" value="Sửa"></a>
                  <input type="submit" name="draft" class="btn btn-warning delete_loai_detai" id="{$row['id']}" value="Xóa">
              </th>

            </tr>
DELIMETER;
        	echo $sinh_vien;
		}

	}

	function detai_and_dangky_modal() {

        $query = query("SELECT id, maDT, maGV, moTa from de_tai");

        confirm($query);

        while ($row = fetch_array($query)){

            $tenGV = check_teacher_by_id($row['maGV']);
            $moTa = str_replace("\n", "<br>", $row['moTa']);

        	$detai = <<<DELIMETER

    <div class="modal fade" id="addmodal{$row['maDT']}" tabindex="-1" role="dialog"
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
                    {$moTa}
                    <p style="text-align: right"><br>Đề tài của giảng viên : <span
                            style="font-weight: bold">{$tenGV}</span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

DELIMETER;

    		echo $detai;

			$dangky = <<<DELIMETER

    <div class="modal fade" id="addModal{$row['id']}" tabindex="-1" role="dialog"
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
                                <input type="text" name="search_text" id="search_text{$row['id']}"
                                    placeholder="Nhập mã số sinh viên" class="form-control search_text" />
                                <button type="button" class="btn btn-primary timkiem"
                                    id="timkiem{$row['id']}" style="float: right;"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div>

                        <div id="result{$row['id']}"></div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary them" id="{$row['id']}"
                        data-dismiss="modal">Thêm Mã Số Sinh Viên</button>
                    <input type="hidden" name='hidden_maDT' id='maDT{$row['id']}'
                        value='{$row['maDT']}' />

                </div>
            </div>
        </div>

    </div>

DELIMETER;
    	echo $dangky;
		}

	}

	function thongbao($maSV) {

        $query = query("SELECT maNhom, maDT FROM dang_ky WHERE maSV = '$maSV' AND ttDK = 1");

        confirm($query);

        if (mysqli_num_rows($query) > 0) {

        	$row =  fetch_array($query);

        	$output = <<<DELIMETER

    <div id="id01" class="modal" role="dialog" style="display: block; width: 30%; height: 280px; margin: 15% auto;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Thông báo</h3>
                </div>
                <div class="modal-body">
                    <p>Bạn được thêm vào nhóm của {$row['maNhom']} với mã đề tài là
                        {$row['maDT']}. </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="accept" type="submit">Xác nhận</button>
                    <button class="btn btn-secondary" id="deny">Từ chối</button>
                </div>
            </div>
        </div>
    </div>

DELIMETER;

    		echo $output;
    	}

	}

	function ketquadangky_student($user_number) {

        $query = query("SELECT maSV, maDT,ttDK, maNhom from dang_ky where maSV='$user_number'");

        confirm($query);

        while ($row = fetch_array($query)) {

        	if ($row['ttDK'] != 4) {

        		$maNhom = $row['maNhom'];
	        	$tenDT = get_tenDT_by_maDT($row['maDT']);

	        	$trangthai = get_trangthai_by_ttDK($row['ttDK']);

	        	$thaotac = get_thaotac_by_user_role($row['maNhom'], $user_number, $row['maDT']);

	        	$get_all_member = get_all_member_by_maNhom($row['maNhom']);

	        	$output = <<<DELIMETER
	        	<tbody>
	        		<tr id="nhom{$maNhom}">
		        		<td> {$tenDT} </td>
		        		<td> {$get_all_member} </td>
		        		<td> {$trangthai} </td>
		        		<td> {$thaotac} </td>

	        		</tr>
	        	</tbody>
DELIMETER;

	        	echo $output;
        	}

        	else {

	        	$tenDT = get_tenDT_by_maDT($row['maDT']);

	        	$trangthai = get_trangthai_by_ttDK($row['ttDK']);

	        	$get_all_member = get_all_member_by_maNhom($row['maNhom']);

	        	$output = <<<DELIMETER

	        	<tbody>
	        		<tr>
		        		<td> {$tenDT} </td>
		        		<td> {$get_all_member} </td>
		        		<td> {$trangthai} </td>
	        		</tr>
	        	</tbody>

DELIMETER;
	        	echo $ouput;
        	}

        }


	}


	function ketquadangky_admin() {

		$query = query("SELECT * FROM de_tai");

		confirm($query);

		while ($row = fetch_array($query)) {

			group_dangky_admin($row['maDT'], $row['tenDT'], $row['loaiDT']);

		}

	}

	function group_dangky_admin($maDT, $tenDT, $loaiDT) {

		$maDT = preg_replace("/[^0-9]/", "", $maDT);

        $query = query("SELECT DISTINCT maNhom, ngayDK FROM dang_ky WHERE maDT = '$maDT' and ttDK = 2 and maNhom NOT IN(SELECT maNhom FROM dang_ky WHERE maDT = '$maDT' and ttDK!=2 and ttDK != 4)");

        confirm($query);

        while ($row = fetch_array($query)) {

            $maNhom = $row['maNhom'];
            $xacnhan = "<a href='#'' class='xacnhan' id='".$row['maNhom']."'><button type='button' class='btn btn-success'>Duyệt</button></a>";
            $tuchoi = "<a href='#'' class='tuchoi' id='tuchoi".$row['maNhom']."'><button type='button' class='btn btn-danger'>Từ Chối</button></a>";

	        $get_all_member = get_all_member_by_maNhom($maNhom);

            $output = <<<DELIMETER

                <tbody>
                    <tr>
                    	<td class="col-md-2">{$loaiDT}</td>
                        <td class="col-md-3">{$tenDT}</td>
                        <td>
                            {$get_all_member}
                        </td>
                        <td> {$row['ngayDK']} </td>
                        <td>
                            <p id="duyet{$maNhom}">Chờ duyệt</p>
                        </td>

                    </tr>
                </tbody>

DELIMETER;

                echo $output;
        }

                	/* Kết quả đăng ký khi ttDK các thành viên != 2 */

        $rest_query = query("SELECT DISTINCT maNhom, ttDK, ngayDK FROM dang_ky WHERE maDT = '$maDT' and ttDK!=2");

        confirm($rest_query);

        while ($rest_row = fetch_array($rest_query)) {

		        $get_all_member = get_all_member_by_maNhom($rest_row['maNhom']);

        		$trangthai = get_trangthai_by_ttDK($rest_row['ttDK']);
        		$ngayDK = escape_string($row['ngayDK']);

            	$rest_output = <<<DELIMETER
                <tbody>
                    <tr>
                    	<td class="col-md-2">{$loaiDT}</td>
                        <td class="col-md-3">{$tenDT}</td>
                        <td>
                            {$get_all_member}
                        </td>
                        <td> {$ngayDK} </td>
                        <td>{$trangthai}</td>

                    </tr>
                </tbody>

DELIMETER;

        echo $rest_output;
        }


	}


	function ketquadangky_teacher($user_number) {

		$query = query("SELECT * FROM de_tai WHERE maGV = '$user_number'");

		confirm($query);

		while ($row = fetch_array($query)) {

			group_dangky_giangvien($row['maDT'], $row['tenDT']);

		}

	}

	function group_dangky_giangvien($maDT, $tenDT) {

		$maDT = preg_replace("/[^0-9]/", "", $maDT);

        $query = query("SELECT DISTINCT maNhom FROM dang_ky WHERE maDT = '$maDT' and ttDK = 2 and maNhom NOT IN(SELECT maNhom FROM dang_ky WHERE maDT = '$maDT' and ttDK!=2 and ttDK != 4)");

        confirm($query);

        while ($row = fetch_array($query)) {

            $maNhom = $row['maNhom'];
            $xacnhan = "<a href='#'' class='xacnhan' id='".$row['maNhom']."'><button type='button' class='btn btn-success'>Duyệt</button></a>";
            $tuchoi = "<a href='#'' class='tuchoi' id='tuchoi".$row['maNhom']."'><button type='button' class='btn btn-danger'>Từ Chối</button></a>";

	        $get_all_member = get_all_member_by_maNhom($maNhom);

            $output = <<<DELIMETER

                <tbody>
                    <tr>
                        <td>{$tenDT}</td>
                        <td>
                            {$get_all_member}
                        </td>
                        <td>
                            <p id="duyet{$maNhom}">Chờ duyệt</p>
                        </td>
                        <td>
                            {$xacnhan}
                       		{$tuchoi}

                        </td>
                    </tr>
                </tbody>

DELIMETER;

                echo $output;
        }

                	/* Kết quả đăng ký khi ttDK các thành viên != 2 */

        $rest_query = query("SELECT DISTINCT maNhom, ttDK FROM dang_ky WHERE maDT = '$maDT' and ttDK!=2");

        confirm($rest_query);

        while ($rest_row = fetch_array($rest_query)) {

		        $get_all_member = get_all_member_by_maNhom($rest_row['maNhom']);

        		$trangthai = get_trangthai_by_ttDK($rest_row['ttDK']);

            	$rest_output = <<<DELIMETER
                <tbody>
                    <tr>
                        <td>{$tenDT}</td>
                        <td>
                            {$get_all_member}
                        </td>
                        <td>{$trangthai}</td>

                    </tr>
                </tbody>

DELIMETER;

        echo $rest_output;
        }


	}




	function dangky_table() {

        $query = query("SELECT * FROM de_tai ORDER BY id ASC");

        confirm($query);

		date_default_timezone_set('Asia/Ho_Chi_Minh');

		$date = date('Y-m-d H:i:s', time());


        while ($row = fetch_array($query)) {

        if ($date > $row['ngayBD'] && $date < $row['ngayKT'] && $row['VPKDuyet'] == 1) {


        	$maDT = preg_replace("/[^0-9]/", "", $row['maDT']);

            $check_slNhom = query("SELECT DISTINCT maNhom FROM dang_ky WHERE maDT='$maDT' and ttDK != 4");
            $ttHientai = mysqli_num_rows($check_slNhom);

            if ($check_slNhom){
                if ($ttHientai == null) {$ttHientai = 0;}
                    $ttHientai = mysqli_num_rows($check_slNhom);
            }


            if(isset($_SESSION["dsdetai"])) {
                $is_available = 0;

                foreach($_SESSION["dsdetai"] as $keys => $values) {
                    if($_SESSION["dsdetai"][$keys]['maDT'] == $row["maDT"]) {

                        $is_available++;

                    }
                }

                if ($is_available == 0) {
                    $id = $row['id'];
                    $maDT = $row['maDT'];
                    $tenDT = $row['tenDT'];
                    $nhomSV =  "<a href='#'><i class='fas fa-plus-circle' data-toggle='modal' data-target='#addModal".$id."'></i></a>";
                    $slSinhVien = $row['slSV'];
                    $check_slNhom = query("SELECT DISTINCT maNhom FROM dang_ky WHERE maDT='$maDT' and ttDK != 4");

                    $ttHientai = mysqli_num_rows($check_slNhom);
                    if ($check_slNhom){
                        if ($ttHientai == null) {$ttHientai = 0;}
                            $ttHientai = mysqli_num_rows($check_slNhom);
                    }

                    $slNhom = $row['slNhom'];


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

                $id = $row['id'];
                $maDT = $row['maDT'];
                $tenDT = $row['tenDT'];
                $nhomSV =  "<a href='#'><i class='fas fa-plus-circle' data-toggle='modal' data-target='#addModal".$id."'></i></a>";
                $slSinhVien = $row['slSV'];
                $check_slNhom = query("SELECT DISTINCT maNhom FROM dang_ky WHERE maDT='$maDT' and ttDK != 4");

                $ttHientai = mysqli_num_rows($check_slNhom);
                if ($check_slNhom){
                    if ($ttHientai == null) {$ttHientai = 0;}
                        $ttHientai = mysqli_num_rows($check_slNhom);
                }

                $slNhom = $row['slNhom'];


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

            $output = <<<DELIMETER

                <tbody>
                    <tr>
                        <th scope="row">{$row['loaiDT']}</th>
                        <td><a href="#" data-toggle="modal" data-target="#addmodal{$row['maDT']}"
                                style="color: blue; text-decoration: none; font-weight: bold;">{$row['tenDT']}</a>
                        </td>
                        <td>
                            <span id="result_return{$row['maDT']}"> </span>
                            <a href="#"><i class="fas fa-plus-circle" data-toggle="modal"
                                    data-target="#addModal{$row['id']}"></i></a>
                        </td>
                        <td> {$row['slSV']} </td>
                        <td> {$row['slNhom']} </td>
                        <td>
                            <span id="reload{$row['maDT']}">
                                {$ttHientai} / {$row['slNhom']}
                            </span>
                        </td>
                        <td>
                            <a href="#" class="submitNhom" id="submit{$row['maDT']}"><button type="button"
                                    class="btn btn-success">Đăng kí</button></a>
                        </td>
                    </tr>
                </tbody>

                <input type="hidden" name="hidden_ttHientai" id="ttHientai{$row['maDT']}"
                    value="{$ttHientai}" />
                <input type="hidden" name="hidden_slNhom" id="slNhom{$row['maDT']}"
                    value="{$row['slNhom']}" />
                <input type="hidden" name="hidden_slSinhVien" id="slSinhVien{$row['maDT']}"
                    value="{$row['slSV']}" />


DELIMETER;

                echo $output;
        }

		}

	}



?>