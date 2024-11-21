<?php
include $_SERVER["DOCUMENT_ROOT"]."/week3/inc/header.php";
?>

        <form class="row g-3 needs-validation" method="post" action="/week3/members/signup_ok.php">
        <div class="col-12">
            <label for="validationCustom01" class="form-label">이름</label>
            <input type="text" class="form-control" id="userame" name="username" placeholder="" required>
        </div>
        <div class="col-12">
            <label for="validationCustom02" class="form-label">아이디</label>
            <input type="text" class="form-control" id="userid" name="userid" placeholder="" required>
        </div>
        <div class="col-12">
            <label for="validationCustom02" class="form-label">비밀번호</label>
            <input type="password" class="form-control" id="passwd" name="passwd" placeholder="" required>
        </div>
        <div class="col-12">
            <label for="validationCustomUsername" class="form-label">이메일</label>
            <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
            <input type="email" class="form-control" id="email" name="email" placeholder="" required>
            </div>
        </div>
       
        <div class="col-12">
            <button class="btn btn-primary" type="submit">가입하기</button>
        </div>
        </form>
   
<?php
include $_SERVER["DOCUMENT_ROOT"]."/week3/inc/footer.php";
?>