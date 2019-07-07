<?php
	if (isset($_SESSION['check_trung']) && $_SESSION['check_trung'] == '1') {
?>	
	<script>window.onload = notify4;</script>
<?php
	unset($_SESSION['check_trung']);
	}
?>