<?php
	session_start();
	session_destroy();

	header("Location: ../index1.php?logout-success ");;
?>