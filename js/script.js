function loading_comments() {
	$('.comments_wrapper').html( "Loading..." );
}

function loading_post() {
	$('#adding_comment').show();
}

function get_comments() {
	$.post( "get_comments.php",
		{
			task : "get_comments"
		}
	).success(
		function ( data ) {
			$('.comments_wrapper').html( data );
			comment_delete();
		}
	).error(
		function () {
			console.log( "ERROR" );
		}
	);
}

function comment_post_btn_click() {
	$('#add_comment_button').click( function () {

		var _comment = $('.comment_insert_text').val();
		var _userId = $('#userId').val();
		var _userName = $('#userName').val();

		if( _comment.length > 0 && _userId != null ) {

			loading_post();
			$('.comment_insert_text').removeClass("invalid");
			$.post( "comment_insert.php",
				{
					task : "comment_insert",
					userId : _userId,
					userName : _userName,
					comment : _comment
				}
			).success(
				function ( data ) {
					console.log( "Response text : " + data );
					$('#adding_comment').hide();
					$('.comment_insert_text').val("");
					get_comments();
				}
			).error(
				function () {
					console.log( "ERROR" );
				}
			);
		}else{
			$('.comment_insert_text').addClass("invalid");
		}
	});
}

function comment_delete() {
	$('.delete').click( function () {
		var _commentID = $(this).parents(".comment").attr("id");
		$(this).parents(".comment").addClass("deleting").html("Deleting...");
		$.post( "delete_comment.php",
			{
				task : "delete_comment",
				commentId : _commentID
			}
		).success(
			function ( data ) {
				console.log( "Response text : " + data );
				get_comments();
			}
		).error(
			function () {
				console.log( "ERROR" );
			}
		);
	});
}

$(document).ready( function () {
	comment_post_btn_click();
	get_comments();
	loading_comments();
});