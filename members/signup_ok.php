<?php
include $_SERVER["DOCUMENT_ROOT"]."/week3/inc/dbcon.php";

$userid=$_POST["userid"];
$username=$_POST["username"];
$email=$_POST["email"];
$passwd=$_POST["passwd"];
$passwd=hash('sha512',$passwd);

$sql="INSERT INTO members
        (userid, username, email, passwd)
        VALUES('".$userid."', '".$username."', '".$email."', '".$passwd."')";
$result=$mysqli->query($sql) or die($mysqli->error);

if($result){
    echo "<script>alert('가입을 환영합니다.');location.href='/week3/index.php';</script>";
    exit;
}else{
    echo "<script>alert('회원가입에 실패했습니다.');history.back();</script>";
    exit;
}

?>