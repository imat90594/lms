<?php $item['#localized_options']['attributes']['class'][] = 'col col-1-out-of-2 col-2-out-of-4 col-3-out-of-6 main-navigation-item'; ?>
<li>
  <?php unset($item['#localized_options']['attributes']['id']); ?>
  <?php print l('<span>' . check_plain($item['#title']) . '</span>', $item['#href'], array('html' => TRUE, 'attributes' => $item['#localized_options']['attributes'])); ?>
</li>
