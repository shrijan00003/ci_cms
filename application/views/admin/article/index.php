<!-- this is subview for displaying articles -->
<section>
	<h2>News Articles</h2>
	<hr/>
	
	<span class="btn btn-default"><?php echo anchor('admin/article/edit','<span class="glyphicon glyphicon-plus-sign"></span>&nbsp;&nbsp;Add article'); ?></span><br/>
	<div style="float:right;margin-top:-50px;">
		<select id="selectbox" class="category">
			<option value="">Filter By</option>
			<option value="title">title</option>
			<option value="date">Date</option>
			<option value="category">Category</option>
		</select>
		<input type="text" id="myInput" class="search"  style="margin-left:-8px;margin-top:-2px;" onkeyup="filterFunction()" placeholder="Search.." title="Type in a name">
	</div>
	
	<table class="table table-striped" id="newsTable">
		<thead>
			<tr>
				<th onclick="sortTable(0)" width="600" >Title   &nbsp;&nbsp;<i class="fa fa-sort" aria-hidden="true"></i></th>
				<th onclick="sortTable(1)">PubDate   &nbsp;&nbsp;<i class="fa fa-sort" aria-hidden="true"></i></th>
				<th onclick="sortTable(2)">Category   &nbsp;&nbsp;<i class="fa fa-sort" aria-hidden="true"></i></th>
				<th >Comments  </th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		$cmnt_id = array();
		$count = 0;
		$cmnt_no = 0;
		if(count($comment)): foreach($comment as $cmnt):

			$cmnt_id[$count] = $cmnt->p_id;

			$count++;
		endforeach;endif;


		
		if(count($articles)){ 
			foreach($articles as $article){ ?>
				<tr>
					<td><?php echo anchor('admin/article/comment/'.$article->id,$article->title) ?></td>
					<td><?php echo $article->pubdate; ?></td>
					<td><?php echo $article->category; ?></td>
					<?php 

						for($i=0; $i<$count; $i++){

							if($article->id == $cmnt_id[$i]){

								$cmnt_no++;

							}

						}
					?>
					
					<td style="text-align:center;"><?php echo $cmnt_no; ?>&nbsp; <i class="fa fa-comments" aria-hidden="true"></td>
					<td style="text-align:center;"><?php echo btn_edit('admin/article/edit/'.$article->id); ?></td>
					<td style="text-align:center;"><?php echo btn_delete('admin/article/delete_article/'.$article->id); ?></td>
				</tr>

				<?php 
				$cmnt_no =0; 
			} 
		}else{  ?>
			<tr>
				<td colspan="3">We could not find any articles</td>
			</tr>
		<?php 
		} ?>

		</tbody>
	</table>

</section>
<script>
	function filterFunction() {
	  var input, filter, table, tr, td, i,filterby;
	  input = document.getElementById("myInput");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("newsTable");
	  tr = table.getElementsByTagName("tr");
	  filterby = document.getElementById("selectbox").value;
	  for (i = 0; i < tr.length; i++) {
		if(filterby =="title"){
			td = tr[i].getElementsByTagName("td")[0];
		}else if(filterby =="date"){
			td = tr[i].getElementsByTagName("td")[1];
		}else if(filterby =="category"){
			td = tr[i].getElementsByTagName("td")[2];
		}
		if (td) {
		  if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
			tr[i].style.display = "";
		  } else {
			tr[i].style.display = "none";
		  }
		}       
	  }
	}
	
	function sortTable(n) {
	  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
	  table = document.getElementById("newsTable");
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