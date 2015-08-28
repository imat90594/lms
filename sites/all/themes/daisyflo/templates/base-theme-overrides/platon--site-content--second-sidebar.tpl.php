 <?php if (isset($page['#views_contextual_links_info']['views_ui']['view']->name)):?>
 	 <?php if (!empty($messages)): ?>
    	<div id="messages">
      	<?php print render($messages); ?>
    	</div>
  	<?php endif; ?>

  	<?php if ($page['#views_contextual_links_info']['views_ui']['view']->name == 'opigno_quizzes'):?>
  	
  		<div class="panel panel-default units">
			<div class="row unit-card-header">
				<div class="col-md-1 unit-card-title">
					<!--<small class="text-tertiary">COURSE NAME</small>-->
					<h2>Lessons</h2>
				</div>
				<div class="col-md-6 h-divider-primary">
				</div>
				<div class="col-md-5 unit-card-labels">
					<span class="unit-card-label">TYPE</span>
					<span class="unit-card-label">STATUS</span>
				</div>
			</div>
			 <?php print render($page['content']); ?>
		</div>
  	<?php endif;?>
 
 <?php else: //default page?>
  <?php if (!empty($page['help'])): ?>
    <div id="help">
      <?php print render($page['help']); ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($title)): ?>
    <div id="title-wrapper">
      <?php print render($title_prefix); ?>
      <h1><?php print $title; ?></h1>
      <?php print render($title_suffix); ?>
      
      <?php if (!empty($og_context_navigation)): ?>
      	<?php if (in_array('administrator', $user->roles)):?>
        <div id="og-context-navigation">
          <?php print $og_context_navigation; ?>
        </div>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($messages)): ?>
    <div id="messages">
      <?php print render($messages); ?>
    </div>
  <?php endif; ?>

  <?php if (!(empty($tabs['#primary']) && empty($tabs['#secondary'])) && empty($hide_tabs)): ?>
    <div id="tabs">
      <?php print render($tabs); ?>
    </div>
  <?php endif; ?>

  <?php if (($action_links)&&(!(isset($node)&&($node->type=="course")))): ?>
    <ul class="action-links">
      <?php print render($action_links); ?>
    </ul>
  <?php endif; ?>

  <div id="content">
    <?php print render($page['content']); ?>
    <?php // print render($page['content_bottom']); ?>
  </div>

  <?php if (($action_links)&&((isset($node)&&($node->type=="course")))): ?>
    <ul class="action-links">
      <?php print render($action_links); ?>
    </ul>
  <?php endif; ?>
<?php endif; //for page detection?>