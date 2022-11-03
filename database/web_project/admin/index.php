<?php
  include "../inc/session.php";
  include "../inc/login_check.php";
?>

<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>관리자 페이지</title>
</head>

<body>
  <h1> 관리자 페이지 </h1>
  <hr>
  <div class="top_menu">
    <span class="pnt_name">관리자님, 안녕하세요. </span>
    <a href="login/logout.php">로그아웃</a>
    <a href="members/member_info.php">내 정보</a>
    <a href="../index.php">홈페이지</a>
  </div>
  <hr>
  <div class="nav">
    <a href="./">홈으로</a>
    <a href="members/list.php">회원관리</a>
    <a href="notice/list.php">공지사항</a>
    <a href="event/list.php">이벤트</a>
    <a href="products/list.php">상품관리</a>
  </div>
  <hr>
  content
</body>

</html>