
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<h2 class="sub-header">Listed Players</h2>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Id</th>
						<th>Player Name</th>
						<th>Basic Profile</th>
						<th>Media(View/Update)</th>
						<th>Delete</th>
					</tr>
				</thead>
				<?php foreach ($players as $player): ?>
					<tbody>
						<tr>
							<td><?php echo $player['id']; ?></td>
							<td><?php echo $player['name']; ?></td>
							<td><a href="http://garvhai.in/index.php/admin/edit_player/<?php echo $player['id'];?>">Edit</a></td>
							<td>
								<a href="http://garvhai.in/index.php/admin/view_images/<?php echo $player['id'];?>">Images</a>&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp; 
								<a href="http://garvhai.in/index.php/admin/view_videos/<?php echo $player['id'];?>">Video</a>&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;
								<a href="http://garvhai.in/index.php/admin/view_social/<?php echo $player['id'];?>">News</a>
							</td>
							<td><a href="http://garvhai.in/index.php/admin/delete_player/<?php echo $player['id'];?>">Delete</a></td>
						</tr>
					</tbody>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
