<DOCTYPE html>
  <html lang="ko">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원 가입</title>
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
      padding-bottom: 5px;
      border-bottom: 1px solid #999;
    }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.1.js"
      integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="../js/join.js"></script>
  </head>

  <body>
    <!-- 실제회원가입은 post로 -->
    <form name="join_form" id="join_form" action="insert.php" method="POST">
      <!-- return : submit을 function으로 바꿔주라 -->

      <fieldset>
        <legend>회원가입</legend>
        <p class="c_line">
          <label for="u_name" class="c_title">이름</label>
          <input type="text" name="u_name" id="u_name">
          <br><span id="err_name" class="err_txt"></span>
        </p>

        <p class="c_line">
          <label for="u_id" class="c_title">아이디</label>
          <input type="text" name="u_id" id="u_id">
          <button type="button" id="id_check">중복확인</button>
          <br><span id="err_id" class="err_txt"></span>
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
          <input type="text" name="mobile" id="mobile" placeholder='"-" 없이 숫자만 입력'>
          <br><span id="err_mobile" class="err_txt"></span>

        </p>
        <p class="c_line">
          <label for="email_id" class="c_title">이메일</label>
          <input type="text" name="email_id" id="email_id" size="12"> @
          <input type="text" name="email_dns" id="email_dns" size="12">
          <select name="email_sel" id="email_sel">
            <option value="">직접입력</option>
            <option value="naver.com">네이버</option>
            <option value="kakao.com">다음</option>
            <option value="gmail.com">구글</option>
          </select>
          <br><span id="err_email" class="err_txt"></span>
        </p>

        <p class="c_line">
          <label for="birth" class="c_title">생년월일</label>
          <input type="text" name="birth" id="birth" placeholder="EX) 19970422">
          <br><span id="err_birth" class="err_txt"></span>
        </p>

        <p class="c_line">
          <label for="ps_code" class="c_title">주소</label>
          <input type="text" name="ps_code" id="ps_code">
          <button type="button" id="addr_btn">주소검색</button><br>
          <label for="addr_b" class="c_title">기본 주소</label>
          <input type="text" name="addr_b" id="addr_b" size="30"><br>
          <label for="addr_d" class="c_title">상세 주소</label>
          <input type="text" name="addr_d" id="addr_d" size="30">
          <br><span id="err_arr" class="err_txt"></span>
        </p>

        <p class="c_line">
          <span class="c_title">성별</span>
          <input type="radio" name="gender" id="male" value="m">
          <label for="male">남</label>
          <input type="radio" name="gender" id="female" value="f">
          <label for="male">여</label>
        </p>

        <p class="c_line">
          <input type="checkbox" name="apply" id="apply" value="Y">
          <label for="apply">약관동의</label>
          <br><span id="err_apply" class="err_txt"></span>
        </p>

        <p>
          <button type="button" id="join_btn">회원가입</button>
          <button type="button" onclick="history.back()">이전 페이지</button>
        </p>
      </fieldset>
    </form>
  </body>


  </html>