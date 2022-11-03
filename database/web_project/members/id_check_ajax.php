  <?php
  // 데이터 가져오기
  $u_id = $_GET['u_id'];
  
  // DB 연결
  $connect = mysqli_connect("localhost","root","");
  $db_con = mysqli_select_db($connect, "front");
 
  // 쿼리 작성 후 전송
  $sql="select * from members where u_id='$u_id'";
  $result=mysqli_query($connect, $sql);
  $num_match=mysqli_num_rows($result);

  if(!$num_match){
	echo "N";
  } else{
	 echo "Y";
  }
?>