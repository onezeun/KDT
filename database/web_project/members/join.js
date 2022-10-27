$(document).ready(function () {
  /* 정규식 */
  var regEmail = /^([0-9a-zA-Z_\.-]+)@([0-9a-zA-Z_-]+)(\.[0-9a-zA-Z_-]+){1,2}$/;
  var regMobile = /^[0-9]+$/;

  const nameCheck = () => {
    var name_len = $("#u_name").val().length;

    if (!$('#u_name').val()) {
      $('#u_name').focus();
      $('#err_name').css({ display: 'block' }).text('이름을 입력해주세요');
      return false;
    } else if (name_len < 2) {
      $('#u_name').focus();
      $('#err_name').css({ display: 'block' }).text('두 글자 이상 입력해주세요');
      return false;
    } else {
      $('#err_name').css({ display: 'none' });
      return true;
    }
  };

  $('#u_name').on('input', function () { 
    nameCheck(); 
  });

  const idCheck = () => {
    var id_len = $("#u_id").val().length;

    if (!$('#u_id').val()) {
      $('#u_id').focus();
      $('#err_id').css({ display: 'block' }).text('아이디를 입력해주세요');
      return false;
    } else if (id_len > 20) {
      $('#u_id').focus();
      $('#err_id').css({ display: 'block' }).text('20자 이내로 입력해주세요');
      return false;
    } else {
      $('#err_id').css({ display: 'none' });
      return true;
    }
  };

  $('#u_id').on('input', function () { 
    idCheck(); 
  });

  const pwdCheck = () => {
    var pwd_len = $("#pwd").val().length;

    if (!$('#pwd').val()) {
      $('#pwd').focus();
      $('#pwd').removeClass('signup_input');
      $('#err_pwd').css({ display: 'block' }).text('비밀번호를 입력해주세요');
      return false;
    } else if (pwd_len < 4) {
      $('#pwd').focus();
      $('#err_pwd').css({ display: 'block' }).text('4글자 이상 입력해주세요');
      return false;
    } else {
      $('#err_pwd').css({ display: 'none' });
      return true;
    }
  };

  $('#pwd').on('input', function () {
    pwdCheck();
  });

  const repwdCheck = () => {
    if (!$('#repwd').val()) {
      $('#repwd').focus();
      $('#err_repwd').css({ display: 'block' }).text('비밀번호 확인을 입력해주세요');
      return false;
    } else if ($("#pwd").val() != $("#repwd").val()) {
      $('#repwd').focus();
      $('#err_repwd').css({ display: 'block' }).text('비밀번호가 일치하지 않습니다');
      return false;
    } else {
      $('#err_repwd').css({ display: 'none' });
      return true;
    }
  };

  $('#repwd').on('input', function () {
    repwdCheck();
  });

  const mobileCheck = () => {
    if (!$('#mobile').val()) {
      $('#mobile').focus();
      $('#err_mobile').css({ display: 'block' }).text('휴대폰 번호를 입력해주세요');
      return false;
    } else if (!regMobile.test($('#mobile').val())) {
      $('#mobile').focus();
      $('#err_mobile').css({ display: 'block' }).text('"-"없이 숫자만 입력해주세요');
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
    var val = $("#email_sel option:selected").val();
    $('#email_dns').val(val);
    $('#err_email').css({ display: 'none' });

    if (val == '직접입력' && !$('#email_dns').val() && !$('#email_id').val()) {
      $('#email').focus();
      $('#err_email').css({ display: 'block' }).text('이메일을 입력해주세요');
    }
  }

  $('#email_sel').on('change', function () {
    changeEmail();
  });

  const applyCheck = () => {
    var check = $("#apply").is(":checked")

    if (!check) {
      $('#err_apply').css({ display: 'block' }).text('필수약관에 동의해주세요');
      return false;
    } else {
      $('#err_apply').css({ display: 'none' });
      return true;
    }
  };

  $('#apply').on('click', function () {
    applyCheck();
  });


  $('#join_btn').on('click', function () {
    if (
      !nameCheck() ||
      !idCheck() ||
      !pwdCheck() ||
      !repwdCheck() ||
      !mobileCheck() || 
      !emailCheck() ||
      !applyCheck()
    ) {
      nameCheck();
      idCheck();
      pwdCheck();
      repwdCheck();
      mobileCheck();
      emailCheck();
      applyCheck();
      return false;
    } else $('#join_form').submit();
  });
});