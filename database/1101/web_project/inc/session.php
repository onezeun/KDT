<?php
    session_start();
    // php 삼항연산자 isset( 조건 ) ? 값1 : 값2 ;
    $s_idx = isset($_SESSION["s_idx"]) ? $_SESSION["s_idx"] : "";
    $s_name = isset($_SESSION["s_name"]) ? $_SESSION["s_name"] : "";
?>