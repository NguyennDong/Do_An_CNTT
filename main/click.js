$(document).ready(function () {
	$("#showHomepage").click(function () {
		$(".home-page").show();
		$("#table-signup").hide();
		$(".form-table").hide();
		$(".title-notfi").hide();
		$(".result").hide();
		$(".tab3-title").hide();
		$("#tab3-table").hide();
	});

	$("#showSignInProject").click(function () {
		$("#table-signup").show();
		$("#signinProjectTable").show();
		$("#btn-modal").show();
		$(".title-notfi").show();
		$(".home-page").hide();
		$("#user_form").hide();
		$(".result").hide();
		$(".tab3-title").hide();
		$("#tab3-table").hide();
	});

	$("#showSiginResult").click(function () {
		$(".result").show();
		$("#title-result").show();
		$("#table-result").show();
		$(".table").show();
		$("#table-signup").hide();
		$("#signinProjectTable").hide();
		$("#btn-modal").hide();
		$(".title-notfi").hide();
		$(".home-page").hide();
		$("#user_form").hide();
		$(".tab3-title").hide();
		$("#tab3-table").hide();
	});

	$("#showResultTable").click(function () {
		$(".result").hide();
		$("#title-result").hide();
		$("#table-result").hide();
		$("#table-signup").hide();
		$("#signinProjectTable").hide();
		$("#btn-modal").hide();
		$(".title-notfi").hide();
		$(".home-page").hide();
		$("#user_form").hide();
		$(".tab3-title").show();
		$("#tab3-table").show();
	});
});

$('#myModal').on('shown.bs.modal', function () {
	$('#myInput').trigger('focus')
})
