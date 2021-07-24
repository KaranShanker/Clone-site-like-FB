
	<div class="widget">
		<h4 class="widget-title"><?= shortcuts ?></h4>
		<ul class="naves">
		<li>
		<i class="fa fa-comments" style="color: #1aadab; font-weight: bolder; font-size: 18px;"></i>
		<a href="messages" title=""><?= inbox ?></a>
		</li>
		<li>
			<i class="fa fa-group" style="color: #7a169c; font-weight: bolder; font-size: 18px;"></i>
			<a href="timeline-friends.html" title=""><?= friends ?></a>
		</li>
		<li>
			<i class="ti-power-off" style="color: red; font-weight: bolder; font-size: 18px;"></i>
			<a href="<?= get_template_directory_uri() ?>/logout.php" title=""><?= logout ?></a>
		</li>
	</ul>
		</div>
