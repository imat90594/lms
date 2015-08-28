<?php if($data):?>

	<?php foreach($data as $cert):?>
		<a href="/certficates/get/<?php echo $cert->gid?>"><?php echo $cert->title?></a>	
	<?php endforeach?>
<?else:?>

<p>You have no certificates at this moment.</p>

<?php endif?>