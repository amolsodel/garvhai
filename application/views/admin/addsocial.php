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
            <h3 class="panel-title">Add News</h3>
        </div>
        <div class="panel-body">
        	<form method="post" accept-charset="utf-8">
				<label for="newstitle">News title</label>
	            <input type="input" name="newstitle" value="" />
				<hr />
				<label for="newslink">Link</label>
	            <input type="input" name="newslink" value="" />
	            <hr />
	            <label for="newsdate">Date</label>
	            <input type="input" name="newsdate" value="" />
	            <hr />
	            <label for="newsdesc">News Description</label>
                <textarea name="newsdesc" rows="10" cols="80"></textarea>
                <hr />
				<?php echo form_submit('submit','Add');?>

				<script>
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    //$.noConflict();
                    $( document ).ready(function() {
                        console.log( "ready!" );
                        CKEDITOR.replace( 'newsdesc' );
                    });
                    
                </script>

			</form>
		</div>
	</div>
	<?php
		if(isset($player_id)){
	?>
			<a class="btn btn-sm btn-primary center-block" style="width:25%;" href="http://garvhai.in/index.php/admin/view_social/<?php echo $player_id;?>">View News</a>
	<?php } ?>
</div>