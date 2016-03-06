<?php
	include "constants.php";
	include "util/db_conn.php";
	include "util/query_util.php";

	session_start();
	
	include "check_login.php";
	
	$num = $_GET['num'];
	$pno = $_GET['pno'];

	$sql = "select id from board where num = ?";
	$rows = queryForSelect($db, $sql, array($num));
	$row = $rows[0];
	if($_SESSION['id'] != $row['id']) {
		echo "<script>alert('잘못된 접근입니다')</script>";
        echo "<script>location.replace('boardContent.php?num=".$num."&pno=".$pno."');</script>"; 
       }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> 글 삭제 </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?=CSSROOT?>/bootstrap.min.css">
	<link rel="stylesheet" href="<?=CSSROOT?>/bootstrap-theme.min.css">
	<script src="<?=JSROOT?>/jquery-2.2.0.min.js></script>
	<script src="<?=JSROOT?>/bootstrap.min.js></script>

    <style>
    	body {
    		margin: 5% 30% 5% 10%;
    	}

    </style>
<body>
	<div class="row">
		<div class="col-md-7">
			<h2>
	<?php
	
		$sql = "delete from board where num = ?";
		try{
			queryForExecute($db, $sql, array($num));
			echo "성공적으로 삭제되었습니다.";
		}
		catch(PDOException $e) {
			echo "삭제 실패";
		}
	?>
			</h2>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-2">
			<a href="boardList.php?pno=<?php echo $pno ?>">
			<button class="btn btn-primary"> 확인 </button></a>
</body>
</html>
