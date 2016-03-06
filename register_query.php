<?php
	include "constants.php";
	include "util/db_conn.php";
	include "util/query_util.php";
	date_default_timezone_set("Asia/Seoul");

	$id = $_POST['id'];
	$passwd = $_POST['passwd'];
	$name = $_POST['name'];
	$dt = date('Y-m-d h:i:s');

	$sql = "select * from user_info where id=?";
	$ret = queryForExecute($db, $sql, array($id));
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> 회원가입 </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?=CSSROOT?>/bootstrap.min.css">
	<link rel="stylesheet" href="<?=CSSROOT?>/bootstrap-theme.min.css">
	<script src="<?=JSROOT?>/jquery-2.2.0.min.js"></script>
	<script src="<?=JSROOT?>/bootstrap.min.js"></script>
	<style>
	    body {
		    margin: 5% 30% 5% 10%;
	    }

	</style>
</head>
<body>
	<div class="row">
		<div class="col-md-7">
			<h2>
	<?php

	if($ret['rowCount'])
	{
		echo "존재하는 아이디입니다.";
		$url = "register.php";
	}
	else {
		$sql = "insert into user_info
			(id, passwd, name, reg_date)
			values (?, ?, ?, ?)";
		try{
			queryForExecute($db, $sql, array($id, $passwd, $name, $dt));
			echo "가입되셨습니다.";
			$url = "login.php";
		}
		catch(PDOException $e) {
			echo "등록 실패 '$e'";
		}
	}
?>
			</h2>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-2">
			<a class="pull-right" href="<?php echo $url ?>"><button class="btn btn-primary"> 확인 </button></a>
		</div>
	</div>
</body>
</html>
