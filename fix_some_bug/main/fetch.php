<?php
  //fetch.php
  //header('Content-Type: text/html; charset=UTF-8');
  require('config.php');
  $search_text = "";
  if(isset($_POST["query"])) {
  $search = $_POST["query"];
  $query = "SELECT maSV, tenSV, maLop FROM sinh_vien WHERE maSV = '$search'";
  }

  $result = mysqli_query($con, $query);
  if(mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_array($result);
    $search_text = '
    <div class="table-responsive">
      <table class="table" id="table-modal" style="margin-left: 0px;">
        <tr>
          <th>Mã Số Sinh Viên</th>
          <th>Tên Sinh Viên</th>
          <th>Lớp</th>
        </tr>
        <tr>
          <td>'
            .$row["maSV"].'
          </td>
          <td>'
            .$row["tenSV"].'
          </td>
          <td>'
            .$row["maLop"].'
          </td>
        </tr>
      </table>
    </div>
    ';

    $data = array(

      'search_text'   =>  $search_text

    );

    echo json_encode($data);
    $con->close();
  }
?>