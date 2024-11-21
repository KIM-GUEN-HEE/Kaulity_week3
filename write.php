<?php
include $_SERVER["DOCUMENT_ROOT"]."/week3/inc/header.php";

if(!isset($_SESSION['UID'])){
    echo "<script>alert('이 게시판은 회원 전용입니다.');history.back();</script>";
    exit;
}

$bid = isset($_GET["bid"]) ? $_GET["bid"] : null;
$subject = '';
$content = '';

if($bid){
    $result = $mysqli->query("select * from board where bid=".$bid) or die("query error => ".$mysqli->error);
    $rs = $result->fetch_object();
    if(!$rs || $rs->userid != $_SESSION['UID']){
        echo "<script>alert('자신의 글이 아니면 편집할 수 없습니다.');history.back();</script>";
        exit;
    }
    if ($rs) {
        $subject = $rs->subject; // 데이터베이스에서 제목 할당
        $content = $rs->content; // 데이터베이스에서 내용 할당
    }
}
?>
<form method="post" action="/week3/write_ok.php">
    <input type="hidden" name="bid" value="<?php echo htmlspecialchars($bid);?>">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">제목</label>
        <input type="text" name="subject" class="form-control" id="exampleFormControlInput1" placeholder="제목을 입력하세요." value="<?php echo htmlspecialchars($subject); ?>">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">내용</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3"><?php echo htmlspecialchars($content); ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">등록</button>
</form>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/week3/inc/footer.php";
?>