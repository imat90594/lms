<div class="row l-main">
    <div class="<?php print ($content_type == 'course' || $content_type == 'quiz')? 'hidden' : ''?> col-lg-3">
      <?php print $platon__site_content__first_sidebar; ?>
    </div>
    <div class="<?php print ($content_type == 'course' || $content_type == 'quiz')? 'col-lg-12' : 'col-lg-9'?>">
      <?php print $platon__site_content__second_sidebar; ?>
    </div>
</div>