<!-- Previous and Next Post -->
<?php if(is_single()) : ?>
<div class="btn-group btn-group-justified hidden-sm hidden-xs" role="group" aria-label="..." id="nextpreviouslinks">
  <div class="btn-group" role="group">
    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> <?php previous_post_link( '%link', '%title'); ?></button>
  </div>
  <div class="btn-group" role="group">
    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> <?php next_post_link( '%link', '%title' ); ?></button>
  </div>
</div>
<?php endif; ?>
<!-- /Previous and Next Post -->