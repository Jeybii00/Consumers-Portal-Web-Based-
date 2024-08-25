<?php
	date_default_timezone_set("Etc/GMT+8");
 
	require_once '../include/condb.php';
 
	$query = mysqli_query($conn, "SELECT * FROM `concerns` ");
	$date = date("Y-m-d");
	while($fetch = mysqli_fetch_array($query)){
		if(strtotime($fetch['account_number']) < strtotime($date)){
			mysqli_query($conn, "INSERT INTO `archive` VALUES('$fetch[id]', '$fetch[account_number]', '$fetch[email]', '$fetch[contact]', '$fetch[name]', '$fetch[feedback_msg]', '$fetch[date_submission]') ") or die(mysqli_error($conn));
			echo '<script language="javascript" type="text/javascript">
			alert("Message Archived Successfully!");
			window.location = "view_concerns.php";
			</script>';
			mysqli_query($conn, "DELETE FROM `concerns` WHERE `id` = '$fetch[id]'") or die(mysqli_error($conn));
		}
	}
?>