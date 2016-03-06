<?php
	include "constants.php";
	include "util/db_conn.php";
	include "util/query_util.php";
	session_start();

	date_default_timezone_set("Asia/Seoul");

	include "check_login.php";
	$title = $_POST['title'];
	$content = $_POST['content'];
	$dt = date('Y-m-d H:i:s');

	if($content == ' ') {
		$content = "내용 없음";
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> 결과 </title>
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
		<div class="col-md-5">
			<h2>
		<?php
			try{
				$sql = "insert into board
					(title, id, content, hit, w_date)
					values (?, ?, ?, 0, ?)";
				queryForExecute($db, $sql, array($title, $_SESSION['id'], $content, $dt));
				echo "글이 등록되었습니다.";
			}
			catch(PDOException $e){
				echo "등록 실패";
			}
		?>
			</h2>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-2">
			<a class="pull-right" href="boardList.php"><button class="btn btn-primary"> 확인 </button></a>
		</div>
	</div>
</body>
</html>
