<?php
  $settings = variable_get('theme_platon_settings');
  if(!empty($settings['palette'])) {
    $backgroundColor = $settings['palette']['dark_blue'];
  }
?>


<?php if (!empty($main_navigation) && ($logged_in || theme_get_setting('platon_menu_show_for_anonymous')) && theme_get_setting('toggle_main_menu')): ?>
	<nav class="navbar" id="sidebar-wrapper" role="navigation">
		<?php print $main_navigation; ?>
	</nav>
	<?php endif; ?>
<?php print render($page['sidebar_first']); ?>
