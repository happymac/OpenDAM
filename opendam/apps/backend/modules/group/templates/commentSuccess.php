<div id="searchResults-popup">
	<div class="inner">
		<?php if(sizeof($comments) == 0) : ?>
			<span class="text"><?php echo __("No comment."); ?></span>
			<br clear="all" />
		<?php else: ?>

			<?php foreach($comments as $comment) : ?>
				<div class="comment_item comment-basket" id="comment_<?php echo $comment->getId(); ?>" style="margin-bottom: 10px;">
					<?php
						$avatar = @file_get_contents("https://www.gravatar.com/avatar/".md5(strtolower($comment->getEmail()))."?s=50&d=404");

						if(!$avatar)
							$avatar = image_path("avatar_man_blank.jpg");
						else
							$avatar = "https://www.gravatar.com/avatar/".md5(strtolower($comment->getEmail()))."?s=50";
					?>
					<div class="avatar">
						<img src="<?php echo $avatar; ?>" />
					</div>
					<div class="label" style="background: transparent; text-shadow: none;">
						<span class="username"><?php echo $comment->getEmail(); ?></span>
						-
						<span class="content text"><?php echo $comment->getComment(); ?></span>
						<div class="edit">
							<div class="textarea-wrapper">
								<textarea id="comment_edit_<?php echo $comment->getId()?>"><?php echo str_replace("<br />", "", $comment->getComment()); ?></textarea>
							</div>
							<div class="submit">

									<a href="javascript: void(0);" id="save-comment-<?php echo $comment->getId()?>" class="but_admin"><span><?php echo __("Save"); ?></span></a>

									<a href="javascript: void(0);" id="cancel-comment-<?php echo $comment->getId()?>" class="but_admin"><span><?php echo __("Cancel"); ?></span></a>

							</div>
						</div>
						<div class="panel">
							<?php echo myTools::formatDateForComment($comment->getCreatedAt()); ?>
							<span class="action">

									- <a id="edit-comment-<?php echo $comment->getId()?>" href="javascript:void(0);"><?php echo __("Edit"); ?></a>

									- <a id="delete-comment-<?php echo $comment->getId()?>" href="javascript:void(0);"><?php echo __("Delete"); ?></a>

							</span>
						</div>
					</div>
				</div>
				<script>
					jQuery(document).ready(function() {
						jQuery("#edit-comment-<?php echo $comment->getId()?>").bind("click", function() {
							if(!jQuery("#comment_<?php echo $comment->getId(); ?> div.edit").is(":visible"))
							{
								jQuery("#comment_<?php echo $comment->getId(); ?> span.content").fadeOut(200, function() {
									jQuery("#comment_<?php echo $comment->getId(); ?> div.edit").fadeIn();
								});
							}
						});

						jQuery("#delete-comment-<?php echo $comment->getId()?>").bind("click", function() {
							if(confirm("<?php echo __("Are you sure want to delete this comment?"); ?>"))
							{
								jQuery.post(
									"<?php echo url_for("group/deleteComment"); ?>",
									{ id: "<?php echo $comment->getId(); ?>" },
									function(data) {
										jQuery("#comment_<?php echo $comment->getId(); ?>").fadeOut();
									}
								);
							}
						});

						jQuery("a#save-comment-<?php echo $comment->getId()?>").bind("click", function() {
							jQuery.post(
								"<?php echo url_for("group/editComment"); ?>",
								{ id: "<?php echo $comment->getId(); ?>", "comment": jQuery("#comment_edit_<?php echo $comment->getId(); ?>").val() },
								function(data) {
									jQuery("#comment_<?php echo $comment->getId(); ?> div.edit").fadeOut(200, function() {
										jQuery("#comment_edit_<?php echo $comment->getId(); ?>").val(data.js);
										jQuery("#comment_<?php echo $comment->getId(); ?> span.content").html(data.html);
										jQuery("#comment_<?php echo $comment->getId(); ?> span.content").fadeIn();
									});
								},
								"json"
							);
						});

						jQuery("a#cancel-comment-<?php echo $comment->getId()?>").bind("click", function() {
							jQuery("#comment_<?php echo $comment->getId(); ?> div.edit").fadeOut(200, function() {
								jQuery("#comment_<?php echo $comment->getId(); ?> span.content").fadeIn();
							});
						});
					});
				</script>
			<?php endforeach; ?>
		<?php endif; ?>
		<br clear="all">

		<div class="right">
			<a href="#" onclick="window.parent.closeFacebox(); " class="button btnBSG"><span><?php echo __("Close")?></span></a>
		</div>
	</div>
</div>