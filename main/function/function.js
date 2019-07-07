
$(document).on('click', '.delete_giangvien', function(){
    var teacher_id = $(this).attr("id");
    var action = "delete_giangvien";
    if(confirm("Bạn có chắc muốn xóa giảng viên này?"))
    {
      $.ajax({
        url:"../action.php",
        method:"POST",
        data:{teacher_id : teacher_id,action : action},
        success:function()
        {
          alert("Bạn đã xóa thành công giảng viên!");
          $("#teacher"+teacher_id).remove();
        }
      })
    }
    else
    {
      return false;
    }
});

$(document).on('click', '.delete_loai_detai', function(){
    var loai_detai_id = $(this).attr("id");
    var action = "delete_loai_detai";
    if(confirm("Bạn có chắc muốn xóa loại đề tài này?"))
    {
      $.ajax({
        url:"../action.php",
        method:"POST",
        data:{loai_detai_id : loai_detai_id,action : action},
        success:function()
        {
          alert("Bạn đã xóa thành công loại đề tài!");
          $("#loai_detai"+loai_detai_id).remove();
        }
      })
    }
    else
    {
      return false;
    }
});

$(document).on('click', '.delete_student', function(){
    var student_id = $(this).attr("id");
    var action = "delete_student";
    if(confirm("Bạn có chắc muốn xóa sinh viên này?"))
    {
      $.ajax({
        url:"../action.php",
        method:"POST",
        data:{student_id : student_id,action : action},
        success:function()
        {
          alert("Bạn đã xóa thành công sinh viên này!");
          $("#student"+student_id).remove();
        }
      })
    }
    else
    {
      return false;
    }
});


$(document).on('click', '.delete_detai', function(){
    var detai_id = $(this).attr("id");
    var action = "delete_detai";
    if(confirm("Bạn có chắc muốn xóa đề tài này?"))
    {
      $.ajax({
        url:"../action.php",
        method:"POST",
        data:{detai_id : detai_id,action : action},
        success:function()
        {
          alert("Bạn đã xóa thành công sinh viên này!");
          $("#detai"+detai_id).remove();
        }
      })
    }
    else
    {
      return false;
    }
});

$(document).on('click', '.delete_all_student', function(){

    var action = "delete_all_student";
    if(confirm("Bạn có chắc muốn xóa tất cả sinh viên?"))
    {
      $.ajax({
        url:"../action.php",
        method:"POST",
        data:{action : action},
        success:function()
        {
          alert("Bạn đã xóa thành công tất cả sinh viên!");
          $("#all_student").remove();
        }
      })
    }
    else
    {
      return false;
    }
});


