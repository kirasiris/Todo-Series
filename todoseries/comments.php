<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
	
	<?php if ( post_password_required() ) : ?>
		<div class="panel panel-default">
			<div class="panel-heading"><h1 class="panel-title"><i class="fa fa-comments"></i> Comments</h1></div>
			<div class="panel-body" id="video_player">
				<div class="alert alert-info" id="alerta_error" role="alert"><p>This post is protected with a password. Type the password to see the comments</p></div>
			</div>
		</div>
	<?php return; endif; ?>



<div class="panel panel-default">
	<div class="panel-heading">
		<h1 class="panel-title">
			<i class="fa fa-comments" aria-hidden="true"></i> Comments
			<span class="pull-right"><div class="fb-like" data-href="<?php get_the_ID(); ?>" data-layout="button" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div></span>
		</h1>
	</div>
<div class="panel-body" id="video_player">
	<?php if ( have_comments() ) : ?>
		<style type="text/css">.media-list, #respond{ padding: 0px 15px 0px 15px }</style>
		<div class="alert alert-success" id="alerta_logro" role="alert"><?php comments_number('No comments', 'One comment', '% Comments' );?> a &#8220;<?php the_title(); ?>&#8221;</div>
		<ul class="media-list">
			<?php wp_list_comments( array( 'callback' => 'bootstrap_comment' ) ); ?>
		</ul>
	<?php elseif( ! comments_open() ) : ?>
		<style type="text/css">#video_player{ padding: 0px;}</style>
		<div class="alert alert-danger" id="alerta_error" role="alert"><p>The comments are closed</p></div>		
    <?php else : ?>
    	<style type="text/css">.media-list, #respond{ padding: 0px 15px 0px 15px }</style>
		<div class="alert alert-warning" id="alerta_error" role="alert"><p>No comment found</p></div>
        <div class="alert alert-info" id="alerta_error" role="alert"><?php comment_form_title( 'Would like to comment?','Send a comment to %s' ); ?></div>
        <ul class="media-list">
			<?php wp_list_comments( array( 'callback' => 'bootstrap_comment' ) ); ?>
		</ul>
    <?php endif; ?>
</div>


	<?php
	/*
	 * Adding bootstrap support to comment form,
	 * and some form validation using javascript.
	 */
	
	ob_start();
	$commenter = wp_get_current_commenter();
	$req = true;
	$aria_req = ( $req ? " aria-required='true'" : '' );
	
	$comments_arg = array(
		'form'	=> array(
			'class' => 'form-horizontal'
			),
		'fields' => apply_filters( 'comment_form_default_fields', array(
				'autor' 				=> 
				'<div class="form-group">'
				. '<label for="author">' . __( 'Name', 'wp_babobski' ) . '</label> ' . ( $req ? '<span>*</span>' : '' ) 
				. '<input id="author" name="author" class="form-control" type="text" value="" size="30"' . $aria_req . ' />' 
				. '<p id="d1" class="text-danger"></p>'
				.'</div>',
				'email'					=> 
				'<div class="form-group">' 
				.'<label for="email">' . __( 'Email', 'wp_babobski' ) . '</label> ' . ( $req ? '<span>*</span>' : '' ) 
				. '<input id="email" name="email" class="form-control" type="text" value="" size="30"' . $aria_req . ' />' 
				. '<p id="d2" class="text-danger"></p>' 
				.'</div>',
				'url'					=> 
				''
			)
			),
				'comment_field'			=> 
				'<div class="form-group">' 
				. '<label for="comment">' . __( 'Comment', 'wp_babobski' ) . '</label><span>*</span>' 
				. '<textarea id="comment" class="form-control" name="comment" rows="5" aria-required="true"></textarea>' 
				. '<p id="d3" class="text-danger"></p>'
				.'</div>',
				'comment_notes_after' 	=> '',
				'class_submit'			=> 'btn btn-default'
			); ?>
	<?php comment_form($comments_arg);
		echo str_replace('class="comment-form"','class="comment-form" name="commentForm" onsubmit="return validateForm();"',ob_get_clean());
	?>
</div>

		<script>
			/* basic JavaScript form validation */
			function validateForm() {
			var form 	=  document.forms.commentForm,
				x 		= form.author.value,
				y 		= form.email.value,
				z 		= form.comment.value,
				flag 	= true,
				d1 		= document.getElementById("d1"),
				d2 		= document.getElementById("d2"),
				d3 		= document.getElementById("d3");
				
			if (x === null || x === "") {
				d1.innerHTML = "<?php echo __('Name is required', 'wp_babobski'); ?>";
				flag = false;
			} else {
				d1.innerHTML = "";
			}
			
			if (y === null || y === "") {
				d2.innerHTML = "<?php echo __('Email is required', 'wp_babobski'); ?>";
				flag = false;
			} else {
				d2.innerHTML = "";
			}
			
			if (z === null || z === "") {
				d3.innerHTML = "<?php echo __('Comment is required', 'wp_babobski'); ?>";
				flag = false;
			} else {
				d3.innerHTML = "";
			}
			
			if (flag === false) {
				return false;
			}
			
		}
	</script>