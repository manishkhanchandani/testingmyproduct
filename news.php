<?php
$news = getNews($details['city']);
$site->news = $news;
$pageStyle = 'wrapper-style3';
?>
<header>
	<h2>News</h2>
</header>
<div class="container" id="top">
	<div class="row">
		<div class="8u">
			<h3><strong>General News</strong></h3>
			<ul style="list-style:inside">
			<?php foreach ($site->news as $itemNum => $v) { ?>
				<li><a href="<?php echo $v->links[$itemNum]; ?>" target="_blank" style="text-decoration:none;"><?php echo $v->titles[$itemNum]; ?></a>
				</li>
			<?php } ?>
			</ul>
		</div>
		<div class="4u">
			<form name="customnews" id="customnews" method="post">
			<h3><strong>Post Your News</strong></h3>
			</form>
		</div>
	</div>
</div>