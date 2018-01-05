<?php if(is_allowed('Admin')){ ?>

	<section>
		<h2>Advertisment Published</h2>
		<hr/>

			<div class="col-sm-12" style="padding:5px;float:left;">

				<div class="panel panel-default collapse in" style="font-weight:bold;" id="payment_notice">
			    	<div class="panel-heading" style="height:40px">
			    		<h3 style="margin:0px; font-size:18px;font-weight:bold;float:left">Fund calculation from Advertisment  </h3>
			    		<p style="float:right;margin-top:0px;"><a href="#"data-toggle="collapse" data-target="#payment_notice">Dismiss</a></p>
	    		
			    	</div>
			      	<div class="panel-body">
			      		
		      			<?php 

		      				$collected       = 0;
		      				$to_be_collected = 0;

		      				if(count($advertisments)): foreach($advertisments as $advertisment): 

		      					if($advertisment->payment==1){

		      						$collected = $collected + $advertisment->price;
		      					}else{
		      						$to_be_collected = $to_be_collected + $advertisment->price;
		      					}

		      				endforeach;
		      				?>
		      					<div class="col-sm-6" style="padding:20px;float:left;border-right:1px solid lightgray;">
			      					<p style="color:#4d94ff;">Total Income</p>
			      					
			      					<?php if($collected != 0) : ?>
				      				
				      					<p>Collected from <?php echo $collected_from;?> Advertisment</p>
				      					<p>Total collected amount is Rs.<?php echo $collected; ?>/-</p>
				      				
				      				<?php else: ?>

				      					<p>No fund collected yet</p>

				      				<?php endif; ?>
			      		
			      				</div>

					      		<div class="col-sm-6" style="padding:20px;float:left;">
					      			<p style="color:#4d94ff;">Total Due</p>
					      			<?php if($to_be_collected != 0) : ?>
						      			
						      			<p>Payment is to be collected from <?php echo $to_be_collected_from?></p>
						      			<p>Total amount to be collected is Rs.<?php echo $to_be_collected?>/-</p>

						      		<?php else: ?>

				      					<p>All the fund are collected.</p>

				      				<?php endif; ?>

					      		</div>

		      			
		      				<?php else: ?>
		      					<p>There is no any advertisment published yet.</p>

		      				<?php endif;

		      			?>

			      	</div>
			    </div>
			</div>

		<hr/>
		<h2>Advertisment Details</h2><hr/>
		<table class="table table-striped" id="newsTable">
			<thead>
				<tr>
					<th onclick="sortTable(0)" width="" >Positions   &nbsp;&nbsp;<i class="fa fa-sort" aria-hidden="true"></i></th>
					<th onclick="sortTable(1)" width="" >Customer   &nbsp;&nbsp;<i class="fa fa-sort" aria-hidden="true"></i></th>
					<th width="" >Phone No.   &nbsp;&nbsp;</th>

					<th onclick="sortTable(2)" style="text-align:center;">Entry Date  &nbsp;&nbsp;<i class="fa fa-sort" aria-hidden="true"></i></th>
					<th style="text-align:center;">Duration   &nbsp;&nbsp;</th>
					<th onclick="sortTable(3)" style="text-align:center;">Expiry Date   &nbsp;&nbsp;<i class="fa fa-sort" aria-hidden="true"></i></th>
					


					<th style="text-align:center;">Price</th>
					<th style="text-align:center;">Payment</th>
					<th style="text-align:center;">Status</th>
					<th style="text-align:center;">Close ads</th>
				</tr>
			</thead>
			<tbody>



			<?php if(count($advertisments)): foreach($advertisments as $advertisment): ?>
				<tr>
					<td><?php echo $advertisment->position; ?></td>
					<td><?php echo $advertisment->customer; ?></td>
					<td><?php echo $advertisment->phone; ?></td>

					<td style="text-align:center;"><?php echo $advertisment->entry_date; ?></td>
					<td style="text-align:center;"><?php echo $advertisment->duration; ?></td>
					<td style="text-align:center;"><?php echo $advertisment->expiry_date; ?></td>
					<td style="text-align:center;"><?php echo $advertisment->price; ?></td>
					<?php if($advertisment->payment == 0): ?>
				
						<td style="text-align:center;color:red;">Due <?php echo btn_pay('admin/advertisment/makePayment/'.$advertisment->id); ?></td>
					
					<?php else: ?>

						<td style="text-align:center;color:green;">Paid</td>

					<?php endif;?>

					<?php if($advertisment->status == 1):?>

						<td style="text-align:center;">Active</td>
						
					<?php else:?>

						<td style="text-align:center;">Expired</td>

					<?php endif;?>

					<?php if($advertisment->status == 1):?>

						<td style="text-align:center;"><?php echo btn_close('admin/advertisment/close_ads/'.$advertisment->p_id.'/'.$advertisment->id); ?></td>
					<?php else:?>

						<td style="text-align:center;">N/A</td>

					<?php endif;?>
				</tr>
			<?php endforeach; ?>
			<?php else:  ?>
				<tr>		

					<td colspan="3">We could not find any articles</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>

		<hr/>



	</article>

<?php } else{

	redirect('admin/dashboard/resultnotfound');

}?>

<script type="text/javascript">
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