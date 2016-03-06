<?php
if(!isset($db)) {
	try {
		$db = new PDO('mysql:host='.DB_ADDR.';port='.DB_PORT.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->exec("set names utf8");
	} catch (PDOException $e) {
		echo 'DB Connection failed at main db: ' . iconv("EUC-KR", "UTF-8", $e);
		exit;
	}
}
?>
