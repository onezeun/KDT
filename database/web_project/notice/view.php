<?php
//데이터 가져오기
$n_idx = $_GET["n_idx"];

// DB 연결
include '../inc/dbcon.php';

// 쿼리 작성
$sql = "select * from notice where idx='$n_idx';";

// 쿼리 전송
$result = mysqli_query($dbcon, $sql);

// DB에서 데이터 가져오기
$array = mysqli_fetch_array($result);

// 조회수 업데이트
$cnt = $array["cnt"]+1;

$sql = "update notice set cnt='$cnt' where idx='$n_idx';";

mysqli_query($dbcon, $sql);

?>
<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>공지사항</title>
  <style>
  a {
    text-decoration: none;
    margin: 10px 5px
  }

  table,
  td {
    border-collapse: collapse
  }

  th,
  td {
    padding: 10px;
    font-size: 16px;
    text-align: center
  }

  .notice_view_set {
    width: 1200px;
    margin: auto;
    border-top: 2px solid #999;
  }

  .notice_view_title {
    border-top: 2px solid #999;
    border-bottom: 1px solid #999
  }

  .notice_view_content {
    border-bottom: 1px solid #999;
  }

  .notice_view_text {
    width: 1200px;
    height: 500px;
    border-bottom: 2px solid #999;
  }

  .v_text {
    text-align: left;
  }

  .v_title {
    width: 60px;
    background: #eee;
  }

  .v_content {
    width: 500px;
    text-align: left;
    padding-left: 30px;
  }

  a:hover {
    color: rgb(255, 128, 0)
  }

  .write_area {
    width: 1200px;
    margin: auto;
    text-align: right;
  }

  .list {
    width: 1200px;
    margin: auto;
    text-align: center;
  }
  </style>
  <script type=text/javascript>
    function remove_notice() {
      var ck = confirm("정말 삭제하시겠습니까??");
      if (ck) {
        location.href = "delete.php?n_idx=<?php echo $n_idx; ?>";
      };
    };
  </script>
</head>

<body>
  <?php include '../inc/sub_header.php'; ?>

  <!-- 콘텐트 -->
  <h2>공지사항</h2>
  <?php if ($s_id == 'admin') { ?>
  <p class="write_area">
    <span><a href="../admin/notice/write.php">글쓰기</a></span>
  </p>
  <?php }; ?>
  <table class="notice_view_set">
    <tr class="notice_view_content">
      <th class="v_title">제목</th>
      <td class="v_content"><?php echo $array['n_title']; ?></td>
    </tr>
    <tr class="notice_view_content">
      <th class="v_title">작성자</th>
      <td class="v_content"><?php echo $array['writer']; ?></td>
    </tr>
    <tr class="notice_view_content">
      <th class="v_title">날짜</th>
      <?php $w_date = substr($array['w_date'], 0, 10); ?>
      <td class="v_content"><?php echo $w_date; ?></td>
    </tr>
    <tr class="notice_view_content">
      <th class="v_title">조회수</th>
      <td class="v_content"><?php echo $cnt; ?></td>
    </tr>
    <tr class="notice_view_text">
      <td colspan="2" class="v_text">
        <?php
        // str_replace("어떤 문자를, "어떤 문자로으로", "어떤값에서")
        // textarea의 엔터를 <br>로 변경 
        $n_content = str_replace("\n", "<br>", $array['n_content']);
        // 띄어쓰기
        $n_content = str_replace(" ", "&nbsp", $n_content);
        echo $n_content; ?>
      </td>
    </tr>
  </table>
  <p class="list">
    <a href="list.php">목록</a>
    <?php if($s_id == 'admin') { ?>
    <a href="modify.php?n_idx=<?php echo $n_idx; ?>">수정</a>
    <a href="#" onclick="remove_notice()">삭제</a>
    <?php }; ?>
  </p>
</body>

</html>