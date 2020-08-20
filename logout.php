<?php
	session_start();
	session_unset();
	echo "
    	<script>
    		alert('Log Out Berhasil ...');
    		window.location = 'index.php';
    	</script>
    ";
?>
