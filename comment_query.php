<?php
	include "constants.php";
	include "util/db_conn.php";
	include "util/query_util.php";

	session_start();

	date_default_timezone_set("Asia/Seoul");

	include "check_login.php";

	$num = $_GET['num'];
	$pno = $_GET['pno'];
	$content = $_POST['content'];
	$id = $_SESSION['id'];
	$dt = date('Y-m-d H:i:s');

	if($content == '') {
		echo "<script> alert('덧글 내용을 입력해 주세요.')</script>";
		echo "<script>location.replace('boardContent.php?num=".$num."&pno=".$pno."');</script>"; 
	} else {


		$sql = 'insert into comment (num, id, content, c_date)
			values (?, ?, ?, ?)';
		$ret = queryForExecute($db, $sql, array($num, $id, $content, $dt));
		if($ret['result']) {
			echo "<script>alert('댓글이 등록되었습니다.')</script>";
			echo "<script>location.replace('boardContent.php?num=".$num."&pno=".$pno."');</script>"; 
		}
		else {
			echo "<script>alert('댓글 등록이 실패했습니다.')</script>";
			echo "<script>location.replace('boardContent.php?num=".$num."&pno=".$pno."');</script>"; 	
		}
	}

?>
