$(document).ready(function () {
  /* 정규식 */
  var regMobile = /^[0-9]+$/;

  const pwdCheck = () => {
    var pwd_len = $('#pwd').val().length;

    if ($('#pwd').val()) {
      if (pwd_len < 4) {
        $('#pwd').focus();
        $('#err_pwd').css({ display: 'block' }).text('4글자 이상 입력해주세요');
        return false;
      } else {
        $('#err_pwd').css({ display: 'none' });
        return true;
      }
    } return true;
  };

  $('#pwd').on('input', function () {
    pwdCheck();
  });

  const repwdCheck = () => {
    if ($('#repwd').val()) {
      if ($('#pwd').val() != $('#repwd').val()) {
        $('#repwd').focus();
        $('#err_repwd')
          .css({ display: 'block' })
          .text('비밀번호가 일치하지 않습니다');
        return false;
      } else {
        $('#err_repwd').css({ display: 'none' });
        return true;
      }
    } return true;
  };

  $('#repwd').on('input', function () {
    repwdCheck();
  });

  const mobileCheck = () => {
    if (!$('#mobile').val()) {
      $('#mobile').focus();
      $('#err_mobile')
        .css({ display: 'block' })
        .text('휴대폰 번호를 입력해주세요');
      return false;
    } else if (!regMobile.test($('#mobile').val())) {
      $('#mobile').focus();
      $('#err_mobile')
        .css({ display: 'block' })
        .text('"-"없이 숫자만 입력해주세요');
      return false;
    } else {
      $('#err_mobile').css({ display: 'none' });
      return true;
    }
  };

  $('#mobile').on('input', function () {
    mobileCheck();
  });

  const emailCheck = () => {
    if (!$('#email_id').val()) {
      $('#email_id').focus();
      $('#err_email').css({ display: 'block' }).text('이메일을 입력해주세요');
      return false;
    } else if (!$('#email_dns').val()) {
      $('#email_dns').focus();
      $('#err_email').css({ display: 'block' }).text('이메일을 입력해주세요');
      return false;
    } else {
      $('#err_email').css({ display: 'none' });
      return true;
    }
  };

  $('#email_id').on('change', function () {
    emailCheck();
  });

  $('#email_dns').on('change', function () {
    emailCheck();
  });

  /* 이메일 선택 함수 */
  const changeEmail = () => {
    var val = $('#email_sel option:selected').val();
    $('#email_dns').val(val);
    $('#err_email').css({ display: 'none' });

    if (val == '직접입력' && !$('#email_dns').val() && !$('#email_id').val()) {
      $('#email').focus();
      $('#err_email').css({ display: 'block' }).text('이메일을 입력해주세요');
    }
  };

  $('#email_sel').on('change', function () {
    changeEmail();
  });

  $('#edit_btn').on('click', function () {
    if (!mobileCheck() || !emailCheck()) {
      mobileCheck();
      emailCheck();
      return false;
    } else $('#edit_form').submit();
  });

  $("#mem_del").on('click', function() {
    var rtn_val = confirm("정말 탈퇴하시겠습니까?");
    if (rtn_val == true) {
      location.href = "member_delete.php";
    };
  });
});
