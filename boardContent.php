<?php
	include "constants.php";
	include "util/db_conn.php";
	include "util/query_util.php";
	session_start();

	include "check_login.php";

	$num = $_GET['num'];
	$pno = $_GET['pno'];

	$sql = "select title, id, content, hit, w_date from board where num = ?";
	$rows = queryForSelect($db, $sql, array($num));
	$row = $rows[0];
	$hit = $row['hit'] + 1;
	$sql = "update board set hit='$hit' where num=$num";
	queryForExecute($db, $sql, array($hit, $num));
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> 글 내용 </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?=CSSROOT?>/bootstrap.min.css">
	<link rel="stylesheet" href="<?=CSSROOT?>/bootstrap-theme.min.css">
	<script src="<?=JSROOT?>/jquery-2.2.0.min.js"></script>
	<script src="<?=JSROOT?>/bootstrap.min.js"></script>
    <style>
        body {
            margin: 5% 30% 5% 10%;

        }
        table {
        	table-layout:fixed;
        }
        .main {
        	height: 400px;
        }
        .lb {
        	font-size: 15px;
        }
        .head {
        	font-size: 20px;
        }
        .info {
        	font-family: Arial;
        	font-weight: bold;
        }
        #head {
        	font-size: 20px;
        }
    </style>
	<script>
	function moveTo(mode) {
		if(mode == 'del') {
			bform.action = "delete.php?num=<?php echo $num ?>&pno=<?php echo $pno ?>";
		}
		else if(mode == 'mod') {
			bform.action = "boardModify.php?num=<?php echo $num ?>&pno=<?php echo $pno ?>";
		}
	}
	</script>
<body>
	<span class="pull-right">
        <?php echo $_SESSION['id'];?>님 <a href="logout.php"><input type="button" class="btn btn-warning" value="로그아웃"></a>
    </span>
	<div class="container-fluid">
	<table class="table">
		<thead>
			<tr>
				<th colspan="2">
					<span class="label label-success lb">제목</span> 
					<span class="pull-mid info" id="head"><?php echo $row['title'] ?> </span>
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					<span class="label label-success lb">아이디</span> 
					<span class="info"><?php echo $row['id'] ?> </span>
				</td>
				<td align="right">
					<span class="label label-success lb">작성시간</span>
					<span class="info"><?php echo $row['w_date'] ?></span>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<pre class="main"><?php echo $row['content'] ?></pre>
				</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="2">
					<div class="pull-right">
						<?php
							if($_SESSION['id'] == $row['id']) {
						?>
						<form role="form" method="post" class="form-inline" name="bform">
							<input type="submit" class="form-control btn-warning" onClick="moveTo('del')" value="삭제">
							<input type="submit" class="form-control btn-info" onClick="moveTo('mod')" value="수정">
						</form>
						<br>
						<?php
							}
						?>
						<a class="pull-right" href="boardList.php?pno=<?php echo $pno ?>"><button class="btn btn-primary">글 목록</button></a>
					</div>	
				</td>

			</tr>
			<tr>
				<td colspan="2">
					<br>
					<span class="label label-default head">덧글 </span>
					<div><br></div>
					<div class="panel-group">
						<?php
							$sql = 'select no, id, content, c_date from comment where num = ? order by c_date';
							$rows = queryForSelect($db, $sql, array($num));
							foreach($rows as $row)
							{
						?>
  						<div class="panel panel-default">
  							<div class="panel-heading">
  						<?php echo $row['id']; ?>
  								<span class="pull-right"><?php echo $row['c_date']; ?> <span>
  							</div>
    						<div class="panel-body">
    							<pre><?php echo $row['content']; ?></pre>
    						</div>
    					<?php
    						if($_SESSION['id'] == $row['id']) {
    					?>
    						<div class="panel-footer">
    							<form action="comment_del_query.php?num=<?php echo $num ?>&amp;pno=<?php echo $pno ?>&amp;no=<?php echo $row['no'] ?>" role="form" method="post" class="form-inline" name="bform">
									<input type="submit" class="form-control btn-warning" value="삭제">
								</form>
							</div>
						<?php } ?>
  						</div>
  						<?php } ?>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<form action="./comment_query.php?num=<?php echo $num ?>&amp;pno=<?php echo $pno ?>" method="post" role="form">
						<div class="panel panel-info">
							<div class="panel-heading">댓글 쓰기</div>
								<div class="panel-body">
									<textarea name="content" class="form-control" cols="107%" rows="5"></textarea>
									<br>
									<span class="pull-right"><input type="submit" class="form-control btn-success btn-block" value="등록"></span>
								</div>
						</div>
					</form>
				</td>
			</tr>
		</tfoot>
	</table>
	</div>

	

</body>
</html>

