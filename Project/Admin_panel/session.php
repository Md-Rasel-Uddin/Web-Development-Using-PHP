<?php
//session_start();
if (!isset($_SESSION['id'])){
@header('location:index.php');
}

$user_id=$_SESSION['id'];
$member_query = mysql_query("select * from members where user_id = '$user_id'")or die(mysql_error());
$member_row = mysql_fetch_array($member_query);

$fullname = $member_row['firstname']." ".$member_row['lastname'];
