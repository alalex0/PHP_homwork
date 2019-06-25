<h2>Главная Страница</h2>

<!--$puctures-->
<div class = "grid">
	<?php foreach ($pictures as $picture): ?> 
	<div>
		<h2><?php echo $picture->getTitle(); ?></h2>
			<a href="/picture/show/<?php echo $picture->getId(); ?>">
			<img src="/img/<?php echo $picture->getPath()[0]; ?>">
		</a>
	</div>	
	 
	<?php endforeach; ?>
</div>