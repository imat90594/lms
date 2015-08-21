
<div id="expired_courses_modal" class="modal fade" role="dialog">
  <span id="has_expiration" class="hidden"><?php echo is_array($courses) ? "1" : "0"?></span>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Course Epiration</h4>
      </div>
      <div class="modal-body">
		<?php foreach($courses as $course):?>
	        <p class="text-primary">
	        	<?php echo $course->title?> is about to expired in <?php echo $course->expiration_days?> days. 
	        	<br />
	        	<strong>
	        		<a href="/extend/<?php echo $course->gid ?>">Extend your access now!</a>
	        	</strong>
			</p>
		<?php endforeach?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
