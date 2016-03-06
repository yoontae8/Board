<?php
function queryForSelect($db, $querystr, $params=null) {
  if ($params == null) $params = array();
  $pstmt = $db->prepare($querystr);
  $pstmt->execute($params);
  $pstmt->setFetchMode(PDO::FETCH_ASSOC);
  $result = $pstmt->fetchAll();
  return $result;
}

function queryForExecute($db, $querystr, $params=null) {
  if ($params == null) $params = array();
  $pstmt = $db->prepare($querystr);
  $result = $pstmt->execute($params);
  $ret = array('result' => $result, 'lastId' => $db->lastInsertId(), 'rowCount' => $pstmt->rowCount());
  return $ret;
}

?>