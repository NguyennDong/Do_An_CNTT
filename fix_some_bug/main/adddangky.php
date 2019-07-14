<?php
	require 'config.php';
    require 'connection.php';

	$out = "";
if(!empty($_SESSION["dsdangky"])) {
	foreach($_SESSION["dsdangky"] as $keys => $values) {
		if ($values['maDT'] == $_POST['load_maDT']) {

			$out.= $values['maSV']."<a href='#'><i class='fas fa-minus-circle' id='".$values['maDT']."and".$values['maSV']."'></i></a><br>";

		}

	}
}

$data = array(

	'mssv'		=>	$out
);

echo json_encode($data);
	/*$search_dang_ky = mysqli_query($con, "SELECT * from dang_ky");
	if (mysqli_num_rows($search_dang_ky) > 0){
		$out ="";
		while ($data = mysqli_fetch_array($search_dang_ky)){
			$out.= $data['maSV']."<a href='#'><i class='fas fa-minus-circle' id='".$data['maSV']."'></i></a><br>";
		}

		$data = array(

			'mssv'		=>	$out,
			'slsv'		=>	mysqli_num_rows($search_dang_ky)
		);

		echo json_encode($data);
	}
	else{

		$data = array(

		'mssv'		=>	"",
		'slsv'		=>	"0"
		);
		echo json_encode($data);


	}*/



?>