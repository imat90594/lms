<div class="panel panel-default panel-lesson">
	<div class="panel-body">
		<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
		  
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
			<h2><?php print $title; ?></h2>
		    <?php $rows = 5; $rendered_take = FALSE; ?>
		    <?php if (isset($passed_quiz)) $rows++; ?>
		    <?php if (isset($quiz_type[LANGUAGE_NONE][0]['value'])): ?>
		    <?php $rows++; $rendered_take = TRUE; ?>
		    <?php switch($quiz_type[LANGUAGE_NONE][0]['value']) {
		         case 'quiz':
		          //print t("Quiz");
		           break;
		
		         case 'theory':
		            //print t("Theory");
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
		        
		        <?php if ($quiz_type[LANGUAGE_NONE][0]['value'] != 'theory'):?>
		            <?php print t("Questions"); ?>: 
		            <?php print $node->number_of_random_questions + _quiz_get_num_always_questions($node->vid); ?>
		            <br/>
		             <?php print t("Pass rate"); ?>: 
		             <?php print $node->pass_rate; ?>%
		        <?php endif;?>
		        <?php if (isset($passed_quiz)): ?>
		            <span class="pass-mark">
		              <img src="<?php print $base_path . $directory; ?>/img/<?php print $passed_quiz ? 'answered-correctly' : 'answered-incorrectly'; ?>.png" />
		            </span>
		        <?php endif; ?>
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
		  <span class="btn">
			  <?php print render($content['take']); ?>
		  </span>
		  <br/>
		  <?php print $read_more;?>
		  <?php print render($content['comments']); ?>
		</div>
	</div>
</div>
