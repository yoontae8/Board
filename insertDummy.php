<?php
	include "constants.php";
	include "util/db_conn.php";
	include "util/query_util.php";

	$ids = array('ryan', 'hyotae90', 'mirang12', 'test1', 'test2');
	for($i = 0; $i < 100; $i++)
	{
		$index = rand(0,4);
		$dt = date('Y-m-d h:m:s');
		$title = "테스트 1$i";
		$id = $ids[$index];
		$content = "테스트 no.1$i 입니다";

		$query = "insert into board
			(title, id, content, hit, w_date)
			values (?, ?, ?, 0, ?)";
		$ret = queryForExecute($db, $query, array($title, $id, $content, $dt));

		if($ret['result'])
			echo "성공";
		else
			echo "실패";
	}
?>
