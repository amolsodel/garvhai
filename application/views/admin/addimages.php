<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<?php echo validation_errors(); ?>
<?php 
    if(isset($error)) echo $error; 
    else if(isset($notice)) echo $notice;
    else if(isset($upload_error)) echo $upload_error;
    else if(isset($success)) echo $success;
?>
	<div class="panel panel-primary">
		<div class="panel-heading">
            <h3 class="panel-title">Add Images</h3>
        </div>
        <div class="panel-body">
			<?php echo form_open_multipart();?>
			  <p>Upload file(s):</p>
			  <?php echo form_upload('uploadedimages[]','','multiple'); ?>
			  <br />
			  <br />
			  <?php echo form_submit('submit','Upload');?>
			<?php echo form_close();?>
		</div>
	</div>
	<?php
		if(isset($player_id)){
	?>
			<a class="btn btn-sm btn-primary center-block" style="width:25%;" href="http://garvhai.in/index.php/admin/view_images/<?php echo $player_id;?>">View Images</a>
	<?php } ?>
</div>