<?php
	include "constants.php";
	include "util/db_conn.php";
	include "util/query_util.php";
	session_start();
	
	include "check_login.php";
	
	$num = $_GET['num'];
	$pno = $_GET['pno'];
	$no = $_GET['no'];

	$sql = "select id from comment where no = ?";
	$rows = queryForSelect($db, $sql, array($no));
	$row = $rows[0];
	if($_SESSION['id'] != $row['id']) {
		echo "<script>alert('잘못된 접근입니다')</script>";
        echo "<script>location.replace('boardContent.php?num=".$num."&pno=".$pno."');</script>"; 
       }

    $sql = "delete from comment where no = ?";
    $ret = queryForExecute($db, $sql, array($no));
    if($ret['result']) {
    	echo "<script>alert('덧글이 삭제되었습니다.')</script>";
        echo "<script>location.replace('boardContent.php?num=".$num."&pno=".$pno."');</script>"; 
    }else {
    	echo "<script>alert('삭제 실패.')</script>";
        echo "<script>location.replace('boardContent.php?num=".$num."&pno=".$pno."');</script>"; 
    }

?>
