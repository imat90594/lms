<div class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="header">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".sidebar-nav">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/"><img src="<?php print $logo; ?>" class="logo"> <!--<span>LEARNING</span>--></a>	  
			</div>
			<div class="nav navbar-nav navbar-right hidden-sm hidden-xs">
				<?php if ($logged_in): ?>
					<a class="btn btn-primary" href="/user/logout"><span class="glyphicon glyphicon-user"></span> <?php print t("logout") ?></a>
				<?php else: ?>
					<a class="btn btn-primary" href="/user/login"><span class="glyphicon glyphicon-user"></span> <?php print t("login")?></a>
				<?php endif; ?>
				
			</div>
		</div>
	</div>
	<?php if (!empty($breadcrumb)): ?>
	<div class="nav-breadcrumbs">
		<div class="container">
			<?php print $breadcrumb; ?>
		</div>
	</div>
	<?php endif; ?>
	<div class="hidden">
		<?php print render($page['header_login']); ?>
	</div>
</div>