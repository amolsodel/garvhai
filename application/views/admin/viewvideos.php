<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h2 class="sub-header">Player Videos</h2>
	<?php
				/*echo '<pre>';
			    	print_r($player_videos);
			    echo '</pre>';*/
			    $videos = $player_videos['videos'];
			?>
	<a class="btn btn-sm btn-primary center-block" style="width:25%;" href="http://garvhai.in/index.php/admin/add_video/<?php echo $player_id;?>">Add Video</a>
	<hr/>
	<?php
		if(empty($videos)){
			echo "There are no videos uploaded for selected player yet!";
		}else{

	?>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Thumbnail</th>
							<th>Title</th>
							<th>Embed URL</th>
							<th>Delete</th>
						</tr>
					</thead>
					<?php foreach ($videos as $video): ?>
						<tbody>
							<tr>
								<td><?php echo $video['id']; ?></td>
								<td><img width='200' height='200' src="http://garvhai.in/uploads/<?php echo $video['video_thumbnail']?>" /></td>
								<td><?php echo $video['video_title']; ?></td>
								<td><?php echo $video['media_value']; ?></td>
								<td><a href="http://garvhai.in/index.php/admin/delete_media/<?php echo $video['id'];?>">Delete</a></td>
							</tr>
						</tbody>
					<?php endforeach; ?>
				</table>
			</div>
		<?php 
		}
		?>
</div>

<script type="text/javascript">
	$( document ).ready(function() {
        console.log( "ready!" );
        $("iframe").width(225);
        $("iframe").height(150);
    });
</script>








<!-- <div onclick="this.nextElementSibling.style.display='block'; this.style.display='none'">
   <img src="<?php echo base_url(); ?>uploads/ninja19.jpg" style="cursor:pointer" />
</div>
<div style="display:none">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/I_GynscynmQ?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe>
</div> -->