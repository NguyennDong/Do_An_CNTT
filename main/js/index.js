
    var search;
    var index = 0;
    var mang_sinh_vien = new Array();
        //Search mssv
    $(document).ready(function () {

		$('.loading').hide();

        function load_data(query) {
            var id = query;
            var query = $('#search_text' + id).val();

            $.ajax({
                url: "fetch.php",
                method: "POST",
                dataType: 'json',
                data: {
                    query: query
                },
                success: function (data) {
                    $('#result' + id).html(data.search_text);
                },

                error: function (ts) {
                    alert("Không tìm thấy sinh viên")
                }

            });
        }

        $('.timkiem').click(function () {
            var id = $(this).attr("id");
            var values = id.split('m');
            var timkiem_id = values[2];
            search = $('#search_text' + timkiem_id).val();
            if (search != '') {
                load_data(timkiem_id);
                $(this).val() = "";
            } else {
                load_data('');
                $('#result');
            }
        });

        $(".search_text").keyup(function (event) {
            var id = $(this).attr("id");
            var values = id.split("text");
            var button_id = values[1];
            if (event.keyCode === 13) {
                $("#" + button_id).click();
            }
        });



    });


        //Load lên bảng đề tài
    function load_dsdangky(maDT) {
        var load_maDT = maDT;
        $.ajax({
            url: "adddangky.php",
            method: "POST",
            data: {
                load_maDT: load_maDT
            },
            dataType: "json",
            success: function (data) {
                //alert("success add");
                $("#result_return" + load_maDT).html(data.mssv);
                //$("#slsv"+id).html(data.slsv);
            }
            /*,
            error: function () {
                alert("Có lỗi khi thêm sinh viên");
            }*/
        });
    }

        //Click thêm mssv vào bảng đề tài
    $(document).on('click', '.them', function (id) {
        var id = $(this).attr("id");
        var maDT = $('#maDT' + id + '').val();
        var maSV = $('#search_text' + id + '').val(); // store input value
        var action = "add";

        $.ajax({
            url: "action.php",
            method: "POST",
            data: {
                maDT: maDT,
                maSV: maSV,
                action: action,
                id: id
            },
            success: function (data) {
                load_dsdangky(maDT);
                $("#result" + id).html('');
                $("#search_text" + id).val('');

            },
            error: function () {
                alert("error action");
            }
        });


    });

        //Xóa mssv
    $(document).on('click', '.fa-minus-circle', function () {
        var id = $(this).attr("id");
        var values = id.split("and");
        var del_id = values[1];
        var maDT = values[0];
        var action = "delete";

        $.ajax({

            url: "action.php",
            method: "POST",
            //dataType: "json",
            data: {
                action: action,
                del_id: del_id
            },
            success: function (data) {
                load_dsdangky(maDT);
            },
            error: function () {

                alert("error delete");

            }

        });

    });

    $(document).on('click', '.xacnhan', function () {
        var maNhom = $(this).attr("id");
        var action = "xacnhan";
        if (confirm("Bạn có chắc muốn duyệt cho nhóm này?")) {

            $.ajax({

                url: "action.php",
                method: "POST",
                //dataType: "json",
                data: {
                    action: action,
                    maNhom: maNhom
                },
                success: function (data) {

                    alert("Bạn đã duyệt thành công cho nhóm này!");
                    $("#duyet" + maNhom).html("Đã duyệt");
                    $("#tuchoi" + maNhom).hide();
                    $("#" + maNhom).hide();
                },
                error: function () {

                    alert("error xác nhận");

                }

            });
        } else {
            return false;
        }

    });

    $(document).on('click', '.tuchoi', function () {
        var id = $(this).attr("id");
        var values = id.split("oi");
        var maNhom = values[1];
        var action = "tuchoi";
        if (confirm("Bạn có chắc muốn từ chối duyệt nhóm này?")) {

            $.ajax({

                url: "action.php",
                method: "POST",
                //dataType: "json",
                data: {
                    action: action,
                    maNhom: maNhom
                },
                success: function (data) {

                    alert("Bạn đã từ chối nhóm này!");
                    $("#duyet" + maNhom).html("Từ chối duyệt");
                    $("#tuchoi" + maNhom).hide();
                    $("#" + maNhom).hide();
                },
                error: function () {

                    alert("error delete");

                }

            });
        } else {
            return false;
        }

    });

    $(document).on('click', '.submitNhom', function () {

        var id = $(this).attr("id");
        var values = id.split("mit");
        var maDT = values[1];
        var action = "submitNhom";
        var ttHientai = $('#ttHientai' + maDT + '').val();
        var slNhom = $('#slNhom' + maDT + '').val();
        var slSinhVien = $('#slSinhVien' + maDT + '').val();
        if (confirm("Bạn có chắc muốn đăng ký cho nhóm này?")) {
            $.ajax({

                url: "action.php",
                method: "POST",
                dataType: "json",
                data: {
                    action: action,
                    maDT: maDT,
                    slSinhVien: slSinhVien
                },
                success: function (data) {
                    load_dsdangky(maDT);
                    reload(maDT);
                    alert(data.alert);

                },
                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                }


            });
        } else {
            return false;
        }

    });

    $(document).on('click', '#accept', function () {

        var action = "confirm";
        $.ajax({

            url: "confirm.php",
            method: "POST",
            data: {
                action: action
            },
            success: function (data) {
                location.reload();
            },
        });
    });

    $(document).on('click', '#deny', function () {
        var action = "deny";
        $.ajax({

            url: "deny.php",
            method: "POST",
            data: {
                action: action
            },
            success: function (data) {
                location.reload();
            },
        });
    });

    $(document).on('click', '.huynhom', function () {

        var id = $(this).attr("id");
        var values = id.split("and");
        var maNhom = values[0];
        var maDT = values[1];
        var action = "huynhom";

        if (confirm("Bạn có chắc muốn hủy nhóm này?")) {
            $.ajax({

                url: "action.php",
                method: "POST",
                dataType: "json",
                data: {
                    action: action,
                    maNhom: maNhom,
                    maDT: maDT
                },
                success: function (data) {
                    alert(data.alert);
                    $("#nhom" + maNhom).remove();
                },
                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                }
            });
        } else {
            return false;
        }
    });

    $(document).on('click', '.roinhom', function () {

        var id = $(this).attr("id");
        var values = id.split("and");
        var maNhom = values[0];
        var maDT = values[1];
        var action = "roinhom";

        if (confirm("Bạn có chắc muốn rời nhóm này?")) {
            $.ajax({

                url: "action.php",
                method: "POST",
                dataType: "json",
                data: {
                    action: action,
                    maNhom: maNhom,
                    maDT: maDT
                },
                success: function (data) {
                    alert(data.alert);
                    $("#nhom" + maNhom).remove();
                },
                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                }
            });
        } else {
            return false;
        }
    });

    $(document).ready(function () {
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            $('#myTab a[href="' + activeTab + '"]').tab('show');
        }
    });

    function reload(maDT) {
        var load_maDT = maDT;
        var action = "reload";
        $.ajax({
            url: "action.php",
            method: "POST",
            dataType: "json",
            data: {
                action: action,
                load_maDT: load_maDT
            },
            success: function (data) {
                $("#reload" + maDT).html(data.count);
            }

        });
    }

	$(document).ajaxStart(function(){
		// Show image container
		$(".loading").show();
	});

	$(document).ajaxComplete(function(){
	  // Hide image container
	  $(".loading").hide();
	});

