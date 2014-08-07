<?php include "connect.php"; ?>

<?php
	if( isset( $_POST['task']) && $_POST['task'] == 'comment_insert' ){
		$userId = (int)$_POST['userId'];
		$comment = addslashes( $_POST['comment'] );
		$insert = mysql_query("insert into comments (comment, userid) VALUES ('$comment', '$userId')");
	} else {
		header ('location: ../index.php');
	}
mysql_close($dbhandle);
?>