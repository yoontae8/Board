<?php
include 'constants.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> 로그인 </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
	<a href="register.php"><input type="button" class="btn btn-warning" value="회원가입"></a>
    </span>
    <div class="row">
	<div class="col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4">
	    <div class="page-header text-center">
		<h1>로그인</h1>
	    </div>
	    <form action="" method="post" role="form">
		<div class="form-group">
		    <table class="table">
			<tbody>
			<tr>
			    <td>
				    <label for="id"> 아이디 </label>
			    </td>
			    <td>
				    <input type="text" id="i_id" name="id" class="form-control" style="width:10;" required>
			    </td>
			</tr>
			<tr>
			    <td>
				    <label for="passwd"> 비밀번호 </label>
			    </td>
			    <td>
				    <input type="password" id="i_passwd" name="passwd" class="form-control" style="width:10;" required>
			    </td>
			</tr>
			<tfoot>
			    <tr>
				<td colspan="2">
				    <span class="pull-right">  
					<a type="button" class="form-control btn-primary" onclick="javscript:login();" >확인</a>
				    </span>
				</td>
			    </tr>
			</tfoot>
		    </table>
		</div>
	    </form>
	</div>
    </div>
<script>
function login() {
    var id = $('#i_id').val();
    var passwd = $('#i_passwd').val();
    if(id == '' || passwd == ''){
	alert('아이디, 비밀번호를 입력하세요.');
	return;
    }
    console.log(id);
    console.log(passwd);
    $.post('ajax/board_ajax.php', { cmd: 'login', id:id, passwd: passwd })
    .success(function(data){
        console.log(data);
	if(!data.data || data.data.length < 0) {
	    alert('아이디 또는 비밀번호가 일치하지 않습니다.');
	    $('#i_passwd').val('');
	}else {
	    location.replace('boardList.php');
	}	    
    });
}

</script>

</body>
</html>
