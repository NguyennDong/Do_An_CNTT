<?php 
     include 'config.php';
     include 'connection.php';
     include_once('function/function.php');
     include 'requireSession.php';
     if (isset($_POST['action'])){
        $action = trim(addslashes(htmlspecialchars($_POST['action'])));
        if($action == 'add_topic') {
            $name_topic= trim(addslashes(htmlspecialchars($_POST['name_topic'])));
            $desc_topic = trim(addslashes(htmlspecialchars($_POST['desc_topic'])));
            $cate_topic = trim(addslashes(htmlspecialchars($_POST['cate_topic'])));
            $show_alert = '<script>$("#formAddTopic .alert").removeClass("hidden");</script>';
            $hide_alert = '<script>$("#formAddTopic.alert").addClass("hidden");</script>';
            $success = '<script>$("#formAddTopic .alert").attr("class", "alert alert-success");</script>';
            $result = query("SELECT max(id) FROM de_tai");

            if (mysqli_num_rows($result) == 0) {

                $maDT = 1;

            }

            else {

                $data = fetch_array($result);

                $maDT = $data['max(id)'] +1;

            }
            $query_loai_detai = query("SELECT id, slNhom, slSV, ngayBD, ngayKT FROM loai_detai WHERE tenLoai = '$cate_topic'");

            confirm($query_loai_detai);
            $detai_statement = 0;
            while ($row = fetch_array($query_loai_detai)) {
    
                $maDT = $maDT."_".$row['id'];
                $startDate = $row['ngayBD'];
                $endDate = $row['ngayKT'];
                $slNhom = $row['slNhom'];
                $slSV = $row['slSV'];
            }
            $query = query("INSERT INTO de_tai(maDT, tenDT, loaiDT, moTa, maGV, ngayBS, slNhom, slSV, ngayBD, ngayKT, VPKDuyet) VALUES('$maDT', '$name_topic', '$cate_topic', '$desc_topic', '$user_data[maGV]', now(),' $slNhom', ' $slSV', '$startDate', '$endDate', '$detai_statement')");

            confirm($query);
            if ($query){

                echo $show_alert.$success.'Thêm bài viết thành công.';
                
            }
    
            else {
                echo $show_alert.$error.'Có lỗi xảy ra, vui lòng thử lại.';
            }
        }
        if ($action == 'delete_topic'){       
            $id_topic = trim(htmlspecialchars(addslashes($_POST['id_topic'])));
            $sql_check_id_topic_exist = "SELECT id FROM de_tai WHERE id = '$id_topic'";
            $resultID = mysqli_query($con, $sql_check_id_topic_exist);
            if (mysqli_num_rows($resultID) > 0){
                $sql_delete_topic = query("DELETE FROM de_tai WHERE id = '$id_topic'");
                confirm($sql_delete_topic);
            }
           
        }
        if($action == 'edit_topic'){
            $name_edit_topic= trim(addslashes(htmlspecialchars($_POST['name_edit_topic'])));
            $desc_edit_topic = trim(addslashes(htmlspecialchars($_POST['desc_edit_topic'])));
            $cate_edit_topic = trim(addslashes(htmlspecialchars($_POST['cate_edit_topic'])));
            $id_edit_topic = trim(htmlspecialchars(addslashes($_POST['id_edit_topic'])));
            $show_alert = '<script>$("#formEditTopic .alert").removeClass("hidden");</script>';
            $hide_alert = '<script>$("#formEditTopic.alert").addClass("hidden");</script>';
            $success = '<script>$("#formEditTopic .alert").attr("class", "alert alert-success");</script>';
            
            $query = query("SELECT * FROM de_tai WHERE id = '$id_edit_topic'");
            confirm($query);
            while ($row = fetch_array($query)) {
                $ngayBD = date("Y-m-d\TH:i:s", strtotime($row['ngayBD']));
                $ngayKT = escape_string($row['ngayKT']);
                $trangthai = escape_string(trangthai_detai($row['VPKDuyet']));


            }
            $query_edit = query("UPDATE de_tai SET tenDT = '$name_edit_topic', moTa = '$desc_edit_topic', loaiDT = '$cate_edit_topic', ngayBD = ' $ngayBD', ngayKT =' $ngayKT', VPKDuyet = '$trangthai' where id = '$id_edit_topic'");
            confirm($query_edit);
                if ($query_edit){
    
                    echo $show_alert.$success.'Chỉnh sửa bài viết thành công.';
                }
        
                else {
                    echo $show_alert.$error.'Có lỗi xảy ra, vui lòng thử lại.';
                }
        }
    }

?>