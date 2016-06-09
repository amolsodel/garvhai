<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<div class="panel panel-primary">
		<div class="panel-heading">
            <h3 class="panel-title">Images</h3>
        </div>
        <div class="panel-body">
        	<?php
				/*echo '<pre>';
			    	print_r($images);
			    echo '</pre>';*/

			    $images = $player_images['images'];

        	?>
			<a class="btn btn-sm btn-primary center-block" style="width:25%;" href="http://garvhai.in/index.php/admin/add_images/<?php echo $player_id;?>">Add Images</a>
			<hr/>
			<?php
				if(empty($images)){
					echo "There are no images uploaded for selected player yet!";
				}else{

			    	foreach($images as $image){
			?>
				    	<div style="float:left; border: 1px solid #ddd; border-radius: 4px; margin: 0px 5px 5px 0px;">
				    		<img width='200' height='200' src="http://garvhai.in/uploads/<?php echo $image['media_value']?>" />
				    		<br/><br/>
				    		<a class="btn btn-sm btn-primary center-block" style="width:35%;" href="http://garvhai.in/index.php/admin/delete_media/<?php echo $image['id'];?>">Delete</a>
				    		<br/>
				    	</div>
			<?php
			    	}
			    }
			?>
		</div>
	</div>
</div>