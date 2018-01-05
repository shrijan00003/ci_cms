<!-- this is subview for displaying users -->
<section>
	<h2>Users</h2>
	<hr/>
	<span class="btn btn-default"><?php echo anchor('admin/user/edit/admin','<span class="glyphicon glyphicon-plus-sign"></span> &nbsp;Add Admin'); ?></span>
	
	<span class="btn btn-default"><?php echo anchor('admin/user/edit/editor','<span class="glyphicon glyphicon-plus-sign"></span> &nbsp;Add Editor'); ?></span>
	<hr/>
	<table class="table table-striped" id="userTable" style="margin-top:20px;">
		<thead>
			<tr>
				<th onclick="sortTable(0)">Name &nbsp;&nbsp;<i class="fa fa-sort" aria-hidden="true"></th>
				<th onclick="sortTable(1)">Email &nbsp;&nbsp;<i class="fa fa-sort" aria-hidden="true"></th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
		<?php if(count($users)): foreach($users as $user): ?>
			<tr>
				<td ><?php echo anchor('admin/user/edit/'.$user->id,$user->username) ?></td>
				<td ><?php echo anchor('admin/user/edit/'.$user->id,$user->email) ?></td>
				<td><?php echo btn_edit('admin/user/edit/'.$user->id); ?></td>
				<td><?php echo btn_delete('admin/user/delete_user/'.$user->id); ?></td>
			</tr>
		<?php endforeach; ?>
		<?php else:  ?>
			<tr>
				<td colspan="3">We could not find any users</td>
			</tr>
		<?php endif; ?>
		</tbody>
	</table>
	
</section>
<script >
	
	function sortTable(n) {
	  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
	  table = document.getElementById("userTable");
	  switching = true;
	  //Set the sorting direction to ascending:
	  dir = "asc"; 
	  /*Make a loop that will continue until
	  no switching has been done:*/
	  while (switching) {
		//start by saying: no switching is done:
		switching = false;
		rows = table.getElementsByTagName("TR");
		/*Loop through all table rows (except the
		first, which contains table headers):*/
		for (i = 1; i < (rows.length - 1); i++) {
		  //start by saying there should be no switching:
		  shouldSwitch = false;
		  /*Get the two elements you want to compare,
		  one from current row and one from the next:*/
		  x = rows[i].getElementsByTagName("TD")[n];
		  y = rows[i + 1].getElementsByTagName("TD")[n];
		  /*check if the two rows should switch place,
		  based on the direction, asc or desc:*/
		  if (dir == "asc") {
			if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
			  //if so, mark as a switch and break the loop:
			  shouldSwitch= true;
			  break;
			}
		  } else if (dir == "desc") {
			if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
			  //if so, mark as a switch and break the loop:
			  shouldSwitch= true;
			  break;
			}
		  }
		}
		if (shouldSwitch) {
		  /*If a switch has been marked, make the switch
		  and mark that a switch has been done:*/
		  rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
		  switching = true;
		  //Each time a switch is done, increase this count by 1:
		  switchcount ++;      
		} else {
		  /*If no switching has been done AND the direction is "asc",
		  set the direction to "desc" and run the while loop again.*/
		  if (switchcount == 0 && dir == "asc") {
			dir = "desc";
			switching = true;
		  }
		}
	  }
	}
</script>