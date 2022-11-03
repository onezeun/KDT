<?php
  include "../inc/session.php";
  include "../inc/login_check.php";

  // 데이터 가져오기
  // DB 연결
  include "../inc/dbcon.php";

  // 쿼리 작성
  $sql = "select * from members";

  // 쿼리 전송
  $result = mysqli_query($dbcon, $sql);

  // 전체 데이터 가져오기
  $total = mysqli_num_rows($result);

  // DB에서 데이터 가져오기
  // mysqli_fetch_row
  // mysqli_num_row
  // $array = mysqli_fetch_array($result);

  // DB 종료
?>
<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>회원관리</title>
  <style>
    body{font-size: 16px;}
    a{text-decoration: none;margin: 0 5px;}

    .mem_list_set, td{border-collapse: collapse;}
    .mem_list_set {width:1460px}
    td, th{padding: 10px;font-size: 16px;}
    .mem_list_title{border-top: 2px solid #999;border-bottom: 1px solid #000; text-align:center;}
    .mem_list_content{text-align:center; border-bottom: 1px solid #000;}
    .no{width:60px;}
    .u_name{width:80px;}
    .u_id{width:120px;}
    .mobile{width:160px;}
    .birth{width:120px;}
    .email{width:200px;}
    .address{width:400px;}
    .gender{width:60px;}
    .reg_date{width:120px;}
    .modify{width:150px;}

    td a {font-size:14px;}
  </style>
</head>

<body>
  <?php include "../inc/sub_header.html"; ?>

  <!-- 콘텐트 -->
  <p>전체 회원수 <?php echo $total; ?>명</p>
  <table class="mem_list_set">
    <tr class="mem_list_title">
      <th class="no">번호</th>
      <th class="u_name">이름</th>
      <th class="u_id">아이디</th>
      <th class="mobile">연락처</th>
      <th class="birth">생년월일</th>
      <th class="email">이메일</th>
      <th class="address">주소</th>
      <th class="gender">성별</th>
      <th class="reg_date">가입일</th>
      <td class="modify">&nbsp;</td>
    </tr>

  <?php 
    /* for($i=1; $i<=$total; $i++) { */
    $i = 1;
    while($array = mysqli_fetch_array($result)) {
  ?>
    <tr class="mem_list_content">
      <td><?php echo $i; ?></td>
      <td><?php echo $array["u_name"]; ?></td>
      <td><?php echo $array["u_id"]; ?></td>
      <td><?php echo $array["mobile"]; ?></td>
      <td><?php echo $array["birth"]; ?></td>
      <td><?php echo $array["email"]; ?></td>
      <td><?php echo $array["ps_code"]." ".$array["addr_b"]." ".$array["addr_d"]; ?></td>
      <td><?php echo $array["gender"]; ?></td>
      <td><?php echo $array["reg_date"]; ?></td>
      <td>
        <a href="#">[수정]</a>
        <a href="#">[삭제]</a>
      </td>
    </tr>
  <?php 
    $i++;
    }; 
  ?>
  </table>
</body>

</html>