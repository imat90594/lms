<?php $df_quiz_type = 'THEORY and QUIZ';?>
<?php $rows = 5; $rendered_take = FALSE; ?>    <?php if (isset($passed_quiz)) $rows++; ?>
    <?php if (isset($quiz_type[LANGUAGE_NONE][0]['value'])): ?>
    <?php $rows++; $rendered_take = TRUE; ?>
    <?php switch($quiz_type[LANGUAGE_NONE][0]['value']) {
         case 'quiz':
          //print t("Quiz");
         	$df_quiz_type = 'QUIZ';
           break;

         case 'theory':
            //print t("Theory");
         	$df_quiz_type = 'THEORY';
            break;

         default:
             //print t("Mixed");
             break;
       } ?>
       
       <?php $link = menu_get_item("node/{$node->nid}");?>
       <?php 
		$read_more = "";
        if (!empty($link) && $link['access'] && !($page)) {
            $read_more = l(t("Read more"), "node/{$node->nid}", array('attributes' => array('class' => array('btn', 'btn-primary'))));
        }
        
        $link = menu_get_item("node/{$node->nid}/edit");

        Global $user;
        if (node_access('update', $node,$user)) {
                
          print l(t("Edit"), "node/{$node->nid}/edit", array('attributes' => array('class' => array('edit', 'action-element', 'action-edit-element'))));
                  
        }
        
        $link = menu_get_item("node/{$node->nid}/questions");

        if (!empty($link) && $link['access']) {
                
           print l(t("Manage questions"), "node/{$node->nid}/questions", array('attributes' => array('class'=> array('question', 'action-element', 'action-question-element'))));   
                  
         }
        
         $link = menu_get_item("node/{$node->nid}/results");
    
         if (!empty($link) && $link['access']) {
                
           print l(t("Results"), "node/{$node->nid}/results", array('attributes' => array('class' => array('results', 'action-element', 'action-results-element'))));
                  
          }
          ?>  
        <?php endif; ?>
<div class="panel panel-default panel-lesson unit-card muted-bg-color">
	<div class="panel-heading row text-secondary ">
		<div class="col-md-7 unit-card-header">
			<!--<small class="text-tertiary">COURSE NAME</small>-->
			<h3><?php print $title; ?></h3>
		</div>
		<div class="col-md-5 unit-card-labels">
			<!--  <span class="unit-card-label">BEGINNER</span>-->
			<!--<span class="unit-card-label">4:28</span>-->
			<span class="unit-card-label"><?php print $df_quiz_type?></span>
			<?php if ($quiz_type[LANGUAGE_NONE][0]['value'] == 'quiz'):?>
				 <?php if (isset($passed_quiz)): ?>
		           <span class="unit-card-label">PASSED</span>
		        <?php endif; ?>
		    <?php else:?>
		    	 <?php if (isset($passed_quiz)): ?>
		           <span class="unit-card-label">DONE</span>
		        <?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
	<div class="panel-body">												
		<div class="panel-body">
		<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
		  DESCRIPTION HERE
		  <?php if ($display_submitted): ?>
		    <div class="submitted">
		      <?php print $submitted; ?>
		    </div>
		  <?php endif; ?>
		
		  <div class="content"<?php print $content_attributes; ?>>
		  <?php if ($page): ?>
		  <div class="row">
		      <?php print render($content['body']); ?>
		  </div>
		  <?php endif; ?>
		    <!-- taken here -->
		        
		        <?php if ($quiz_type[LANGUAGE_NONE][0]['value'] != 'theory'):?>
		            <?php print t("Questions"); ?>: 
		            <?php print $node->number_of_random_questions + _quiz_get_num_always_questions($node->vid); ?>
		            <br/>
		             <?php print t("Pass rate"); ?>: 
		             <?php print $node->pass_rate; ?>%
		        <?php endif;?>
		       
		          <?php if (!$rendered_take): ?>
		              <?php //print render($content['take']); ?>
		              <?php if (!$page): ?>
		                <?php $read_more = l(t("Read more"), "node/{$node->nid}", array('attributes' => array('class' => array('btn', 'btn-primary')))); ?>
		              <?php endif; ?>
		          <?php endif; ?>
		    <?php if ($page): ?>
		      <?php
		      // We hide the comments and links now so that we can render them later.
		      hide($content['comments']);
		      hide($content['links']);
		      hide($content['stats']);
		      ?>
		    <?php endif; ?>
		  </div>
		  <?php print render($content['comments']); ?>
		</div>
	</div>
	</div>
	<div class="panel-footer">
		<span class="btn btn-primary">
			<?php print render($content['take']); ?>
		</span>
			<?php print $read_more;?>
	</div>
</div>
