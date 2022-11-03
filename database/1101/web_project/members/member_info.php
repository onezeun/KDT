<?php
  /* 세션으로 데이터(idx) 가져오기 */
  include "../inc/session.php";
  /* 로그인한 사용자만 접근 */
  include "../inc/login_check.php";
  /* DB 연결 */
  include "../inc/dbcon.php";

  /* 쿼리 작성 */
  //로그인한 사용자의 정보
  $sql = "select * from members where idx=$s_idx";

  /* 쿼리 실행 */
  // cmd에서 쿼리 작성하고 엔터누른거나 마찬가지
  $result = mysqli_query($dbcon, $sql);

  /* DB에서 데이터 가져오기 */
  // cmd에서 발생한 값을 가져오기
  $array = mysqli_fetch_array($result);
?>

<DOCTYPE html>
  <html lang="ko">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원정보</title>
    <style>
    fieldset {
      border: none;
    }

    legend {
      font-size: 25px;
      font-weight: bold;
      padding: 20px 0;
      width: 100%;
      border-bottom: 3px solid black;
    }

    input {
      height: 20px;
      margin: 10px 0;
    }

    input:focus {
      outline: 0 none;
    }

    .err_txt {
      width: 300px;
      font-size: 12px;
      color: red;
      display: none;
    }

    .dsp_txt {
      font-size: 12px;
    }

    .c_title {
      display: inline-block;
      width: 130px;
    }

    .c_line {
      border-bottom: 1px solid #999;
      line-height: 30px;
    }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.1.js"
      integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="../js/edit.js"></script>
  </head>

  <body>
    <!-- 실제회원가입은 post로 -->
    <form name="edit_form" id="edit_form" action="edit.php" method="POST">
      <!-- return : submit을 function으로 바꿔주라 -->

      <fieldset>
        <legend>마이페이지</legend>
        <p class="c_line">
            <span for="u_name" class="c_title">이름</span>
            <?php echo $array["u_name"]; ?>
        </p>

        <p class="c_line">
          <span for="u_id" class="c_title">아이디</span>
          <?php echo $array["u_id"]; ?>
        </p>

        <p class="c_line">
          <label for="pwd" class="c_title">비밀번호</label>
          <input type="password" name="pwd" id="pwd">
          <br><span id="err_pwd" class="err_txt"></span>
        </p>

        <p class="c_line">
          <label for="repwd" class="c_title">비밀번호 확인</label>
          <input type="password" name="repwd" id="repwd">
          <br><span id="err_repwd" class="err_txt"></span>
        </p>

        <p class="c_line">
          <label for="mobile" class="c_title">전화번호</label>
          <input type="text" name="mobile" id="mobile" placeholder='"-" 없이 숫자만 입력' value="<?php echo $array["mobile"]; ?>">
          <br><span id="err_mobile" class="err_txt"></span>
        </p>

        <?php 
        // 문자 분리 : explode
        // 변수 = explode("기준문자", "어떤값에서")
        // 변수가 배열처리되어 분리된 값 사용
        // DB에서 가져온 이메일을 @ 기준으로 분리
        $email = explode("@", $array["email"] );
        ?>
        <p class="c_line">
          <label for="email_id" class="c_title">이메일</label>
          <input type="text" name="email_id" id="email_id" size="12" value="<?php echo $email[0] ?>"> @
          <input type="text" name="email_dns" id="email_dns" size="12" value="<?php echo $email[1] ?>">
          <select name="email_sel" id="email_sel">
            <option value="">직접입력</option>
            <option value="naver.com">네이버</option>
            <option value="kakao.com">다음</option>
            <option value="gmail.com">구글</option>
          </select>
          <br><span id="err_email" class="err_txt"></span>
        </p>

        <?php 
          // DB에 입력된 YYYY-MM-DD 형식을 YYYYMMDD호 치환
          // 변수 = str_replace("어떤 문자를", "어떤 문자로", "어떤 값에서");
          $birth = str_replace("-", "", $array["birth"]);
        ?>
        <p class="c_line">
          <label for="birth" class="c_title">생년월일</label>
          <input type="text" name="birth" id="birth" placeholder="EX) 19970422" value="<?php echo $birth; ?>">
          <br><span id="err_birth" class="err_txt"></span>
        </p>

        <p class="c_line">
          <label for="ps_code" class="c_title">주소</label>
          <input type="text" name="ps_code" id="ps_code" value="<?php echo $array["ps_code"]; ?>">
          <button type="button" id="addr_btn">주소검색</button><br>
          <label for="addr_b" class="c_title">기본 주소</label>
          <input type="text" name="addr_b" id="addr_b" size="30" value="<?php echo $array["addr_b"]; ?>"><br>
          <label for="addr_d" class="c_title">상세 주소</label>
          <input type="text" name="addr_d" id="addr_d" size="30" value="<?php echo $array["addr_d"]; ?>">
          <br><span id="err_arr" class="err_txt"></span>
        </p>

        <p class="c_line">
          <span class="c_title">성별</span>
          <input type="radio" name="gender" id="male" value="m" <?php if($array["gender"] == "m") echo "checked"; ?>>
          <label for="male">남</label>
          <input type="radio" name="gender" id="female" value="f" <?php if($array["gender"] == "f") echo "checked"; ?>>
          <label for="male">여</label>
        </p>

        <p>
          <button type="button" onclick="history.back()">이전 페이지</button>
          <button type="button" id="edit_btn">정보수정</button>
          <button type="button" id="mem_del">회원탈퇴</button>
        </p>
      </fieldset>
    </form>
  </body>


  </html>