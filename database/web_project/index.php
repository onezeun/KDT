<?php
    session_start();
    // php 삼항연산자 isset( 조건 ) ? 값1 : 값2 ;
    $s_idx = isset($_SESSION["s_idx"]) ? $_SESSION["s_idx"] : "";
    $s_name = isset($_SESSION["s_name"]) ? $_SESSION["s_name"] : "";
?>
<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>인덱스</title>
  <style>
  body {
    font-size: 20px
  }^

  .pnt_name {
    margin-right: 10px
  }
  </style>
</head>

<body>

  <div class="top_menu">
    <?php if(!$s_idx) { ?>
    <!-- 로그인 전 -->
    <a href="login/login.php">로그인</a>
    <a href="members/join.php">회원가입</a>
    <?php } else {?>
    <!-- 로그인 후 -->
    <span class="pnt_name"><?php echo $s_name; ?>님, 안녕하세요</span>
    <a href="login/logout.php">로그아웃</a>
    <a href="members/edit.php">내정보</a>
    <?php }; ?>
  </div>

  <h2>메인페이지</h2>
  <p>content</p>
</body>

</html>