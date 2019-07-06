<?php
    include_once('function/config.php');
	
    if (isset($_POST['action']) && $_POST["action"] == "deny"){
        $user_data = $_SESSION['userData'];
        $maSV = $user_data['maSV'];
        $check = mysqli_query($con, "DELETE FROM dang_ky  WHERE maSV ='$maSV' and ttDK !=4");
    }
?>