<?php
  /*  이전 페이지에서 값 가져오기 */
  // method : get -> $_GET[”필드의 네임 속성값”];
  // method : post ->  $_POST[”필드의 네임 속성값”];

  // 사용자들이 쓴 값을 $변수에 저장
  $u_name = $_POST["u_name"]; 
  $u_id = $_POST["u_id"]; 
  $pwd = $_POST["pwd"]; 
  $email_id = $_POST["email_id"]; 
  $email_dns = $_POST["email_dns"]; 
  $email = $email_id.'@'.$email_dns;

  $birth = $_POST["birth"]; 

  $postalCode = $_POST["postalCode"];
  $addr1 = $_POST["addr1"]; 
  $addr2 = $_POST["addr2"];
  $addr = $postalCode."".$addr1."".$addr2;

  $mobile = $_POST["mobile"]; 
  $apply = $_POST["apply"]; 

  // 시간 구하기 (가입일)
  $reg_date = date("Y-m-d");


  // js : document.write() ---> php : echo
  echo "<p> 이름 : ".$u_name."</p>";
  echo "<p> 아이디 : ".$u_id."</p>";
  echo "<p> 비밀번호 : ".$pwd."</p>";
  echo "<p> 이메일 : ".$email."</p>";
  echo "<p> 생년월일 : ".$birth."</p>";
  echo "<p> 우편번호 : ".$postalCode."</p>";
  echo "<p> 기본주소 : ".$addr1."</p>";
  echo "<p> 상세주소 : ".$addr2."</p>";
  echo "<p> 연락처 : ".$mobile."</p>";
  echo "<p> 약관동의여부 : ".$apply."</p>";
  echo "<p> 가입일 : ".$reg_date."</p>";
?>