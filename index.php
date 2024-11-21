<?php
include "./inc/header.php";

$result = $mysqli->query("select * from board where status=1 order by bid desc") or die("query error => ".$mysqli->error);
while($rs = $result->fetch_object()){
    $rsc[]=$rs;
}
?>

<h1>Kuality 게시판</h1>

<?php
if (isset($_SESSION['UID'])) {
    $user_id = $_SESSION['UID']; // 세션에서 사용자 ID 검색
    $user_name = $_SESSION['UNAME']; // 세션에서 사용자 이름 검색
    echo "<p><strong>$user_name</strong> ($user_id)님 환영합니다!</p>";
}else{
    echo "<p>회원 전용 게시판입니다. 로그인을 해주세요.</p>";
}
?>

<table class="table">
<thead>
<tr>
    <th scope="col">번호</th>
    <th scope="col">글쓴이</th>
    <th scope="col">제목</th>
    <th scope="col">등록일</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
foreach($rsc as $r){
?>
    <tr>
        <th scope="row"><?php echo $i++;?></th>
        <td><?php echo $r->userid?></td>
        <td><a href="/week3/view.php?bid=<?php echo $r->bid;?>"><?php echo $r->subject?></a></td>
        <td><?php echo $r->regdate?></td>
    </tr>
<?php }?>
</tbody>
</table>
<p style="text-align:right;">

<?php
if(isset($_SESSION['UID'])){ //세션값이 있는지 여부를 확인해서 로그인 했는지를 체크
    ?>
    <a href="/week3/write.php"><button type="button" class="btn btn-primary">등록</button></a>
    <a href="/week3/members/logout.php"><button type="button" class="btn btn-primary">로그아웃</button></a>
        <?php
}else{ 
?>
    <a href="/week3/members/login.php"><button type="button" class="btn btn-primary">로그인</button></a>
    <a href="/week3/members/signup.php"><button type="button" class="btn btn-primary">회원가입</button></a>
        <?php
}
?>
</p>

<?php
include "./inc/footer.php";
?>