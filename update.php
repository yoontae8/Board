<?php
	include "constants.php";
	include "util/db_conn.php";
	include "util/query_util.php";
	date_default_timezone_set("Asia/Seoul");

	$num = $_GET['num'];
	$pno = $_GET['pno'];
	$title = $_POST['title'];
	$id = $_POST['id'];
	$content = $_POST['content'];
    $dt = date('Y-m-d h:i:s');
    $content = "[이 글은 $dt 에 수정되었습니다.]<br>$content";

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
		$sql = "update board set title=?, content=?
		 			where num=?";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(1, $title, PDO::PARAM_STR);
		$stmt->bindValue(2, $content, PDO::PARAM_STR);
		$stmt->bindValue(3, $num, PDO::PARAM_INT);
		try{
			$stmt->execute();
			echo "글이 수정되었습니다.";
		}
		catch(PDOEXCEPTION $e) {
			echo "수정 실패 '$e'";
		}
	?>
			</h2>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-2">
			<a href="boardContent.php?num=<?php echo $num ?>&amp;pno=<?php echo $pno ?>"><button class="btn btn-primary"> 확인 </button></a>
		</div>
	</div>
</body>
</html>
