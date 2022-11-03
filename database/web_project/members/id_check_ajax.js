
// 비동기식으로 아이디 중복 검사
function getCont(g_id) {
  var dsp = document.getElementById('dsp');

  if (g_id.length < 4 || g_id.length > 12) {
    dsp.innerHTML = '아이디는 4~12글자만 입력할 수 있습니다..';
    dsp.className = 'red';
  } else {
    // 비동기식 불러오는 메소드
    var xmlhttp = fncGetXMLHttpRequest();

    // 아이디를 체크할 php 페이지에 체크 하려하는 id 값을 파라미터로 전송
    xmlhttp.open('GET', '체크할 페이지?u_id=' + g_id, false);

    xmlhttp.setRequestHeader(
      'Content-Type',
      'application/x-www-form-urlencoded; charset=UTF-8',
    );

    // if 페이지 문제 있으면 에러메세지, else 내가 하고싶은 기능
    xmlhttp.onreadystatechange = function () {
      if (xmlhttp.readyState == '4' && xmlhttp.status == 200) {
        if (
          xmlhttp.status == 500 ||
          xmlhttp.status == 404 ||
          xmlhttp.status == 403
        )
          alert(xmlhttp.status);
        else {
          // 처리 페이지에서 넘겨받은 값
          var txt = xmlhttp.responseText;
          
          if (txt == 'Y') {
            dsp.innerHTML = '이미 가입된 아이디입니다.';
            dsp.className = 'red';
          } else {
            dsp.innerHTML = '사용할 수 있는 아이디입니다.';
            dsp.className = 'green';
          }
        }
      }
    };
  }
  xmlhttp.send();
}

// 브라우저 호완성 체크하는 함수 신경XX
function fncGetXMLHttpRequest() {
  if (window.ActiveXObject) {
    try {
      return new ActiveXObject('Msxml2.XMLHTTP');
    } catch (e) {
      try {
        return new ActiveXObject('Microsoft.XMLHTTP');
      } catch (e1) {
        return null;
      }
    }
    //IE 외 파이어폭스 오페라 같은 브라우저에서 XMLHttpRequest 객체 구하기
  } else if (window.XMLHttpRequest) {
    return new XMLHttpRequest();
  } else {
    return null;
  }
}
