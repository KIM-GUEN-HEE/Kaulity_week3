<?php session_start();
include $_SERVER["DOCUMENT_ROOT"]."/week3/inc/dbcon.php";//dbcon.php 안에는 session_start()가 없기때문에 위에 따로 선언해준다.
if(!$_SESSION['UID']){
    echo "<script>alert('회원 전용 게시판입니다.');location.href='/week3/index.php';</script>";
    exit;
}

$subject=$_POST["subject"];
$content=$_POST["content"];
$userid=$_SESSION['UID'];//userid는 세션값으로 넣어준다.
$status=1;//status는 1이면 true, 0이면 false이다.

$sql="insert into board (userid,subject,content) values ('".$userid."','".$subject."','".$content."')";
$result=$mysqli->query($sql) or die($mysqli->error);

if($result){
    echo "<script>location.href='/week3/index.php';</script>";
    exit;
}else{
    echo "<script>alert('글등록에 실패했습니다.');history.back();</script>";
    exit;
}
?>