<?php
	require_once('../../system/repository/contactrepository.php');
	
	$repo=new ContactRepository();
?>
	<table class="table">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Subject</th>
			<th>Department</th>
			<th>Contact Date</th>
			<th>Status</th>
			<th>Action</th>

		</tr>

		<?php
		foreach($repo->getAll()as $c){
		?>

			<tr>
				<td><?=$c['contact_id']?></td>
				<td><?=$c['contact_name']?></td>
				<td><?=$c['contact_email']?></td>
				<td><?=$c['subject']?></td>
				<td><?=$c['department']?></td>
				<td><?=$c['contact_date']?></td>
				<td><?=$c['status']?></td>
				<td>
					<a href="javascript:void(0)"
					class="btn btn-danger btn-xs" onclick="delContact(<?=$c['contact_id']?>)">
					<span class="glyphicon glyphicon-trash"></span>
				</td>

			</tr>
		<?php		
		}
		?>


	</table>
<script>
	function delContact(id){
		if(confirm('Are you sure to delete?')){
			$.post('deleteAjax.php',{id:id},function(res){

				if(res.result==true){
					reload();
				}
			},"json");
		}
		return false;
	}
</script>