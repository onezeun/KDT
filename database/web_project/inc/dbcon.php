<?php
$dbcon = mysqli_connect("localhost", "root", "", "dbpractice") or die("접속에 실패하였습니다.");
mysqli_set_charset($dbcon, "utf8");

// DB 연결
// $dbcon = mysqli_connect("호스트", "사용자", "비밀번호");
// mysqli_select_db($dbcon, "DB명");

// $dbcon = mysqli_connect("호스트", "사용자", "비밀번호", "DB명");
// $dbcon = mysqli_connect("localhost", "root", "1234", "front");
// $dbcon = mysqli_connect("호스트", "사용자", "비밀번호", "DB명") or die("DB 접속 실패 시 출력될 메세지");
// $dbcon = mysqli_connect("localhost", "root", "1234", "front") or die("접속에 실패하였습니다.");

// $dbcon = mysqli_connect("localhost", "root", "", "front") or die("접속에 실패하였습니다.");
// mysqli_set_charset($dbcon, "utf8");
// 연결객체도 문자셋 꼭 설정하기
?>