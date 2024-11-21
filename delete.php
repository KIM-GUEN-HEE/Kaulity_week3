<?php session_start();
include $_SERVER["DOCUMENT_ROOT"]."/week3/inc/dbcon.php";

if(!$_SESSION['UID']){
    echo "<script>alert('회원 전용 게시판입니다.');location.href='/week3/index.php';</script>";
    exit;
}

$bid=$_POST["bid"]??$_GET["bid"];//post가 아니면 get으로 받는다

if($bid){
    $result = $mysqli->query("select * from board where bid=".$bid) or die("query error => ".$mysqli->error);
    $rs = $result->fetch_object();

    if($rs->userid!=$_SESSION['UID']){
        echo "<script>alert('본인 글이 아니면 삭제할 수 없습니다.');location.href='/week3/';</script>";
        exit;
    }

    $sql="update board set status=0 where bid=".$bid;//status값을 바꿔준다.
    $result=$mysqli->query($sql) or die($mysqli->error);
}else{
    echo "<script>alert('삭제할 수 없습니다.');history.back();</script>";
    exit;
}


if($result){
    echo "<script>alert('삭제했습니다.');location.href='/week3/index.php';</script>";
    exit;
}else{
    echo "<script>alert('글삭제에 실패했습니다.');history.back();</script>";
    exit;
}
?>