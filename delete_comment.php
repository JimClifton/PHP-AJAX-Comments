<?php include "connect.php"; ?>

<?php
	if( isset( $_POST['task']) && $_POST['task'] == 'delete_comment' ){
		$commentId = (int)( $_POST['commentId'] );
		$delete = mysql_query("DELETE FROM comments WHERE comment_id = $commentId");
	} else {
		header ('location: ../index.php');
	}
mysql_close($dbhandle);
?>