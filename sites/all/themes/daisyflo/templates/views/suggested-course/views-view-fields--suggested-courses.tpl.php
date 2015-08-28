<div class="panel-body">
	<div class="row course-card-header">
		<div class="col-md-6 course-card-title">
			<small class="text-tertiary">COURSE NAME</small>
			<h2><?php print $fields['title']->content;?></h2>
		</div>
		<div class="col-md-6 course-card-timer">
			<span class="course-icon"><img src="pup.png"></span>
			<span class="course-teaser">
				<a href="#" class="text-muted">Start this course now!</a>
			</span>
		</div>
	</div>
	<div class="row course-card-body">
		<div class="col-md-3 course-thumbnail">
			<div class="course-thumbnail-placeholder" style="background-image: url(course-thumbnail.jpg)">
				<?php print $fields['opigno_course_image']->content;?>
			</div>
		</div>
		<div class="col-md-9 course-details">
			<h3>About the Course</h3>
			<p> 
				<?php print $fields['body']->content;?>
			</p>
			<a href="#" class="read-more">READ MORE</a>
			
		</div>
	</div>
</div>
<div class="panel-footer">
	<?php print $fields['add_to_cart_form']->content;?>
	<a class="btn btn-primary">START COURSE</a>
</div>

