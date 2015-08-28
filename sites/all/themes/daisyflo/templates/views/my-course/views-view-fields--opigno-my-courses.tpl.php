<?php //print $fields['body']->content;?>
<?php //print $fields['created']->content;?>
<?php //PRINT kprint_r($fields, true);die;?>

<div class="panel-body">
	<div class="row course-card-header">
		<div class="col-md-6 course-card-title">
			<small class="text-tertiary">COURSE NAME</small>
			<h2>
			<?php print $fields['title']->content;?></h2>
		</div>
		<!-- Add Timer via Views -->
		<div class="col-md-6 course-card-timer">
			<span class="course-icon">
				<img src="/sites/all/themes/daisyflo/img/theme/pup.png">
			 </span> 
			 <span class="course-timer"> 
				<span class="course-timer-label">DAYS <span>:</span> HRS <span>:</span> MINS <span>:</span> SECS </span> 
				<span class="course-timer-digits">20 <span>:</span> 20 <span>:</span> 20 <span>:</span> 20</span>
				<?php //print strtotime(strip_tags($fields['opigno_user_membership_exp']->content))?>
			</span>
		</div>
	</div>
	<div class="row course-card-body">
		<div class="col-md-3 course-thumbnail">
			<div class="course-thumbnail-placeholder"
				style="background-image: url('<?php print strip_tags($fields['opigno_course_image']->content);?>')">
			</div>
		</div>
		<!-- Add Progress via Views -->
		<div class="col-md-9 course-progress">
			<h3>YOUR PROGRESS</h3>
			<div class="progress">
				<div class="progress-bar" role="progressbar" aria-valuenow="70"
					aria-valuemin="0" aria-valuemax="100" style="width: 70%">
					<span class="sr-only">70% Complete</span>
				</div>
			</div>
			<small class="progress-start col-lg-4">Starting Point</small> <small
				class="progress-midway col-lg-4">You're doing good!</small> <small
				class="progress-end col-lg-4">Finished!</small>
		</div>
	</div>
</div>
<div class="panel-footer">
	<!-- Add Link Here -->
	<span class="btn btn-primary">
		<?php print $fields['title_2']->content;?>
	</span>
</div>
