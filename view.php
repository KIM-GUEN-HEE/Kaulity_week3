<?php
include $_SERVER["DOCUMENT_ROOT"]."/week3/inc/header.php";

$bid=$_GET["bid"];
$result = $mysqli->query("select * from board where bid=".$bid) or die("query error => ".$mysqli->error);
$rs = $result->fetch_object();
?>
      <h3 class="pb-4 mb-4 fst-italic border-bottom" style="text-align:center;">
        - 게시판 보기 -
      </h3>

      <article class="blog-post">
        <h2 class="blog-post-title"><?php echo $rs->subject;?></h2>
        <p class="blog-post-meta"><?php echo $rs->regdate;?> by <a href="#"><?php echo $rs->userid;?></a></p>

        <hr>
        <p>
          <?php echo $rs->content;?>
        </p>
        <hr>
      </article>

      <nav class="blog-pagination" aria-label="Pagination">
        <a class="btn btn-outline-secondary" href="/week3/index.php">목록</a>
        <a class="btn btn-outline-secondary" href="/week3/reply.php?bid=<?php echo $rs->bid;?>">답글</a>
        <a class="btn btn-outline-secondary" href="/week3/modify.php?bid=<?php echo $rs->bid;?>">수정</a>
        <a class="btn btn-outline-secondary" href="/week3/delete.php?bid=<?php echo $rs->bid;?>">삭제</a>
      </nav>

<?php
include $_SERVER["DOCUMENT_ROOT"]."/week3/inc/footer.php";
?>