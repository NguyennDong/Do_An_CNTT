<?php
if(!isset($_SESSION['userData'])){
	header("Location: /main/index.php");
	}

	$user_data = $_SESSION['userData'];

	$user_name = '';
	$icon_action = '';
	if(isset($_SESSION['gv'])){
		$user_number = $user_data['maGV'];
		$user_name = $user_data['tenGV'];
		$user_role = $user_data['role'];
	}else if(isset($_SESSION['sv'])){
		$user_name = $user_data['tenSV'];
		$user_number = $user_data['maSV'];
	}else {
	?>

	<script language="javascript" type="text/javascript">
		alert("Sai Tài Khoản!! Liên hệ phòng C004");
		window.location = "/login/logout.php";
	</script>
	<?php
}
?>