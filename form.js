$('#formAddTopic button').on('click', function() {
    
    $name_topic= $('#formAddTopic #name_topic').val();
    $desc_topic = $('#formAddTopic #desc_topic').val();
    $cate_topic = $('#formAddTopic #cate_topic').val();
    $.ajax({
        type : 'POST',
        url : "add_detaigv.php",
        data: {
            name_topic:$name_topic,
            desc_topic:$desc_topic,
            cate_topic : $cate_topic,
            action : 'add_topic'
        }, success: function(data){
            $('#formAddTopic .alert').removeClass('hidden');
			$('#formAddTopic .alert').html(data);
            $this.html('Tạo mới');
            location.reload();
        }, error : function() {
            $('#formAddTopic .alert').removeClass('hidden');
            $('#formAddTopic .alert').html(data);
            $this.html('Tạo mới');
        }
    });
});
$('.del-post-list').on('click', function() {
    $confirm = confirm('Bạn có chắc chắn muốn xoá bài viết này không?');
    if ($confirm == true)
    {
        $id_topic = $(this).attr('data-id');
 
        $.ajax({
            url :"add_detaigv.php",
            type : 'POST',
            data : {
                id_topic : $id_topic,
                action : 'delete_topic'
            },
            success : function() {
                location.reload();
            }
        });
    }
    else
    {
        return false;
    }
});
$('#formEditTopic button').on('click', function() {
    $id_edit_topic = $(this).attr('data-id');
    $name_edit_topic= $('#formEditTopic #name_edit_topic').val();
    $desc_edit_topic = $('#formEditTopic #desc_edit_topic').val();
    $cate_edit_topic = $('#formEditTopic #cate_edit_topic').val();
    $.ajax({
        type : 'POST',
        url : "add_detaigv.php",
        data: {
            name_edit_topic:$name_edit_topic,
            desc_edit_topic: $desc_edit_topic,
            cate_edit_topic : $cate_edit_topic,
            id_edit_topic : $id_edit_topic,
            action : 'edit_topic'
        }, success: function(data){
            $('#formEditTopic .alert').removeClass('hidden');
			$('#formEditTopic .alert').html(data);
			$this.html('Lưu thay đổi');
        }, error : function() {
            $('#formEditTopic .alert').removeClass('hidden');
            $('#formEditTopic .alert').html(data);
            $this.html('Lưu thay đổi');
        }
    });
});
