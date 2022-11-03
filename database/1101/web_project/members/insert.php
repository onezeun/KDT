<?php
  /*  1. 이전 페이지에서 값 가져오기 */
  // method : get -> $_GET[”필드의 네임 속성값”];
  // method : post ->  $_POST[”필드의 네임 속성값”];

  // 사용자들이 쓴 값을 $변수에 저장
  $u_name = $_POST["u_name"]; 
  $u_id = $_POST["u_id"]; 
  $pwd = $_POST["pwd"]; 
  $mobile = $_POST["mobile"];
  $email_id = $_POST["email_id"]; 
  $email_dns = $_POST["email_dns"]; 
  $email = $email_id.'@'.$email_dns;

  $birth = $_POST["birth"]; 

  $ps_code = $_POST["ps_code"];
  $addr_b = $_POST["addr_b"];
  $addr_d = $_POST["addr_d"];
  $addr = $ps_code." ".$addr_b." ".$addr_d;
  $gender = $_POST["gender"];
  $apply = $_POST["apply"];

  // 시간 구하기 (가입일)
  $reg_date = date("Y-m-d");


  // 값 확인
  // js : document.write() ---> php : echo
  // echo "<p> 이름 : ".$u_name."</p>";
  // echo "<p> 아이디 : ".$u_id."</p>";
  // echo "<p> 비밀번호 : ".$pwd."</p>";
  // echo "<p> 이메일 : ".$email."</p>";
  // echo "<p> 생년월일 : ".$birth."</p>";
  // echo "<p> 우편번호 : ".$postalCode."</p>";
  // echo "<p> 기본주소 : ".$addr1."</p>";
  // echo "<p> 상세주소 : ".$addr2."</p>";
  // echo "<p> 연락처 : ".$mobile."</p>";
  // echo "<p> 약관동의여부 : ".$apply."</p>";
  // echo "<p> 가입일 : ".$reg_date."</p>";

  /* 2. 테이블 생성 SQL cmd창 입력 */
  // CREATE TABLE MEMBERS (
  //   IDX INT AUTO_INCREMENT PRIMARY KEY,
  //   U_NAME VARCHAR(30) NOT NULL,
  //   U_ID VARCHAR(20) NOT NULL,
  //   PWD VARCHAR(20) NOT NULL,
  //   MOBILE VARCHAR(15),
  //   BIRTH DATE,
  //   EMAIL VARCHAR(50),
  //   PS_CODE CHAR(5),
  //   ADDR_B VARCHAR(100),
  //   ADDR_D VARCHAR(100),
  //   GENDER CHAR(1),
  //   REG_DATE DATETIME
  // );

  /* 3. DB 연결 파일 불러오기*/
  include "../inc/dbcon.php";

  /* 쿼리 작성 */
  // 변수명 지어서 저장
  $sql = "insert into members(";
  $sql .= "u_name, u_id, pwd, ";
  $sql .= "mobile, birth, email, ";
  $sql .= "ps_code, addr_b, addr_d,";
  $sql .= "gender, reg_date";
  $sql .= ") values(";
  $sql .= "'$u_name', '$u_id', '$pwd',";
  $sql .= "'$mobile', '$birth', '$email',";
  $sql .= "'$ps_code', '$addr_b', '$addr_d',";
  $sql .= "'$gender', '$reg_date');";

  
  /* 4. 데이터베이스에 쿼리 전송 */
  // mysqli_query("DB 연결객체", "전송할 쿼리");
  mysqli_query($dbcon, $sql);

  /* 5. DB 접속 종료 */
  mysqli_close($dbcon);

  /* 6. 리디렉션 */
  echo "
    <script type=\"text/javascript\">
      // location.href = \"이동할 페이지 주소\";
      location.href = \"welcome.php\";
    </script>
    ";
?>