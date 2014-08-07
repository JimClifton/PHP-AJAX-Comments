<?php 
include "connect.php";

$result = mysql_query("SELECT comments.userid, comments.comment_id, comments.comment, subscribers.userId, subscribers.userName 
						FROM comments JOIN subscribers ON subscribers.userId = comments.userid ORDER BY comments.comment_id DESC");

while ($row = mysql_fetch_array($result)) {
	echo '<div class="comment" id="'.$row{"comment_id"}.'">';
	echo '<div class="user_image"></div>';
	echo '<h3>'.$row{"userName"}.'</h3>';
	echo '<div class="user_comment">'.stripslashes($row{"comment"}).'</div>';
	echo '<div class="delete">X</div>';
	echo '</div>';
}

mysql_close($dbhandle);
?>