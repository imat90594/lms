<?php
  $settings = variable_get('theme_platon_settings');
  if(!empty($settings['palette'])) {
    $backgroundColor = $settings['palette']['dark_blue'];
  }
?>

<?php if (in_array('administrator', $user->roles)):?>
<?php if (!empty($main_navigation) && ($logged_in || theme_get_setting('platon_menu_show_for_anonymous')) && theme_get_setting('toggle_main_menu')): ?>
	<nav class="navbar" id="sidebar-wrapper" role="navigation">
		<?php print $main_navigation; ?>
	</nav>
	<?php endif; ?>
<?php print render($page['sidebar_first']); ?>
<?php else:?>
<ul class="nav">
	<li class="sidenav-main-link"><a href="/" class="text-secondary secondary-bg-color state">MY COURSES</a></li>
	<li class="category sidenav-top-link">
		<a href="#" class="text-secondary tertiary-bg-color state">CERTIFICATES</a>
	</li>              
	<li class="category sidenav-top-link">
		<a href="/user" class="text-secondary tertiary-bg-color state">ACCOUNT</a>
	</li>              
</ul>
<?php endif;?>