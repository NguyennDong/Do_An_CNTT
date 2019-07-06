<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlsinhvien";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM sinhvien";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<meta charset="UTF-8">
</head>
<body>

<h2>HTML Table</h2>
<p><a href="edit.php">Thêm mới </a></p>
<table>
  <tr>
    <th>MSSV</th>
    <th>Họ tên</th>
    <th>Thao tác</th>
  </tr>
<?php
    // output data of each row
    while($row = $result->fetch_assoc()) {
 ?>
  <tr>
    <td><?php echo $row["id"]; ?> </td>
    <td> <a href="detail.php?id=<?php echo $row["id"] ?>"><?php echo $row["hoTen"]; ?></a></td>
    <td> <a href="del.php?id=<?php echo $row["id"] ?>"> Xóa </a> |
    <a href="edit.php?id=<?php echo $row["id"] ?>"> Sửa </a> </td>
  </tr>
<?php     
    }
} else {
    echo "0 results";
}
$conn->close();
?>
</table>
<p id="output">Test</p>
<input type="text" id="ms"/>
<button onclick="getName()">Tìm</button>
<script>
function getName(){
    //-----------------------------------------------------------------------
    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
    //-----------------------------------------------------------------------
    $.ajax({  
      method: "GET",                                    
      url: 'getStudent.php',                  //the script to call to get data          
      data: {id:$("#ms").val()},                        //you can insert url argumnets here to pass to api.php
                                       //for example "id=5&parent=6"
      dataType: 'json',                //data format      
      success: function(data)          //on recieve of reply
      {

        
        //--------------------------------------------------------------------
        // 3) Update html content
        //--------------------------------------------------------------------
        $('#output').html(data.hoTen); //Set output element html
        //recommend reading up on jquery selectors they are awesome 
        // http://api.jquery.com/category/selectors/
      } 
    });
};

  </script>
</body>
</html>
