<?php
    include "constants.php";
    include "util/db_conn.php";
    include "util/query_util.php";

    session_start();
    include "check_login.php";

    $num = $_GET['num'];
    $pno = $_GET['pno'];

    $sql = "select title, id, content, w_date from board where num = ?";
    $ret = queryForSelect($db, $sql, array($num));
    $row = $ret[0];

    if($_SESSION['id'] != $row['id']) {
        echo "<script>alert('잘못된 접근입니다')</script>";
        echo "<script>location.replace('boardContent.php?num=".$num."&pno=".$pno."');</script>"; 
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> 글 수정 </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?CSSROOT?>/bootstrap.min.css">
    <link rel="stylesheet" href="<?CSSROOT?>/bootstrap-theme.min.css">
    <script src="<?=JSROOT?>/jquery-2.2.0.min.js"></script>
    <script src="<?=JSROOT?>/bootstrap.min.js"></script>
    <style>
        body {
            margin: 5% 30% 5% 10%;
        }
    </style>
</head>
<body>
        <form action="./update.php?num=<?php echo $num ?>&amp;pno=<?php echo $pno ?>" method="post" role="form" class="form-inline">
            <div class="form-group">
            <table class="table">
                <tbody>
                <tr>
                    <td>
                        <label for="title"> 제목 </label>
                        <input type="text" id="title" name="title" class="form-control" size="100" value="<?php echo $row['title']; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td> 
                        <label for="id">id </label>
                        <input type="text" id="id" name="id" class="form-control" size="20" value="<?php echo $row['id']; ?>" disabled>
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea name="content" class="form-control" cols="107%" rows="30"><?php echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $row['content']); ?></textarea> 
                    </td>
                </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td>
                            <span class="pull-right">
                                <input type="submit" class="form-control btn-primary" value="확인">
                                <a href="boardContent.php?num=<?php echo $num ?>&amp;pno=<?php echo $pno ?>"><input type="button" class="btn btn-warning" value="취소"></a>
                            </span>
                        </td>
                    </tr>
                </tfoot>
            </table>
            </div>
        </form>
</body>
