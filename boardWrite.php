<?php

    session_start();
    include "check_login.php";

    $pno = $_GET['pno'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> 글쓰기 </title>
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
    <form action="./insert.php" method="post" role="form" class="form-inline">
        <div class="form-group">
        <table class="table">
            <tbody>
            <tr>
                <td>
                    <label for="title"> 제목 </label>
                    <input type="text" id="title" name="title" class="form-control" size="100" required>
                </td>
            </tr>
            <tr>
                <td> 
                    <label for="id">아이디 </label>
                    <input type="text" id="id" name="id" class="form-control" size="20" value="<?php echo $_SESSION['id']; ?>" disabled>
                </td>
            </tr>
            <tr>
                <td> <textarea name="content" class="form-control" cols="107%" rows="30"></textarea> </td>
            </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <span class="pull-right">  
                            <input type="submit" class="form-control btn-primary" value="확인">
                            <a href="boardList.php?pno=<?php echo $pno ?>"><input type="button" class="btn btn-warning" value="취소"></a>
                        </span>
                    </td>
                </tr>
            </tfoot>
        </table>
        </div>
    </form>
</body>
