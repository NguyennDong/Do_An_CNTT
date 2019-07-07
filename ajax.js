$_DOMAIN = localhost/IT-1/main
var search;
var index = 0;
var mang_sinh_vien =  new Array();
//Search mssv
$(document).ready(function(){
	function load_data(query) {
		$.ajax({
			url:"fetch.php",
			method:"POST",
			dataType: 'json',     
			data:{query:query},
			success:function(data) {
				var table = data['table'];
				var row = data['row'];
				$('#result').html(table + '<tr><td>'+row["maSV"]+'</td><td>'+ row["tenSV"] + '</td><td>' + row["maLop"] + '</td></tr></table>');
			}
		});
	}

	$('.timkiem').click(function() {
		search = $('.search_text').val();
		if(search != '') {
			load_data(search);
			$(this).val() = "";
		}else {
			load_data('');
			$('#result');
		}
	}); 

	
});		

//Load lên bảng đề tài
function load_dsdangky(maDT) {
	var load_maDT = maDT;
	$.ajax({
		url:"adddangky.php",
		method:"POST",
		data:{load_maDT: load_maDT},
		dataType: "json",
		success: function(data){
			//alert("success add");
			$("#result_return"+load_maDT).html(data.mssv);
			//$("#slsv"+id).html(data.slsv);
		},
		error: function(){
			alert("error add");
		}
	});	
}

//Click thêm mssv vào bảng đề tài
$(document).on('click','.them', function(id){
	var id = $(this).attr("id");
	var maDT = $('#maDT'+id+'').val(); 
	var maSV = $('#search_text'+id+'').val(); // store input value
	var action = "add";

	$.ajax({
		url:"action.php",
		method:"POST",
		data:{maDT:maDT, maSV:maSV,action:action,id:id},
		success: function(data){
			load_dsdangky(maDT);
		},
		error: function(){
			alert("error action");
		}
	});
	
});

//Xóa mssv
$(document).on('click','.fa-minus-circle', function(){
	var del_id = $(this).attr("id");
	var action = "delete";
	
	$.ajax({
		
		url:"action.php",
		method:"POST",
		//dataType: "json",
		data:{action:action,del_id:del_id},
		success: function(data){
			
			alert("success delete");				
			location.reload();
		},
		error: function(){
			
		alert("error delete");
		
		}
		
	});
	
});	

//Check trùng mssv đã được đăng kí
function notify4() {
	alert("Sinh viên trong nhóm đã đăng ký 1 nhóm khác");
}
$('#formCreatNew button').on('click', function()
	$this = $('#formCreatNew button');
	$nameProject = $('#formCreatNew #exampleFormControlTextarea1').val();
	$Description = $('#formCreatNew #exampleFormControlTextarea2').val();

	if ($nameProject == ''|| @$Description == ''){
		$('#formCreatNew .alert').removeClass('hidden');
		$('#formCreatNew .alert').html('Vui lòng điền đầy đủ thông tin.');
		$this.html('Tạo mới');
	}
	else {
		$.ajax({
			url : 'giangvien.php',
			type : 'POST',
			data : {
				
	}

)