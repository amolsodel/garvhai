<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<?php echo validation_errors(); ?>
<?php 
    if(isset($error)) echo $error; 
    else if(isset($notice)) echo $notice;
    else if (isset($upload_error)) echo $upload_error;
?>
	<div class="panel panel-primary">
		<div class="panel-heading">
            <h3 class="panel-title">Add Media</h3>
        </div>
        <div class="panel-body">
			<form enctype="multipart/form-data" method="post" accept-charset="utf-8">
			  <label for="videothumb">Video Thumbnail</label>
              <input type="file" name="videothumb" size="100" />
			  <br />
			  <label for="playervideo">Video</label>
              <input type="input" name="playervideo" />
			  <br />
			  <label for="videotitle">Title</label>
              <input type="input" name="videotitle" />
			  <br />
			  <?php echo form_submit('submit','Upload');?>
			</form>
		</div>
	</div>
</div>