<?php switch($type) {
	case "status" : $class = "alert-success"; break;
	case "warning" : $class = "alert-warning"; break;
	case "error" : $class = "alert-danger"; break;
}?>

<div class="alert <?php echo $class?> fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">x</a>
    
  <?php if (!empty($heading)): ?>
    <strong><?php print $heading; ?></strong> 
  <?php endif; ?>
  
  <?php if (count($messages) > 1): ?>
    <ul>
      <?php foreach ($messages as $message): ?>
      <li><?php print $message; ?></li>
      <?php endforeach; ?>
    </ul>
  <?php elseif (!empty($messages)): ?>
    <?php print $messages[0]; ?>
  <?php endif; ?>
  
</div>