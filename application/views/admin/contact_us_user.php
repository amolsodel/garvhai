<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h2 class="sub-header">Contact Us User</h2>
	<a class="btn btn-sm btn-primary center-block" style="width:13%;float:right;" href="http://www.garvhai.in/index.php/export/export_data">Export Data</a>
	<hr/>
	<?php
		if(empty($contact_us_users)){
			echo "No one share his experience yet!";
		}else{
	?>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Email</th>
							<th>Mobile</th>
							<th>Comment</th>
							<th>Delete</th>
						</tr>
					</thead>
					<?php foreach ($contact_us_users as $contact_us_user): ?>
						<tbody>
							<tr>
								<td><?php echo $contact_us_user['id']; ?></td>
								<td><?php echo trim($contact_us_user['user_name'],"'"); ?></td>
								<td><?php echo trim($contact_us_user['email'],"'"); ?></td>
								<td><?php echo trim($contact_us_user['mobile'],"'"); ?></td>
								<td><?php echo trim($contact_us_user['comment'],"'"); ?></td>
								<td><a href="http://www.garvhai.in/index.php/admin/delete_user/<?php echo $contact_us_user['id'];?>">Delete</a></td>
							</tr>
						</tbody>
					<?php endforeach; ?>
				</table>
			</div>
		<?php 
		}
		?>
</div>