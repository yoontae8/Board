<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> 회원가입 </title>
    <meta name="viewport" content="width=device-width, initial-scle=1.0">
    <link rel="stylesheet" href="<?=CSSROOT?>/bootstrap.min.css">
    <link rel="stylesheet" href="<?=CSSROOT?>/bootstrap-theme.min.css">
    <script src="<?=JSROOT?>/jquery-2.2.0.min.js"></script>
    <script src="<?=JSROOT?>/bootstrap.min.js"></script>
    <style>
        body {
            margin: 5% 10% 5% 10%;
        }
    </style>
</head>
<body>
    <span class="pull-right">
        <a href="login.php"><input type="button" class="btn btn-warning" value="로그인"></a>
    </span>
    <div class="row">
    <div class="col-md-4 col-md-offset-4">
    <div class="page-header text-center">
    <h1>회원가입</h1>
    </div>
    <form action="./register_query.php" method="post" role="form">
        <div class="form-group">
        <table class="table">
            <tbody>
            <tr>
                <td>
                    <label for="name"> 이름 </label>
                </td>
                <td>
                    <input type="text" id="name" name="name" class="form-control" size="20" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="id"> 아이디 </label>
                </td>
                <td>
                    <input type="text" id="id" name="id" class="form-control" size="20" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="passwd"> 비밀번호 </label>
                </td>
                <td>
                    <input type="password" id="passwd" name="passwd" class="form-control" size="10" required>
                </td>
            </tr>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <span class="pull-right">  
                            <input type="submit" class="form-control btn-primary" value="확인">
                        </span>
                    </td>
                </tr>
            </tfoot>
        </table>
        </div>
    </form>
    </div>
    </div>

</body>
</html>
