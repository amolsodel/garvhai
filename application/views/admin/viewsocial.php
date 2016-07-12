<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h2 class="sub-header">Player News</h2>
	<?php
				/*echo '<pre>';
			    	print_r($player_videos);
			    echo '</pre>';*/
			    $news = $player_social['social'];
			?>
	<a class="btn btn-sm btn-primary center-block" style="width:25%;" href="http://www.garvhai.in/index.php/admin/add_social/<?php echo $player_id;?>">Add News</a>
	<hr/>
	<?php
		if(empty($news)){
			echo "There are no news uploaded for selected player yet!";
		}else{

	?>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Title</th>
							<th>Link</th>
							<th>Publish Data</th>
							<th>Description</th>
							<th>Delete</th>
						</tr>
					</thead>
					<?php foreach ($news as $news_item): ?>
						<tbody>
							<tr>
								<td><?php echo $news_item['id']; ?></td>
								<td><?php echo $news_item['media_value']; ?></td>
								<td><?php echo $news_item['link']; ?></td>
								<td><?php echo $news_item['published_date']; ?></td>
								<td><?php echo $news_item['description']; ?></td>
								<td><a href="http://www.garvhai.in/index.php/admin/delete_media/<?php echo $news_item['id'];?>">Delete</a></td>
							</tr>
						</tbody>
					<?php endforeach; ?>
				</table>
			</div>
		<?php 
		}
		?>
</div>