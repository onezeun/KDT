<?php
// 작성자 입력을 위한 session 가져오기
include '../inc/session.php';

// 이전 페이지에서 값 가져오기
$n_idx = $_GET['n_idx'];
$n_title = $_POST['n_title'];
$n_content = $_POST['n_content'];

// 작성일자
$w_date = date('Y-m-d');

// 쿼리 작성
if ($_FILES['up_file']["name"] != null) {
  $tmp_name = $_FILES['up_file']['tmp_name'];
  $f_name = $_FILES['up_file']['name'];
  $up = move_uploaded_file($tmp_name, "../data/$name");

  $f_type = $_FILES['up_file']['type'];
  $f_size = $_FILES['up_file']['size'];

  // 쿼리 작성
  // 파일이 있다면
  $sql = 'update notice set ';
  $sql .= "n_title='$n_title',";
  $sql .= "n_content='$n_content',";
  $sql .= "w_date='$w_date',";
  $sql .= "f_name='$f_name',";
  $sql .= "f_type='$f_type',";
  $sql .= "f_size='$f_size',";
  $sql .= "where idx=$n_idx;";
} else {
  // 파일이 없다면
  $sql = 'update notice set ';
  $sql .= "n_title='$n_title',";
  $sql .= "n_content='$n_content',";
  $sql .= "w_date='$w_date' ";
  $sql .= "where idx=$n_idx;";
  /* echo $sql;
  exit; */
}



// DB 연결
include '../inc/dbcon.php';


// 데이터베이스에 쿼리 전송
mysqli_query($dbcon, $sql);

// DB 접속 종료
mysqli_close($dbcon);

// 리디렉션
echo "
  <script type=\"text/javascript\">
    location.href = \"view.php?n_idx=$n_idx\";
  </script>
  ";
?>