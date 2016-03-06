<?php
    include "./constants.php";
    include "./util/db_conn.php";
    include "./util/query_util.php";

    session_start();

    include "check_login.php";

    $pi = 10;
    
    if(isset($_GET['pno']))
        $pno = $_GET['pno'];
    else
        $pno = 1;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> 글 목록 </title>
    <link rel="stylesheet" href="<?=CSSROOT?>/bootstrap.min.css">
    <link rel="stylesheet" href="<?=CSSROOT?>/bootstrap-theme.min.css">
    <script src="<?=JSROOT?>/jquery-2.2.0.min.js"></script>
    <script src="<?=JSROOT?>/bootstrap.min.js"></script>
    <style>
        body {
            margin: 5% 10% 5% 10%;
        }
        table, th {
            table-layout:fixed;
            text-align:center;
        }
    </style>
</head>
<body>
    <span class="pull-right">
        <?php echo $_SESSION['id'];?>님 <a href="logout.php"><input type="button" class="btn btn-warning" value="로그아웃"></a>
    </span>
    <table class="table table-striped">
        <thead>
                <th width="8%"> 글번호 </th>
                <th> 제목 </th>
                <th width="15%"> 작성자 </th>
                <th width="15%"> 작성일 </th>
                <th width="10%"> 조회수 </th>
            </th>
        </thead>
        <tbody>
            <?php
                //get total number of data
                $sql = "select num from board";
                $ret = queryForExecute($db, $sql);
                $total_num = $ret['rowCount'];

                //start number of the page navx
                $start = ($pno - 1) * $pi;

                //get designated area of queries
                //cannot use queryForSelect because parameter should be integer type
                $sql = "select * from board order by num desc limit ?, $pi";
                $stmt = $db->prepare($sql);
                $stmt->bindValue(1, $start, PDO::PARAM_INT);
                $stmt->execute();

                while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                {
            ?>
            <tr>
                <td> <?php echo $row['num'] ?> </td>
                <td> <a href="boardContent.php?num=<?php echo $row['num'] ?>&amp;pno=<?php echo $pno ?>"> <?php echo $row['title'] ?> </td> 
                <td> <?php echo $row['id'] ?> </td>
                <td> <?php echo $row['w_date'] ?> </td>
                <td> <?php echo $row['hit'] ?> </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
        <tfoot class="text-center">
            <tr>
                <td colspan="5">
                    <?php
                        $pval = floor(($pno - 1) / $pi) * $pi + 1;
                        if($pno > $pi) {
                    ?>
                    <a href="boardList.php?pno=1">
                        <button type="button" class="btn btn-default">&laquo;</button>
                    </a>
                    <a href="boardList.php?pno=<?php echo $pval-1; ?>">
                        <button type="button" class="btn btn-default">&lt;</button>
                    </a>
                    <?php
                        }
                        for($i = $pval; $i < $pval + $pi; $i++)
                        {
                            if($i != $pno)
                            {
                                $dis = "";
                    ?>
                    <a href="boardList.php?pno=<?php echo $i; ?>">
                    <?php
                            } else 
                                $dis = "disabled";
                    ?>
                        <button type="button" class="btn btn-default <?php echo $dis; ?>">
                    <?php
                            echo $i;
                    ?>
                        </button>
                    <?php
                            if($i != $pno) {
                    ?>
                    </a>
                    <?php
                            }
                            if($i * $pi >= $total_num)
                                break;
                            else if($i % $pi == 0) {
                    ?>
                    <a href="boardList.php?pno=<?php echo $pval+$pi; ?>">
                        <button type="button" class="btn btn-default">&gt;</button>
                    </a>
                    <a href="boardList.php?pno=<?php echo floor(($total_num-1)/$pi)+1; ?>">
                        <button type="button" class="btn btn-default">&raquo;</button>
                    </a>
                    <?php
                            }
                        }
                    ?>
                    <div class="pull-right">
                        <a href="boardWrite.php?pno=<?php echo $pno ?>"> <button type="button" class="btn btn-primary text-center">글 쓰기</button> </a>
                    </div>
                </td>
            </tr>
            
        </tfoot>
    </table>
</body>
