<h2><?php if(isset($title)) echo $title;?></h2>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

<?php echo validation_errors(); ?>
<?php 
    if(isset($error)) echo $error; 
    else if(isset($notice)) echo $notice;
    else if (isset($upload_error)) echo $upload_error; ?>

    <div class="panel panel-primary">
        <div class="panel-heading">
        <?php $panel_title = isset($player) ? 'Update Player' : 'Add New Player'; ?>
            <h3 class="panel-title"><?php echo $panel_title; ?></h3>
        </div>
        <div class="panel-body">
            <?php $action_url = isset($player) ? 'http://www.garvhai.in/index.php/admin/update_player/'.$player['id'] : 'http://www.garvhai.in/index.php/admin/add_player';?>
             <form action="<?php echo $action_url; ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <label for="playername">Name</label>
                <input type="input" name="playername" value="<?php if(isset($player)) echo $player['name'];?>" />
                <hr />

                <?php if(isset($player)) echo '<img src="'.base_url().'/uploads/'.$player['profile_photo'].'"';?>
                <label for="userpic">Player Photo</label>
                <input type="file" name="userpic" size="100" />
                <hr />

                <label for="contest">Contest</label>
                <textarea name="contest" rows="10" cols="80"><?php if(isset($player)) echo $player['contest'];?></textarea>
                <hr />

                <label for="championship">Upcoming Championship</label>
                <textarea name="championship" rows="10" cols="80"><?php if(isset($player)) echo $player['championship'];?></textarea>
                <hr />

                <?php $checkedOpt = isset($player['olympic_qulified']) ? 1 : 0;?>
                <input type="checkbox" name="olympic_qulified" value="<?php echo $checkedOpt; ?>" <?php if($player['olympic_qulified'] == 1) { echo "checked='checked'"; } ?> />
                <label for="olympic_qulified">is_Olympic_Quilified</label>
                <hr />

                <?php $buttom_txt = isset($player) ? 'Update Player' : 'Create New Player';?>
                <input type="submit" name="submit" value="<?php  echo $buttom_txt;?>" />

                <script>
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    //$.noConflict();
                    $( document ).ready(function() {
                        console.log( "ready!" );
                        CKEDITOR.replace( 'contest' );
                        CKEDITOR.replace( 'championship' );
                    });
                    
                </script>

            </form>
        </div>
    </div>
</div>