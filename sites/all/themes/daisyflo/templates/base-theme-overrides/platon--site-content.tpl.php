<div class="container">
	<div class="row row-offcanvas row-offcanvas-left">
		<div class="col-xs-6 col-sm-3 sidebar-offcanvas sidenav <?php print ($content_type == 'course' || $content_type == 'quiz')? 'hidden-md hidden-lg' : ''?>" id="sidebar" role="navigation">
			<?php print $platon__site_content__first_sidebar; ?>
	    </div>
	    <div class="col-sm-12 courses <?php print ($content_type == 'course' || $content_type == 'quiz')? 'col-lg-12' : 'col-lg-9'?>"">
			<?php print $platon__site_content__second_sidebar; ?>
	    </div>
	</div>
</div>