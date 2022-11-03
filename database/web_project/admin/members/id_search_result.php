<?php
// 데이터 가져오기
$u_id = $_POST["user_id"];
// echo $u_id;

// DB 연결
include "../inc/dbcon.php";

// 쿼리 작성
$sql = "select u_id from members where u_id = '$u_id';";
// echo $sql;

// 쿼리 전송
$result = mysqli_query($dbcon, $sql);

// DB에서 데이커 가져오기
// select count(*) from members; 와 결과 같음
$num = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>검색 결과</title>
  <style type="text/css">
  body {
    font-size: 20px
  }

  .id_txt {
    font-weight: bold;
  }

  .green {
    color: rgb(118, 214, 80);
    ;
    font-weight: bold;
  }

  .red {
    color: red;
    font-weight: bold;
  }
  </style>
  <script type="text/javascript">
  function return_id() {
    opener.document.getElementById("u_id").value = "<?php echo $u_id ?>";
    window.close();
  };
  </script>
</head>

<body>
  <?php if($num == 0){ ?>
  <p>
    입력하신 <span class="id_txt">"<?php echo $u_id ?>"</span>은 사용할 수 <span class="green">있는</span> 아이디입니다.
  </p>
  <p>
    <a href="#" onclick="javascript:history.back();">[다시 검색]</a>
    <a href="#" onclick="return_id()">[사용하기]</a>
  </p>
  <?php } else { ?>
  <p>
    입력하신 <span class="id_txt">"<?php echo $u_id ?>"</span>은 사용할 수 <span class="red">없는</span> 아이디입니다.
  </p>
  <p>
    <a href="#" onclick="javascript:history.back();">[다시 검색]</a>
    <a href="#" onclick="window.close()">[닫기]</a>
  </p>
  <?php 
    }; 

    mysqli_close($dbcon);
    ?>
</body>

</html>