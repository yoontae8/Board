<?php
	include "./constants.php";
	include "./util/db_conn.php";
	include "./util/query_util.php";

	$id = $_REQUEST['id'];
	$passwd = $_REQUEST['passwd'];

	$sql = "select * from user_info where id = ? and passwd = ?";
	$ret = queryForExecute($db, $sql, array($id, $passwd));

	session_start();
	if($ret['rowCount']) {
		$_SESSION['id'] = $id;
		echo "<script>location.replace('boardList.php');</script>"; 
	}
	else {
		echo "<script> alert('아이디 혹은 비밀번호가 일치하지 않습니다.')</script>";
		echo "<script>location.replace('login.php');</script>";
	}
?>