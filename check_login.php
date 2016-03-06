<?php
	    if(!isset($_SESSION['id'])) {
		    echo "<script>alert('로그아웃 되셨습니다.')</script>";
		    echo "<script>location.replace('login.php');</script>";
	    }

?>
