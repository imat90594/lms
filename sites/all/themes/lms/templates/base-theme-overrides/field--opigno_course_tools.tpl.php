<?php if (!in_array('authenticated user', $user->roles) && !in_array('anonymous user', $user->roles)):?>
<div class="opigno-tools row">
  <?php foreach ($items as $item): ?>
    <?php print render($item); ?>
  <?php endforeach; ?>
</div>
<?php endif;?>