<?php

//originally written by dobi
//modified by ryangwa
//02.11.2016

function writeAjaxRes($data = null, $errorCode = 200, $errMsg = null) {
    global $cmd;
    $ret = array();
    $ret['cmd'] = $cmd;
    $ret['errCode'] = $errCode;
    $ret['errMsg'] = $errMsg;
    if($data != null)
	$ret = array_merge($ret, $data);
    $json = json_encode($ret);

    header('Content-type: application/json');
    echo $json;
    return;
}

function writeAjaxErrorRes($obj, $errMsg = null) {
    writeAjaxRes($obj, 400, $errMsg);
}

?>
