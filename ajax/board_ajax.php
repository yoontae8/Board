<?php
error_reporting(E_ERROR);
ini_set("display_errors", 1);

include_once '../constants.php';
include '../util/db_conn.php';
include '../util/query_util.php';
include '../util/ajax_util.php';

function login($req, $db) {
    $id = $_REQUEST['id'];
    $passwd = $_REQUEST['passwd'];

    $query = "SELECT * FROM user_info WHERE id = ? and passwd = ?";
    $result = queryForSelect($db, $query, array($id, $passwd));
    if(!$result || $result.length < 0)
	$result = null;
    else {
	session_start();
	$_SESSION['id'] = $result[0]['id'];
    }

    $ret = array();
    $ret['data'] = $result;
    $ret = array_merge($ret, $req);
    writeAjaxRes($ret);
}

$cmd = $_REQUEST['cmd'];
if(empty($cmd)) {
    writeAjaxErrorRes(null, 'cmd is null!');
    exit;
}else
    call_user_func($cmd, $_REQUEST, $db);
exit;

?>
