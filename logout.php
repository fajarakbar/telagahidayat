<?php
	session_start();
	session_unset();
	session_destroy();
	echo "
    	<script>
    		// alert('Log Out Berhasil ...');
    		window.location = 'index.php';
    	</script>
    ";
?>
