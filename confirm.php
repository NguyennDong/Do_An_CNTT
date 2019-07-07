<?php
    require 'config.php';
    if (isset($_POST['action']) && $_POST["action"] == "confirm"){ 
        $user_data = $_SESSION['userData'];
        $maSV = $user_data['maSV'];
        $check = mysqli_query($con, "UPDATE dang_ky SET ttDK = 2 WHERE maSV ='$maSV' AND ttDK = 1");
    }
?>